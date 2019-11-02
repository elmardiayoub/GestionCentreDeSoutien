<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   // Create Query
   $query = 'SELECT * FROM `apprenant` WHERE Archive=2';


   // Get Result
   $result = mysqli_query($conn, $query);

   // Fetch Data
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //var_dump($posts);
   echo json_encode($post);
   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>