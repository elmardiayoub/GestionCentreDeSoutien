
<?php
   session_start();
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

   $id = $_SESSION['id_app'];
   
   // Create Query
   $query = "SELECT prix_etd_grp,prix_etd_ind,cours.id_cours,libellé_mat,libellé_niv,type,Nbr_seance from cours,matière,niveau,suit,tarification WHERE cours.id_mat=matière.id_mat AND suit.id_cours=cours.id_cours AND tarification.id_niveau=niveau.id_niveau AND tarification.id_mat=matière.id_mat
   AND cours.id_niveau=niveau.id_niveau AND suit.id_app='$id'";


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