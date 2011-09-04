<?php
session_start();
// On utilise le système de gestion d'utilisateur de punbb
define('FORUM_ROOT', 'forum/');
require FORUM_ROOT.'include/common.php';
require FORUM_ROOT.'include/parser.php';
$usergid = $forum_user['group_id'];
require 'inc/config.php';
require 'inc/functions.php';
$searchshout = $config['baseurl'].'tribunesearch.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/panpan.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/jquery.lightbox-0.5.css" />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/panpan.js"></script>
		<script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
		<script type="text/javascript" src="js/jquery.dropdownPlain.js"></script>
	</head>
	<body>
		<div id="header">
			<ul class="dropdown">
				<li><a href="index.php" alt="Home">Home</a></li>
				<?php
				if($forum_user['group_id'] == 1 OR $forum_user['group_id'] == 5){
					?>
						<li>
							<a href="pix.php" alt="Pix">Pix</a>
							<ul class="sub_menu" style="visibility: hidden; ">
								<?php
									$cats = get_pix_cat($forum_user['id']);
									$nbrecats = count($cats);
									if($nbrecats > 0){
										for($i = 0; $i < $nbrecats; $i++){
											echo '<li><a href="pix.php?c='.$cats[$i]['id'].'">'.$cats[$i]['title'].'</a></li>';
										}
									}
								?>
							</ul>
						</li>
					<?php
					}
				?>
				<li><a href="forum/" alt="Forum">Forum</a>
					<ul class="sub_menu" style="visibility: hidden; ">
						<li><a href="forum/misc.php?action=rules">Règles</a></li>
						<li><a href="forum/search.php">Rechercher</a></li>
						<li><a href="forum/search.php?action=show_new">Nouveaux messages</a></li>
						<li><a href="forum/search.php?action=show_recent">Sujets actifs</a></li>
						<li><a href="forum/search.php?action=show_unanswered">Sujets sans réponse</a></li>
					</ul>
				</li>
				<li><a href="forum/userlist.php" alt="Liste des membres">Membres</a></li>
				<li>
					<?php
						if($forum_user['is_guest'] != 1){ //L'utilisateur est loggé !
						?>
							<a href="forum/profile.php?id=<?php echo $forum_user['id']; ?>"><?php echo $forum_user['username']; ?></a>
							<ul class="sub_menu" style="visibility:hidden">
								<li><a href="forum/misc.php?section=pun_pm&pmpage=inbox">Messages privés</a></li>
							</ul>
						<?php
						}else{
							echo '<a href="forum/login.php" id="login">Se connecter</a>';
						}
					?>
				</li>
   			</ul>
		</div>
		<div id="subheader">
    		<div id="logo"><a href="index.php" title="Retour à l'accueil"><img src="imgs/logo-picool.png" alt="logo" /></a></div>
    		<div id="formShoutbox">
    			<?php
	    			if($forum_user['is_guest'] != 1){
	    			?>
		    			<form action="insertshout.php" name="shout" method="POST" id="shoutbox">
		    				<input type="text" name="message" id="message" maxlength="256" class="shoutbox" title="Shout !" value="Shout !" onKeyDown="CheckLen()" onKeyUp="CheckLen()" onfocus="if (this.value == 'Shout !') {this.value = '';}; CheckLen()" onblur="if (this.value == '') {this.value = 'Shout !';}" />
		    				<div id="chars">256</div>
		    				<input type="submit" class="button" value="CRACHE TON VENIN" />
		    			</form>
		    			<form id="tribunesearch" method="post" action="tribunesearch.php">
		    				<input type="hidden" id="what" name="what" value="" />
		    				<input type="hidden" name="form_sent" value="1" />
		    				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token($searchshout); ?>" />
		    				<input type="submit" id="submitsearch" class="button" name="submitsearch" value="CHERCHER" />
		    			</form>
		    		<?php
	    			}else{
	    			?>
		    			<form action="insertshout.php" name="shout" method="POST" id="shoutbox">
		    				<input type="text" name="message" id="message" maxlength="256" class="shoutbox" title="Shout !" value="Si vous voulez poster, loggez vous !" DISABLED />
		    			</form>
		    		<?php
	    			}
    			?>
    		 </div>
    	</div>
