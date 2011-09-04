<?php
define('FORUM_ROOT', 'forum/');
require 'forum/include/common.php';
require 'inc/config.php';
require 'inc/functions.php';

// On commence par vérifier que l'user est bien un trusted fool ou admin !
if($forum_user['group_id'] != 1 AND $forum_user['group_id'] != 5){
	header("location: index.php");
}

// On vérifie ensuite qu'il a bien renseigné le formulaire !
if(!isset($_POST['category']) OR $_POST['category'] == ''){
	header("location: error.php?k=post");
}

// Tout est bon dans le cochon, on traite la demande !
$category = $_POST['category'];

if(strlen($category) > 25){
	$category = substr($category, 0, 24);
}
connect_to_db();
$category = safe($category);


$query = mysql_query(" INSERT INTO pix_cat (title, owner) VALUES ('".$category."', '".$forum_user['id']."') ");
if(!$query){
	header("location: error.php?k=query");
}

mysql_close();

// Tout s'est bien passé on redirige !
header('location: pix.php');

?>