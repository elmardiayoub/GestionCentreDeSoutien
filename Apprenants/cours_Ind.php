<?php include("include/header.php");?>
<?php 
      setcookie("id_cours", $_GET['id_cours'], time() + (86400 * 30), "/");
?>

<?php 
// include("apprData.php");
// echo $_COOKIE['current'];
?>

    <div id="content-wrapper">

    <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="index.html">Acceuil</a>
        <li class="breadcrumb-item">
        <a href="AjouterAppr.php?req=1">Aouter un apprenant</a>

        <?php if($_COOKIE['current'] == "Cours.php")
            {
        ?>  
        </li>
           <li class="breadcrumb-item"><a href="../Cours/Cours.php">Liste des cours</a>
        </li>

        <?php }?>

        <?php if($_COOKIE['current'] == "archive.php")
            {
        ?>  
        </li>
          <li class="breadcrumb-item"><a href="../Cours/archive.php">Archive</a>
        </li>

        <?php }?>

        <?php if($_GET['type'] == "grp") 
        {
        ?>
          <li class="breadcrumb-item active">Cours En groupe</li>
        <?php } else if($_GET['type'] == "ind")
            {
        ?>       
          <li class="breadcrumb-item active">Cours Individuel</li>
        <?php } ?>
        



    </ol>

    <!-- Page Content -->


        
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> L'apprenant concérné:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                  </tr>
                </tfoot>
                <tbody id="appr_concérné">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      </div>

      </div>
  </div>

    
  <script src="cours_Ind.js"></script>

    <?php include("include/footer.php"); ?>   
