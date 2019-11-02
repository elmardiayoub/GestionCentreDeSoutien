<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   $query = 'SELECT id_app,Nom,Prénom from apprenant where Archive=0 and id_app not in ( SELECT DISTINCT(apprenant.id_app) from apprenant,suit where (suit.id_cours,apprenant.id_app) in (SELECT suit.id_cours,suit.id_app from apprenant,suit WHERE suit.id_app=apprenant.id_app and suit.Nbr_seance<=0 ))';


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