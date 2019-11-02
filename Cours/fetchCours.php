
<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");

    ///
    $columns = array('id_cours', 'matière.libellé_mat','niveau.libellé_niv','professeur.Nom','professeur.Prénom','type','id_cours','id_cours');

    //
    $query = 'SELECT id_cours, matière.libellé_mat,niveau.libellé_niv,professeur.Nom, professeur.Prénom,type
    FROM cours,matière,niveau,professeur 
    WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 0';

    // $query = 'SELECT * 
    // FROM cours
    // ';

    if(isset($_POST["search"]["value"]))
    {
        ///
    $query .= '
    AND (id_cours LIKE "%'.$_POST["search"]["value"].'%" 
    OR libellé_mat LIKE "%'.$_POST["search"]["value"].'%" 
    OR libellé_niv LIKE "%'.$_POST["search"]["value"].'%"
    OR Nom LIKE "%'.$_POST["search"]["value"].'%"
    OR Prénom LIKE "%'.$_POST["search"]["value"].'%"
    OR type LIKE "%'.$_POST["search"]["value"].'%")
    ';
    }

    if(isset($_POST["order"]))
    {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
    }
    else
    {                   ///
    $query .= ' ORDER BY id_cours  ';
    }

    $query1 = '';

    if($_POST["length"] != -1)
    {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    $result = mysqli_query($connect, $query);
    // if(mysqli_query($connect, $query) == true)
    // { 
        //    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // echo $result;
    //    print_r($post);
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
    $sub_array[] = '<div >' . $row["Nom"] . '</div>';
    $sub_array[] = '<div >' . $row["Prénom"] . '</div>';
    if($row["type"] == "grp")
        $sub_array[] = '<button type="submit"  onclick=\'window.location.href = "/Plateforme - copie/Cours/cours_Ind.php?type=grp&id_cours='.$row["id_cours"].'";\' class="btn btn-outline-success "> <i class="fas fa-fw fa-users"></i> </button>';
    else if($row["type"] == "ind")
    $sub_array[] = '<button type="submit"  onclick=\'window.location.href = "/Plateforme - copie/Cours/cours_Ind.php?type=ind&id_cours='.$row["id_cours"].'";\' class="btn btn-outline-success "> <i class="fas fa-fw fa-user"></i> </button>';


    $sub_array[] = '<button type="submit"  id_cours = "'.$row["id_cours"].'"  class="btn btn-outline-primary edit_data " x = "'.$row["type"].'"> <i class="fas fa-fw fa-edit"></i> </button>';

    $sub_array[] = '<button name="bouton"  type="submit" data-toggle = "modal"  data-target="#confirmer" id="'.$row["id_cours"].'"  class="btn btn-outline-danger delete_Btn"> <i name="icon" class="fas fa-fw fa-trash-alt  id="'.$row["id_cours"].'"></i> </button>';
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
    $query = 'SELECT id_cours, matière.libellé_mat,niveau.libellé_niv,professeur.Nom, professeur.Prénom,type
    FROM cours,matière,niveau,professeur 
    WHERE cours.id_mat=matière.id_mat AND cours.id_niveau=niveau.id_niveau AND cours.id=professeur.id AND cours.Archive = 0';

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
