<?php
    // Pour afficher les variables concernant le visiteur
    //echo '<pre>';
    //print_r($forum_user);
    //print_r($viewShouts);
    //echo '</pre>';
?>
<!-- FOOTER -->
<div id="footer">
</div>
<script type="text/javascript">
$(function() {
	// Use this example, or...
	$('a[rel=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
	// This, or...

});

$("#search").click(function () {
  $("#optionbarcontent").replaceWith("<div id='optionbarcontent'><form id='tribunesearch' method='post' action='tribunesearch.php'><input type='text' id='what' name='what' value='Chercher' onfocus=\"if (this.value == 'Chercher') {this.value = '';}\" onblur=\"if (this.value == '') {this.value = 'Chercher';}\" /><input type='submit' name='submitsearch' value='Check' /></form></div>");
});

$(".shout").mouseover(function () {
    $('.shoutoptions', this).css("display","block");
});
  
$(".shout").mouseout(function () {
    $('.shoutoptions', this).css("display","none");
});

$("#archives").click(function () {
	$("#optionbar").css("display","block");
 	$("#optionbarcontent").load("inc/ajax.calendar.php");
});
   
var auto_refresh = setInterval(
	function(){
		$('#users').load('inc/ajax.online.php');
		$('#posts').load('inc/ajax.lastposts.php');
	}, 15000);

$("#tribunesearch").submit(function() {
	var what = $("#shoutbox input#message").val();
	$("#tribunesearch input#what").attr('value', what);
	return true;
 });

</script>
</body>
</html>