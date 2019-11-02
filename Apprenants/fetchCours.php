
<?php
    header("Content-Type: application/json; charset=UTF-8");
    $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
    mysqli_set_charset($conn,"utf8");

    $query = 'SELECT prix_etd_grp,prix_etd_ind,cours.id_cours,count(suit.id_app) as NB,matière.libellé_mat,niveau.libellé_niv,professeur.Nom, professeur.Prénom,type FROM cours,matière,niveau,professeur,suit,tarification WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 0  AND cours.id_cours=suit.id_cours AND tarification.id_mat=matière.id_mat AND tarification.id_niveau=niveau.id_niveau GROUP BY cours.id_cours
    ';


    $query1 = 'SELECT prix_etd_grp,prix_etd_ind,cours.id_cours,matière.libellé_mat,niveau.libellé_niv,professeur.Nom, professeur.Prénom,type FROM cours,matière,niveau,professeur,tarification WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND (cours.Archive = 0 OR cours.Archive=2)  AND tarification.id_mat=matière.id_mat AND tarification.id_niveau=niveau.id_niveau AND id_cours not in (SELECT cours.id_cours FROM cours,matière,niveau,professeur,suit WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 0 AND cours.id_cours=suit.id_cours GROUP BY cours.id_cours)';
    


   
    $result = mysqli_query($conn, $query);
    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $result = mysqli_query($conn, $query1);
    $post1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($post1 as $value)
    {
        array_push($post,$value);
    }   
    // Fetch Data
    

    //var_dump($posts);
    echo json_encode($post);
    // Free Result
    mysqli_free_result($result);
 
    // Close Connection
    mysqli_close($conn);
?>
