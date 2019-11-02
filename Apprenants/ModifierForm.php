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
   $datee2 = mysqli_real_escape_string($conn, $_GET['dateinscrp']);
   $niveau = mysqli_real_escape_string($conn, $_GET['niveau']);
   $imagee = mysqli_real_escape_string($conn, $_GET['image']);
   

   $query = "UPDATE `apprenant` SET `Nom` = '$nom', `Prénom` = '$prénom', 
            `CIN` = '$CIN',`Num_tel` = '$numero',`email` = '$mail', `date_naissance` = '$datee',
            `date_d'inscription` = '$datee2',`niveau`= '$niveau', `Imaage` = '$imagee'
             WHERE id_app='$id'";




//    // Get Result
   $result = mysqli_query($conn, $query);

//    // Fetch Data
//     $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

