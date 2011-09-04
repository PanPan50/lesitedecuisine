<?php
$arrayJour = array('Sunday' => 'Dimanche',
                   'Monday' => 'Lundi',
                   'Tuesday' => 'Mardi',
                   'Wednesday' => 'Mercredi',
                   'Thursday' => 'Jeudi',
                   'Friday' => 'Vendredi',
                   'Saturday' => 'Samedi');

$arrayMois = array(1 => 'janvier',
                   2 => 'février',
                   3 => 'mars',
                   4 => 'avril',
                   5 => 'mai',
                   6 => 'juin',
                   7 => 'juillet',
                   8 => 'aout',
                   9 => 'septembre',
                   10 => 'octobre',
                   11 => 'novembre',
                   12 => 'décembre');

function afficher_date_relative($date){
	$secondes 	= time() - $date; $secondes>1 ? $secondes .= ' secondes' : $secondes .= ' seconde';
	$minutes	= '';
	$heures		= '';
	$jours		= '';
	$dateRelative   = 'Il y a '. $secondes;
	if ($secondes > 60) { // S'il y a plus d'une minute
		$minutes 	= floor($secondes/60) ; $minutes>1 ? $minutes .= ' minutes' : $minutes .= ' minute';
		$secondes 	= floor($secondes%60) ; $secondes>1 ? $secondes .= ' secondes' : $secondes .= ' seconde';
		$dateRelative   = 'Il y a '. $minutes .' et '. $secondes;
	}
	if ($minutes > 60) { // S'il y a plus d'une heure
		$heures		= floor($minutes/60) ; $heures>1 ? $heures .= ' heures' : $heures .= ' heure';
		$minutes	= floor($minutes%60) ; $minutes>1 ? $minutes .= ' minutes' : $minutes .= ' minute';
		$dateRelative   = 'Il y a '. $heures .' et '. $minutes;
	}
	if ($heures > 24) { // S'il y a plus d'un jour
		$jours		= floor($heures/24) ; $jours>1 ? $jours .= ' jours' : $jours .= ' jour';
		$heures		= floor($heures%24) ; $heures>1 ? $heures .= ' heures' : $heures .= ' heure';
		$dateRelative = 'Il y a '. $jours .' et '. $heures;
	}
	if ($jours > 7) { // S'il y a plus d'une semaine, on affiche la date normale
		$mois	    = date("m",$date)-1;
		$calendrier = array('janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','décembre');
		$jour 		= date("j",$date);
		$mois		= $calendrier[$mois];
		date("Y",$date) != date("Y") ? $annee = date("Y",$date) : $annee = '';
		$dateRelative   = 'Le '. $jour .' '. $mois .' '. $annee;
		}
	return $dateRelative;
}
/*
// Fonction permettant de compter
// le nombre de lignes dans un array
*/
function count_value_array($array){
	$i = 0;
	foreach($array as $key => $value){
		if($value != NULL){
			$i++;
		}
	}
	return $i;
}

/*
// Fonction permettant de générer une clé unique
// avec vérification de doublon dans la BDD
*/
function generate_uniq_key($length){
	$check = 1;
	$key = "";
	while($check > 0){
		$key = random_key($length, true, false);
		$check = query_count('pix_pix', 'id', 'name', $key);
	}
	return $key;
}

/*
// Fonction permettant de se 
// connecter � la base de donn�e
*/
function connect_to_db(){
    global $config;
    $connect_to_db = mysql_connect("$config[host]", "$config[user]", "$config[password]");
	mysql_set_charset('utf8');
	mysql_select_db("$config[database]");
    if(!$connect_to_db){
        $_SESSION['mysqlError'] = mysql_error();
        header("location: errors.php?k=sql3");
        exit;
    }
    return $connect_to_db;
}


function get_bash(){
	connect_to_db();
	$query = mysql_query(" SELECT * FROM pan_bash ORDER BY RAND() LIMIT 1");
	if(!$query){
		header("location: errors.php?k=sql4");
	    exit;
	}
	$bash = mysql_fetch_assoc($query);
	return $bash['bash'].' [ '.$bash['auteur'].' ]';
}
/*
// Fonction permettant de v�rifier
// le login et mot de passe
// d'un utilisateur
*/
function check_user($username, $password){
	$query = mysql_query(" SELECT * FROM users WHERE username = '$username' ");
	if(!$query){
		header("location: errors.php?k=sql4");
        exit;
    }
	$nbreUser = mysql_num_rows($query);
	$user = mysql_fetch_assoc($query);
	if($nbreUser == 1){ // Si on trouve une entr�e on v�rifie le mdp !
		if($password == $user['password']){
			return TRUE;
		}else{return FALSE;}
	}else{return FALSE;}
}

/*
// Fonction permettant de compter un champ
// dans une table avec ou sans argument
*/
function query_count($table, $column, $where = FALSE, $value = FALSE){
	$requete = "SELECT count($column) FROM $table ";
	if($where != "" AND $value != ""){
		$requete .= "WHERE $where = '$value'";
	}
	connect_to_db();
	$query = mysql_query("$requete");
	if(!$query){
		header("location: errors.php?k=sql");
        exit;
    }
	$result = mysql_fetch_array($query);
	mysql_close();
	return $result[0];
}

/*
// Fonction permettant de g�n�rer un code antispam
// Renvoie un array ! � int�grer dans $_SESSION
*/
function random_captcha(){
	$captcha = array();
	$firstNumber = mt_rand(1, 5);
	$secondNumber = mt_rand(1, 5);
	$captcha['equation'] = "$firstNumber + $secondNumber";
	$captcha['result'] = $firstNumber + $secondNumber;
	return $captcha;
}

/*
// Fonction permettant d'obtenir l'adresse IP
// du visiteur.
*/
function get_ip() { 
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
    	$ip = $_SERVER['HTTP_CLIENT_IP'];
    }else{
    	$ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

/*
// Fonction permettant de retourner un age en
// fonction d'une date de naissance
// format attendu : jj-mm-aaa
*/
function calculate_age($dateDeNaissance){
	list($jour, $mois, $annee) = explode("-", $dateDeNaissance);
	$moisJour = $mois.$jour;
	$currentYear = date("Y");
	$currentMonthDay = date("md");
	if($currentMonthDay < $moisJour){
		$age = $currentYear - $annee - 1;
	}else{
		$age = $currentYear - $annee;
	}
	echo $age;
}

/*
// Fonction permettant de trouver l'extension d'un fichier
// retourne l'extension sans le point
*/
function get_extension($name){
	$extension = substr( strrchr($name, '.'), 1);
	return $extension;
}

function transform_url($text){

    // On recherche les urls dans $text
    $pattern = "/((http|https|ftp):\/\/[a-z0-9;\/\?:@=\&\$\-_\.\+!*'\(\),~%#]+)/is";
    preg_match_all($pattern, $text, $arrayUrl);

    // Pour chaque url trouvée, on remplace par un contenu cliquable
    foreach($arrayUrl[0] as $url){

        // On va découper l'url
        $urlParse = parse_url($url);
        if(substr($urlParse['host'], 0, 4) == "www.") $urlParse['host'] = substr($urlParse['host'], 4);

        // Si l'url contient un '.' (il y a une extension)
        if(strrchr($url, '.')){

            // On détermine l'extension, donc le type de fichier
            $ext_t = strtolower(substr(strrchr($url, '.'), 1));
            if(substr($ext_t, -1)=='/') $ext_t = substr($ext_t , 0, strlen($ext_t)-1);

            // L'url est une image :
            if($ext_t=='jpeg'||$ext_t=='jpg'||$ext_t=='bmp'||$ext_t=='gif'||$ext_t=='png'||$ext_t=='tga')$show = 'image';

            // L'url est une vidéo :
            elseif($ext_t=='mpeg'||$ext_t=='mpg'||$ext_t=='avi'||$ext_t=='wmv'||$ext_t=='mov')$show = 'video';

            // L'url est un son :
            elseif($ext_t=='mp3'||$ext_t=='ogg'||$ext_t=='wma'||$ext_t=='wav'||$ext_t=='ra')$show = 'audio';

            // L'url est une archive :
            elseif($ext_t=='zip'||$ext_t=='rar'||$ext_t=='gz'||$ext_t=='ace'||$ext_t=='7z')$show = 'archive';

            // L'url est un executable :
            elseif($ext_t=='exe'||$ext_t=='bat')$show = 'exe';

            // L'url est du flash :
            elseif($ext_t=='swf')$show = 'flash';

            // On ne sait pas ce que contient l'url...
            else $show = 'url';

            // On remplace le texte....
            $replacementtext = '';
            if($show == 'image'){
                $replacementtext = "<a href=\"".$url."\" rel=\"lightbox\" title=\"".$url."\"><img src=\"imgs/Picture.png\" /></a> <a href=\"$url\" alt=\"$url\" title=\"".$url."\">$urlParse[host]</a>";
            }elseif($show == 'url'){
                $replacementtext = " <a href=\"$url\" alt=\"$url\"  title=\"".$url."\">$urlParse[host]</a>";
            }else{
            	$replacementtext = " <img src=\"imgs/$show.png\" /> <a href=\"$url\" alt=\"$url\"  title=\"".$url."\">$urlParse[host]</a>";
            }
        
            $text = str_replace($url, $replacementtext, $text);
           
        }else{

            $show = 'url';
            $text = str_replace($url, "<a href=\"$url\" alt=\"$url\">$show</a>", $text);

        }
    }
    return $text;
}
/*
// Fonction permettant de s�curiser une valeur avant
// avant injection dans la base de donn�e
*/
function safe($value){
	return mysql_real_escape_string(trim($value));
}

function display_calendar($month = FALSE, $year = FALSE){

	global $arrayMois, $arrayJour;
	
	// Quel jour est-on aujourd'hui ?
	$currentDay = date("d");
	$currentMonth = date("n");
	$currentYear = date("Y");

	$nbreJoursMois = date("t", mktime(0, 0, 0, $month, 1, $year));
	//echo $nbreJoursMois;
	
	// 3 choix, soit on est dans le passé, soit on est dans le futur, soit on est dans le mois en cours
	$currentYearMonth = $currentYear.add_0_month($currentMonth);
	$requestYearMonth = $year.add_0_month($month);
	
	//echo $requestYearMonth.' - '.$currentYearMonth;
	echo '<div id="time">';
	// On est dans le mois actuel
	if($requestYearMonth == $currentYearMonth){
	
		//$nbreJoursMois = date("t");
		
		// Date du premier message dans la shoutbox !
		//$firstShout = date("d / m / Y", 1261706486);
		
		// On affiche le calendrier
		$i = 1;
		while($i <= $nbreJoursMois){
			$firstLetterJour = mktime(0, 0, 0, $currentMonth, $i, $currentYear);
			$firstLetterJour = date("l", $firstLetterJour);
			$firstLetterJour = substr($arrayJour[$firstLetterJour], 0, 1);
			if($i <= $currentDay){
				echo '<div class="jour';
				if($i == $currentDay){
					echo ' current';
				}elseif($firstLetterJour == "S" OR $firstLetterJour == "D"){
					echo ' weekend';
				}else{
					echo ' back';
				}
				echo '">';
				echo '<a href="archivesshoutbox.php?jour='.$i.'&mois='.$currentMonth.'&annee='.$currentYear.'">';
				echo '<span class="firstLetter">'.$firstLetterJour.'</span>';
				echo '<br />';
				echo $i;
				echo '</a>';
				echo '</div>';
			}else{
				echo '<div class="jour"><span class="firstLetter">'.$firstLetterJour.'</span><br />'.$i.'</div>';
			}
			$i++;
		}
	
	}elseif($requestYearMonth < $currentYearMonth){ // On est dans le passé
		$i = 1;
		while($i <= $nbreJoursMois){
			$firstLetterJour = mktime(0, 0, 0, $month, $i, $year);
			$firstLetterJour = date("l", $firstLetterJour);
			$firstLetterJour = substr($arrayJour[$firstLetterJour], 0, 1);

			echo '<div class="jour';
			if($firstLetterJour == "S" OR $firstLetterJour == "D"){
				echo ' weekend';
			}else{
				echo ' back';
			}
				echo '">';
				echo '<a href="archivesshoutbox.php?jour='.$i.'&mois='.$month.'&annee='.$year.'">';
				echo '<span class="firstLetter">'.$firstLetterJour.'</span>';
				echo '<br />';
				echo $i;
				echo '</a>';
				echo '</div>';
			$i++;
		}
		
	}else{ // On est dans le futur
		$i = 1;
		while($i <= $nbreJoursMois){
			$firstLetterJour = mktime(0, 0, 0, $month, $i, $year);
			$firstLetterJour = date("l", $firstLetterJour);
			$firstLetterJour = substr($arrayJour[$firstLetterJour], 0, 1);

			echo '<div class="jour"><span class="firstLetter">'.$firstLetterJour.'</span><br />'.$i.'</div>';
			$i++;
		}
		
	}
	echo '</div>';
	// On affiche le mois et l'année (navigation)
	if($month == 1){
		$monthBack = '12'.$year - 1;
	}else{
		$monthBack = $month - 1;
		$monthBack .= $year;
	}
	if($month == 12){
		$monthNext = '1'.$year + 1;
	}else{
		$monthNext = $month + 1;
		$monthNext .= $year;
	}
	$yearBack = $month;
	$yearBack .= $year - 1;
	$yearNext = $month;
	$yearNext .= $year + 1;
	?>
	<div id="timenavigator">
		<a href="#" id="monthprevious"><img src="imgs/prev.png" alt="mois précédent" /></a>
		<?php echo $arrayMois[$month]; ?>
		<a href="#" id="monthnext"><img src="imgs/next.png" alt="mois suivant" /></a>
		<a href="#" id="yearprevious"><img src="imgs/prev.png" alt="année précédente" /></a>
		<?php echo $year; ?>
		<a href="#" id="yearnext"><img src="imgs/next.png" alt="année suivante" /></a>
	</div>
	<script type="text/javascript">
	$("#monthprevious").click(function(){
	  	$("#optionbarcontent").load("inc/ajax.calendar.php", {request: <?php echo $monthBack; ?>});
	});
	$("#monthnext").click(function(){
	  	$("#optionbarcontent").load("inc/ajax.calendar.php", {request: <?php echo $monthNext; ?>});
	});
	$("#yearprevious").click(function(){
	  	$("#optionbarcontent").load("inc/ajax.calendar.php", {request: <?php echo $yearBack; ?>});
	});
	$("#yearnext").click(function(){
	  	$("#optionbarcontent").load("inc/ajax.calendar.php", {request: <?php echo $yearNext; ?>});
	});
	</script>
	<?php
}

function get_online_users(){
	connect_to_db();
	$logged = time() - 15 * 60;
	$query = mysql_query("	SELECT user_id, ident, logged
							FROM pun_online
							WHERE user_id > 1
							AND logged > '".$logged."'
							ORDER BY ident ASC
						");
	if(!$query){echo 'toto';}
	$nbreOnline = mysql_num_rows($query);
	$i = 1;
	if($nbreOnline > 0){
		while($online = mysql_fetch_array($query)){
			echo '<a href="forum/profile.php?id='.$online['user_id'].'" alt="Voir le profil de '.$online['ident'].'">'.$online['ident'].'</a>';
			if($i < $nbreOnline)echo ", ";
			$i++;
		}
	}else{
		echo "Il n'y a personne de connecté en ce moment !";
	}
	mysql_close();
}

function get_10last_posts(){
	global $usergid;
    connect_to_db();
	$query = mysql_query("	SELECT t.subject, t.last_post, t.last_poster, t.last_post_id
							FROM pun_topics AS t
							LEFT JOIN pun_forum_perms AS fp
							ON (fp.forum_id=t.forum_id AND fp.group_id='".$usergid."')
							WHERE (fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL
							ORDER BY t.last_post DESC
							LIMIT 0, 10
						");
	if(!$query){echo 'toto';}
	echo '<ul>';
	while($post = mysql_fetch_array($query)){
		$time = date("H:i", $post['last_post']);
		echo '<li><a href="forum/viewtopic.php?pid='.$post['last_post_id'].'#p'.$post['last_post_id'].'">'.$time.' '.$post['subject'].'</a><span class="lastposter"> '.$post['last_poster'].'</span></li>';
	}
	echo '</ul>';
}

function add_0_month($month){
	if(strlen($month) == 1){
		$month = '0'.$month;
	}
	return $month;
}

function get_shouts($start = null, $stop = null, $what = null, $uniq = null){

	global $arrayMois, $arrayJour, $forum_user;
	
    // On commence par récupérer les derniers shouts pour les afficher
    connect_to_db();
    $i = 0;
    $lastday = '';
    $viewShouts = array();
    $query  = "SELECT * ";
    $query .= "FROM ext_shouts ";

    // Si je veux retrouver la fonction voir tous les messages, même les messages supprimés
    //if(!isset($forum_user['is_admmod']) OR $forum_user['is_admmod'] != 1 OR !isset($_GET['shouts']) OR $_GET['shouts'] != 'all'){
    //    $query .= "WHERE trusted = 1 ";
    //}

    $query .= "WHERE trusted = 1 ";
    
    if(isset($start) and isset($stop)){
    	$query .= "AND shouted BETWEEN ".$start." AND ".$stop." ";
	}
	
	if(isset($uniq)){
		$query .= "AND id = '".$uniq."' ";;
	}
	
	if(isset($what)){
    	$query .= "AND message LIKE '%".$what."%' ";
    }
    
    $query .= "ORDER BY shouted DESC ";
    
    if(!isset($start) AND !isset($stop) AND !isset($what)){
    	$query .= "LIMIT 0, 25";
    }
    
    $queryShouts = mysql_query($query);
    while($resultShouts = mysql_fetch_assoc($queryShouts)){
        
    // On gère l'affichage de la date lorsque l'on change de jour
	if($lastday != date('dmY', $resultShouts['shouted'])){
               
            $viewShouts[$i]['type'] = 'date';
            $day = date('l', $resultShouts['shouted']);
            $month = date('n', $resultShouts['shouted']);
            $viewShouts[$i]['date'] = $arrayJour[$day] . ' ' . date('d', $resultShouts['shouted']) . ' ' . $arrayMois[$month];  
            
            $lastday = date('dmY', $resultShouts['shouted']);
            $i++;
        }

        // Si il s'agit d'un auto-message, IRC mode....
		if(preg_match("/^\/me /i", $resultShouts['message'])){
            
            $viewShouts[$i]['id'] = $resultShouts['id'];
            $viewShouts[$i]['type'] = 'me';
            $viewShouts[$i]['date'] = date('H:i:s', $resultShouts['shouted']);
            $viewShouts[$i]['sender'] = $resultShouts['sender'];
            $viewShouts[$i]['message'] = transform_url(htmlentities(substr($resultShouts['message'], 3), ENT_NOQUOTES, 'UTF-8')); // substr pour enlever le /me ;)
            //$viewShouts[$i]['trusted'] =  $resultShouts['trusted'];
        
        // Sinon c'est un message normal !
		}else{	
			
            $viewShouts[$i]['id'] = $resultShouts['id'];
            $viewShouts[$i]['type'] = 'message';
            $viewShouts[$i]['date'] = date('H:i:s', $resultShouts['shouted']);
            $viewShouts[$i]['sender'] = $resultShouts['sender'];
            $viewShouts[$i]['message'] = transform_url(htmlentities($resultShouts['message'], ENT_NOQUOTES, 'UTF-8'));
            //$viewShouts[$i]['trusted'] =  $resultShouts['trusted'];

            // On va rechercher si c'est une réponse à un autre message
            // en recherchant le nom du visiteur dans le message
            // ou si c'est un de nos messages...
            // ou si le visiteur est un admin ;)
            // Si le visiteur est loggé !!
            if(isset($forum_user['id']) AND $forum_user['id'] > 1){
            
                // Est-ce une réponse ?
                if(stripos($resultShouts['message'], $forum_user['username']) !== FALSE){

                    // On ajoute l'info dans le tableau
                    $viewShouts[$i]['response'] = 1;
                }else{
                    $viewShouts[$i]['response'] = 0;
                }

                // Est-ce un de nos messages ?
                if($viewShouts[$i]['sender'] == $forum_user['username']){

                    // On ajoute l'info dans le tableau
                    $viewShouts[$i]['own'] = 1;
                }else{

                    $viewShouts[$i]['own'] = 0;
                }
            }
	}
        $i++;
    }
    
    return $viewShouts;
}

function get_random_name(){
	connect_to_db();
	$query = mysql_query(" 	SELECT username
							FROM pun_users
							ORDER BY RAND()
							LIMIT 1
						");
	if(!$query){echo "erreur";exit();}
	$name = mysql_fetch_array($query);
	return $name[0];				 
}

function get_pix_cat($user){
	connect_to_db();
	$query = mysql_query("
							SELECT *
							FROM pix_cat
							WHERE owner = '0'
							OR owner = '".$user."'
							ORDER BY id ASC
						");
	if(!$query){echo "erreur";exit();}
	$nbreResultats = mysql_num_rows($query);
	if($nbreResultats > 0){
		$array = array();
		$i = 0;
		while($result = mysql_fetch_array($query)){
			$array[$i] = array();
			$array[$i]['id'] = $result['id'];
			$array[$i]['title'] = $result['title'];
			$array[$i]['nbrpix'] = $result['nbrpix'];
			$i++;
		}
		return $array;
	}
	return FALSE;
}
?>