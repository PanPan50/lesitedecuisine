<?php

define('FORUM_PANELS_LOADED', 1);

$forum_panels = array (
  0 => 
  array (
    0 => 
    array (
      'name' => '<a href="tribune.php">La Tribune</a>',
      'position' => '0',
      'content' => '<style type="text/css">
	.chat {
		overflow: hidden;
max-height:2000px;
	}
	#miniform {
	}
	.date {
	}
	.chat a {
text-decoration:none;
	}
	.msg {
	}
.post {
border:0;
}
input {
width:100%;
}

</style>
<?php

	$msg = array();

	function file_save($filename, $content, $flags = 0) {
		if (!($file = fopen($filename, \'w\')))
			return false;
		
			$n = fwrite($file, $content);
			fclose($file);
			return $n ? $n : false;
	}

	if (!file_exists("chat.db")) file_save("chat.db","<?php\\n\\$msg = ".var_export($msg,TRUE)."\\n?>");

	include "chat.db";

	while (count($msg) >= 10000) array_shift($msg);

	if (!empty($_POST[\'mess\']) && !empty($_POST[\'pseudo\']) && ($_POST[\'pseudo\'] != "guest") ) {
		$i = count($msg);
		$msg[$i][\'pseudo\'] = $_POST[\'pseudo\'];
		$msg[$i][\'texte\'] = htmlentities($_POST[\'mess\'], null, \'UTF-8\');
		$msg[$i][\'date\'] = time();
		$msg[$i][\'id\'] =  $forum_user[\'id\'];
$msg[$i][\'bite\'] = 0;

	file_save("chat.db", "<?php\\n\\$msg = ".var_export($msg,TRUE)."\\n?>");

// Modif de PanPan !!!
	$connect_to_db = mysql_connect("localhost", "asile_forum_dev", "zzuGBLbGDxbxQsV8");
	mysql_set_charset(\'utf8\');
	mysql_select_db("asile_forum_dev");
	if(!$connect_to_db){
	    header("location: errors.php?k=sql3");
	    exit;
	}
	$insertshout = mysql_query("INSERT INTO ext_shouts
	                            (sender, sender_id, sender_ip, message, shouted)
	                            VALUES
	                            (\'".$msg[$i][\'pseudo\']."\', \'".$msg[$i][\'id\']."\', \'1.2.3.4\', \'".mysql_real_escape_string($_POST[\'mess\'])."\', \'".$msg[$i][\'date\']."\')
	                           ");
	mysql_close($connect_to_db);
	// Fin de modif de PanPan


header("Location: ./");

	}

	$msg2 = array_reverse($msg);

	function currentPageURL() {
		$curpageURL = \'http\';
		
		if ($_SERVER["HTTPS"] == "on") $curpageURL.= "s";
		
		$curpageURL.= "://";
		
		if ($_SERVER["SERVER_PORT"] != "80") {
			$curpageURL.= $_SERVER[\'HTTP_HOST\'].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$curpageURL.= $_SERVER[\'HTTP_HOST\'].$_SERVER["REQUEST_URI"];
		}
		
		return $curpageURL;
	}

?>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$(\'#load_tweets\').load(\'rain_count2.php?id=<?php echo count($msg);?>\');
}, 10000);

           $(document).ready(function(){
             $(".date").click(function () {

                var value = \'@\' + $(this).text() + \' \';
	  $("#input-msg").val(value);
             });
        });

</script>
<div class="miniform">

<?php
	if ($forum_user[\'username\'] != "guest") {
		?>
		<form method="post" action="<?php echo currentPageURL(); ?>">
			<input type="hidden" name="pseudo" value="<?php echo $forum_user[\'username\']; ?>">
			<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(currentPageURL()); ?>" />
			<input type="text" class="form" id="input-msg" name="mess" />
		</form>
		<?php
	}
?>
</div>
<br/>
<?php
	$pattern = "/(http|https|ftp|ftps)\\:\\/\\/[a-zA-Z0-9\\-\\.]+\\.[a-zA-Z]{2,3}(\\/\\S*)?/";
	echo \'<div class="chat"><div id="load_tweets"></div>\';
	foreach ($msg2 as $message) {
		$texte = nl2br(preg_replace($pattern, "<a href=\\"\\\\0\\" rel=\\"nofollow\\">[url]</a>", $message[\'texte\']));
		echo \'<span class="date">\'.date("H:i",$message[\'date\']).\'</span> <span class="pseudo"><a href="profile.php?id=\'.$message[\'id\'].\'">\'.$message[\'pseudo\'].\'</a></span> : <span class="msg">\'.$texte.\'</span><br />\';
	}
	echo "</div>";


?>',
      'file' => '',
    ),
  ),
);

?>