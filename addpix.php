<?php
define('FORUM_ROOT', 'forum/');
require 'forum/include/common.php';
require 'inc/config.php';
require 'inc/functions.php';

// On commence par vérifier que l'user est bien un trusted fool ou admin !
if($forum_user['group_id'] != 1 AND $forum_user['group_id'] != 5){
	header("location: index.php");
	exit();
}

// On vérifie si oui ou non il a choisi une catégorie
if(!isset($_POST['cat'])){
	header("location: index.php?v=pasdecategorie");
	exit();
}
$cat = intval($_POST['cat']);

// On vérifie ensuite qu'il a bien envoyé qqchose !
if(!isset($_FILES['pix'])){
	header("location: index.php?v=pasdefichier");
	exit();
}

// On vérifie qu'il n'y a pas eu d'erreur à l'upload
if($_FILES['pix']['error'] > 0){
	header("location: index.php?v=erreurupload");
	exit();
}
// On vérifie la taille < 5Mo
if($_FILES['pix']['size'] > 5000000){
	header("location: index.php?v=tropgros");
	exit();
}

// On vérifie rapidement si c'est bien une image en checkant l'extension ! Ca n'a pas grande valeur....
$ExtensionsAutorisees = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
$extension = substr(strrchr($_FILES['pix']['name'], '.'), 1);

if(!in_array($extension, $ExtensionsAutorisees)){
	header("location: index.php?v=mauvaiseextension");
	exit();
}

// On vérifie mieux avec imagetype : 1 - IMAGETYPE_GIF, 2 - IMAGETYPE_JPEG, 3 - IMAGETYPE_PNG
$InfoImage = getimagesize($_FILES['pix']['tmp_name']);
$LargeurImage = $InfoImage['0'];
$HauteurImage = $InfoImage['1'];
$ImageType = $InfoImage['2'];

if(($ImageType != '1') AND ($ImageType != '2') AND ($ImageType != '3')){
	header("location: index.php?v=cestpasuneimage");
	exit();
}

// On vérifie que les répertoires d'upload sont bien créés, le premier pour le répertoir utilisateur = id
if(!is_dir($config['uploadpath'].$forum_user['id'])){
	
	// On va ajouter un fichier .php pour une redirection, pour na pas lister les fichiers à la volée !
    $ContenuFichierSecurite = "<?php header(\"location: ../../index.php\") ; " ;
    $ContenuFichierSecuriteThumb = "<?php header(\"location: ../../../index.php\") ; " ;
    
    // On créé les répertoires
    $CreationDirectory = mkdir($config['uploadpath'].$forum_user['id'], 0755) ;
    $CreationDirectoryThumb = mkdir($config['uploadpath'].$forum_user['id'].'/t', 0755) ;
    
    // On ajoute les fichiers index.php
    $CreationFichierSecurite = fopen($config['uploadpath'].$forum_user['id'].'/index.php', "x+") ;
    $EcritureFichierSecurite = fwrite($CreationFichierSecurite, $ContenuFichierSecurite) ;
    $FermetureFichierSecurite = fclose($CreationFichierSecurite) ;
    $CreationFichierSecuriteThumb = fopen($config['uploadpath'].$forum_user['id'].'/t/index.php', "x+") ;
    $EcritureFichierSecuriteThumb = fwrite($CreationFichierSecuriteThumb, $ContenuFichierSecuriteThumb) ;
    $FermetureFichierSecuriteThumb = fclose($CreationFichierSecuriteThumb) ;
}

// Même chose pour les catégories !
if(!is_dir($config['uploadpath'].$forum_user['id'].'/'.$cat)){
	
	// On va ajouter un fichier .php pour une redirection, pour na pas lister les fichiers à la volée !
    $ContenuFichierSecuriteCat = "<?php header(\"location: ../../../index.php\") ; " ;
    $ContenuFichierSecuriteThumbCat = "<?php header(\"location: ../../../../index.php\") ; " ;
    
    // On créé les répertoires
    $CreationDirectory = mkdir($config['uploadpath'].$forum_user['id'].'/'.$cat, 0755) ;
    $CreationDirectoryThumb = mkdir($config['uploadpath'].$forum_user['id'].'/'.$cat.'/t', 0755) ;
    
    // On ajoute les fichiers index.php
    $CreationFichierSecurite = fopen($config['uploadpath'].$forum_user['id'].'/'.$cat.'/index.php', "x+") ;
    $EcritureFichierSecurite = fwrite($CreationFichierSecurite, $ContenuFichierSecuriteCat) ;
    $FermetureFichierSecurite = fclose($CreationFichierSecurite) ;
    $CreationFichierSecuriteThumb = fopen($config['uploadpath'].$forum_user['id'].'/'.$cat.'/t/index.php', "x+") ;
    $EcritureFichierSecuriteThumb = fwrite($CreationFichierSecuriteThumb, $ContenuFichierSecuriteThumbCat) ;
    $FermetureFichierSecuriteThumb = fclose($CreationFichierSecuriteThumb) ;
}


// On va maintenant s'occuper de l'image ! On commence par lui trouver un petit nom !
$NomImageUploadee = generate_uniq_key(10);

// Est-ce que l'image est plus petite que 150 x 150 ?
// Si oui on ne créé pas de miniature pour le listage des images ! On l'envoie directe !!
if($LargeurImage < 150 AND $HauteurImage < 150){
    move_uploaded_file($_FILES['pix']['tmp_name'], $config['uploadpath'].$forum_user['id'].'/'.$cat."/".$NomImageUploadee.'.'.$extension);
    // Et on insére dans la base de donnée !
    connect_to_db();
    $query = mysql_query("
    						INSERT INTO pix_pix 
    						(owner, cat, name, ext, largeur, hauteur, time) 
    						VALUES('".$forum_user['id']."', '".$cat."', '".$NomImageUploadee."', '".$extension."', '".$LargeurImage."', '".$HauteurImage."', ".time().")
    					");
    					
	// On ajoute 1 image dans la catégorie
	$add = mysql_query(" UPDATE pix_cat SET nbrpix = nbrpix + 1 WHERE id = $cat ");
	mysql_close();
	header("location: pixview.php?n=$NomImageUploadee");
	exit();
}

// Est-ce que l'image est plus petite que 640 x 640 ?
// Si oui on créé une miniature pour le listage des images !
// Mais pas de miniature pour l'image !
elseif($LargeurImage < 640 AND $HauteurImage < 640){
	
	// On calcule les infos de redimensionnement
    // Hauteur plus grande que largeur !
    if($LargeurImage < $HauteurImage){
    	
        $RatioRedimensionnement = $HauteurImage / 150;
        $HauteurThumbListage = 150;
        $LargeurThumbListage = $LargeurImage / $RatioRedimensionnement;
        
    // Largeur plus grande que hauteur !
    }elseif($HauteurImage < $LargeurImage){
    
    	$RatioRedimensionnement = $LargeurImage / 150;
    	$LargeurThumbListage = 150;
    	$HauteurThumbListage = $HauteurImage / $RatioRedimensionnement;
    
    // Hauteur = largeur !
    }else{
    
        $LargeurThumbListage = 150;
        $HauteurThumbListage = 150;
        
    }
    
    // On va créer la miniature !
    // Il s'agit d'un gif
    if($ImageType == 1){
    
        $FondImageThumb = imagecreate($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefromgif($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage);
        imagegif($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);
        
    // S'il s'agit d'une image jpeg
    }elseif($ImageType == 2){
    
        $FondImageThumb = imagecreatetruecolor($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefromjpeg($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage ) ;
        imagejpeg($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);
        
    // C'est une image png
    }else{
    
        $FondImageThumb = imagecreatetruecolor($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefrompng($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage );
        imagepng($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);
        
    }

    move_uploaded_file($_FILES['pix']['tmp_name'], $config['uploadpath'].$forum_user['id'].'/'.$cat."/".$NomImageUploadee.'.'.$extension);
    // Et on insére dans la base de donnée !
    connect_to_db();
    $query = mysql_query("
    						INSERT INTO pix_pix 
    						(owner, cat, name, ext, largeur, hauteur, time) 
    						VALUES('".$forum_user['id']."', '".$cat."', '".$NomImageUploadee."', '".$extension."', '".$LargeurImage."', '".$HauteurImage."', ".time().")
    					");
    					
	// On ajoute 1 image dans la catégorie
	$add = mysql_query("
							UPDATE pix_cat 
							SET nbrpix = nbrpix + 1 
							WHERE id = $cat
						");
						mysql_close();
    					
    header("location: pixview.php?n=$NomImageUploadee");
    exit();
}


// L'image est strictement plus grande que 640 x 640
// On va donc créer une miniature pour le listage
// Et une miniature pour l'image elle-même !
else{

    // Hauteur plus grande que largeur !
    if($LargeurImage < $HauteurImage){
    
        $RatioRedimensionnement = $HauteurImage / 150;
        $HauteurThumbListage = 150;
        $LargeurThumbListage = $LargeurImage / $RatioRedimensionnement;
        $RatioRedimensionnement2 = $HauteurImage / 400;
        $HauteurThumb = 400;
        $LargeurThumb = $LargeurImage / $RatioRedimensionnement2;
        
	}
	// Largeur plus grande que hauteur !
	elseif($HauteurImage < $LargeurImage){
	
	    $RatioRedimensionnement = $LargeurImage / 150;
	    $LargeurThumbListage = 150;
	    $HauteurThumbListage = $HauteurImage / $RatioRedimensionnement;
	    $RatioRedimensionnement2 = $HauteurImage / 400;
	    $HauteurThumb = 400;
	    $LargeurThumb = $LargeurImage / $RatioRedimensionnement2;
	    
	}
	// Hauteur = largeur !
	else{
	
	    $LargeurThumbListage = 150;
	    $HauteurThumbListage = 150;
	    $HauteurThumb = 400;
	    $LargeurThumb = 400;
	    
	}
	
	// On va créer les images !
    // S'il s'agit d'une image gif
    if($ImageType == 1){
    
        // On créé la minitiature pour le listage !
        $FondImageThumb = imagecreate($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefromgif($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage );
        imagegif($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);
        
        // on créé la miniature pour l'image
        $FondImageThumb2 = imagecreatetruecolor($LargeurThumb, $HauteurThumb);
        $ImageRedimensionnee2 = imagecreatefromgif($_FILES['pix']['tmp_name']);
        $Blanc = imagecolorallocate($ImageRedimensionnee2, 255, 255, 255);
        $Gris = imagecolorallocate($ImageRedimensionnee2, 128, 128, 128);
        imagecopyresampled($FondImageThumb2, $ImageRedimensionnee2, 0, 0, 0, 0, $LargeurThumb, $HauteurThumb, $LargeurImage, $HauteurImage );
        imagefilledrectangle($FondImageThumb2, 0, 0, $LargeurThumb, 20, 000000);
        imagettftext($FondImageThumb2, 10, 0, 6, 15, $Gris, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagettftext($FondImageThumb2, 10, 0, 5, 14, $Blanc, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagegif($FondImageThumb2, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t2.'.$extension, 75);
        
    // S'il s'agit d'une image jpeg
    }elseif($ImageType == 2){
    
        // On créé la minitiature pour le listage !
        $FondImageThumb = imagecreatetruecolor($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefromjpeg($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage );
        imagejpeg($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);
        
        // on créé la miniature pour l'image
        $FondImageThumb2 = imagecreatetruecolor($LargeurThumb, $HauteurThumb);
        $ImageRedimensionnee2 = imagecreatefromjpeg($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb2, $ImageRedimensionnee2, 0, 0, 0, 0, $LargeurThumb, $HauteurThumb, $LargeurImage, $HauteurImage );
        imagefilledrectangle($FondImageThumb2, 0, 0, $LargeurThumb, 20, 000000);
        $Blanc = imagecolorallocate($ImageRedimensionnee2, 255, 255, 255);
        $Gris = imagecolorallocate($ImageRedimensionnee2, 128, 128, 128);
        imagettftext($FondImageThumb2, 10, 0, 6, 15, $Gris, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagettftext($FondImageThumb2, 10, 0, 5, 14, $Blanc, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagejpeg($FondImageThumb2, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t2.'.$extension, 75);
        
    // C'est une image png
    }else{
    
        // On créé la minitiature pour le listage !
        $FondImageThumb = imagecreatetruecolor($LargeurThumbListage, $HauteurThumbListage);
        $ImageRedimensionnee = imagecreatefrompng($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb, $ImageRedimensionnee, 0, 0, 0, 0, $LargeurThumbListage, $HauteurThumbListage, $LargeurImage, $HauteurImage );
        imagepng($FondImageThumb, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t.'.$extension, 75);

        // on créé la miniature pour l'image
        $FondImageThumb2 = imagecreatetruecolor($LargeurThumb, $HauteurThumb);
        $ImageRedimensionnee2 = imagecreatefrompng($_FILES['pix']['tmp_name']);
        imagecopyresampled($FondImageThumb2, $ImageRedimensionnee2, 0, 0, 0, 0, $LargeurThumb, $HauteurThumb, $LargeurImage, $HauteurImage );
        imagefilledrectangle($FondImageThumb2, 0, 0, $LargeurThumb, 20, 000000);
        $Blanc = imagecolorallocate($ImageRedimensionnee2, 255, 255, 255);
        $Gris = imagecolorallocate($ImageRedimensionnee2, 128, 128, 128);
        imagettftext($FondImageThumb2, 10, 0, 6, 15, $Gris, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagettftext($FondImageThumb2, 10, 0, 5, 14, $Blanc, 'arial.ttf', 'Taille réelle de l\'image : '.$LargeurImage.' x '.$HauteurImage);
        imagepng($FondImageThumb2, $config['uploadpath'].$forum_user['id'].'/'.$cat."/t/".$NomImageUploadee.'_t2.'.$extension, 75);
    }
    
    move_uploaded_file($_FILES['pix']['tmp_name'], $config['uploadpath'].$forum_user['id'].'/'.$cat."/".$NomImageUploadee.'.'.$extension);
    // Et on insére dans la base de donnée !
    connect_to_db();
    $query = mysql_query("
    						INSERT INTO pix_pix 
    						(owner, cat, name, ext, largeur, hauteur, time) 
    						VALUES('".$forum_user['id']."', '".$cat."', '".$NomImageUploadee."', '".$extension."', '".$LargeurImage."', '".$HauteurImage."', ".time().")
    					");
    					
    // On ajoute 1 image dans la catégorie
    $add = mysql_query("
    						UPDATE pix_cat 
    						SET nbrpix = nbrpix + 1 
    						WHERE id = $cat
    					");
    mysql_close();
    					
    header("location: pixview.php?n=$NomImageUploadee");
    exit();
}


?>