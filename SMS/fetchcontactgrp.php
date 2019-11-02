<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");
    /// la date d'aujourd'hui :

    ///
    $columns = array('id_cours', 'Nom','Prénom','libellé_mat','libellé_niv');

    
    $query = 'SELECT * from cours,professeur, matière , niveau 
        where professeur.id=cours.id
        and cours.id_mat=matière.id_mat
        and cours.id_niveau=niveau.id_niveau
 
        ';

    // $query = 'SELECT * 
    // FROM cours
    // ';

   /* if(isset($_POST["search"]["value"]))
    {
        ///
    $query .= '
    AND (
    id_app LIKE "%'.$_POST["search"]["value"].'%" 
    OR Nom LIKE "%'.$_POST["search"]["value"].'%"
    OR Prénom LIKE "%'.$_POST["search"]["value"].'%"
    OR Num_tel LIKE "%'.$_POST["search"]["value"].'%"
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
    $query .= ' ORDER BY id_app ';
    }

    $query1 = '';

    if($_POST["length"] != -1)
    {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    */
  /*   if(mysqli_query($connect, $query)==true)
    { 
       */   $result = mysqli_query($connect, $query);
    // $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
 /*echo "gggg";
*/       //print_r($post);
 // }

    $number_filter_row = mysqli_num_rows($result);

    $result = mysqli_query($connect, $query );

    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        
    $sub_array = array();
    ///
    $sub_array[] = '<input type="checkbox" name="cours[]" value='.$row["id_cours"].' >';
    $sub_array[] = '<div >' . $row["id_cours"] . '</div>';
    $sub_array[] = '<div >' . $row["Nom"] . '</div>';
    $sub_array[] = '<div >' . $row["Prénom"] . '</div>';
    // $sub_array[] = '<div >' . $row["début"] . '</div>';
    // $sub_array[] = '<div >' . $row["fin"] . '</div>';
    $sub_array[] = '<div >' . $row["libellé_mat"] . '</div>';
    $sub_array[] = '<div >' . $row["libellé_niv"] . '</div>';
  

     
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
    $query = 'SELECT  * from cours,professeur, matière , niveau , horaire ,programmé
        where professeur.id=cours.id
        and cours.id_mat=matière.id_mat
        and cours.id_niveau=niveau.id_niveau
        and cours.id_cours = programmé.id_cours
        and programmé.id_horaire = horaire.id_horaire';

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
