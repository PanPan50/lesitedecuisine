<?php
header('Content-type: text/html; charset=utf-8');
define('FORUM_ROOT', '/usr/local/www/vhosts/lesitedecuisine.fr/forum_v2/');
require FORUM_ROOT.'include/common.php';
require FORUM_ROOT.'include/parser.php';

$msg = array();

function file_save($filename, $content, $flags = 0) {
	if (!($file = fopen($filename, 'w')))
		return false;
	
		$n = fwrite($file, $content);
		fclose($file);
		return $n ? $n : false;
}

if (!file_exists("chat.db")) file_save("chat.db","<?php\n\$msg = ".var_export($msg,TRUE)."\n?>");

include "chat.db";

while (count($msg) >= 1000) array_shift($msg);

if (!empty($_POST['mess']) && !empty($_POST['pseudo']) && ($_POST['pseudo'] != "guest") ) {
	$i = count($msg);
	$msg[$i]['pseudo'] = htmlentities($_POST['pseudo'], null, 'UTF-8');
	$msg[$i]['texte'] = htmlentities($_POST['mess'], null, 'UTF-8');
	$msg[$i]['date'] = time();
	$msg[$i]['id'] =  $forum_user['id'];
	$msg[$i]['bite'] = 0;
	file_save("chat.db", "<?php\n\$msg = ".var_export($msg,TRUE)."\n?>");
	
	// Modif de PanPan !!!
	$connect_to_db = mysql_connect("localhost", "asile_forum_dev", "zzuGBLbGDxbxQsV8");
	mysql_set_charset('utf8');
	mysql_select_db("asile_forum_dev");
	if(!$connect_to_db){
	    header("location: errors.php?k=sql3");
	    exit;
	}
	$insertshout = mysql_query("INSERT INTO ext_shouts
	                            (sender, sender_id, sender_ip, message, shouted)
	                            VALUES
	                            ('".$msg[$i]['pseudo']."', '".$msg[$i]['id']."', '1.2.3.4', '".mysql_real_escape_string($_POST['mess'])."', '".$msg[$i]['date']."')
	                           ");
	mysql_close($connect_to_db);
	// Fin de modif de PanPan
	
	header("Location: tribune.php");
}

$msg2 = array_reverse($msg);

function currentPageURL() {
	$curpageURL = 'http';
		
	if ($_SERVER["HTTPS"] == "on") $curpageURL.= "s";
		
	$curpageURL.= "://";
		
	if ($_SERVER["SERVER_PORT"] != "80") {
		$curpageURL.= $_SERVER['HTTP_HOST'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$curpageURL.= $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
	}

	return $curpageURL;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Le Vrai Asile - Tribune</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<style type="text/css">
			* {
				padding: 0;
				margin: 0;
			}
			body {
				background: #0d0d0d;
			}
			#header {
				font: 14px/1.4 Arial, Helvetica, sans-serif;
				padding-left: 10px;
				height:30px;
				top:0px;
				background: #2D2D2D;
				color: #C0C0C0;
				margin-bottom:20px;
			}
			#header ul {
				margin: 0;
				float: left;
			}
			#header li {
				float: left;
				line-height:30px;
				list-style-type: none;
			}
			#header li a {
				font-size: 1em;
				text-decoration: none;
				color: #C0C0C0;
				display:block;
				outline: none;
				padding-left:6px;
				padding-right:6px;
			}
			#header li a:hover {
				background: #4C4C4C;
				padding-left:6px;
				padding-right:6px;
			}
			#tribune * {
				margin: 0;
				padding: 0;
				max-height:800px;
			}
			#tribune .msg a {
				text-decoration: none;
				color: #989898;
			}
			#tribune a:hover {
				color: #fff;
			}
			#tribune a:active {
				color: #e5e5e5;
			}
			#tribune {
				position: relative;
				overflow: hidden;
				font: 11px/1.4 Arial, Helvetica, sans-serif;
				width:80%;
			}
			#tribune #chat {
				position: relative;
				background: #1a1a1a;
				overflow:hidden;
			}
			#tribune .post {
				border-bottom: 1px solid #212121;
				margin: 0 5px;
				min-height:16px;
				padding:4px;
				position: relative;
			}
			#tribune .post:hover {
				background: #212121;
			}
			#tribune .post .date {
				color: #333;
			}
			#tribune .post .pseudo {
				color: #e5e5e5;
			} 
			#tribune .post .bites {
				color: #e5e5e5;
				padding-right:32px;
				float:right;

			} 
			#tribune .post .ptsbite {
				color: #e5e5e5;
			} 
			#tribune .post .pseudo a {
				color: #e5e5e5;
				text-decoration:none;
			} 
			#tribune .post .msg {
				color: #595959;
			}
			#tribune #form {
				height: 40px;
				background: #262626;
			}
			#tribune #input-msg {
				font-size: 11px;
				padding: 2px;
				background: #333;
				border: 1px solid #404040;
				vertical-align:middle;
			}
			#tribune #form fieldset {
				_position: absolute;
				border: none;
				padding-top:10px;
				padding-left:10px;
				padding-right:10px;
				_margin-top: 10px;
			}
			#tribune #input-msg {
				width:100%;
				color:#fff;
			}
			* html body {
				height: 100%;
				width: 100%;
			}
			#last_posts {
				font: 11px/1.4 Arial, Helvetica, sans-serif;
				position:absolute;
				width : 19%;
				right:0px;
				top:50px;
				background: #1a1a1a;
			}
			#last_posts .title_lp {
			height:40px;
				line-height: 40px;
				background: #262626;
				color: #e5e5e5;
				padding-left:10px;
			}
			#last_posts li {
				margin: 0 5px;
				padding: 5px;
				position: relative;
				overflow: hidden;
				list-style-type: none;
				border-bottom: 1px solid #212121;
			}
			#last_posts li a {
				text-decoration: none;
				color: #989898;
			}
			#last_posts li a:hover {
				color: #fff;
			}
			#online {
				font: 11px/1.4 Arial, Helvetica, sans-serif;
				position:absolute;
				right:0px;
				top:374px;
				width : 19%;
				background: #1a1a1a;
			}
			#online .title_online {
				height:40px;
				line-height: 40px;
				background: #262626;
				color: #e5e5e5;
				padding-left:10px;
			}
			#online .online_list {
				margin: 0 5px;
				padding: 5px;
				position: relative;
				overflow: hidden;
			}
			#online .online_list a {
				text-decoration: none;
				color: #989898;
			}
			#online .online_list a:hover {
				color: #fff;
			}
		</style>
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript">
			var auto_refresh = setInterval(
			function () {
				$('#load_posts').load('rain_count.php?id=<?php echo count($msg);?>');
				$('.recent-posts').load('rain_lastposts.php');
				$('.online_list').load('rain_online.php');
			}, 15000);
			$(document).ready(function(){
				$(".date").click(function () {
					var value = '@' + $(this).text();
					$("#input-msg").val(value);
				});
				$(".post").hover(
					function () {
							$(this).append($('<span class="ptsbite" style="position:absolute;right:0px;float:right;"><a href="#"><img title="+1 bite" src="images/ptsbite+.png" /></a><a href="#"><img title="-1 bite" src="images/ptsbite-.png" /></a></span>'));
					}, 
					function () {
						$(this).find("span:last").remove();
					}
				);
			});
		</script>
	</head>
	<body>
		<div id="header">
			<ul>
				<li><span>Le Véritable Asile :</span></li>
				<li><a href="index.php"><span>Home</span></a></li>
				<li><a href="./?forum"><span>Forum</span></a></li>
				<li><a href="tribune.php">Tribune</a></li>
				<li><a href="userlist.php">Membres</a></li>
				<li><a href="misc.php?action=rules">Règles</a></li>
				<li><a href="search.php">Chercher</a></li>
				<li><a href="profile.php?id=10">Profil</a></li>
				<li><a href="misc.php?section=pun_pm">Messages Privés</span></a></li>
				<li><a href="login.php?action=out&id=<?php echo $forum_user['id'];?>&csrf_token=<?php echo generate_form_token(currentPageURL()); ?>">Déconnexion</a></li>
		   </ul>
		   <img src="images/logo2.png" style="float:right;" />
	   </div>
	   <div id="tribune">
			<?php
			if ($forum_user['username'] != "guest") {
				?>
				<div id="form">
					<form id="form" method="post" action="<?php echo currentPageURL(); ?>">
						<fieldset>
							<input type="hidden" name="pseudo" value="<?php echo $forum_user['username']; ?>">
							<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(currentPageURL()); ?>" />
							<input name="mess" id="input-msg" value="" type="text"  />
						</fieldset>
					</form>
				</div>
				<?php
			}
			?>
			<div id="chat">
				<div id="load_posts"></div>
				<?php
				$new = count($msg);
				foreach ($msg2 as $message) {
					$new = $new - 1;
					if (($message['id'] == 438) OR ($message['id'] ==  249))  {
						$texte = nl2br(ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]",  "<a href=\"\\0\"><img src=\"images/baguette.png\" /></a>", $message['texte']));
					} else {
						$texte = nl2br(ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]",  "<a href=\"\\0\">[url]</a>", $message['texte']));
					}
					echo '<div class="post">';
						echo '<input type="hidden" class="idarray" name="idarray" value="'.$new.'" />';
						echo '<span class="date">'.date("H:i",$message['date']).' </span>';
						echo '<span class="pseudo"><a href="profile.php?id='.$message['id'].'">'.$message['pseudo'].'</a> : </span>';
						echo '<span class="msg">'.$texte.'</span>';
						if ($message['bite'] > 0) {
							echo '<span class="bites">'.$message['bite'].'</span>';
						}
					echo '</div>';
				}	
				?>
			</div>
		</div>
		<?php

		$count = 10; // count posts
		$subject_len = 40; // length of topic title


		// Fetch some info about the posts
		$query = array(
			'SELECT'	=> 't.subject, t.last_post, t.last_poster, t.last_post_id',
			'FROM'		=> 'topics AS t',
			'JOINS'		=> array(
				array(
					'LEFT JOIN'		=> 'forum_perms AS fp',
					'ON'			=> '(fp.forum_id=t.forum_id AND fp.group_id='.$forum_user['g_id'].')'
				)
			),
			'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL',
			'ORDER BY'	=> 't.last_post DESC',
			'LIMIT'		=> '0, '.$count
		);
		($hook = get_hook('pr_qr_get_recent_posts')) ? eval($hook) : null;
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		// If there are any posts
		if ($forum_db->num_rows($result) > 0) {
			?>
			<div id="last_posts">
				<div class="title_lp">Derniers messages</div>
				<ul class="recent-posts">
					<?php
					while ($cur_topic = $forum_db->fetch_assoc($result)) {
						if ($forum_config['o_censoring'] == '1') {
							$cur_topic['subject'] = censor_words($cur_topic['subject']);
						}
						$subject = (utf8_strlen($cur_topic['subject']) > $subject_len ? utf8_substr($cur_topic['subject'], 0, $subject_len).'...' : $cur_topic['subject']);
						$subject = forum_htmlencode($subject);
						$title = forum_htmlencode($cur_topic['subject']);
						$poster = forum_htmlencode($cur_topic['last_poster']);
						$time = format_time($cur_topic['last_post'], 2);
						$title .= ', '.$lang_portal['By'].': '.forum_htmlencode($cur_topic['last_poster']);
						$title .= ', '.$lang_portal['Posted'].': '.format_time($cur_topic['last_post'])
			
						?>
						<li><a href="<?php echo forum_link($forum_url['post'], array($cur_topic['last_post_id'])) ?>"><?php echo $time . ' ' . $poster . ' : ' . $subject; ?></a></li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}

		// If user is logged display some informations about it
		if (!$forum_user['is_guest']) {
			require FORUM_ROOT.'lang/'.$forum_user['language'].'/index.php';

			// Collect some statistics from the database
			$query = array(
				'SELECT'	=> 'COUNT(u.id)-1',
				'FROM'		=> 'users AS u'
			);

			($hook = get_hook('xn_portal_by_daris_wio_qr_get_user_count')) ? eval($hook) : null;
			$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

			if ($forum_config['o_users_online'] == '1') {
				// Fetch users online info and generate strings for output
				$query = array(
					'SELECT'	=> 'o.user_id, o.ident',
					'FROM'		=> 'online AS o',
					'WHERE'		=> 'o.idle=0',
					'ORDER BY'	=> 'o.ident'
				);
				($hook = get_hook('xn_portal_by_daris_wio_qr_get_users_online')) ? eval($hook) : null;
				$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
				$num_guests = 0;
				$users = array();

				while ($forum_user_online = $forum_db->fetch_assoc($result)) {
					($hook = get_hook('xn_portal_by_daris_wio_add_online_user_loop')) ? eval($hook) : null;

					if ($forum_user_online['user_id'] > 1) {
						if (forum_htmlencode($forum_user_online['user_id'] == 513)) {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'"><img src="images/ban.png" /> PATTON</a>';
						} elseif (forum_htmlencode($forum_user_online['user_id'] == 870)) {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'">thremotassst</a>';
						} elseif (forum_htmlencode($forum_user_online['user_id'] == 17)) {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'"><s>Conrad</s> DiDay</a>';
						} elseif (forum_htmlencode($forum_user_online['ident'] == "STANYMALL")) {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'"><img src="images/tr.png" /> STANYMALL</a>';
						} elseif (forum_htmlencode($forum_user_online['ident'] == "Mml-sama")) {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'" style="color:pink;text-decoration:blink;"><img src="images/heart.png" /> Mml-sama</a>';
						} else {
							$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'">'.forum_htmlencode($forum_user_online['ident']).'</a>';
						}
					} else {
						++$num_guests;
					}
				}

				// If there are registered users logged in, list them
				if (count($users) > 0) {
					$users_online = '<div id="online"><div class="title_online">Utilisateurs connectés</div><ul class="online_list"><li>'.implode('</li><li> ', $users).'</li><ul></div>';
				}
			}
		
			if (isset($users_online)) : echo $users_online; endif; 

		} else {
			$cur_panel['title'] = $lang_common['Login'];

			require_once FORUM_ROOT.'lang/'.$forum_user['language'].'/login.php';
			$form_action = forum_link($forum_url['login']);
			?>

			<div id="login">
				<div class="title_login">Se connecter</div>
					<form method="post" action="<?php echo $form_action ?>">
						<div class="hidden">
							<input type="hidden" name="form_sent" value="1" />
							<input type="hidden" name="redirect_url" value="<?php echo get_current_url() ?>" />
							<input type="hidden" name="csrf_token" value="<?php echo generate_form_token($form_action) ?>" />
						</div>
						<div class="panel-input">
							<?php echo $lang_login['Username'] ?><br />
							<input type="text" name="req_username" size="13" />
						</div>
						<div class="panel-input">
							<?php echo $lang_login['Password'] ?><br />
							<input type="password" name="req_password" size="13" />
						</div>
						<div>
							<label for="fld-remember-me"><span class="fld-label"><?php echo $lang_login['Remember me'] ?></span>&nbsp;<input type="checkbox" id="fld-remember-me" name="save_pass" value="1" /></label>
						</div>
						<div>
							<span class="submit"><input type="submit" name="login" value="<?php echo $lang_common['Login'] ?>" /></span>
						</div>
					</form>
				</div>
			</div>
			<?php
		}
		?>
   </body>
</html>



