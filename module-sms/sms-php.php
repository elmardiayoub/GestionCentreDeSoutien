<?php
function envoyer_sms_first($last,$name,$tel)
{
			$t=time();
           $listr=date("Y-m-d",$t);	
	require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('3d602dbe', 'IbNvFqgewgL1M08F');
$client = new \Nexmo\Client($basic);
$content ='Bonjour '.$last.' '.$name.' !
    Vous etiez absent dans la séance d\'aujourd\'hui '.$listr.' .
    Prière de nous contacter le plutôt possible
    
    ';
////////////////////////////////
    $tel=substr($tel, 1);
    ///////////////
/*$message = $client->message()->send([
    'to' => '212'.$tel,
    'from' => 'CENTER TEAMFIRST',
    'text' => $content
]);*/
		return $content;
}

function envoyer_sms_fired($last,$name,$tel)
{
/* $t=time();
           $listr=date("Y-m-d",$t);*/ 
    require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('3d602dbe', 'IbNvFqgewgL1M08F');
$client = new \Nexmo\Client($basic);
$content ='Bonjour '.$last.' '.$name.' !
    Comme indiqué au cours de notre entretien, nous avons décidé de procéder à votre licenciement. 
Cette décision a été prise pour la raison suivante : Vous etiez absent pendant plusque 3 séances sans aucune justification. 
    ';
////////////////////////////////
    $tel=substr($tel, 1);
    ///////////////
/*$message = $client->message()->send([
    'to' => '212'.$tel,
    'from' => 'CENTER TEAMFIRST',
    'text' => $content
]);*/
        return $content;       
}

//////////////////////////
function envoyer_sms_app($last,$name,$tel,$cours,$prof)
{
     require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('3d602dbe', 'IbNvFqgewgL1M08F');
$client = new \Nexmo\Client($basic);
$content ='Bonjour '.$last.' '.$name.' ! Nous sommes très désolés , votre séance du cours de '.$cours.' est annulé à cause d\'une absence inattendue de votre professeur : '.$prof;
////////////////////////////////
    $tel=substr($tel, 1);
    ///////////////
/*$message = $client->message()->send([
    'to' => '212'.$tel,
    'from' => 'CENTER TEAMFIRST',
    'text' => $content
]);*/
        return $content;     
}
function envoyer_sms_new($nom,$num,$text){
  require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('3d602dbe', 'IbNvFqgewgL1M08F');
$client = new \Nexmo\Client($basic);
////////////////////////////////
    $num=substr($num, 1);
    ///////////////
$message = $client->message()->send([
    'to' => '212'.$num,
    'from' => 'CENTER TEAMFIRST',
    'text' => $text.'
    '.' '.'envoyé à : '.$nom
]);
       // print_r($client->message()->send(['text']) );     
}
function envoyer_sms_basique($id_modele,$text,$id_x,$table)
{
    /*if(isset($id_modele))
    {
        /// inserer le nv msg dans la bdd avec id mod
        $query=
    }*/
}
function envoyer_sms_avertissement($last,$name,$tel)
{
require_once "vendor/autoload.php";
$basic  = new \Nexmo\Client\Credentials\Basic('3d602dbe', 'IbNvFqgewgL1M08F');
$client = new \Nexmo\Client($basic);
$nom = $last." ".$name ;
////////////////////////////////
    $num=substr($tel, 1);
    /////////////
    $text="Bonjour ! Merci de payer les frais de votre cours dans le plutot possible  ";
// $message = $client->message()->send([
//     'to' => '212'.$num,
//     'from' => 'CENTER TEAMFIRST',
//     'text' => $text.'
//     '.' '.'envoyé à : '.$nom
// ]);
       // print_r($client->message()->send(['text']) );     
}

?>
