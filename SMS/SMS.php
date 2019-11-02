<?php include("include/header.php");?>

<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item active">SMS envoyé(s)</li>
  </ol>
        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-sms"></i> SMS reçu(s) par les étudiants</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Date</th>
                    <th>Contenu</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Date</th>
                    <th>Contenu</th>
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
            <i class="fas fa-sms"></i> SMS reçu(s) par les Professeurs</div>
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Date</th>
                    <th>Contenu</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Date</th>
                    <th>Contenu</th>
                  </tr>
                </tfoot>
                <tbody id="Liste-prof">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
          </div>
          </div>
  
  <!-- /confirmation -->
  <div class="modal fade" id="confirmer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">vous etes sur ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Vous voulez vraiment supprimer ce message ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <!-- S'il click sur cette button il doit supprimer toute la ligne -->
          <button id="deletebtn" class="btn btn-danger" onclick="">Supprimer</button>
        </div>
      </div>
    </div>
  </div>
     
  <script src="scriptSMSetud.js"></script>
  <script src="scriptSMSprof.js"></script>
  <?php include("include/footer.php"); ?>