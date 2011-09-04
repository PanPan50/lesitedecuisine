<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

$portal_dir = 'extensions/portal_by_daris/';

$forum_url_portal = array(
	'admin_pages'		=> $portal_dir.'admin/pages.php',
	'admin_panels'		=> $portal_dir.'admin/panels.php',
	'admin_settings_portal'	=> 'admin/settings.php?section=portal',
	'forums'		=> 'forum/',
	'pages'			=> 'pages/',
	'page_id'		=> 'page/$1/$2/',
	'news_rss'		=> 'news_rss/',
	'news_atom'		=> 'news_atom/',
	'articles_rss'		=> 'articles_rss/',
	'articles_atom'		=> 'articles_atom/',
);

$forum_url = array_merge($forum_url, $forum_url_portal);