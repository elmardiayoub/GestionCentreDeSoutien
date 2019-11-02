<?php include("include/header.php");?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Matières et Niveaux</li>
        </ol>

        <!-- Page Content -->

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Les matières</div>
          <div class="card-body">
            <div class="table-responsive">
                     <div align="right">  
                          <button type="button" vname="add" id="add_1" data-toggle="modal" data-target="#add_data_Modal_1" class="btn btn-warning ">Add</button>  
                     </div>  
                     <br />
              <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Matière</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Matière</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauMat">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>

        </div>




        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Les Niveaux</div>
          <div class="card-body">
            <div class="table-responsive">
                     <div align="right">  
                          <button type="button" vname="add" id="add_2" data-toggle="modal" data-target="#add_data_Modal_2" class="btn btn-warning ">Add</button>  
                     </div>  
                     <br />
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Niveau</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Niveau</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauNiv">
                <!-- le tableau se charge depuis la base de données  -->
                </tbody>
              </table>
            </div>
          </div>

        </div>


        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau des prix et des charges   (Les prix et les charges en DH)</div>
          <div class="card-body">
            <div class="table-responsive">
                     <div align="right">  
                          <button type="button" vname="add" id="add_3" data-toggle="modal" data-target="#add_data_Modal_3" class="btn btn-warning ">Add</button>  
                     </div>  
                     <br />
              <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Le prix (individuel)</th>
                    <th>Le prix (en groupe)</th>
                    <th>les charges (individuel)</th>
                    <th>les charges (en groupe)</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Le prix (individuel)</th>
                    <th>Le prix (en groupe)</th>
                    <th>les charges (individuel)</th>
                    <th>les charges (en groupe)</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauTarif">
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
        <div class="modal-body">Vous voulez vraiment supprimer  ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <!-- S'il click sur cette button il doit supprimer toute la ligne -->
          <button id="deletebtn" class="btn btn-danger" data-dismiss="modal"  >Supprimer</button>
        </div>
      </div>
    </div>
  </div>



  <?php include("include/footer.php"); ?>    


  <div id="add_data_Modal_1" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Ajouter une matière</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_1" >  

                          <label for="mat">Saisir une matière</label>
                          <input type="text" name="mat" id="mat" class="form-control">
                          <br />  
                          <input type="hidden" name="mat_id" id="mat_id" />
                          <input type="submit" name="insert" id="insert_1" value="insert" class="btn btn-success" />  

                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 





  <div id="add_data_Modal_2" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Ajouter un niveau</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_2" >  

                          <label for="niv">Saisir un niveau</label>
                          <input type="text" name="niv" id="niv" class="form-control">
                          <br />  
                          <input type="hidden" name="niv_id" id="niv_id" />
                          <input type="submit" name="insert" id="insert_2" value="insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 





  <div id="add_data_Modal_3" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Ajouter une Tarification</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_3" >  

                          <?php  
                              $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
                              mysqli_set_charset($conn,"utf8");  
                              $query = "SELECT id_mat,libellé_mat from matière";  
                              $result = mysqli_query($conn, $query);  
                          ?>  
                          <label>Sélectioner une matière</label>  
                          <select name="mat" id="mat" class="form-control">  
                          <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                          ?> 
                               <option value="<?php echo $row["id_mat"]?>"><?php echo $row["libellé_mat"] ; ?></option>  
                          <?php  
                          }  
                          ?> 
                          </select>  
                          <br />  


                          <?php  
                              $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
                              mysqli_set_charset($conn,"utf8");  
                              $query = "SELECT id_niveau,libellé_niv from niveau";  
                              $result = mysqli_query($conn, $query);  
                          ?> 
                          <label>Sélectioner un niveau</label>  
                          <select name="niv" id="niv" class="form-control">  
                          <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                          ?> 
                               <option value="<?php echo $row["id_niveau"]?>"><?php echo $row["libellé_niv"] ; ?></option>  
                          <?php  
                          }  
                          ?> 
                          </select>  
                          <br />  

                          <input type="hidden" name="tarif_id" id="tarif_id" />


                          <label for="prix_ind">Saisir le prix du Cours individuel</label>
                          <input type="number" name="prix_ind" id="prix_ind" step="0.01" class="form-control">
                          <br />  
                          <label for="prix_grp">Saisir le prix du Cours en groupe</label>
                          <input type="number" name="prix_grp" id="prix_grp" step="0.01" class="form-control">
                          <br />  
  
                          <label for="charge_ind">Saisir le montant à payer au professeur (Cours individuel)</label>
                          <input type="number" name="charge_ind" id="charge_ind" step="0.01" class="form-control">
                          <br />  
                          <label for="charge_ind">Saisir le montant à payer au professeur (Cours en groupe)</label>
                          <input type="number" name="charge_grp" id="charge_grp"  step="0.01" class="form-control">
                          <br />  



                          <input type="submit" name="insert" id="insert_3" value="insert" class="btn btn-success" />  

                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 



      <!-- // function deleted()
     // {
     // var url = "CoursData.php?id="+clicked.getAttribute("id");
     
     // var xmlhttp = new XMLHttpRequest();
     // xmlhttp.onreadystatechange = function() {
     //      if (this.readyState == 4 && this.status == 200) {
     //           $('#dataTable').DataTable().destroy();
     //           fetch_data();
     //      }
     // };
     // document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
     // clicked.parentElement.parentElement.remove();
     // xmlhttp.open("GET", url, true);
     // xmlhttp.send();
     // } -->


 <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

     $('#add_1').click(function(){  
           $('#insert_1').val("insert");  
           $('#insert_form_1')[0].reset();  
     });  

     $('#add_2').click(function(){  
           $('#insert_2').val("insert");  
           $('#insert_form_2')[0].reset();  
     });  

     $('#add_3').click(function(){  
           $('#insert_3').val("insert");  
           $('#insert_form_3')[0].reset();  
     });  
  
  fetch_data1();

  function fetch_data1()
  {
   var dataTable = $('#dataTable1').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchMat.php",
     type:"POST",

    }
   });
  }
  

fetch_data2();

function fetch_data2()
{
 var dataTable = $('#dataTable2').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetchNiv.php",
   type:"POST",

  }
 });
}


fetch_data3();

function fetch_data3()
{
 var dataTable = $('#dataTable3').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetchTarif.php",
   type:"POST",

  }
 });
}


  $(document).on('click', '.edit_data_1', function(){  
           var mat_id = $(this).attr("id_mat");  
          //  console.log(mat_id);
           $.ajax({  
                url:"editMat.php",  
                method:"POST",  
                data:{mat_id:mat_id},  
                dataType:"json",  
                success:function(data){  
                     $('#mat').val(data.libellé_mat);  
                     $('#mat_id').val(data.id_mat);  
                     $('#insert_1').val("Update");  
                     $('#add_data_Modal_1').modal('show');  
                     $('#dataTable1').DataTable().destroy();
                     fetch_data1();
                    // console.log("ffff");
                }  
           });  
      });  

      $('#insert_form_1').on("submit", function(event){  
           event.preventDefault();  

                $.ajax({  
                     url:"ajouterMat.php",  
                     method:"POST",  
                     data:$('#insert_form_1').serialize(),  
                     beforeSend:function(){  
                          $('#insert_1').val("Création..");  
                     },  
                     success:function(data){  
                          $('#insert_form_1')[0].reset();  
                          $('#add_data_Modal_1').modal('hide'); 
                          $('#dataTable1').DataTable().destroy();
                          fetch_data1();
                          // console.log(data);
                          // $('#employee_table').html(data);  
                     }  
                });  
       
      });  

      var clicked;

      $(document).on('click', '.delete_Btn_1', function(event){   
      
          clicked=event.target;

          if(event.target.getAttribute("name") == 'icon'){
            // clicked = $(clicked).parent(".outerHTML");
            
            clicked=event.target.parentNode;
            // console.log(clicked);
          }

          // document.getElementById("deletebtn").setAttribute("onclick","deleted()");
          
      });
      


      $(document).on('click', '#deletebtn', function(event){ 
         var id=clicked.getAttribute("id");
     //     document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
      //  console.log(id);
         $.ajax({
          url:"ajouterMat.php",
          method:"POST",
          data:{id:id},
          success:function(data){
          // $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
          
          // $('#confirmer').modal('hide'); 
          $('#dataTable1').DataTable().destroy();
          fetch_data1();
          // console.log("gggg");
          
          }
     });

      });  

     // function deleted()
     // {
     // var url = "CoursData.php?id="+clicked.getAttribute("id");
     
     // var xmlhttp = new XMLHttpRequest();
     // xmlhttp.onreadystatechange = function() {
     //      if (this.readyState == 4 && this.status == 200) {
     //           $('#dataTable').DataTable().destroy();
     //           fetch_data();
     //      }
     // };
     // document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
     // clicked.parentElement.parentElement.remove();
     // xmlhttp.open("GET", url, true);
     // xmlhttp.send();
     // }


     
  $(document).on('click', '.edit_data_3', function(){  
           var tarif_id = $(this).attr("id_tarif");  
          //  console.log(mat_id);
          var res = tarif_id.split("&");
          mat_id = res[0];
          niv_id = res[1];
          // console.log(mat_id+" "+niv_id);
           $.ajax({  
                url:"editTarif.php",  
                method:"POST",  
                data:{mat_id:mat_id,
                      niv_id:niv_id},  
                dataType:"json",  
                success:function(data){  
                     $('#mat').val(data.libellé_mat);  
                     $('#niv').val(data.libellé_niv);  
                     $('#prix_ind').val(data.prix_etd_ind);  
                     $('#prix_grp').val(data.prix_etd_grp);  
                     $('#charge_ind').val(data.salaire_ind);  
                     $('#charge_grp').val(data.salaire_grp);  
                     $('#tarif_id').val(data.id_mat+"&"+data.id_niveau);  
                     $('#insert_3').val("Update");  
                     $('#add_data_Modal_3').modal('show');  
                     $('#dataTable3').DataTable().destroy();
                     fetch_data3();
                    // console.log(data.libellé_niv);
                }  
           });  
      });  

      $('#insert_form_3').on("submit", function(event){  
           event.preventDefault();  

                $.ajax({  
                     url:"ajouterTarif.php",  
                     method:"POST",  
                     data:$('#insert_form_3').serialize(),  
                     beforeSend:function(){  
                          $('#insert_3').val("Création..");  
                     },  
                     success:function(data){  
                          $('#insert_form_3')[0].reset();  
                          $('#add_data_Modal_3').modal('hide'); 
                          $('#dataTable3').DataTable().destroy();
                          fetch_data3();
                          // console.log("gggg");
                          // $('#employee_table').html(data);  
                     }  
                });  
       
      });  

      var clicked;

      $(document).on('click', '.delete_Btn_3', function(event){   
      
          clicked=event.target;

          if(event.target.getAttribute("name") == 'icon'){
            // clicked = $(clicked).parent(".outerHTML");
            
            clicked=event.target.parentNode;
            // console.log(clicked);
          }

          // document.getElementById("deletebtn").setAttribute("onclick","deleted()");
          
      });
      


      $(document).on('click', '#deletebtn', function(event){ 
         var id=clicked.getAttribute("id");
     //     document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
      //  console.log(id);
         $.ajax({
          url:"ajouterTarif.php",
          method:"POST",
          data:{id:id},
          success:function(data){
          // $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
          
          // $('#confirmer').modal('hide'); 
          $('#dataTable3').DataTable().destroy();
          fetch_data3();
          // console.log("gggg");
          
          }
     });

      });  


 });
</script>
