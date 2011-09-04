<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

if (!defined('FORUM_ROOT'))
	define('FORUM_ROOT', '../../');

if (!defined('FORUM_PORTAL'))
	define('FORUM_PORTAL', $ext_info['path'].'/');

($hook = get_hook('xn_portal_by_daris_pg_start')) ? eval($hook) : null;

if ($forum_user['g_read_board'] == '0')
	message($lang_common['No view']);

// Load the portal.php language file
if (file_exists(FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php'))
	require FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php';
else
	require FORUM_PORTAL.'lang/English/portal.php';

require FORUM_ROOT.'include/parser.php';

$id = (isset($_GET['page']) ? intval($_GET['page']) : null);


if (isset($id))
{
	// Fetch page
	$query = array(
		'SELECT'	=> 'pg.id, pg.title, pg.content',
		'FROM'		=> 'pages AS pg',
		'WHERE'		=> 'pg.id='.$id
	);

	($hook = get_hook('xn_portal_by_daris_pg_qr_get_page')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	if ($forum_db->num_rows($result) > 0)
	{
		$page = $forum_db->fetch_assoc($result);
		$page['content'] = preg_replace('#\[page_title=(.*?)\]#s', "\n\t\t\t".'</div>'."\n\t\t".'</div>'."\n\t".'<div class="main-head">'."\n\t\t".'<h2 class="hn"><span>$1</span></h2>'."\n\t".'</div>'."\n\n\t".'<div class="main-content panel">'."\n\t\t".'<div class="entry-content panel-content">'."\n\t\t", $page['content']);
	}
	else
		$page = array('title' => $lang_portal['Page does not exist'], 'content' => $lang_portal['Page does not exist']);

	// Setup breadcrumbs
	$forum_page['crumbs'] = array(
		array($forum_config['o_board_title'], forum_link($forum_url['index'])),
		array($page['title'], forum_link($forum_url['page_id'], array($id, sef_friendly($page['title'])))),
	);

	($hook = get_hook('xn_portal_by_daris_pg_pre_header_load')) ? eval($hook) : null;

	define('FORUM_ALLOW_INDEX', 1);
	define('FORUM_PAGE', 'pages');
	require FORUM_ROOT.'header.php';
	
	ob_start();

	($hook = get_hook('xn_portal_by_daris_pg_main_output_start')) ? eval($hook) : null;

?>
<div id="forum-main" class="main">

	<div class="main-head">
		<h2 class="hn"><span><?php echo forum_htmlencode($page['title']) ?></span></h2>
	</div>

	<div class="main-content panel">
		<div class="entry-content panel-content">
			<?php echo $page['content'] ?>
		</div>
	</div>
</div>
<?php


}
else
{
	// Fetch list of pages
	$query = array(
		'SELECT'	=> 'pg.id, pg.title, pg.content',
		'FROM'		=> 'pages AS pg',
		'ORDER BY'	=> 'pg.title ASC',
	);

	($hook = get_hook('xn_portal_by_daris_pg_qr_get_pages')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	define('FORUM_ALLOW_INDEX', 1);
	define('FORUM_PAGE', 'pages');
	require FORUM_ROOT.'header.php';

?>
<div id="forum-main" class="main">

	<div class="main-head">
		<h2><span><?php echo $lang_portal['Pages'] ?></span></h2>
	</div>

	<div class="main-content portal">
		<div class="entry-content">
<?php

	// If there are pages
	if ($forum_db->num_rows($result))
	{
		while ($page = $forum_db->fetch_assoc($result)) {

?>
			<a href="<?php echo forum_link($forum_url['page_id'], array($page['id'], sef_friendly($page['title']))) ?>"><?php echo forum_htmlencode($page['title']) ?></a><br />
<?php

		}
	}
	// Else there are no pages
	else
	{
		echo $lang_portal['No pages'];

	}
?>
		</div>
	</div>
</div>
<?php
}


//$forum_id = $id;

($hook = get_hook('xn_portal_by_daris_pg_end')) ? eval($hook) : null;

$tpl_temp = trim(ob_get_contents());
$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
ob_end_clean();
// END SUBST - <!-- forum_main -->

require FORUM_ROOT.'footer.php';

