<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;


?>
		<ul class="portal-menu">
<?php

$navlinks = generate_navlinks();
// remove id from navlinks
$navlinks = preg_replace('#<li(.*?)>#', '<li>', $navlinks);

$navlinks = preg_replace('#<span>(.*)</span>#', '$1', $navlinks);
echo $navlinks;


$query = array(
	'SELECT'	=> 'pg.id, pg.title, pg.content',
	'FROM'		=> 'pages AS pg',
);
($hook = get_hook('pr_menu_qr_get_pages')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

while ($cur_page = $forum_db->fetch_assoc($result))
{
	echo "\n\t\t".'<li><a href="'.forum_link($forum_url['page_id'], array($cur_page['id'], sef_friendly($cur_page['title']))).'">'.forum_htmlencode($cur_page['title']).'</a></li>';

}

?>
		</ul>