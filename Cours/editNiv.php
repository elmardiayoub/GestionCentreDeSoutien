<?php

$conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
mysqli_set_charset($conn,"utf8");

if(isset($_POST["niv_id"]))  
{  
     $query = "SELECT * FROM niveau WHERE id_niveau = '".$_POST["niv_id"]."'";  
     $result = mysqli_query($conn, $query);  
     $row = mysqli_fetch_assoc($result);  
     echo json_encode($row);  
}  
?>