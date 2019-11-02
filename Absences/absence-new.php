<?php include("include/header.php");?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Gestion des Absences</li>
        </ol>


        <!-- Page Content -->

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Gérer les Absences</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>Identifiant</th>
                  <th>Matière</th>
                  <th>Niveau</th>
                  <th>Début</th>
                  <th>Fin</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Fiche-Absence</th>
                 
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                 <th>Identifiant</th>
                  <th>Matière</th>
                  <th>Niveau</th>
                   <th>Début</th>
                  <th>Fin</th>
                <th>Nom</th>
                  <th>Prénom</th>
                  <th>Fiche-Absence</th>
                  </tr>
                </tfoot>
                <tbody id="tableauA">
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
 

   <!--script src="absence-new.js"></script>
   <script src="SMS/send.js"></script-->


<?php include("include/footer.php"); ?>        


<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#dataTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchAbsence.php",
     type:"POST",

    }
   });
  }
  



 });
</script>