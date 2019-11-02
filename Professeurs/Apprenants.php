
<?php include("include/header.php");?>

<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item active">Liste des professeurs</li>
  </ol>
        <!-- Page Content -->
        <div class="card mb-3"  id="HTMLtoPDF">
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau des professeurs</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Paiement</th>
                    <th>Détails</th>
                    <th>Emploie du temps</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Paiement</th>
                    <th>Détails</th>
                    <th>Emploie du temps</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauProf">
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
        <div class="modal-body">Vous voulez vraiment supprimer ce professeur ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <!-- S'il click sur cette button il doit supprimer toute la ligne -->
          <button id="deletebtn" class="btn btn-danger" onclick="">Supprimer</button>
        </div>
      </div>
    </div>
  </div>
     
  <script src="ScriptProf.js"></script>
  <script src="../Techno/js/jspdf.js"></script>
<script src="../Techno/js/jquery-2.1.3.js"></script>
<script src="../Techno/js/pdfFromHTML.js"></script>
  <?php include("include/footer.php"); ?>