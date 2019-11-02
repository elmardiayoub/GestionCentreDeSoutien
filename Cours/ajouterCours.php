<?php
  //  header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

  

   if(!empty($_POST))  
   {  
    
   $prof = mysqli_real_escape_string($conn, $_POST['prof']);
//    $type = mysqli_real_escape_string($conn, $_POST['type']);
   $mat = mysqli_real_escape_string($conn, $_POST['mat']);
   $niv = mysqli_real_escape_string($conn, $_POST['niv']);

   $jours = [];
   foreach ($_POST['jour'] as $jour) {
     array_push($jours,  $jour);
   }

   $débuts = [];
   foreach ($_POST['début'] as $début) {
     array_push($débuts,  $début);
   }

   $fins = [];
   foreach ($_POST['fin'] as $fin) {
     array_push($fins,  $fin);
   }


//    $query = "SELECT * FROM horaire WHERE début ='$débuts[0]' AND fin ='$fins[0]'";

//    if(mysqli_query($conn, $query) == false){
//      $query = "INSERT INTO horaire(début,fin) values ('$débuts[0]','$fins[0]')";

//      $result = mysqli_query($conn, $query);

//    } 


     // $query = "INSERT INTO horaire(début,fin) values ('$débuts[0]','$fins[0]')";

     // $result = mysqli_query($conn, $query);

//    for ($i=0; $i < sizeof($_POST['début']); $i++) { 
//         echo $_POST['début'][$i]." ".$_POST['fin'][$i];
//    }
//    $hors = [];
//    foreach ($_POST['hor'] as $hor) {
//      array_push($hors, $hor);
//    }

//    print_r( $jours);

   if($_POST["cour_id"] != '')  {


     // $query = "SELECT type,id_groupe FROM cours WHERE id_cours = '".$_POST["cour_id"]."'";

     // $result = mysqli_query($conn, $query);

     // $resp = mysqli_fetch_assoc($result);

     // $type_old =$resp['type'];
     // $id_groupe =$resp['id_groupe'];

     // if($type != $type_old){
          

     //      if($type == "ind"){

     //           $query = "UPDATE cours   
     //                     SET id= $prof,   
     //                     id_mat=$mat,   
     //                     id_niveau=$niv,   
     //                     id_groupe = NULL,   
     //                     type = '$type'   
     //                     WHERE id_cours='".$_POST["cour_id"]."'";  
    
     //           $result = mysqli_query($conn, $query);      
               
     //           $query = "DELETE   
     //                     FROM groupe      
     //                     WHERE id_groupe= '$id_groupe' ";  
    
     //           $result = mysqli_query($conn, $query);        

               
     //      } else {

               
     //           // Create Query
     //           $query = "INSERT INTO groupe(nbr) values (0)";
     //           // Get Result
     //           $result = mysqli_query($conn, $query);


     //           $query = "SELECT max(id_groupe) FROM groupe";

     //           $result = mysqli_query($conn, $query);

     //           $resp = mysqli_fetch_assoc($result);

     //           $groupe =$resp['max(id_groupe)'];

     //           $query = "  
     //                UPDATE cours   
     //                SET id= $prof,   
     //                id_mat=$mat,   
     //                id_niveau=$niv,   
     //                id_groupe = $groupe,   
     //                type = '$type'   
     //                WHERE id_cours='".$_POST["cour_id"]."'";  

     //           $result = mysqli_query($conn, $query);      

     //      }
     // } 
     
     // else {

          $query = "  
          UPDATE cours   
          SET id= $prof,   
          id_mat=$mat,   
          id_niveau=$niv 
          WHERE id_cours='".$_POST["cour_id"]."'";  

          $result = mysqli_query($conn, $query);      


          $query = "DELETE from programmé   
          WHERE id_cours= ".$_POST["cour_id"];  

          $result = mysqli_query($conn, $query);     
           
          $cours = $_POST["cour_id"];
          
          for ($i=0; $i < sizeOf($jours) ; $i++) { 


               $query = "SELECT * FROM horaire WHERE début ='$débuts[$i]' AND fin ='$fins[$i]'";
               $result = mysqli_query($conn, $query);
               $resp = mysqli_fetch_assoc($result);
               
               if(empty($resp)){
               

               $query = "INSERT INTO horaire(début,fin) values ('$débuts[$i]','$fins[$i]')";
                    
               $result = mysqli_query($conn, $query);


               $query = "SELECT max(id_horaire) FROM horaire";
     
               $result = mysqli_query($conn, $query);
     
               $resp = mysqli_fetch_assoc($result);
     
               $hor =$resp['max(id_horaire)'];


               $query = "INSERT INTO programmé(id_cours,id_jours,id_horaire) values($cours,$jours[$i],$hor)";
            

               $result = mysqli_query($conn, $query);


               } else {


                    // echo "ggggggggggg";
                    $query = "SELECT * FROM horaire WHERE début ='$débuts[$i]' AND fin ='$fins[$i]'";

                    $result = mysqli_query($conn, $query);
                    $resp = mysqli_fetch_assoc($result);
                    
                    
                    // if($result == "null")
                    //      echo "emptyyyy";
                    // else 
                    //      echo "not empty";     
                    $id_hor =$resp['id_horaire'];


                    
                    $query = "INSERT INTO programmé(id_cours,id_jours,id_horaire) values($cours,$jours[$i],$id_hor)";
                    echo  $query;

                    $result = mysqli_query($conn, $query);
               }
               // $query = "INSERT INTO programmé(id_cours,id_jours,id_horaire) values ($cours,$jours[$i],$hors[$i])";
         
               // $result = mysqli_query($conn, $query);


          //      echo $jours[$i];
          }


     // }

     
   }else {

     
     //   echo "indddd";
           // Create Query
          $query = "INSERT INTO cours(id,id_mat,id_niveau,type) values ($prof,$mat,$niv,'ind')";
          // Get Result
          $result = mysqli_query($conn, $query);
  
     
  

   }

   

  //  echo $prof." ".$type." ".$mat." ".$niv." ".$groupe;


   }
  

   ?>