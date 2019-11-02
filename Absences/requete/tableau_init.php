<?php
   header("Content-Type: application/json; charset=UTF-8");
   $conn = mysqli_connect('localhost','root', '', 'cours_soutien');
   mysqli_set_charset($conn,"utf8");
   @$q = $_GET['q'];
   @$app = $_GET['app'];
   @$grp = $_GET['grp'];
   @$prof = $_GET['prof'];
   @$d=date("N",strtotime("now"));
 //  @$date= urldecode($_GET['date']);
   // Create Query
   /// rechercher parmis les profs non supprimés
   if($q==1){

            $query = "SELECT Nom,Prénom,id FROM `professeur`
                       WHERE  Archive=0 ";
            
}
      else if($q==2)// Get Result
      {
         $query = "SELECT Nom,Prénom,id_app FROM `apprenant`
             WHERE Archive=0 ";
             

}
  else if($q==3)// Get Result
      {
         $query = "SELECT id_groupe FROM `groupe` WHERE nbr>0 ; ";
            

}

if(isset($grp))
{
   // Fetch Data
  $query = "SELECT * FROM apprenant WHERE id_app IN(
            SELECT id_app FROM cours,suit 
            WHERE cours.id_cours = suit.id_cours 
            and id_groupe = $grp
            and suit.id_cours IN 
            ( SELECT id_cours FROM programmé 
              WHERE id_jour = $d
             ))" ;
             /*echo 'grpest ='.$grp;
             echo 'jour est '.$d;*/

}

elseif (isset($prof)) {
  /// envoyer tout les cours de ce prof assurés pour aujourd'hui
  $query=   "
            SELECT * FROM cours,matière,niveau
            WHERE id = $prof
            and type = 'grp'
            and id_cours IN 
            ( SELECT id_cours FROM programmé 
              WHERE id_jour = $d
             )
             and cours.id_niveau=niveau.id_niveau 
             and cours.id_mat=matière.id_mat
          ";
  # code...
}

elseif (isset($app)) {
  # code...
   $query=  "
            SELECT * FROM cours,professeur,matière,niveau
            WHERE id_cours IN
            (
              SELECT id_cours FROM suit 
              WHERE id_app = $app ---trouver les cours de ce $app--
              and id_cours IN
              (
                SELECT id_cours FROM programmé WHERE
                id_jour = $d
              )
            )
            and cours.id=professeur.id
            and matière.id_mat = cours.id_mat
            and cours.id_niveau = niveau.id_niveau
          ";
}



   $result = mysqli_query($conn, $query);
if(isset($result))
   $post = mysqli_fetch_all($result, MYSQLI_ASSOC);

   //var_dump($posts);
   echo json_encode($post);
   // Free Result
 //  mysqli_free_result($result);
   // Close Connection
   mysqli_close($conn);
?>