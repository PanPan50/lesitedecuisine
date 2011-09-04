<script type="text/javascript">
  $(document).ready(function(){
             $(".date").click(function () {

                var value = '@' + $(this).text();
	  $("#input-msg").val(value);
             });
        });
</script>
<?php
	$msg = array();
	include "chat.db";
	$old = $_GET['id'];
	$new = count($msg);
	$msg = array_reverse($msg);
	if ($new > $old)
	{
		$count = ($new - $old);
			if ($count == 1)
			{
				$pseudo = $msg[0]['pseudo'];
				$texte = $msg[0]['texte'];
				$date = $msg[0]['date'];
				$id = $msg[0]['id'];
				$texte = nl2br(ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">[url]</a>", $texte));
				echo '<span class="date">'.date("H:i",$date).'</span> <span class="pseudo"><a href="profile.php?id='.$id.'">'.$pseudo.'</a></span> : <span class="msg">'.$texte.'</span>';
			} else {
				for ( $counter = 0; $counter < $count; $counter += 1) {
					$pseudo = $msg[$counter]['pseudo'];
					$texte = $msg[$counter]['texte'];
					$date = $msg[$counter]['date'];
					$id = $msg[$counter]['id'];
					$texte = nl2br(ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">[url]</a>", $texte));
					if ($counter != 0) { echo '<br/>'; }
					echo '<span class="date">'.date("H:i",$date).'</span> <span class="pseudo"><a href="profile.php?id='.$id.'">'.$pseudo.'</a></span> : <span class="msg">'.$texte.'</span>';
				}
			}
	} 
?>