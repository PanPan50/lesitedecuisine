<?php
$title = "Pix'O'Matic";
require '_header.php';

// On vérifie d'abord que l'user est bien un trusted fool ou un admin !
if($forum_user['group_id'] != 1 AND $forum_user['group_id'] != 5){
	header("location: index.php");
}

$cats = get_pix_cat($forum_user['id']);
$nbrecats = count($cats);

if(isset($_GET['c'])){
    $cat = intval($_GET['c']);
}

if(isset($_GET['page'])){
    $Page = intval($_GET['page']);
}else{
    $Page = 1 ;
}

$TexteRequeteNombreImage = "SELECT COUNT(id) FROM pix_pix" ;
if(isset($cat)){
    $TexteRequeteNombreImage .= " WHERE cat = ".$cat." " ;
}

$RequeteNombreTotalImage = mysql_query($TexteRequeteNombreImage) ;
$ArrayTRNI = mysql_fetch_array($RequeteNombreTotalImage) ;
$NombreTotalImage = $ArrayTRNI['COUNT(id)'] ;      
$NombreDImageParPage = 24 ;
$NombreDePages  = ceil($NombreTotalImage / $NombreDImageParPage);
$PremiereImageAAfficher = ($Page - 1) * $NombreDImageParPage ;

// On récupére les images
$images = array();
$query = " SELECT * FROM pix_pix ";

if(isset($cat)){
	if($cat != 1 AND $cat != 2){
		$query .= "WHERE owner = ".$forum_user['id']." ";
		$query .= "AND cat = ".$cat." ";
	}else{
		$query .= "WHERE cat = ".$cat." ";
	}
}else{
	$query .= "WHERE owner = ".$forum_user['id']." ";
}
$query .= "ORDER BY id DESC LIMIT ".$PremiereImageAAfficher.",".$NombreDImageParPage."";

$requete = mysql_query($query);
$i = 0;
while($resultImages = mysql_fetch_array($requete)){
	$images[$i]['id'] = $resultImages['id'];
	$images[$i]['owner'] = $resultImages['owner'];
	$images[$i]['cat'] = $resultImages['cat'];
	$images[$i]['name'] = $resultImages['name'];
	$images[$i]['ext'] = $resultImages['ext'];
	$images[$i]['largeur'] = $resultImages['largeur'];
	$images[$i]['hauteur'] = $resultImages['hauteur'];
	$images[$i]['time'] = $resultImages['time'];

	$i++;
}

$imagesSurPage = count($images);
$addcat = $config['baseurl'].'addcat.php';
$addpix = $config['baseurl'].'addpix.php';

?>
<div id="main"><!-- MAIN -->
	<div class="content"><!-- CONTENT -->
		<div id="pix_categories">
			<H1 id="titrepixcategories">VOS CATEGORIES [<a href="#" id="togglecategory">+</a>]</H1>
			<div id="categories">
				<div id="formcategory">
					<form name="addcategory" method="POST" action="addcat.php">
						<input type="text" id="inputcategory" name="category" MAXLENGTH="25" value="Ajouter une catégorie" onfocus="if (this.value == 'Ajouter une catégorie') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Ajouter une catégorie';}" />
						<input type="hidden" name="form_sent" value="1" />
						<input type="hidden" name="csrf_token" value="<?php echo generate_form_token($addcat); ?>" />
					</form>
				</div>
				<ul>
					<?php
						if($nbrecats > 0){
							for($i = 0; $i < $nbrecats; $i++){
								echo '<li><a href="pix.php?c='.$cats[$i]['id'].'">'.$cats[$i]['title'].'</a><span class="nbrpix border2">'.$cats[$i]['nbrpix'].'</span></li>';
							}
						}
					?>
				</ul>
			</div>
		</div>
		<div id="bibli">
			<div id="pixbar">
				<div id="pixbarcontent">
					<form action="addpix.php" method="post" enctype="multipart/form-data">
					    <input type="file" name="pix" size="60" accept="image/*">
					    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
					    <input type="hidden" name="form_sent" value="1" />
					    <input type="hidden" name="csrf_token" value="<?php echo generate_form_token($addpix); ?>" />
					    <select name="cat">
					    	<option value="0">Pas de catégorie</option>
						    <?php
						    	if($nbrecats > 0){
						    		for($i = 0; $i < $nbrecats; $i++){
						    			echo '<option value="'.$cats[$i]['id'].'">'.$cats[$i]['title'].'</option>';
						    		}
						    	}
						    ?>
					    </select>
					    <input type="submit" value="Envoyer" />
					</form>
				</div>
		</div>
		<?php
		for($j = 0; $j < $imagesSurPage; $j++){
			echo '<div class="pix">';
			if($images[$j]['largeur'] > 150 AND $images[$j]['hauteur'] > 150){
				echo '<a href="pixview.php?n='.$images[$j]['name'].'"><img src="'.$config['baseurl'].'upload/'.$images[$j]['owner'].'/'.$images[$j]['cat']."/t/".$images[$j]['name'].'_t.'.$images[$j]['ext'].'" /></a>';
			}else{
				echo '<a href="pixview.php?n='.$images[$j]['name'].'"><img src="'.$config['baseurl'].'upload/'.$images[$j]['owner'].'/'.$images[$j]['cat']."/".$images[$j]['name'].'.'.$images[$j]['ext'].'" /></a>';
			}
			echo "</div>";
		}
		?>
		</div>
			<script text="javascript">
				$("#togglecategory").click(function () {
					var display = $("#formcategory").css("display");
					if(display == "none"){
						$("#formcategory").css("display","block");
					}else{
						$("#formcategory").css("display","none");
					}
				});
			</script>
		</div>
	</div>
</div>