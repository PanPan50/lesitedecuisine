<?php

    // On utilise le système de gestion d'utilisateur de punbb
    define('FORUM_ROOT', 'forum/');
    define('FORUM_DISABLE_CSRF_CONFIRM', 0);
    require 'forum/include/common.php';
    require 'inc/config.php';
    require 'inc/functions.php';

    // Premièrement on va vérifier que le visiteur est bien loggé
    if(!isset($forum_user['id']) OR $forum_user['id'] < 2) {
        header("location: errors.php");
        exit();
    }

    // On vérifie ensuite que l'utilisteur a bien posté qqchose
    if(!isset($_POST['message']) OR $_POST['message'] == ''){
        header("location: errors.php");
        exit();
    }

    // Tout semble bon, on va maintenant traiter le message
    $message = trim($_POST['message']);

    $messagelength = strlen($message);

    // On vérifie que le message n'est juste pas du vide et est moins long que 200 caractères !
    if($messagelength == 0){
        header("location: errors.php");
        exit();
    }

    if($messagelength > 200){
        $message = substr($message, 0, 199);
    }

    // Ok tout roule, on envoie dans la BDD !
    connect_to_db();

	$namealacon = get_random_name();
	$messagealacon = array("J'aime la bite",
							"Je me suis fait enculer toute la nuit, j'ai le cul en vrac",
							"$namealacon, en ce moment j’parierais qu’tu t’imagines déjà qu’tu suces ma bite au rythme des coups de fouet d’mes couilles sur ta gueule",
							"Il fallait que je l'avoue, j'ai un micro-pénis...",
							"PanPan c'est vraiment le meileur",
							"Je suis gay",
							"Je me taperai bien $namealacon",
							"Le petit cul de $namealacon me rend dingue...",
							"Scoop : Sama trompe GW1 avec $namealacon, la vidéo est sur redtube !!",
							"$namealacon tu voudrais pas m'en faire une petite ?",
							"J'ai toujours rêvé de me taper ma mère !"
							);
	$random = array_rand($messagealacon, 1);
	if($message == "Shout !"){
		$message = $messagealacon[$random];
	}else{
		// On purifie le message pour que cet enculé de Kane nous fasse pas chier...
		$message = mysql_real_escape_string($message);
	}
    
    $ip = get_ip();
    $time = time();
    $insertshout = mysql_query("INSERT INTO ext_shouts
                                (sender, sender_id, sender_ip, message, shouted)
                                VALUES
                                ('".$forum_user['username']."', '".$forum_user['id']."', '".$ip."', '".$message."', '".$time."')
                               ");

    // Est- ce qu'il y a eu une erreur ?
    if(!$insertshout){
        header("location: errors.php");
    }

    // Non tout est bon ! On redirige vers la page précédente
    header("location: index.php");

    // Pour afficher les variables concernant le visiteur
    //echo '<pre>';
    //print_r($forum_user);
    //print_r($viewShouts);
    //echo '</pre>';
?>
