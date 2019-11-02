<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
     
   $id = mysqli_real_escape_string($conn, $_GET['id']);

   
   $query ='UPDATE `modele` SET `archive` = 1  WHERE `id_modele` ='.$id.'';

   // Get Result
   $result = mysqli_query($conn, $query);

   // Fetch Data
//    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);


   // Free Result
//    mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>