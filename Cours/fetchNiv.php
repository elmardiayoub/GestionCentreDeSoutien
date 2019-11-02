
<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");

    ///
    $columns = array('libellé_niv','id_niveau','id_niveau');

    //
    $query = 'SELECT *
    FROM niveau ';

    // $query = 'SELECT * 
    // FROM cours
    // ';

    if(isset($_POST["search"]["value"]))
    {
        ///
    $query .= '
    WHERE libellé_niv LIKE "%'.$_POST["search"]["value"].'%" 
    ';
    }

    if(isset($_POST["order"]))
    {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
    }
    else
    {                   ///
    $query .= ' ORDER BY libellé_niv  ';
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
    // echo "rrrrrrrrrrrrr";
    //    print_r($post);
// }

    $number_filter_row = mysqli_num_rows($result);

    $result = mysqli_query($connect, $query . $query1);

    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        
    $sub_array = array();
    ///

    $sub_array[] = '<div >' . $row["libellé_niv"] . '</div>';


    $sub_array[] = '<button type="submit"  id_niveau = "'.$row["id_niveau"].'"  class="btn btn-outline-primary edit_data_2 "> <i class="fas fa-fw fa-edit"></i> </button>';

    $sub_array[] = '<button name="bouton" type="submit" data-toggle = "modal"  data-target="#confirmer" id="'.$row["id_niveau"].'"  class="btn btn-outline-danger delete_Btn_2"> <i  name="icon" class="fas fa-fw fa-trash-alt   id="'.$row["id_niveau"].'"></i> </button>';
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
    $query = 'SELECT *
    FROM niveau ';

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
