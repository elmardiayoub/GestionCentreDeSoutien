<?php ob_start(); include("include/header.php");?>

<?php 
      $path = explode("/",$_SERVER['PHP_SELF']) ;
      setcookie("current", $path[3], time() + (86400 * 30), "/");
     //  echo $_SERVER['PHP_SELF'];
?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Liste des cours</li>
        </ol>

        <!-- Page Content -->

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i> Tableau des cours</div>
          <div class="card-body">
            <div class="table-responsive">
                     <div align="right">  
                          <button type="button" vname="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning ">Ajouter un cours individuel</button>  
                     </div>  
                     <br />
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>Identifiant</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Nom du Prof</th>
                    <th>Prénom du Prof</th>
                    <th>Type</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>Identifiant</th>
                    <th>Matière</th>
                    <th>Niveau</th>
                    <th>Nom du Prof</th>
                    <th>Prénom du Prof</th>
                    <th>Type</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </tfoot>
                <tbody id="tableauCours">
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
        <div class="modal-body">Vous voulez vraiment supprimer ce cours ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <!-- S'il click sur cette button il doit supprimer toute la ligne -->
          <button id="deletebtn" class="btn btn-danger" data-dismiss="modal"  >Supprimer</button>
        </div>
      </div>
    </div>
  </div>





   <script src="ScriptCours.js"></script>

<?php include("include/footer.php"); ?>        

<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Ajouter un cours</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" >  

                          <?php  
                              $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
                              mysqli_set_charset($conn,"utf8");  
                              $query = "SELECT id,Nom,Prénom from professeur";  
                              $result = mysqli_query($conn, $query);  
                          ?>  
                          <label>Sélectioner un professeur</label>  
                          <select name="prof" id="prof0" class="form-control">  
                          <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                          ?> 
                               <option value="<?php echo $row["id"]?>"><?php echo $row["Nom"]." ".$row["Prénom"] ; ?></option>  
                          <?php  
                          }  
                          ?> 
                          </select>  
                          <br />  




                          <input type="hidden" name="cour_id" id="cour_id0" />
                          <?php  
                              $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
                              mysqli_set_charset($conn,"utf8");  
                              $query = "SELECT id_mat,libellé_mat from matière";  
                              $result = mysqli_query($conn, $query);  
                          ?>  
                          <label>Sélectioner une matière</label>  
                          <select name="mat" id="mat0" class="form-control">  
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
                          <select name="niv" id="niv0" class="form-control">  
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

                          <div id="hor0">
                          
                          
                          
                          </div>


                          <input type="submit" name="insert" id="insert0" value="insert" class="btn btn-success" />  
                          <!-- <button type="button" id="add_hor" onclick="addHor(this)" class="btn btn-primary">Ajouter un horaire</button>   -->
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 





<div id="add_data_Modal2" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Modifier le cours</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form2" >  

                          <?php  
                              $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
                              mysqli_set_charset($conn,"utf8");  
                              $query = "SELECT id,Nom,Prénom from professeur";  
                              $result = mysqli_query($conn, $query);  
                          ?>  
                          <label>Sélectioner un professeur</label>  
                          <select name="prof" id="prof" class="form-control">  
                          <?php  
                            while($row = mysqli_fetch_array($result))  
                            {  
                          ?> 
                               <option value="<?php echo $row["id"]?>"><?php echo $row["Nom"]." ".$row["Prénom"] ; ?></option>  
                          <?php  
                          }  
                          ?> 
                          </select>  
                          <br />  


                          <input type="hidden" name="cour_id" id="cour_id" />
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
               
                         <br>

                          <div id="hor">
                          
                          
                          
                          </div>


  




                          <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />  
                          <button type="button" id="add_hor2" onclick="addHor(this)" class="btn btn-primary">Ajouter un horaire</button>  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 


 <!-- <script type="text/javascript" language="javascript" >  


     // $(document).ready(function(){ 
     //  $('#add').click(function(){  
     //       $('#insert').val("insert");  
     //       $('#insert_form')[0].reset();  
     // });  

     // fetch_data();

     // function fetch_data()
     // {
     // var dataTable = $('#dataTable').DataTable({
     // "processing" : true,
     // "serverSide" : true,
     // "order" : [],
     // "ajax" : {
     // url:"fetchCours.php",
     // type:"POST",

     // }
     // });
     // }


     //  $(document).on('click', '.edit_data', function(){  
     //       var cour_id = $(this).attr("id_cours");  
     //       console.log(cour_id);
     //       $.ajax({  
     //            url:"editCours.php",  
     //            method:"POST",  
     //            data:{cour_id:cour_id},  
     //            dataType:"json",  
     //            success:function(data){  
     //                 $('#prof').val(data.id);  
     //                 $('#type').val(data.type);  
     //                 $('#mat').val(data.id_mat);  
     //                 $('#niv').val(data.id_niveau);  
     //                 $('#cour_id').val(data.id_cours);  
     //                 $('#insert').val("Update");  
     //                 $('#add_data_Modal').modal('show');  
     //                 fetch_data();
     //                // console.log(data.id_cours);
     //            }  
     //       });  
     //  });  


     //  $('#insert_form').on("submit", function(event){  
     //       event.preventDefault();  

     //            $.ajax({  
     //                 url:"ajouterCours.php",  
     //                 method:"POST",  
     //                 data:$('#insert_form').serialize(),  
     //                 beforeSend:function(){  
     //                      $('#insert').val("Création..");  
     //                 },  
     //                 success:function(data){  
     //                      $('#insert_form')[0].reset();  
     //                      $('#add_data_Modal').modal('hide'); 
     //                     //  console.log(data);
     //                      fetch_data();
     //                      // $('#employee_table').html(data);  
     //                 }  
     //            });  
       
     //  });  



      // $(document).on('click', '.view_data', function(){  
      //      var employee_id = $(this).attr("id");  
      //      if(employee_id != '')  
      //      {  
      //           $.ajax({  
      //                url:"select.php",  
      //                method:"POST",  
      //                data:{employee_id:employee_id},  
      //                success:function(data){  
      //                     $('#employee_detail').html(data);  
      //                     $('#dataModal').modal('show');  
      //                }  
      //           });  
      //      }            
      // });  
     // });  

  </script>
  -->
 <script type="text/javascript" language="javascript" >
 $(document).ready(function(){

     $('#add').click(function(){  
      $("#hor0").empty();
           $('#insert').val("insert");  
           $('#insert_form')[0].reset();  
     });  
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#dataTable').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchCours.php",
     type:"POST",

    }
   });
  }
  



  $(document).on('click', '.edit_data', function(){  
           var cour_id = $(this).attr("id_cours");  
           if($(this).attr("x") === "ind")
            $("#add_hor2").attr({style : "display : none"}); 
           else 
                $("#add_hor2").attr({style : "display : true"}); 

          //  console.log($(this).attr("x"));
           $.ajax({  
                url:"editCours.php",  
                method:"POST",  
                data:{cour_id:cour_id},  
                dataType:"json",  
                success:function(data){  
                     $('#prof').val(data.id);  
                    //  $('#type').val(data.type); 
                     
                     $('#mat').val(data.id_mat);  
                     $('#niv').val(data.id_niveau);  
                     $('#cour_id').val(data.id_cours);
                    // console.log(data.nbr);
                    nbr = data.nbr;

                    var id = cour_id;

                    $("#hor").empty();

                    $.ajax({  
                          url:"editCours.php",  
                          method:"POST",  
                          data:{id:id},  
                          dataType:"json",  
                          success:function(data){
                            console.log(data);
                            for (let i = 0; i < nbr; i++) {

                              
                              $("#hor").append($('<br>'));

                              $("#hor").append($('<label></label>').text("Sélectionner un jours "));
                              $('#hor').append($('<select></select>').attr({name : "jour[]", id : "jour"+i}).addClass("form-control"));
                              
                              $("#jour"+i).html("<option value='1' >Lundi</option><option value='2'>Mardi</option><option value='3'>Mercredi</option><option value='4'>Jeudi</option><option value='5'>Vendredi</option><option value='6'>Samedi</option><option value='7'>Dimanche</option>");

                              $("#jour"+i).val(data[i].id_jours);
                              $("#hor").append($('<br>'));

                              $("#hor").append($('<label></label>').text("Sélectionner un horaire "));

                              
                              var début = data[i].début.split(":");

                              $("#hor").append($('<input>').attr({type : "time", name : "début[]", id : "début", value : début[0]+":"+début[1]}).addClass("form-control"));
                              
                              var fin = data[i].fin.split(":");

                              $("#hor").append($('<input>').attr({type : "time", name : "fin[]", id : "fin", value : fin[0]+":"+fin[1]}).addClass("form-control"));
                              $("#hor").append($('<br>'));


                            }

                          }

                        }); 


                     $('#insert').val("Update");  
                     $('#add_data_Modal2').modal('show');  
                     $('#dataTable').DataTable().destroy();
                     fetch_data();
                    // console.log(data);
                }  
           });  
      });  



      // $(document).on('click', '.edit_data', function(){  



      // });

      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  

                $.ajax({  
                     url:"ajouterCours.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert0').val("Création..");  
                     },  
                     success:function(data){  
                     
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide'); 
                          $('#dataTable').DataTable().destroy();
                          fetch_data();
                          // console.log(data);
                          // $('#employee_table').html(data);  
                     }  
                });  
       
      });  


      $('#insert_form2').on("submit", function(event){  
           event.preventDefault();  

                $.ajax({  
                     url:"ajouterCours.php",  
                     method:"POST",  
                     data:$('#insert_form2').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Création..");  
                     },  
                     success:function(data){  
                          $('#insert_form2')[0].reset();  
                          $('#add_data_Modal2').modal('hide'); 
                          $('#dataTable').DataTable().destroy();
                          fetch_data();
                          // console.log(data);
                          // $('#employee_table').html(data);  
                     }  
                });  
       
      });  



      var clicked;

      $(document).on('click', '.delete_Btn', function(event){   
      
          clicked=event.target;
          // console.log(clicked);
          // document.getElementById("deletebtn").setAttribute("onclick","deleted()");

          if(event.target.getAttribute("name") == 'icon'){
            // clicked = $(clicked).parent(".outerHTML");
            
            clicked=event.target.parentNode;
            // console.log(clicked);
          }

          
      });
      


      $(document).on('click', '#deletebtn', function(event){ 
         var id=clicked.getAttribute("id");
     //     document.getElementById("deletebtn").setAttribute("data-dismiss","modal");
     console.log(id);
         $.ajax({
          url:"CoursData.php",
          method:"GET",
          data:{id:id},
          error:function(data){
          // $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
          
          // $('#confirmer').modal('hide'); 
          $('#dataTable').DataTable().destroy();
          fetch_data();
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

 });
</script>