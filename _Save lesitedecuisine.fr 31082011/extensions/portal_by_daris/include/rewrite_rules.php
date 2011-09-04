<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;


$forum_rewrite_rules_portal = array(
	'/^forum(\.html?|\/)?$/i'			=> 'index.php?forum',
	'/^pages(\.html?|\/)?$/i'			=> 'index.php?pages',
	'/^page[\/_-]?([0-9]+).*(\.html?|\/)?$/i'	=> 'index.php?page=$1',
	'/^news[\/_-](rss|atom)(\.html?|\/)?$/i'	=> 'extern.php?news_feed&type=$1',
);

$forum_rewrite_rules = array_merge($forum_rewrite_rules, $forum_rewrite_rules_portal);