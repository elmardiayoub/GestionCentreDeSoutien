
<?php
   session_start();
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

   $id = $_SESSION['id'];
   
   // Create Query
   $query = "SELECT cours.id_cours,libellé_mat,libellé_niv,type,cours.NbrHeureEnseingé from cours,matière,niveau WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id='$id' ";


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

   // $myArray = $_POST['ArrayJson'];
?>