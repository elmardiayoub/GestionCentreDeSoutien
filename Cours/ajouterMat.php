<?php
  //  header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

  

   if(!empty($_POST))  
   {  
        

        if($_POST['mat_id'] != ''){

            $mat = mysqli_real_escape_string($conn, $_POST['mat']);
            $query = "UPDATE matière
                      SET   libellé_mat = '$mat'
                      WHERE id_mat = ".$_POST['mat_id'];

            // Get Result
            $result = mysqli_query($conn, $query);

            echo 'gggggggg'.$result.'jjjjj';

        } else if($_POST['id'] != ''){

            $query = "DELETE FROM matière WHERE id_mat = ".$_POST['id'];

            // Get Result
            $result = mysqli_query($conn, $query);

        }
        else {

            $mat = mysqli_real_escape_string($conn, $_POST['mat']);
            $query = "INSERT INTO matière(libellé_mat) values ('$mat')";
            // Get Result
            $result = mysqli_query($conn, $query);
        }



   }




   ?>