
<?php

   session_start();
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");
   
   // Create Query
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   $_SESSION['id']=$id;
   $query ="SELECT  * FROM  `professeur` WHERE `id` ='$id'";

   // Get Result
   $result = mysqli_query($conn, $query);

    
   // Fetch Data
   $post = mysqli_fetch_assoc($result);
  //  $post2 = mysqli_fetch_assoc($result2);
   // Free Result
   mysqli_free_result($result);
  // if(isset($))
  $nbr=0;
  $cours = [];
  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
  {
    //Création d'une facture :

    if(sizeof($_POST)>1)
    {
      //faire une instance d'une facture
      $query = 'INSERT INTO facture(somme,id_mode) values (0,'.$_POST["paymentMethod"].')';
      $result = mysqli_query($conn, $query);
     
      //Sélectionner la dernière facture celle créer
      $query = "SELECT max(id_facture) as max FROM facture";
      $result=mysqli_query($conn, $query);
      $post1 = mysqli_fetch_assoc($result);
      
      $Max_id_facture  = $post1["max"];

      foreach($_POST as $key => $value)
      {
        if($nbr>0)
        {
          $query= "SELECT * from cours WHERE id_cours='$key'";
          $result=mysqli_query($conn, $query);
          $post2 = mysqli_fetch_assoc($result);
          array_push($cours,$post2);
          $query= "UPDATE `cours` SET `NbrHeureEnseingé` = 0 WHERE id_cours='$key'";
          $result=mysqli_query($conn, $query);
        }
        $nbr++;
      } 
      $somme = 0;
      for($i=0;$i<sizeof($cours);$i++)
      {


        $id_cours = $cours[$i]['id_cours'];
        $query = 'SELECT type FROM cours where cours.id_cours = '.$id_cours;
        $result=mysqli_query($conn, $query);
        $post1 = mysqli_fetch_assoc($result);

        $query = 'SELECT * FROM tarification,cours,matière,niveau where tarification.id_mat = matière.id_mat and tarification.id_niveau=niveau.id_niveau and cours.id_mat = matière.id_mat and cours.id_niveau=niveau.id_niveau and cours.id_cours = '.$id_cours;

        $result=mysqli_query($conn, $query);
        
        $post2 = mysqli_fetch_assoc($result);

        

        if($post1["type"] == "grp")
        {
            $montant = $post2["salaire_grp"] *  $cours[$i]['NbrHeureEnseingé'];
        }else
        {
            $montant = $post2["salaire_ind"] * $cours[$i]['NbrHeureEnseingé'];
        }
        $NbrHeureEnseingé = $cours[$i]['NbrHeureEnseingé'];
        $somme+=$montant;
        $query = "INSERT INTO paiement VALUES($id_cours,$id,$Max_id_facture,$montant,$NbrHeureEnseingé)";

        $result = mysqli_query($conn, $query);
      }

      $query = "UPDATE `facture` SET `somme` = $somme WHERE id_facture=$Max_id_facture";
      $result = mysqli_query($conn, $query);
    }
    else 
    {
      ?><script>alert("Rien à payer");</script><?php
    }
     
  }

  $query= "SELECT * from facture";
  $result = mysqli_query($conn,$query);
  $post3 = mysqli_fetch_assoc($result);


  $query = 'SELECT * from modedepaiement';
  $result = mysqli_query($conn, $query);  

  mysqli_close($conn);
//    if ($_SERVER["REQUEST_METHOD"] == "POST"){
//         $myArray = $_POST['kvcArray'];
// ?>
     

<?php include("include/header.php");?>

<div id="content-wrapper">
<div class="container-fluid">
<?php if($post["Archive"]){?>

<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item">
      <a href="Archive.php">Arhive</a>
    </li>
    <li class="breadcrumb-item active">Paiement</li>
  </ol>
<?php }else  {?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item">
      <a href="professeurs.php">Liste des professeurs</a>
    </li>
    <li class="breadcrumb-item active">Paiement</li>
  </ol>
<?php } ?>
      <div id="area" >
            <h1 id="Titre" style="display:none;"></h1>
      </div>
        <form  method="POST" action= "paiement.php?id=<?php echo $id ?>" >
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau de paiement</div>
          <div class="card-body">
            <div class="table-responsive">
         
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <span class="font-weight-bolder invoice-title"> Nom: </span> <?php echo($post['Nom']) ?>
              <div class="row">
               

               </div>
               <span class="font-weight-bolder invoice-title">Prénom : </span><?php echo($post['Prénom']) ?><br><br>
                <thead>
                  <tr>
                    <th>Cours</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Heures enseignées</th>
                    <th style="background: #fba">à payer </th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>

                  <th>Cours</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Type</th>
                    <th>Heures enseignées</th>
                    <th style="background: #fba">à payer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauPaiement">
                
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
             
            </div>
      



      <div class="card card-register mx-auto mt-5" style="margin-bottom:7em;">
          <div class="card-header">Payement</div>


          <div class="card-body" id="payement">
          <?php $nbr1=1; while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class="custom-control custom-radio">
              <input id="credit<?php echo $nbr1?>" name="paymentMethod" type="radio" class="custom-control-input" value="<?php echo $nbr1?>"  checked required>
              <label class="custom-control-label" for="credit<?php echo $nbr1++?>"><?php echo $row["mode"] ?></label>
            </div>  
          <?php } ?>
          <button  type="submit" class= "btn btn-primary col-xl-2 offset-md-10">Payer</button>
  
      </div>




            </div>
          <div class="card md-4">
 
         
        </div>
        </div>
        <div class="card footer" id="HTMLtoPDF"></div>
        <div class="card mb-3">
          <div class="card-header ">
            <i class="fas fa-money-bill"></i> Historique de paiement</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                  <tr>
                    <th style="width:50%">Date</th>
                    <th style="width:50%">Facture</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Facture</th>
                  </tr>
                </tfoot>
                <tbody id="HistoPaiement">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      </div>    
</div>
</div>
      </div>
      </div> 
 </form>
</div>
</div>

<script src="ScriptPaiement.js"></script>



  <!-- Bootstrap core JavaScript-->
  <script src="../Techno/vendor/jquery/jquery.min.js"></script>
  <script src="../Techno/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Techno/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../Techno/vendor/chart.js/Chart.min.js"></script>
  <script src="../Techno/vendor/datatables/jquery.dataTables.js"></script>
  <script src="../Techno/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Techno/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../Techno/js/demo/datatables-demo.js"></script>
  <script src="../Techno/js/demo/chart-area-demo.js"></script>