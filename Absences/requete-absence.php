<?php include '../module-sms/sms-php.php'; ?>
<?php
 // header("Content-Type: application/json; charset=UTF-8");
    $conn = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($conn,"utf8");
    @$d=date("N",strtotime("now"));
    @$horaire = $_GET['id_horaire'];
    @$cours = $_GET['id_cours'];
    @$prof = $_GET['id'];
     @$d=date("N",strtotime("now"));
         /* $t=time();
           $listr=date("Y-m-d h:i:s",$t);*/
     $query = 'SELECT cours.id_cours, matière.libellé_mat,niveau.libellé_niv
              ,horaire.début,horaire.fin,horaire.id_horaire,professeur.id,
               professeur.Nom,professeur.Prénom , professeur.Numtele
            FROM cours,professeur,matière,niveau,horaire, programmé
            WHERE programmé.id_cours = cours.id_cours
            AND programmé.id_jours = '.$d.'
            AND horaire.id_horaire = '.$horaire.'
            AND professeur.id = '.$prof.'
            AND cours.id_cours = '.$cours.'
            AND horaire.id_horaire = programmé.id_horaire
            AND cours.id=professeur.id
            AND cours.id_niveau = niveau.id_niveau
            AND cours.id_mat = matière.id_mat ' ;

            $result = mysqli_query($conn, $query);
            
            $post = mysqli_fetch_assoc($result);

          // savoir les cases cochées :: lors du submit
if(isset($_POST['save-absence']))
{
                
        if(isset($_POST['mon_prof'])) /// prof absent ::
        {
                     if(isset($_POST["radio"]))
                {
                    /// ajouter le prof dans l absence ::

                    /// inserer id du prof dans table seance ;;
                if($_POST['radio']=="oui"){
                    @$query="INSERT INTO séance(id,date,id_cours,justifié) 
                            values ($prof,current_time,$cours,1)" ;
                            $result1 = mysqli_query($conn, $query);
                           // print_r($result1);
                            $der=mysqli_insert_id($conn);

                }
                elseif ($_POST['radio']=="non") {
                     @$query="INSERT INTO séance(id,date,id_cours,justifié) 
                            values ($prof,current_time,$cours,0)" ;
                            $result1 = mysqli_query($conn, $query);
                            $der=mysqli_insert_id($conn);
                           // print_r($result1);
           ////////////////
           /*check if this one has lot of absences then we might send an alert*/ 
           $query_ab="SELECT count(*) as nbre from  séance
                        WHERE id = $prof and justifié = 0 " ;
                            $result = mysqli_query($conn, $query_ab);
                            $result_ab=mysqli_fetch_assoc($result);
   if(intval($result_ab['nbre']) <= 3){                
                            /////////////////*********************
             $rep=envoyer_sms_first($post['Nom'],$post['Prénom'],$post['Numtele']); 
         }
    elseif(intval($result_ab['nbre']) == 4) {
            $rep=envoyer_sms_fired($post['Nom'],$post['Prénom'],$post['Numtele']); 
          /*  $query='UPDATE `professeur` SET `Archive`= 1  WHERE id= '.$prof ;
            $res=mysqli_query($conn,$query); /// le prof est supprimé*/
                }
             /// envoyer un sms à ce mr.
             if(isset($rep))
             {
                /*echo $rep ;*/
                /// inserer le message dans la bdd ::
                    $query1='INSERT INTO message(date,msg_contenu,id_modele,archive) 
                            values (current_time,"'.$rep.'",NULL,0)';
                            $result1 = mysqli_query($conn, $query1);
                            //echo "insert into ::::".print_r($result1);

                            ////////////////////////
                            $query2='SELECT max(id_msg) as m from message' ;
                            $result2 = mysqli_query($conn, $query2);
                            $ps = mysqli_fetch_assoc($result2);

                           // print_r($ps);
                            ///////////////////////
                            $query3='INSERT INTO envoye2(id,id_msg) 
                            values ($prof, '.$ps['m'].')' ;
                            $result3 = mysqli_query($conn, $query3);


             }

                /// tjrs dans non justifié ::
                    /// il faut envoyer un sms d'excuse aux apprenants ::
                $query=' SELECT Nom,Prénom,Num_tel from apprenant where id_app IN (
                SELECT id_app from suit where id_cours ='.$cours.')
                AND Archive = 0 ';
                $result = mysqli_query($conn, $query);
                //$ps2 = mysqli_fetch_array($result);
                //print_r($ps2);
                while($key = mysqli_fetch_array($result)){
                   $cont=envoyer_sms_app($key['Nom'],$key['Prénom']
                    ,$key['Num_tel'],
                    $post['libellé_mat'].' '.$post['libellé_niv'],
                    $post['Nom'].' '.$post['Prénom']);
                   echo "$cont "."<br>" ;

                }
                

                }
                /// creer l instance de la séance ::
                          /// 
            
                }

        }
        else 
        {
                /// prof pas absent :: alors on peut maintenant mentionner 
            // l absence des etudiants ::
             $query="INSERT INTO séance(id,date,id_cours,justifié) 
                            values (NULL,current_time,$cours,0)" ;
            
            $result2 = mysqli_query($conn, $query);

            $der=mysqli_insert_id($conn);

            /*print_r($result2);*/
           // $row = mysqli_fetch_assoc($result2);

                if(isset($_POST['mine'])){
                            //// il faut d'abord savoir le id_séance pour inserer l'app
                    /// dans absenter()
                    /// c est la derniere seance enregistrée
                   
                foreach ($_POST['mine'] as $key) {
                   
                  /*  $savoir="SELECT max(id_séance) FROM séance ";
                     $result_savoir = mysqli_query($conn, $savoir);
                    $i = mysqli_fetch_assoc($result_savoir);*/
                    // print_r($i);
          //          echo $der;
                $query_new = '
                INSERT INTO absenter(id_app,id_séance) 
                values ( '.$key.' , '.$der.' ) ' ;

                 $result = mysqli_query($conn,$query_new);
                 /*print_r($result);*/

                }
            }

            $query = "UPDATE cours SET NbrHeureEnseingé = NbrHeureEnseingé + 1 where id_cours =".$cours ;
            $result = mysqli_query($conn,$query);

            $query = "UPDATE suit SET Nbr_seance = Nbr_seance - 1 where id_cours =".$cours ;
            $result = mysqli_query($conn,$query);
        }
        header("location:page-validation.php?id_séance=".$der);
}
    
?>
