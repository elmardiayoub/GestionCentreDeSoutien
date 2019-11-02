<?php
  //  header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

  

   if(!empty($_POST))  
   {  
        

        if($_POST['niv_id'] != ''){

            $niv = mysqli_real_escape_string($conn, $_POST['niv']);
            $query = "UPDATE niveau
                      SET   libellé_niv = '$niv'
                      WHERE id_niveau = ".$_POST['niv_id'];

            // Get Result
            $result = mysqli_query($conn, $query);
            
            

        } else if(isset($_POST['id'])){

            $query = "DELETE FROM niveau WHERE id_niveau = ".$_POST['id'];

            // Get Result
            $result = mysqli_query($conn, $query);
            
        }
        else {

            $niv = mysqli_real_escape_string($conn, $_POST['niv']);
            $query = "INSERT INTO niveau(libellé_niv) values ('$niv')";
            // Get Result
            $result = mysqli_query($conn, $query);
            
           
        }



   }




   ?>