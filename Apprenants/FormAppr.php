<?php
//    header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

   $nom = mysqli_real_escape_string($conn, $_GET['nom']);
   $prénom = mysqli_real_escape_string($conn, $_GET['prénom']);
   $CIN = mysqli_real_escape_string($conn, $_GET['CIN']);
   $numero = mysqli_real_escape_string($conn, $_GET['numero']);
   $mail = mysqli_real_escape_string($conn, $_GET['mail']);
   $datee = mysqli_real_escape_string($conn, $_GET['date']);
   $niveau = mysqli_real_escape_string($conn, $_GET['niveau']);
   $imagee = mysqli_real_escape_string($conn, $_GET['image']);
   
   $query = "INSERT INTO apprenant(Nom,Prénom,CIN,Num_tel,email,date_naissance,niveau,Imaage) 
                            values ('$nom','$prénom','$CIN','$numero','$mail','$datee',
                            '$niveau','$imagee')";
    
   // Get Result
   $result = mysqli_query($conn, $query);
    echo $date;
   // Close Connection
   mysqli_close($conn);
?>