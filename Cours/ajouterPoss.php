<?php
  //  header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

  

   if(!empty($_POST))  
   {  
        
        // print_r($_POST); 
        if(isset($_POST['id_poss'])){

            if($_POST['id_poss'] != ''){
                $nbr_dem = mysqli_real_escape_string($conn, $_POST['nbr_dem']);
                $appr = mysqli_real_escape_string($conn, $_POST['appr']);
    
                $ids = explode("&",$_POST["id_poss"]) ;  
                $id_mat = mysqli_real_escape_string($conn, $ids[0]);
                $id_niveau = mysqli_real_escape_string($conn, $ids[1]);
                $id = mysqli_real_escape_string($conn, $ids[2]);
    
    
                $query = "SELECT type from cours_possibles where id_mat= ".$id_mat." and id_niveau= ".$id_niveau." and id= ".$id."";
                // Get Result
                
                $result = mysqli_query($conn, $query);
    
                $resp = mysqli_fetch_assoc($result);
    
                echo $nbr_dem;
                if($resp['type'] == "en groupe" || $resp['type'] == "les deux")
                    $type ="grp";
                else
                    $type ="ind";  
    
    
    
                if($nbr_dem == 2){
                    // Create Query
                    $query = "INSERT INTO groupe(nbr) values (0)";
                    // Get Result
                    $result = mysqli_query($conn, $query);
            
            
                    $query = "SELECT max(id_groupe) FROM groupe";
            
                    $result = mysqli_query($conn, $query);
            
                    $resp = mysqli_fetch_assoc($result);
            
                    $groupe =$resp['max(id_groupe)'];
    
                    // Create Query
                    $query = "INSERT INTO cours(id,id_mat,id_niveau,id_groupe,type,Archive) values ($id,$id_mat,$id_niveau,$groupe,'$type',2)";
                    // Get Result
    
                    echo $query;
                    $result = mysqli_query($conn, $query);
                }
    
    
    
                    $query = "UPDATE cours_possibles
                    SET   nbr_dem = $nbr_dem ,
                          id_app = $appr 
                    WHERE id_mat= ".$id_mat." and id_niveau= ".$id_niveau." and id= ".$id."";
    
    
                    echo   $query;
                    // Get Result
                    $result = mysqli_query($conn, $query);
    
            }
            
        } else if(isset($_POST['id'])){

            if($_POST['id'] != ''){
                $ids = explode("&",$_POST["id"]) ;  
                $id_mat = mysqli_real_escape_string($conn, $ids[0]);
                $id_niveau = mysqli_real_escape_string($conn, $ids[1]);
                $id = mysqli_real_escape_string($conn, $ids[2]);
    
                $query = 'DELETE from cours_possibles where id_mat ='.$id_mat.' AND id_niveau='.$id_niveau.' AND id='.$id;
    
                // echo $query;
                $result = mysqli_query($conn, $query);
            }

        } 
        
        
        
        else {

            $prof = mysqli_real_escape_string($conn, $_POST['prof']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $mat = mysqli_real_escape_string($conn, $_POST['mat']);
            $niv = mysqli_real_escape_string($conn, $_POST['niv']);

            echo $type;
            switch ($type) {
                case 'grp':
                    $type='en groupe';
                    break;
                case 'ind':
                    $type='individuel';
                    break;
                case 'deux':
                    $type='les deux'; 
                    break;
            }


            $query = 'SELECT * FROM cours_possibles WHERE id ='.$prof.' and id_mat = '.$mat.' and id_niveau = '.$niv;

            $result = mysqli_query($conn, $query);

            $resp = mysqli_fetch_assoc($result);
            
            if(empty($resp)){
                $query = "INSERT INTO cours_possibles(id_mat, id_niveau, id, type) values ($mat, $niv, $prof, '$type')";
                // Get Result
                $result = mysqli_query($conn, $query);
                
            }else {
               

                $query = 'UPDATE  cours_possibles
                          SET  type ="'.$type.'" 
                          WHERE id ='.$prof.' and id_mat = '.$mat.' and id_niveau = '.$niv;

                          echo $query;
                $result = mysqli_query($conn, $query);


        
            }




           



            



        }
        //  else if(isset($_POST['id'])){

        //     $query = "DELETE FROM niveau WHERE id_niveau = ".$_POST['id'];

        //     // Get Result
        //     $result = mysqli_query($conn, $query);
            
        // }
        // else {

        //     $niv = mysqli_real_escape_string($conn, $_POST['niv']);
        //     $query = "INSERT INTO niveau(libellé_niv) values ('$niv')";
        //     // Get Result
        //     $result = mysqli_query($conn, $query);
            
           
        // }



   }




   ?>