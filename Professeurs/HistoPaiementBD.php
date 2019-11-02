<?php
   session_start();
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");
   
   
   $id = $_SESSION['id'];

   // Create Query
   $query = "SELECT DISTINCT facture.id_facture,facture.date from facture,paiement
             WHERE facture.id_facture=paiement.id_facture and id='$id'";


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