<?php include("include/header.php");?>
<?php include('req-send-contact.php'); ?>
<?php
if(isset($_POST['send-mod']))
{
  if(isset($_GET['id']))
  header("location:addmodele.php?id=".$_GET['id']."&text=".$_POST["new-txt"]);
else 
   header("location:addmodele.php?text=".$_POST["new-txt"]);
}
if(isset($_POST['valider']) && isset($_POST['prof']))
{
  //print_r($_POST['prof']);
}
?>
<div id="content-wrapper">
<form  method="post">
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item active">Contact</li>
  </ol>
        <!-- Page Content -->
        <div class="container">
        <div class="card mb-4">
          <div class="card-header" style="margin-bottom: 2em;">
            <i class="fas fa-sms"></i> Le message à envoyer</div>

        <div class="">
            <!-- AREA CHART -->
            <div class="box box-warning">
                <div class="box-body">
                  <div class="form-group" style="margin: 1em; margin-top: 0em;">
   
            <div class="form-row">
              <div class="col-md-12">
                <i class="fas fa-pencil-alt prefix"></i>
                <textarea name="new-txt" id="message" class="md-textarea form-control" rows="3">
                   <?php if(isset($_GET['new-txt'])) echo $_GET['new-txt'] ;  ?>
                </textarea>
              </div>
            </div>
                <button name="valider" id="send" class="btn btn-success col-md-12"> SEND</button>

                 <button id="send_modele" class="btn btn-dark col-md-12" name="send-mod" style="margin-top: 1em;">Ajouter aux modèles</button>

          </div>
     
</div>



<!-- /.col (LEFT) -->
</div>

        </div>
    </div>
</div>
</div>

<div class="container">
  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-address-book"></i> Les contacts des professeurs :</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                     <th>Choisir</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Spécialité</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                     <th>Choisir</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Spécialité</th>
                  </tr>
                </tfoot>
                <tbody id="Liste-prof">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
    
  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-sms"></i> Les contacts des apprenants</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Choisir</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Choisir</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                  </tr>
                </tfoot>
                <tbody id="Liste-app">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
         
  <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-sms"></i> Les contacts par groupe :</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Choisir</th>
                    <th>Identifiant</th>
                    <th>Nom du professeur</th>
                    <th>Prénom du professeur</th>
                    
                    <th>Matière</th>
                    <th>Niveau</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Choisir</th>
                    <th>Identifiant</th>
                    <th>Nom du professeur</th>
                    <th>Prénom du professeur</th>
                    
                    <th>Matière</th>
                    <th>Niveau</th>
                  </tr>
                </tfoot>
                <tbody id="Liste-cours">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
              <!-- </form> -->
            </div>
          </div>
           
        </div>
      </div>
</form>
  <script src="contact.js"></script>
  <?php include("include/footer.php"); ?>
<script type="text/javascript">
  
 $(document).ready(function(){

  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#dataTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchcontactprof.php",
     type:"POST",

    }
   });
   var dataTable2 = $('#dataTable2').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchcontactapp.php",
     type:"POST",

    }
   });
   var dataTable3 = $('#dataTable3').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchcontactgrp.php",
     type:"POST",

    }
   });
  }

 });

</script>
<style type="text/css">
  input{
    width:1.5em;
    height: 1.5em;
   margin-left : 5em;
  }
</style>