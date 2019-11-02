<?php
   session_start();
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");
   
   
   $id = $_SESSION['id_app'];

   // Create Query
   $query = "SELECT DISTINCT facture.id_facture,facture.date,facture.inscription from facture,facturation
             WHERE facture.id_facture=facturation.id_facture and id_app='$id'";


   // Get Result
   $result = mysqli_query($conn, $query);
   
   // Fetch Data
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
   //var_dump($posts);
   echo json_encode($post);
   // Free Result
//    $_SESSION['id_facture']=$post['id_facture'];
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);

   // $myArray = $_POST['ArrayJson'];
?>