<?php

$conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
mysqli_set_charset($conn,"utf8");

if(isset($_POST["cour_id"]))  
{  
     $query = "SELECT cours.id_cours, id, id_mat, id_niveau, count(*) as nbr
               FROM cours, programmé
               WHERE cours.id_cours = programmé.id_cours and cours.id_cours = '".$_POST["cour_id"]."'";  
     $result = mysqli_query($conn, $query);  
     $row = mysqli_fetch_assoc($result);  
     echo json_encode($row);  
} else if(isset($_POST["id"])) {

     $query = "SELECT * from programmé,horaire where programmé.id_horaire = horaire.id_horaire and id_cours =".$_POST["id"]."";  
     $result = mysqli_query($conn, $query);  

     $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
     echo json_encode($row);  
}


?>