<?php include("include/header.php");?>
<?php
  if(isset($_POST['add-modele']))
       header("location:addmodele.php") ;
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
            <i class="fas fa-table"></i>Liste des Modèles</div>
          <div class="card-body">
            <div class="container">
              <form method="post" action="#">
                 <button name="add-modele" class="btn btn-outline-primary col-12">
                 ajouter un modèle</button>
              </form>
            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Numéro</th>
                    <th>Contenu</th>
                    <th>Par </th>
                    <!--th>Détails</th--> <!--recuperer les contacts qui ont reçu ce modele -->
                    <th>Créé Le </th>
                    
                        <!--  <th>Détails</th> --> <!--recuperer les contacts qui ont reçu ce modele -->
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Numéro</th>
                    <th>Contenu</th>
                    <th>Par </th>
                    <!--th>Détails</th--> <!--recuperer les contacts qui ont reçu ce modele -->
                    <th>Créé Le </th>
                  </tr>
                </tfoot>
                <tbody id="modele">
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

  <script src="modele-archif.js"></script>
  <?php include("include/footer.php"); ?>