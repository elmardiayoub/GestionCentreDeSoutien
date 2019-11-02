<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");
    /// la date d'aujourd'hui :
    @$d=date("N",strtotime("now"));
            $t=time();
           $listr=date("Y-m-d",$t);
    ///
    $columns = array('id_cours', 'matière.libellé_mat','niveau.libellé_niv','horaire.début','horaire.fin',
        'professeur.Nom','professeur.Prénom','id_cours');

    
    $query = 'SELECT cours.id_cours, matière.libellé_mat,niveau.libellé_niv,horaire.début,horaire.fin,horaire.id_horaire,professeur.id,
        professeur.Nom,professeur.Prénom FROM cours,professeur,matière,niveau,horaire , programmé
             WHERE programmé.id_cours = cours.id_cours
             AND programmé.id_jours = '.$d.'
             AND horaire.id_horaire = programmé.id_horaire
            AND cours.id=professeur.id
            AND cours.id_niveau = niveau.id_niveau
            AND cours.id_mat = matière.id_mat
            AND cours.id_cours not IN
            (
                SELECT  distinct id_cours from séance WHERE  DATE(séance.date) = current_date
            )
            ';

    // $query = 'SELECT * 
    // FROM cours
    // ';

    if(isset($_POST["search"]["value"]))
    {
        ///
    $query .= '
    AND (
    cours.id_cours LIKE "%'.$_POST["search"]["value"].'%" 
    OR libellé_mat LIKE "%'.$_POST["search"]["value"].'%" 
    OR libellé_niv LIKE "%'.$_POST["search"]["value"].'%"
    OR début LIKE "%'.$_POST["search"]["value"].'%"
    OR fin LIKE "%'.$_POST["search"]["value"].'%"
    OR Nom LIKE "%'.$_POST["search"]["value"].'%"
    OR Prénom LIKE "%'.$_POST["search"]["value"].'%"
   )
    ';
    }

    if(isset($_POST["order"]))
    {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
    }
    else
    {                   ///
    $query .= ' ORDER BY cours.id_cours  ';
    }

    $query1 = '';

    if($_POST["length"] != -1)
    {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    
    // if(mysqli_query($connect, $query) == true)
    // { 
          $result = mysqli_query($connect, $query);
//            $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     // echo "gggg";
//        print_r($post);
// }

    $number_filter_row = mysqli_num_rows($result);

    $result = mysqli_query($connect, $query . $query1);

    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        
    $sub_array = array();
    ///
    $sub_array[] = '<div >' . $row["id_cours"] . '</div>';
    $sub_array[] = '<div >' . $row["libellé_mat"] . '</div>';
    $sub_array[] = '<div >' . $row["libellé_niv"] . '</div>';
    $sub_array[] = '<div >' . $row["début"] . '</div>';
    $sub_array[] = '<div >' . $row["fin"] . '</div>';
    $sub_array[] = '<div >' . $row["Nom"] . '</div>';
    $sub_array[] = '<div >' . $row["Prénom"] . '</div>';

     $sub_array[] = '<button type="submit" data-toggle = "modal"  data-target="#confirmer" id="'
          .$row["id_cours"].
          '" onclick=\'window.location.href = "absence-grp.php?id_cours='
          .$row["id_cours"].
          '&id_horaire='
          .$row["id_horaire"].'&id='
          .$row["id"].
          ' "\' class="btn btn-outline-dark"> <i class="fas fa-bars"></i> </button>';
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
        @$d=date("N",strtotime("now"));
        $t=time();
       $listr=date("Y-m-d",$t);
    $query = 'SELECT cours.id_cours, matière.libellé_mat,niveau.libellé_niv,horaire.début,horaire.fin,horaire.id_horaire,professeur.id,
    professeur.Nom,professeur.Prénom FROM cours,professeur,matière,niveau,horaire , programmé
         WHERE programmé.id_cours = cours.id_cours
         AND programmé.id_jours = '.$d.'
         AND horaire.id_horaire = programmé.id_horaire
        AND cours.id=professeur.id
        AND cours.id_niveau = niveau.id_niveau
        AND cours.id_mat = matière.id_mat
        AND cours.id_cours not IN
        (
            SELECT  distinct id_cours from séance WHERE  DATE(séance.date) = current_date
        )
            ';

    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
    }

    $output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
    );

    echo json_encode($output);

?>
