<?php include("../module-sms/sms-php.php") ?>
<?php 
$connect = mysqli_connect("localhost", "root", "", "cours_soutien");
    mysqli_set_charset($connect,"utf8");
/// envoyer l sms ecrit dans new-txt
if( isset($_POST['valider']))
{
	/// save new-txt in message and get id_message if(id_modele) set it
	////

	if(isset($_POST['new-txt'])){
		if(isset($_GET["id"]))
		$qu="INSERT INTO message(id_modele,msg_contenu) values (".$_GET['id'].",'".$_POST['new-txt']."')" ;
		else
			$qu="INSERT INTO message(msg_contenu) values ('".$_POST['new-txt']."')" ;
		$res=mysqli_query($connect,$qu);
		$der = mysqli_insert_id($connect);

		if(isset($_POST['prof']))
	foreach ($_POST['prof'] as $key) {
		 /// come from modele 
		$query="INSERT INTO envoye2(id,id_msg) values (".$key.",".$der.")" ;
		$resu=mysqli_query($connect,$query);
	}
	if(isset($_POST['app']))
	foreach ($_POST['app'] as $key) {
		//envoyer_sms_basique($_GET['id'],$key,'app'); /// envoyer le text a chaque id app
		/// enregistrer dans envoye
		
		/*$der = mysqli_insert_id($connect);*/
		$query="INSERT INTO envoye1(id_app,id_msg) values (".$key.",".$der.")" ;
		$resu=mysqli_query($connect,$query);
	}
	if(isset($_POST['cours']))
	foreach ($_POST['cours'] as $key) {
		//envoyer_sms_basique($_GET['id'],$key,'cours'); /// envoyer le text a chaque id app in this grp
		/// enregistrer dans envoye
		$qu="SELECT * from suit where id_cours = ".$key ;
		$res=mysqli_query($connect,$qu);
		$res=mysqli_fetch_all($res, MYSQLI_ASSOC);
		
		//print_r($res);
		for ($i=0; $i <sizeof($res) ; $i++) { 
		 	# code...
		$query="INSERT INTO envoye1(id_app,id_msg) values (".$res[$i]["id_app"].",".$der.")" ;
		$resu=mysqli_query($connect,$query);
		}
	}

//// fin if new-txt
}
	//else  /// il faut inserer le nv modele ::
}

?>