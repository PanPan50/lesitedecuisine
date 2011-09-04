<?php
$title = "Pix'O'Viewer";
require '_header.php';

// On commence par vérifier que l'user est bien un trusted fool ou admin !
if($forum_user['group_id'] != 1 AND $forum_user['group_id'] != 5){
	header("location: index.php");
	exit();
}

if(!isset($_GET['n'])){
	header("location: index.php?v=pasdepixdemandee");
	exit();
}
	$n = mysql_real_escape_string($_GET['n']);


// On va vérifier que l'image demandée existe bien !
$count = query_count('pix_pix', 'id', 'name', $n);

if($count == 0){
	header("location: index.php?v=pixinexistante");
	exit();
}
?>
<div id="main"><!-- MAIN -->
	<div class="content"><!-- CONTENT -->
		<h5>Voir une image.</h5><br />                
    	<?php
    	connect_to_db();
    	$RequeteSQLImageUnique = mysql_query("SELECT * FROM pix_pix WHERE name = '".$n."' ") ;
    	while($ArrayRSQLIU = mysql_fetch_array($RequeteSQLImageUnique)){
	        $Nom = $ArrayRSQLIU['name'];
	        $prop = $ArrayRSQLIU['owner'];
	        $Extension = $ArrayRSQLIU['ext'];
	        $Largeur = $ArrayRSQLIU['largeur'];
	        $Hauteur = $ArrayRSQLIU['hauteur'];
	        $Categorie = $ArrayRSQLIU['cat'];
	        $TimeStamp = $ArrayRSQLIU['time'];
	        $UrlDirecte = $config['baseurl'].'upload/'.$prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension;
	        $UrlIMG = '[img]'.$UrlDirecte.'[/img]';
	        $UrlMinia = '[url='.$UrlDirecte.'][img]'.$config['baseurl'].'upload/'.$prop.'/'.$Categorie.'/t/'.$Nom.'_t.'.$Extension.'[/img][/url]';
	        $UrlMiniMinia = '[url='.$UrlDirecte.'][img]'.$config['baseurl'].'upload/'.$prop.'/'.$Categorie.'/t/'.$Nom.'_t2.'.$Extension.'[/img][/url]';
        if($Largeur < 150 AND $Hauteur < 150){
		?>
		<div align="center">
			<img src="upload/<?php echo $prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension; ?>">
		</div><br />
		<div>URL de la photo directe :<br />
			<form action="" name="01" method="post" class="niceform">
				<input type="text" id="textinput01" name="01" value="<?php echo $UrlDirecte; ?>" />
			</form><br />
			URL de la photo avec balises [img][/img]<br />
			<form action="" name="02" method="post" class="niceform">
				<input type="text" id="textinput02" name="02" value="<?php echo $UrlIMG; ?>" />
			</form>
		</div>
		<?php
        }elseif($Largeur < 640 AND $Hauteur < 640){
		?>
		<div align="center">
			<img src="upload/<?php echo $prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension; ?>">
		</div><br />
		<div>URL de la photo directe :<br />
			<form action="" name="01" method="post" class="niceform">
				<input type="text" id="textinput01" name="01" size="60" value="<?php echo $UrlDirecte; ?>" />
			</form><br />
			URL de la photo avec balises [img][/img] :<br />
			<form action="" name="02" method="post" class="niceform">
				<input type="text" id="textinput02" name="02" size="60" value="<?php echo $UrlIMG; ?>" />
			</form><br />
			<div align="center">
				<a href="<?php echo 'upload/'.$prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension; ?>" target="_blank"><img src="<?php echo 'upload/'.$prop.'/'.$Categorie.'/t/'.$Nom.'_t.'.$Extension; ?>"></a></div><br />
			URL de la photo avec balises [url=][img][/img][/url] et mini-miniature :<br />
			<form action="" name="03" method="post" class="niceform">
				<input type="text" id="textinput03" name="03" size="60" value="<?php echo $UrlMiniMinia; ?>" />
			</form>
		</div>
		<?php
        }else{
        	?>
        	<div align="center">
        		<a href="<?php echo 'upload/'.$prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension; ?>" target="_blank">
        			<img src="upload/<?php echo $prop.'/'.$Categorie.'/t/'.$Nom.'_t2.'.$Extension; ?>">
        		</a>
        	</div><br />
        	<div style="margin: 0 auto 0 auto; width: 620px;">
        		URL de la photo directe :<br />
        		<form action="" name="01" method="post" class="niceform">
        			<input type="text" id="textinput01" name="01" size="60" value="<?php echo $UrlDirecte; ?>" />
        		</form><br />
        		URL de la photo avec balises [img][/img] :<br />
        		<form action="" name="02" method="post" class="niceform">
        			<input type="text" id="textinput02" name="02" size="60" value="<?php echo $UrlIMG; ?>" />
				</form><br />
				URL de la photo avec balises [url][img][/img][/url] et miniature :<br />
				<form action="" name="03" method="post" class="niceform">
					<input type="text" id="textinput03" name="03" size="60" value="<?php echo $UrlMinia; ?>" />
				</form><br />
				<div align="center">
					<a href="<?php echo 'upload/'.$prop.'/'.$Categorie.'/'.$Nom.'.'.$Extension; ?>" target="_blank">
						<img src="<?php echo 'upload/'.$prop.'/'.$Categorie.'/t/'.$Nom.'_t.'.$Extension; ?>">
					</a>
				</div><br />
				URL de la photo avec balises [url=][img][/img][/url] et mini-miniature :<br />
				<form action="" name="04" method="post" class="niceform">
					<input type="text" id="textinput04" name="04" size="60" value="<?php echo $UrlMiniMinia; ?>" />
				</form>
			</div>
			<?php
        }
    }
?>