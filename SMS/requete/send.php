<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");
   @$nom = $_GET['nom'];
   @$num = $_GET['num'];
   // Create Query
   /// rechercher parmis les profs non supprimés
   if(isset($nom)){

            $query = "SELECT Nom,Prénom FROM `professeur`
             WHERE (Nom LIKE '%$nom%' OR  Prénom LIKE '%$nom%') AND Archive=0 ";
             $result = mysqli_query($conn, $query);

             if(empty($result))
             {
                $query = "SELECT Nom,Prénom FROM `apprenant`
               WHERE (Nom LIKE '%$nom%' OR Prénom LIKE '%$nom%') AND Archive=0 ";
               $result = mysqli_query($conn, $query);
             }
}
      if(isset($num))// Get Result
      {
         $query = "SELECT Num_tel FROM `apprenant`
             WHERE Num_tel LIKE '%$num%' AND Archive=0 ";
             $result = mysqli_query($conn, $query);

             if(empty($result))
             {
                $query = "SELECT Numtele FROM `professeur`
               WHERE Numtele LIKE '%$num%' AND Archive=0 ";
               $result = mysqli_query($conn, $query);
             }

}

   // Fetch Data
if(isset($result)){
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //var_dump($posts);
   echo json_encode($post);
}
   // Free Result
 //  mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>