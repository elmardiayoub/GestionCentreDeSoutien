<?php include("../module-sms/sms-php.php"); ?>
<?php

   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");


   $query = 'SELECT DISTINCT(apprenant.id_app),Nom,Prénom,Num_tel from apprenant,suit where  Archive=0 and (suit.id_cours,apprenant.id_app) in (SELECT suit.id_cours,suit.id_app from apprenant,suit WHERE suit.id_app=apprenant.id_app and suit.Nbr_seance<=0 )';

   
   // Get Result
   $result = mysqli_query($conn, $query);
   
   // Fetch Data
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
   for($i=0;$i<sizeof($post);$i++)
   {
      envoyer_sms_avertissement($post[$i]["Nom"],$post[$i]["Prénom"],$post[$i]["Num_tel"]);
   }

   //var_dump($posts);
   echo json_encode($post);
   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>