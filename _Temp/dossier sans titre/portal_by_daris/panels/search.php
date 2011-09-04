<?php
/***********************************************************************

	FluxBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

require FORUM_ROOT.'lang/'.$forum_user['language'].'/search.php';

?>
			<form class="frm-form" method="get" accept-charset="utf-8" action="<?php echo forum_link($forum_url['search']) ?>">
				<div class="hidden">
					<input type="hidden" name="action" value="search" />
				</div>
				<div class="panel-input">
					<input type="text" name="keywords" maxlength="100" /><br />
				</div>
				<div class="panel-input">
					<?php echo $lang_search['Display results'] ?><br />
					<select name="show_as">
						<option value="topics"><?php echo $lang_search['Show as topics'] ?></option>
						<option value="posts"><?php echo $lang_search['Show as posts'] ?></option>
					</select>
				</div>
				<div>
					<input type="submit" name="search" value="<?php echo $lang_portal['Submit search'] ?>" accesskey="s" title="Accesskey: s" />
				</div>
			</form>
<?php

