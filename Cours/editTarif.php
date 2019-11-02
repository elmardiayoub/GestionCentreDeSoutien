<?php

$conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
mysqli_set_charset($conn,"utf8");

if(isset($_POST["mat_id"]) && isset($_POST["niv_id"]))  
{  

     $query = "SELECT tarification.id_mat as id_mat,tarification.id_niveau as id_niveau,libellé_mat,libellé_niv,prix_etd_ind,prix_etd_grp,salaire_ind,salaire_grp
    FROM tarification,matière,niveau
    WHERE tarification.id_mat = matière.id_mat AND tarification.id_niveau = niveau.id_niveau AND
    tarification.id_niveau = '".$_POST["niv_id"]."' AND tarification.id_mat = '".$_POST["mat_id"]."'";  
     $result = mysqli_query($conn, $query);  
     $row = mysqli_fetch_assoc($result);  
     echo json_encode($row);  
}  
?>