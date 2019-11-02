<?php
  //  header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'Cours_soutien');
   mysqli_set_charset($conn,"utf8");

  

   if(!empty($_POST))  
   {  
        

        if($_POST['tarif_id'] != ''){

            $tarif_id = explode("&",$_POST['tarif_id']);

            // echo $tarif_id[0]." ".$tarif_id[1];
            $mat = mysqli_real_escape_string($conn, $tarif_id[0]);
            $niv = mysqli_real_escape_string($conn, $tarif_id[1]);
            if(isset($_POST['prix_ind']))
                $prix_ind = mysqli_real_escape_string($conn, $_POST['prix_ind']);
            else
                $prix_ind=NULL;

            if(isset($_POST['prix_grp']))
                $prix_grp = mysqli_real_escape_string($conn, $_POST['prix_grp']);
            else
                $prix_grp=NULL;

            if(isset($_POST['charge_ind']))    
                 $charge_ind = mysqli_real_escape_string($conn, $_POST['charge_ind']);
            else
                $charge_ind =NULL;
               
            if(isset($_POST['charge_ind']))      
                $charge_grp = mysqli_real_escape_string($conn, $_POST['charge_grp']);
            else
                 $charge_grp =  NULL;



            $query = "UPDATE tarification
                      SET id_mat = $mat,
                      id_niveau = $niv,
                      prix_etd_grp = '$prix_grp',
                      prix_etd_ind = '$prix_ind',
                      salaire_ind = '$charge_ind',
                      salaire_grp = '$charge_grp'
                      WHERE id_mat = ".$mat." AND id_niveau = ".$niv;


            // Get Result
            $result = mysqli_query($conn, $query);
            
            

        } else if(isset($_POST['id'])){

            $id = explode("&",$_POST['id']);
            $mat = mysqli_real_escape_string($conn, $id[0]);
            $niv = mysqli_real_escape_string($conn, $id[1]);

            $query = "DELETE FROM tarification WHERE id_niveau = ".$niv." AND id_mat = ".$mat;

            // Get Result
            $result = mysqli_query($conn, $query);
            
        }
        else {



            $mat = mysqli_real_escape_string($conn, $_POST['mat']);
            $niv = mysqli_real_escape_string($conn, $_POST['niv']);
            if(isset($_POST['prix_ind']))
                $prix_ind = mysqli_real_escape_string($conn, $_POST['prix_ind']);
            else
                $prix_ind=NULL;

            if(isset($_POST['prix_grp']))
                $prix_grp = mysqli_real_escape_string($conn, $_POST['prix_grp']);
            else
                $prix_grp=NULL;

            if(isset($_POST['charge_ind']))    
                 $charge_ind = mysqli_real_escape_string($conn, $_POST['charge_ind']);
            else
                $charge_ind =NULL;
               
            if(isset($_POST['charge_ind']))      
                $charge_grp = mysqli_real_escape_string($conn, $_POST['charge_grp']);
            else
                 $charge_grp =  NULL;


            echo $mat."  ".$niv."          ";
            $query = "INSERT INTO tarification(id_mat,id_niveau,prix_etd_grp,prix_etd_ind,salaire_ind,salaire_grp ) values ($mat,$niv,'$prix_grp','$prix_ind','$charge_ind','$charge_grp')";

            echo $query;
            // Get Result
            $result = mysqli_query($conn, $query);
            
           
        }



   }




   ?>