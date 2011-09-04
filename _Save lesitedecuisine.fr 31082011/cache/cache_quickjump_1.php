<?php

if (!defined('FORUM')) exit;
define('FORUM_QJ_LOADED', 1);
$forum_id = isset($forum_id) ? $forum_id : 0;

?><form id="qjump" method="get" accept-charset="utf-8" action="http://www.lesitedecuisine.fr/viewforum.php">
	<div class="frm-fld frm-select">
		<label for="qjump-select"><span><?php echo $lang_common['Jump to'] ?></span></label><br />
		<span class="frm-input"><select id="qjump-select" name="id">
			<optgroup label="Privé">
				<option value="4"<?php echo ($forum_id == 4) ? ' selected="selected"' : '' ?>>Le forum des élus</option>
				<option value="24"<?php echo ($forum_id == 24) ? ' selected="selected"' : '' ?>>Petits échanges entre amis</option>
				<option value="35"<?php echo ($forum_id == 35) ? ' selected="selected"' : '' ?>>Stratégies jeux en ligne PGM RUSH MIDDLE</option>
				<option value="38"<?php echo ($forum_id == 38) ? ' selected="selected"' : '' ?>>Bière &amp; putes</option>
			</optgroup>
			<optgroup label="Public">
				<option value="7"<?php echo ($forum_id == 7) ? ' selected="selected"' : '' ?>>Suggestions et Idées en Vrac</option>
				<option value="9"<?php echo ($forum_id == 9) ? ' selected="selected"' : '' ?>>Questions / Réponses</option>
				<option value="42"<?php echo ($forum_id == 42) ? ' selected="selected"' : '' ?>>60 millions de connards</option>
				<option value="10"<?php echo ($forum_id == 10) ? ' selected="selected"' : '' ?>>Liens à la con</option>
				<option value="29"<?php echo ($forum_id == 29) ? ' selected="selected"' : '' ?>>Ask Sac à Mouille !</option>
				<option value="12"<?php echo ($forum_id == 12) ? ' selected="selected"' : '' ?>>Le coin du spoiler</option>
				<option value="3"<?php echo ($forum_id == 3) ? ' selected="selected"' : '' ?>>La déconne</option>
				<option value="31"<?php echo ($forum_id == 31) ? ' selected="selected"' : '' ?>>Vide Grenier</option>
			</optgroup>
			<optgroup label="Les Zlogs">
				<option value="23"<?php echo ($forum_id == 23) ? ' selected="selected"' : '' ?>>La une</option>
				<option value="41"<?php echo ($forum_id == 41) ? ' selected="selected"' : '' ?>>Le petit bassin</option>
				<option value="11"<?php echo ($forum_id == 11) ? ' selected="selected"' : '' ?>>Ma vie de Cancrelat</option>
				<option value="19"<?php echo ($forum_id == 19) ? ' selected="selected"' : '' ?>>Culture &amp; médias</option>
				<option value="22"<?php echo ($forum_id == 22) ? ' selected="selected"' : '' ?>>Jeux</option>
				<option value="18"<?php echo ($forum_id == 18) ? ' selected="selected"' : '' ?>>Informatique</option>
				<option value="21"<?php echo ($forum_id == 21) ? ' selected="selected"' : '' ?>>Cuisine</option>
				<option value="37"<?php echo ($forum_id == 37) ? ' selected="selected"' : '' ?>>Sport</option>
				<option value="14"<?php echo ($forum_id == 14) ? ' selected="selected"' : '' ?>>Fight club</option>
			</optgroup>
			<optgroup label="Roleplay">
				<option value="39"<?php echo ($forum_id == 39) ? ' selected="selected"' : '' ?>>Picool Productions</option>
				<option value="33"<?php echo ($forum_id == 33) ? ' selected="selected"' : '' ?>>Paracons.be</option>
			</optgroup>
			<optgroup label="Forums honteusement copiés ailleurs">
				<option value="27"<?php echo ($forum_id == 27) ? ' selected="selected"' : '' ?>>Reporter de Guerre</option>
				<option value="30"<?php echo ($forum_id == 30) ? ' selected="selected"' : '' ?>>La necro</option>
				<option value="26"<?php echo ($forum_id == 26) ? ' selected="selected"' : '' ?>>Jouer sur le net ou IRL</option>
			</optgroup>
			<optgroup label="Réservé aux adultes">
				<option value="6"<?php echo ($forum_id == 6) ? ' selected="selected"' : '' ?>>Du cul en vrac.</option>
				<option value="15"<?php echo ($forum_id == 15) ? ' selected="selected"' : '' ?>>Reviews de Flimes</option>
			</optgroup>
		</select>
		<input type="submit" value="<?php echo $lang_common['Go'] ?>" onclick="return Forum.doQuickjumpRedirect(forum_quickjump_url, sef_friendly_url_array);" /></span>
	</div>
</form>
<script type="text/javascript">
		var forum_quickjump_url = "http://www.lesitedecuisine.fr/viewforum.php?id=$1";
		var sef_friendly_url_array = new Array(28);
	sef_friendly_url_array[4] = "le-forum-des-elus";
	sef_friendly_url_array[24] = "petits-echanges-entre-amis";
	sef_friendly_url_array[35] = "strategies-jeux-en-ligne-pgm-rush-middle";
	sef_friendly_url_array[38] = "biere-putes";
	sef_friendly_url_array[7] = "suggestions-et-idees-en-vrac";
	sef_friendly_url_array[9] = "questions-reponses";
	sef_friendly_url_array[42] = "60-millions-de-connards";
	sef_friendly_url_array[10] = "liens-a-la-con";
	sef_friendly_url_array[29] = "ask-sac-a-mouille";
	sef_friendly_url_array[12] = "le-coin-du-spoiler";
	sef_friendly_url_array[3] = "la-deconne";
	sef_friendly_url_array[31] = "vide-grenier";
	sef_friendly_url_array[23] = "la-une";
	sef_friendly_url_array[41] = "le-petit-bassin";
	sef_friendly_url_array[11] = "ma-vie-de-cancrelat";
	sef_friendly_url_array[19] = "culture-medias";
	sef_friendly_url_array[22] = "jeux";
	sef_friendly_url_array[18] = "informatique";
	sef_friendly_url_array[21] = "cuisine";
	sef_friendly_url_array[37] = "sport";
	sef_friendly_url_array[14] = "fight-club";
	sef_friendly_url_array[39] = "picool-productions";
	sef_friendly_url_array[33] = "paraconsbe";
	sef_friendly_url_array[27] = "reporter-de-guerre";
	sef_friendly_url_array[30] = "la-necro";
	sef_friendly_url_array[26] = "jouer-sur-le-net-ou-irl";
	sef_friendly_url_array[6] = "du-cul-en-vrac";
	sef_friendly_url_array[15] = "reviews-de-flimes";
</script>
