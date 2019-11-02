<?php include("include/header.php");?>

<?php 
      $path = explode("/",$_SERVER['PHP_SELF']) ;
      setcookie("current", $path[3], time() + (86400 * 30), "/");
?>

<div id="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.html">Acceuil</a>
      </li>
      <li class="breadcrumb-item active">Archive</li>
    </ol>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau d'archives</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Paiement</th>
                    <th>Détails</th>
                    <th>Emploie du temps </th>
                    <th>Modifier</th>
                    <th>Retourner</th>
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
                    <th>Retourner</th>
                  </tr>
                </tfoot>
                <tbody id="ArchiveCours">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
</div>
</div>
<script src="archiveCours.js"></script>
<!-- <script src="ScripProf.js"></script> -->
<?php include("include/footer.php"); ?>