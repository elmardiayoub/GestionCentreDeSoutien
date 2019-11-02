<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");



  if($_GET['id_req'] == 1){

    $id_cours = mysqli_real_escape_string($conn, $_GET['id_cours']);
    //Create Query
    $query = "SELECT * FROM apprenant WHERE id_app not in (SELECT id_app FROM suit WHERE    id_cours='$id_cours') ";
    // Get Result
    $result=mysqli_query($conn, $query);
    // Fetch Data
    $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  elseif($_GET['id_req'] == 2){

    $id_cours = mysqli_real_escape_string($conn, $_GET['id_cours']);
    $id_appr = mysqli_real_escape_string($conn, $_GET['id_appr']);

    $query = "SELECT type FROM cours WHERE id_cours='$id_cours'";
    $result=mysqli_query($conn, $query);
    $resp = mysqli_fetch_assoc($result);
    $post = ['isPossible' => 'false', 'type' => $resp['type'] ];

    if($resp['type'] == 'grp'){
        
        $query = "SELECT count(*) FROM suit WHERE id_cours='$id_cours'";
        $result=mysqli_query($conn, $query);
        $resp = mysqli_fetch_assoc($result);

        if($resp['count(*)'] < 9)
            $post['isPossible']='true';



    }
     elseif ($resp['type'] == 'ind'){

        $query = "SELECT count(*) FROM suit WHERE id_cours='$id_cours'";
        $result=mysqli_query($conn, $query);
        $resp = mysqli_fetch_assoc($result);

        if($resp['count(*)'] == 0)
            $post['isPossible']='true';
    }

  }elseif($_GET['id_req'] == 3){

        $id_cours = mysqli_real_escape_string($conn, $_GET['id_cours']);
        $id_appr = mysqli_real_escape_string($conn, $_GET['id_appr']);

        // Create Query
        $query = "INSERT INTO suit(id_cours,id_app) values ('$id_cours','$id_appr')";
        // Get Result
        $result = mysqli_query($conn, $query);
  }
  elseif ($_GET['id_req'] == 4){

        $id_cours = mysqli_real_escape_string($conn, $_GET['id_cours']);
        //Create Query
        $query = "SELECT * FROM apprenant WHERE id_app in (SELECT id_app FROM suit WHERE    id_cours='$id_cours') ";
        // Get Result
        $result=mysqli_query($conn, $query);
        // Fetch Data
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  elseif ($_GET['id_req'] == 5){

        $id_cours = mysqli_real_escape_string($conn, $_GET['id_cours']);
        $id_appr = mysqli_real_escape_string($conn, $_GET['id_appr']);
        //Create Query
        $query = "DELETE  FROM suit WHERE id_app = $id_appr AND id_cours = $id_cours";
        // Get Result
        $result=mysqli_query($conn, $query);
        // Fetch Data
        $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }






//    //var_dump($posts);
   echo json_encode($post);
//    // Free Result
//    mysqli_free_result($result);  

//    // Close Connection
//    mysqli_close($conn);
?>