<?php

$conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
mysqli_set_charset($conn,"utf8");

if(isset($_POST["mat_id"]))  
{  
     $query = "SELECT * FROM matière WHERE id_mat = '".$_POST["mat_id"]."'";  
     $result = mysqli_query($conn, $query);  
     $row = mysqli_fetch_assoc($result);  
     echo json_encode($row);  
}  
?>