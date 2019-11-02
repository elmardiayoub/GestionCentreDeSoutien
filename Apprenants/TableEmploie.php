<?php
    session_start();
    header("Content-Type: application/json; charset=UTF-8");
    $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
    mysqli_set_charset($conn,"utf8");


    $id=$_SESSION['id_app'];
    $query ="SELECT * FROM `suit`,`programmé`,`horaire`,`matière`,`niveau`,`cours`
    WHERE cours.id_cours=programmé.id_cours AND programmé.id_horaire = horaire.id_horaire
    AND matière.id_mat=cours.id_mat AND niveau.id_niveau=cours.id_niveau AND suit.id_cours=cours.id_cours
    AND cours.type='grp' AND`id_app`='$id'";

    $result = mysqli_query($conn, $query);
    $post1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($post1);

    mysqli_free_result($result);

    mysqli_close($conn);
?>