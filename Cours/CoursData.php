<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");


   if(isset($_GET['id'])){

      // echo $_GET['id'];
      $id = $_GET['id'];
      $query =" UPDATE `cours` SET `Archive` = 1  WHERE `id_cours` ='$id'";
      // Get Result
      $result = mysqli_query($conn, $query);
      // echo $result;
   } else if(isset($_GET['archive']) ) {

      if($_GET['archive'] == "0")
      {  
         // Create Query
         $query = 'SELECT id_cours, matière.libellé_mat,niveau.libellé_niv,type,professeur.Nom, professeur.Prénom
         FROM cours,matière,niveau,professeur 
         WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 0';

         // Get Result
         $result = mysqli_query($conn, $query);
      }  else if ($_GET['archive'] == "1") 
      {
         // Create Query
         $query = 'SELECT id_cours, matière.libellé_mat,niveau.libellé_niv,type,professeur.Nom, professeur.Prénom
         FROM cours,matière,niveau,professeur 
         WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 1';
   
         // Get Result
         $result = mysqli_query($conn, $query);

      }

   }else if (isset($_GET['retourner'])){

      $id = $_GET['retourner'];
      $query =" UPDATE `cours` SET `Archive` = 0  WHERE `id_cours` ='$id'";
      $result = mysqli_query($conn, $query);
   }
   else if (isset($_GET['jours'])){

      $query ="SELECT * FROM jour_de_la_semaine";
      $result = mysqli_query($conn, $query);
   }
   else if (isset($_GET['hor'])){

      $query ="SELECT * FROM horaire";
      $result = mysqli_query($conn, $query);
   }

   // Fetch Data
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //var_dump($posts);
   echo json_encode($post);
   // Free Result
   // mysqli_free_result($result);

   // // Close Connection
   // mysqli_close($conn);
?>