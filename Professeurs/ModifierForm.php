<?php

   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

   $id = mysqli_real_escape_string($conn, $_GET['id']);
   $nom = mysqli_real_escape_string($conn, $_GET['nom']);
   $prénom = mysqli_real_escape_string($conn, $_GET['prénom']);
   $CIN = mysqli_real_escape_string($conn, $_GET['CIN']);
   $numero = mysqli_real_escape_string($conn, $_GET['numero']);
   $mail = mysqli_real_escape_string($conn, $_GET['mail']);
   $datee = mysqli_real_escape_string($conn, $_GET['date']);
   $niveau = mysqli_real_escape_string($conn, $_GET['niveau']);
   $imagee = mysqli_real_escape_string($conn, $_GET['image']);
   
   if($imagee)
   $query = "UPDATE `professeur` SET `Nom` = '$nom', `Prénom` = '$prénom', 
            `CIN` = '$CIN',`Numtele` = '$numero',`email` = '$mail', `date_naissance` = '$datee',
             `Spécialité`= '$niveau', `Imaage` = '$imagee' WHERE id='$id'";
   else
   $query = "UPDATE `professeur` SET `Nom` = '$nom', `Prénom` = '$prénom', 
            `CIN` = '$CIN',`Numtele` = '$numero',`email` = '$mail', `date_naissance` = '$datee',
             `Spécialité`= '$niveau' WHERE id='$id'";



//    // Get Result
   $result = mysqli_query($conn, $query);

//    // Fetch Data
//     $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

//    // Free Result
   mysqli_free_result($result);

//    // Close Connection
   mysqli_close($conn);
?>

