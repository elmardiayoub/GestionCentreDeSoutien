
<?php include("include/header.php");?>

<?php 
      $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
      mysqli_set_charset($conn,"utf8");
      $nbr = 1;
      $path = explode("/",$_SERVER['PHP_SELF']) ;
      setcookie("current", $path[3], time() + (86400 * 30), "/");

      $query = 'SELECT * from modedepaiement';
      $result = mysqli_query($conn, $query);
      // $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
      // var_dump($post);
      // mysqli_free_result($result);
      // mysqli_close($conn);
?>

<div id="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item active">Ajouter un apprenant</li>
    </ol>
    <body>

   <form method="POST" action="InscriptionPaiement.php">
  <!-- <div class="container " > -->
    <div class="card card-register mx-auto mt-5" style="margin-bottom:1em;">
      <div class="card-header">Informations sur l'apprenant</div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  
                  <input type="text" id="NomProf" name="nom" class="form-control" 
                  placeholder="Votre nom"  value="<?php if($_GET["req"] == 2 and isset($_GET["nom"])) 
                  echo $_GET["nom"] ?> " onblur="valider_nom()">
                  <label for="NomProf">Nom</label>
                  <span id="err_nomProf"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <input type="text" id="prénomProf" value="<?php if($_GET["req"] == 2 and isset($_GET["prénom"])) 
                  echo $_GET["prénom"] ?> "  name="prénom" class="form-control" 
                  placeholder="Votre prénom"  onblur="valider_prenom()">
                  <label for="prénomProf">Prénom</label>
                  <span id="err_prénomProf"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="CINProf"  name="CIN" class="form-control"
                   placeholder="CIN" onblur="valider_CIN()"  maxlength="9">
                  <label for="CINProf">CIN</label>
                  <span id="err_CINProf"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" id="numProf" value="<?php if($_GET["req"] == 2 and isset($_GET["num"])) 
                  echo $_GET["num"] ?> "  name="num" class="form-control"
                   placeholder="Numéro téléphone" onblur="valider_numero()" >
                  <label for="numProf">Numéro de téléphone</label>
                  <span id="err_numProf"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="emailProf" value="<?php if($_GET["req"] == 2 and isset($_GET["email"])) 
                  echo $_GET["email"] ?> "  name="email" class="form-control" 
              placeholder="Email addresse" onblur="valider_mail()">
              <label for="emailProf">Adresse e-mail</label>
              <span id="err_mailProf"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" id="datenaissance" name="date" class="form-control"
                         maxlength="9">
                  <label for="datenaissance">Date de naissance</label>
                  <span id="err_dateProf"></span>
                </div>
              </div>
              <div class="col-xl-6" >
              <div class="input-group " >
              <div class="input-group-prepend">
                <span class="input-group-text" id="fileInputs" >Image</span>
              </div>
              <div class="custom-file">
                <input  type="file" name="image" class="custom-file-input"  id="fileInput">
                <label class="custom-file-label " for="inputGroupFile01">Choisir un fichier</label>
              </div>
            </div>
             </div>
            </div>
            </div>
          </div>

        



            <div class="modal fade" id="Ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                  aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Votre apprenant à été bien ajouté</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" onclick="vider();" type="submit" data-dismiss="modal" >OK</button>

                  </div>
                </div>
              </div>
            </div>
      </div>



  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Attribution des cours</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>Identifiant</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Nom du Prof</th>
                    <th>Prénom du Prof</th>
                    <th>Type</th>
                    <th>Emploi</th>
                    <th>Membres</th>
                    <th>Prix/séance</th>
                    <th>choix</th>
                    <th>Nombre de séances</th>

                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Identifiant</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Nom du Prof</th>
                    <th>Prénom du Prof</th>
                    <th>Type</th>
                    <th>Emploi</th>
                    <th>Membres</th>
                    <th>Prix/séance</th>
                    <th>choix</th>
                    <th>Nombre de séances</th>
                  </tr>
                </tfoot>
                <tbody id="tableauCours">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div> 
          </div>
         
        </div>
        

        <div class="card card-register mx-auto mt-5" style="margin-bottom:7em;">
          <div class="card-header">Payement</div>


          <div class="card-body" id="payement">
          <?php while($row = mysqli_fetch_assoc($result)) { ?>
            
            <div class="custom-control custom-radio">
              <input id="credit<?php echo $nbr?>" name="paymentMethod" type="radio" class="custom-control-input" value="<?php echo $nbr?>"  checked required>
              <label class="custom-control-label" for="credit<?php echo $nbr++?>"><?php echo $row["mode"] ?></label>
            </div>  
          <?php } ?>
          <button type="submit" class="btn btn-primary col-sm-4 offset-4" style="margin-bottom:1em;">Ajouter</button>
  
      </div>




      </div>
  
  </form>
      </div>
  </div>
  



   <!-- <script src="ScriptCours.js"></script> -->



<script src="ScriptAjtApp.js"></script>

<?php  include("include/footer.php"); ?>
    