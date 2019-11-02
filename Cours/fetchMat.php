
<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");

    ///
    $columns = array('libellé_mat','id_mat','id_mat');

    //
    $query = 'SELECT *
    FROM matière ';

    // $query = 'SELECT * 
    // FROM cours
    // ';

    if(isset($_POST["search"]["value"]))
    {
        ///
    $query .= '
    WHERE libellé_mat LIKE "%'.$_POST["search"]["value"].'%" 
    ';
    }

    if(isset($_POST["order"]))
    {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
    }
    else
    {                   ///
    $query .= ' ORDER BY libellé_mat  ';
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

    $sub_array[] = '<div >' . $row["libellé_mat"] . '</div>';


    $sub_array[] = '<button type="submit"  id_mat = "'.$row["id_mat"].'"  class="btn btn-outline-primary edit_data_1 "> <i class="fas fa-fw fa-edit"></i> </button>';

    $sub_array[] = '<button name="bouton" type="submit" data-toggle = "modal"  data-target="#confirmer" id="'.$row["id_mat"].'"  class="btn btn-outline-danger delete_Btn_1"> <i  name="icon" class="fas fa-fw fa-trash-alt   id="'.$row["id_mat"].'"></i> </button>';
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
    $query = 'SELECT *
    FROM matière ';

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
