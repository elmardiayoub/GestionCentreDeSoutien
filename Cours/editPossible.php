<?php

$conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
mysqli_set_charset($conn,"utf8");

if(isset($_POST["cour_id"]))  
{  

     $ids = explode("&",$_POST["cour_id"]) ;  
    //  print_r($ids);

     $query = "SELECT * FROM cours_possibles WHERE id_mat = ".$ids[0]." and id_niveau= ".$ids[1]." and id = ".$ids[2].""; 
    //   echo $query;
     $result = mysqli_query($conn, $query);  
     $row = mysqli_fetch_assoc($result);  
     echo json_encode($row);  
}  
?>