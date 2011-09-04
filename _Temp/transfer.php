<?php
//require '../inc/config.php';
require '../inc/functions.php';
//connect_to_db();
require 'chat.db';
//echo '<pre>';
//print_r($msg);
//echo '</pre>';
$nbreMessages = count_value_array($msg);
//echo $nbreMessages;
$i = 0;
while($i <= $nbreMessages - 1){
	echo "INSERT INTO ext_shouts(id, sender, sender_id, sender_ip, message, shouted, trusted) VALUES";
	echo "('', '".mysql_real_escape_string($msg[$i]['pseudo'])."', '666', '1.2.3.4', '".mysql_real_escape_string($msg[$i]['texte'])."', '".$msg[$i]['date']."', '1');<br />";
	$i++;
}
?>