<?php
//    header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

   $nom = mysqli_real_escape_string($conn, $_GET['nom']);
   $prénom = mysqli_real_escape_string($conn, $_GET['prénom']);
   $numero = mysqli_real_escape_string($conn, $_GET['numero']);
   $mail = mysqli_real_escape_string($conn, $_GET['mail']);
   $niveau = mysqli_real_escape_string($conn, $_GET['niveau']);
   
   $query = "INSERT INTO apprenant(Nom,Prénom,Num_tel,email,niveau,Archive) 
                            values ('$nom','$prénom','$numero','$mail','$niveau',2)";
    
   $result = mysqli_query($conn, $query);

   mysqli_close($conn);
?>