
<?php include("include/header.php");?>

<div id="content-wrapper">

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.html">Acceuil</a>
    </li>
    <li class="breadcrumb-item active">Liste des contacts</li>
  </ol>
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau des apprenants</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Détails</th>
                    <th>Modifier</th>
                    <th>Devenir apprenant</th>
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Détails</th>
                    <th>Modifier</th>
                    <th>Devenir apprenant</th>
                  </tr>
                </tfoot>
                <tbody id="tableauContact">
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
  <script src="ScriptContact.js"></script>
  <?php include("include/footer.php"); ?>