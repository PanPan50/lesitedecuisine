<?php
header('Content-type: text/html; charset=utf-8');
define('FORUM_ROOT', '/usr/local/www/vhosts/lesitedecuisine.fr/forum_v2/');
require FORUM_ROOT.'include/common.php';
// If user is logged display some informations about it
if (!$forum_user['is_guest'])
{
	require FORUM_ROOT.'lang/'.$forum_user['language'].'/index.php';

	// Collect some statistics from the database
	$query = array(
		'SELECT'	=> 'COUNT(u.id)-1',
		'FROM'		=> 'users AS u'
	);

	($hook = get_hook('xn_portal_by_daris_wio_qr_get_user_count')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	if ($forum_config['o_users_online'] == '1')
	{
		// Fetch users online info and generate strings for output
		$query = array(
			'SELECT'	=> 'o.user_id, o.ident',
			'FROM'		=> 'online AS o',
			'WHERE'		=> 'o.idle=0',
			'ORDER BY'	=> 'o.ident'
		);
		($hook = get_hook('xn_portal_by_daris_wio_qr_get_users_online')) ? eval($hook) : null;
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		$num_guests = 0;
		$users = array();

		while ($forum_user_online = $forum_db->fetch_assoc($result))
		{
			($hook = get_hook('xn_portal_by_daris_wio_add_online_user_loop')) ? eval($hook) : null;

			if ($forum_user_online['user_id'] > 1) {
				if (forum_htmlencode($forum_user_online['user_id'] == 513)) {
					$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'"><img src="images/ban.png" /> PATTON</a>';
				} elseif (forum_htmlencode($forum_user_online['ident'] == "STANYMALL")) {
					$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'"><img src="images/tr.png" /> STANYMALL</a>';
				} elseif (forum_htmlencode($forum_user_online['ident'] == "Mml-sama")) {
					$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'" style="color:pink;text-decoration:blink;"><img src="images/heart.png" /> Mml-sama</a>';
				} else {
					$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'">'.forum_htmlencode($forum_user_online['ident']).'</a>';
				}
			} else {
				++$num_guests;
			}
		}

		// If there are registered users logged in, list them
		if (count($users) > 0)
			$users_online = '<li>'.implode('</li><li>', $users).'</li>';
	}
	
	if (isset($users_online)) : echo $users_online; endif; 

}

?>