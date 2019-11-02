<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");

   // Create Query
   /// les sms envoyés aux appr ::
   /// le sms soit il est ecrit manuellement soit il est un modele 
   /// il faut verifier par la suite les champs retournés par modele_contenu et msg_contenu
   /// avec modele ::
  $query = 'SELECT * FROM modele,mylogins where modele.par=mylogins.id_user and archive=0' ;
  

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