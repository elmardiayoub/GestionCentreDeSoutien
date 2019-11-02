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
            <i class="fas fa-table"></i> Gérer les Absences
             <?php if(isset($_GET['prof'])) echo "du professeur ".$_GET['prof'] ; 
             ?>
           </div>
          <div class="card-body">
            <div class="container table-responsive">
               <!--input type="date" class="form-control col-md-6" id="my_date" value="">
               <div class="col-md-6">
             <button class="btn btn-primary" 
             onclick="send_date()">
                 <i class="fa fa-search"></i>
                            Rechercher
            </button>
          </div-->
          <form action="#" method="POST" >
            <div class="col-md-12">
            <button id='save' class="btn btn-outline-success" type="submit"> Save</button>
          </div>
          </form>
               <br>
               <div style="" id="here">
              <table  class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
             <!--th>
                      <input type="checkbox" name="selectionner" id="selectionner"
                      onchange="chech(this.checked);" >
                    Tout selectionner
                    </th>
                    <th>Fiche-Absence</th-->
                  </tr>
                </tfoot>
                <tbody id="tableau-fiche">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      </div>

      </div>
  </div>
 <?php// include("requete/tableau_init.php"); ?>  
   <!--script src="absence.js"></script-->
   <script src="SMS/contact.js"></script>
   <script src="fiche-prof.js"></script>
  

<?php include("include/footer.php"); ?>        
<script type="text/javascript">
  function save() /// get checked buttons
{

  return;
}


</script>