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
   // Create Query
   if($imagee != "")
   $query = "INSERT INTO professeur(Nom,Prénom,CIN,Numtele,email,date_naissance,spécialité,Imaage) 
                            values ('$nom','$prénom','$CIN','$numero','$mail','$datee','$niveau','$imagee')";
    else 
    $query = "INSERT INTO professeur(Nom,Prénom,CIN,Numtele,email,date_naissance,spécialité) 
                            values ('$nom','$prénom','$CIN','$numero','$mail','$datee','$niveau')";


   // Get Result
   $result = mysqli_query($conn, $query);

   // Fetch Data
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

   
   // Free Result
   mysqli_free_result($result);

   // Close Connection
   mysqli_close($conn);
?>