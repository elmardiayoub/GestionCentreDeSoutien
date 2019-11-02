<?php include("include/header.php");?>
<?php 

   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");

if(isset($_POST['valider']))
//// cas de modification ::
{
   if(isset($_GET['id']) && isset($_POST['new-txt'])){
   $query_v = ' UPDATE modele SET `modele_contenu` = "'.$_POST['new-txt'].'" 
               WHERE id_modele = '.$_GET['id'];
   $result_v = mysqli_query($conn, $query_v);
   //echo "$result";
   }  
   else
   {//// la variable admin est set to 1 if he is an admin
       $query_v = ' INSERT INTO  modele (par,date_ajout,modele_contenu)
               VALUES  ('.$_SESSION['id_username'].', CURRENT_TIME ,"'.$_POST['new-txt'].'" )' ;
       $result_v = mysqli_query($conn, $query_v);
   }
   
   header("location:page-validation.php");
  
}
   //  Result
   

   // Free Result
   //mysqli_free_result($result);

   // Close Connection
mysqli_close($conn);
?>   
<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item active">Mes Modèles</li>
  </ol>
        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>  Ajouter un Modèle
         </div>
 <div class="form-group" style="margin: 5em; margin-top: 2em;">
   <form action="" method="post">
            <div class="form-row">
              <div class="col-md-12">
                <i class="fas fa-pencil-alt prefix"></i>
                <textarea name="new-txt" id="message" class="md-textarea form-control" rows="3">
                   <?php if(isset($_GET['text'])) echo $_GET['text'] ;  ?>
                </textarea>
              </div>
            </div>
                <button name="valider" id="send_modele" class="btn btn-dark col-md-12" onclick="add_modele()">Valider le modèle</button>
             </form>
          </div>
     
</div>




  <?php include("include/footer.php"); ?>