<?php
    header("Content-Type: application/json; charset=UTF-8");
    $connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");
    @$d=date("N",strtotime("now"));

     $id_cours=$_POST['id_cours'];
     $id_horaire=$_POST['id_horaire'];
     $id=$_POST['id'];
    // echo $_POST['id_cours'];
    // echo $_POST['id_horaire'];
    // echo $_POST['id'];
    /*///
    @$horaire = $_GET['id_horaire'];
    @$cours = $_GET['id_cours'];
    @$prof = $_GET['id'];*/
/*echo "$horaire";
echo $cours;
echo "$prof";*/
/// maintenant on sait le cours et l horaire :: il faut afficher
    /// les app de ce grp et leur prof
    ////
    $columns = array('apprenant.id_app','apprenant.CIN', 'apprenant.Nom','apprenant.Prénom');

    
    $query = 'SELECT apprenant.id_app,apprenant.CIN, apprenant.Nom,apprenant.Prénom FROM apprenant,suit,cours,programmé WHERE programmé.id_cours = cours.id_cours and cours.id_cours = '.$id_cours.' AND programmé.id_jours = '.$d.' AND programmé.id_horaire = '.$id_horaire.' AND cours.id= '.$id.' AND suit.id_cours= cours.id_cours AND suit.id_app = apprenant.id_app   
            ';

              // echo $query;
    // $query = 'SELECT * 
    // FROM cours
    // ';

    if(isset($_POST["search"]["value"]))
    {
        
    $query .= 'AND 
    (apprenant.id_app LIKE "%'.$_POST["search"]["value"].'%" 
    OR CIN LIKE "%'.$_POST["search"]["value"].'%" 
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
    $query .= ' ORDER BY id_app  ';
    }

    $query1 = '';

    if($_POST["length"] != -1)
    {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    
    
    //  if(mysqli_query($connect, $query) == false)
    // { 
          $result = mysqli_query($connect, $query);

           // $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
   // echo "gggg".$result."uuuuuuuuu";
       // print_r($post);
// }
//     print_r($result);
    $number_filter_row = mysqli_num_rows($result);

    $result = mysqli_query($connect, $query.$query1);

    $data = array();

    while($row = mysqli_fetch_array($result))
    {
        
    $sub_array = array();
    ///
    //$sub_array[] = '<div >' . $row["id_app"] . '</div>';
    $sub_array[] = '<div >' . $row["CIN"] . '</div>';
    $sub_array[] = '<div >' . $row["Nom"] . '</div>';
    $sub_array[] = '<div >' . $row["Prénom"] . '</div>';

     $sub_array[] = '<input type="checkbox" name="mine[]" value="'.$row['id_app'].'" >';
    $data[] = $sub_array;
    }

    function get_all_data($connect)
    {
       /* @$horaire = $_GET['id_horaire'];
         @$cours = $_GET['id_cours'];
         @$prof = $_GET['id'];*/


     $id_cours=$_POST['id_cours'];
     $id_horaire=$_POST['id_horaire'];
     $id=$_POST['id'];
     @$d=date("N",strtotime("now"));
     // echo $id_cours." ".$id_horaire." ".$id;

    $query = 'SELECT apprenant.id_app,apprenant.CIN, apprenant.Nom,apprenant.Prénom FROM apprenant,suit,cours,programmé WHERE programmé.id_cours = cours.id_cours and cours.id_cours = '.$id_cours.' AND programmé.id_jours = '.$d.' AND programmé.id_horaire = '.$id_horaire.' AND cours.id= '.$id.' AND suit.id_cours= cours.id_cours AND suit.id_app = apprenant.id_app ';

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
