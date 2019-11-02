<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");

   // Create Query
   /// les sms envoyés aux appr ::
   /// le sms soit il est ecrit manuellement soit il est un modele 
   /// il faut verifier par la suite les champs retournés par modele_contenu et msg_contenu
   /// avec modele ::
  $query = 'SELECT distinct * FROM message,modele,apprenant,envoye1 
  		WHERE
  		  modele.id_modele=message.id_modele 
  		 AND apprenant.id_app = envoye1.id_app 
  		 AND envoye1.id_msg = message.id_msg 
  		 AND message.archive = 0 
  		 '; /// les jointures ;)
   //	$query = 'SELECT Num_tel FROM apprenant ;';
  

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