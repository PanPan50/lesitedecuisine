<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;


// If user is logged display some informations about it
if (!$forum_user['is_guest'])
{
	require FORUM_ROOT.'lang/'.$forum_user['language'].'/index.php';

	$stats_list = $stats_online = array();

	// Collect some statistics from the database
	$query = array(
		'SELECT'	=> 'COUNT(u.id)-1',
		'FROM'		=> 'users AS u'
	);

	($hook = get_hook('xn_portal_by_daris_wio_qr_get_user_count')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	$stats['total_users'] = $forum_db->result($result);

	$query = array(
		'SELECT'	=> 'SUM(f.num_topics), SUM(f.num_posts)',
		'FROM'		=> 'forums AS f'
	);

	($hook = get_hook('xn_portal_by_daris_wio_qr_get_post_stats')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	list($stats['total_topics'], $stats['total_posts']) = $forum_db->fetch_row($result);

	$stats_list[] = '<li>'.$lang_portal['Users'].': <strong>'. $stats['total_users'].'</strong></li>';
	$stats_list[] = '<li>'.$lang_portal['Topics'].': <strong>'.intval($stats['total_topics']).'</strong></li>';
	$stats_list[] = '<li>'.$lang_portal['Posts'].': <strong>'.intval($stats['total_posts']).'</strong></li>';


	($hook = get_hook('xn_portal_by_daris_wio_pre_users_online')) ? eval($hook) : null;

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

			if ($forum_user_online['user_id'] > 1)
				$users[] = '<a href="'.forum_link($forum_url['user'], $forum_user_online['user_id']).'">'.forum_htmlencode($forum_user_online['ident']).'</a>';
			else
				++$num_guests;
		}

		// If there are registered users logged in, list them
		if (count($users) > 0)
			$users_online = '<p><strong>'.$lang_portal['Online'].'</strong> '.implode(', ', $users).'</p>';

		$stats_online[] = '<li>'.$lang_portal['Users online'].': <strong>'.count($users).'</strong></li>';
		$stats_online[] = '<li>'.$lang_portal['Guests online'].': <strong>'.$num_guests.'</strong></li>';
	}
	
	$avatar = generate_avatar_markup($forum_user['id']);

?>
			<?php echo $lang_portal['Welcome'] ?>: <strong><?php echo forum_htmlencode($forum_user['username']) ?></strong>
<?php if ($avatar != '') : ?>
			<p style="text-align: center"><?php echo $avatar ?></p>
<?php else : ?>
			<br />
<?php endif; ?>
			<ul class="stats-online">
				<?php echo implode("\n\t\t\t", $stats_online) ?>
			</ul>
		
			<?php if (isset($users_online)) : echo $users_online; endif; ?>

			<ul class="stats-num">
				<?php echo implode("\n\t\t\t", $stats_list) ?>
			</ul>

<?php

}
// Else user is not logged, display login form
else
{
	$cur_panel['title'] = $lang_common['Login'];

	require_once FORUM_ROOT.'lang/'.$forum_user['language'].'/login.php';
	$form_action = forum_link($forum_url['login']);
?>
			<?php echo $lang_portal['Welcome Guest'] ?><br />
			<?php echo $lang_portal['Please login'] ?><br />
			<br />
			<form method="post" action="<?php echo $form_action ?>">
				<div class="hidden">
					<input type="hidden" name="form_sent" value="1" />
					<input type="hidden" name="redirect_url" value="<?php echo get_current_url() ?>" />
					<input type="hidden" name="csrf_token" value="<?php echo generate_form_token($form_action) ?>" />
				</div>
				<div class="panel-input">
					<?php echo $lang_login['Username'] ?><br />
					<input type="text" name="req_username" size="13" />
				</div>
				<div class="panel-input">
					<?php echo $lang_login['Password'] ?><br />
					<input type="password" name="req_password" size="13" />
				</div>
				<div>
					<label for="fld-remember-me"><span class="fld-label"><?php echo $lang_login['Remember me'] ?></span>&nbsp;<input type="checkbox" id="fld-remember-me" name="save_pass" value="1" /></label>
				</div>
				<div>
					<span class="submit"><input type="submit" name="login" value="<?php echo $lang_common['Login'] ?>" /></span>
				</div>
			</form>
			<a href="<?php echo forum_link($forum_url['register']) ?>"><?php echo $lang_portal['Not registered yet'] ?></a><br />
			<a href="<?php echo forum_link($forum_url['request_password']) ?>"><?php echo $lang_portal['Forgotten your password'] ?></a>
<?php

}

// this variable is also used for display statistics on forums page
unset($stats_list);