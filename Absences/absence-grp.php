<?php include("include/header.php");?>
<?php include("requete-absence.php");?>
    <div id="content-wrapper">

      <div class="containser-fluid">

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
              <!-- page-validation-absence.php -->
               <div class="card-header">
            <i class="fas fa-table"></i>  Les informations du professeur :</div>
            <form method="post" action="">
              <button class="btn btn-outline-success col-md-12" value="reg" name="save-absence">
                      Send
              </button>
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <tr>
                   <th>Nom</th>
                  <th>Prénom</th>
                  <th>Matière</th>
                  <th>Niveau</th>
                  <th>Début</th>
                  <th>Fin</th>
                 
                  <th>Absent</th>
                  <th>Justifié</th>
                  </tr>
                  <tr>
                    <th><?php echo $post['Nom'] ; ?></th>
                    <th><?php echo $post['Prénom'] ; ?></th>
                    <th><?php echo $post['libellé_mat'] ; ?></th>
                    <th><?php echo $post['libellé_niv'] ; ?></th>
                    <th><?php echo $post['début'] ; ?></th>
                    <th><?php echo $post['fin'] ; ?></th>
                    
                    <!-- stocker l id du prof dans name ::: -->
                    <th><input type="checkbox" name="mon_prof" value="<?php
                     echo $post['id']; ?>">
                    </th>
                    <td><input type="radio" name="radio" value="oui" >Oui
                      <br>
                      <input type="radio" name="radio" value="non">Non
                    </td>
                  </tr>
              </table>
              <div class="card-header">
            <i class="fas fa-table"></i>  Les Apprenants de ce groupe :</div>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
                <thead>
                  <tr>
                  <th>CIN</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Absent
                  </th>
                 
                    <!-- <th>Supprimer</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                <th>CIN</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Absent</th>
                  </tr>
                </tfoot>
                <tbody id="tableauA">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </form>
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
  var some=window.location.href ;
  some = some.split('?',2);
  var newone= some[1].split('&',3);
  
 $(document).ready(function(){

fetch_data();

  function fetch_data()
  {
   var dataTable = $('#dataTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"coche.php",
     type:"POST",
     data :
      {

        id_cours : newone[0].split('=',2)[1] ,
        id_horaire : newone[1].split('=',2)[1] ,
        id : newone[2].split('=',2)[1] ,
       },
   }
   });
  }
  



 });
</script>