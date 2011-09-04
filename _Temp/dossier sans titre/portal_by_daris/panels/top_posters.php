<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


$count = 5; // count users
$guest = true; // display guest


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

$query = array(
	'SELECT'	=> 'u.id, u.username, u.num_posts',
	'FROM'		=> 'users AS u',
	'ORDER BY'	=> 'u.num_posts DESC',
	'LIMIT'		=> '0, '.$count
);

if (!$guest)
	$query['WHERE'] = 'u.id<>1';

($hook = get_hook('pr_qr_get_top_posters')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

?>
		<ul class="top-posters">
<?php

while ($cur_user = $forum_db->fetch_assoc($result))
{

?>
			<li><a href="<?php echo forum_link($forum_url['user'], array($cur_user['id'])) ?>"><?php echo forum_htmlencode($cur_user['username']) ?></a> (<?php echo $lang_common['Posts'] ?>: <?php echo $cur_user['num_posts'] ?>)</li>
<?php

}

?>
		</ul>

