<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

if (!defined('FORUM_PORTAL'))
	define('FORUM_PORTAL', $ext_info['path'].'/');

($hook = get_hook('xn_portal_by_daris_nw_start')) ? eval($hook) : null;

if ($forum_user['g_read_board'] == '0')
	message($lang_common['No view']);

// Load the viewforum.php language file
require FORUM_ROOT.'lang/'.$forum_user['language'].'/forum.php';

if (file_exists(FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php'))
	require FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php';
else
	require FORUM_PORTAL.'lang/English/portal.php';

define('FORUM_ALLOW_INDEX', 1);
define('FORUM_PAGE', 'news');
require FORUM_ROOT.'header.php';

ob_start();

if ($forum_config['o_portal_news_count'] == 0)
	require FORUM_ROOT.'footer.php';

// Fetch list of news
$query = array(
	'SELECT'	=> 't.id, t.subject, t.posted, t.first_post_id, t.num_views, t.num_replies, p.poster, p.poster_id, p.message, p.hide_smilies, p.posted',
	'JOINS' 	=>  array(
		array(
			'LEFT JOIN'	=> 'posts AS p',
			'ON'		=> 't.first_post_id=p.id'
		),
		array(
			'LEFT JOIN'	=> 'forum_perms AS fp',
			'ON'		=> '(fp.forum_id=t.forum_id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'FROM'		=> 'topics AS t',
	'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND t.forum_id IN ('.(isset($forum_config['o_portal_news_forums']) ? $forum_config['o_portal_news_forums'] : 0).')',
	'ORDER BY'	=> 'p.posted DESC',
);

if (isset($forum_config['o_portal_news_count']))
	$query['LIMIT'] = '0, '.intval($forum_config['o_portal_news_count']);

($hook = get_hook('xn_portal_by_daris_nw_qr_get_news')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

($hook = get_hook('xn_portal_by_daris_nw_pre_header_load')) ? eval($hook) : null;

require FORUM_ROOT.'include/parser.php';

// Setup main head/foot options
$forum_page['main_head_options'] = array(
	'<a class="feed-option" href="'.forum_link($forum_url['news_atom'], $forum_config['o_portal_news_forums']).'"><span>'.$lang_common['ATOM Feed'].'</span></a>',
	'<a class="feed-option" href="'.forum_link($forum_url['news_rss'], $forum_config['o_portal_news_forums']).'"><span>'.$lang_common['RSS Feed'].'</span></a>'
);

($hook = get_hook('xn_portal_by_daris_nw_main_output_start')) ? eval($hook) : null;

// If there are news in selected forums
if ($forum_db->num_rows($result))
{
	while ($cur_news = $forum_db->fetch_assoc($result))
	{
		($hook = get_hook('xn_portal_by_daris_nw_news_loop_start')) ? eval($hook) : null;

		$forum_page['info'] = $forum_page['info-right'] = array();

		$cur_news['subject'] = forum_htmlencode($cur_news['subject']);

		if ($forum_config['o_censoring'] == '1')
			$cur_news['subject'] = censor_words($cur_news['subject']);

		$forum_page['info'][] = $lang_portal['Posted'].': '.format_time($cur_news['posted']);
		$forum_page['info'][] = $lang_portal['Author'].': '.forum_htmlencode($cur_news['poster']);

		$forum_page['post_message'] = $cur_news['message'];
		
		if (utf8_strlen($forum_page['post_message']) > $forum_config['o_portal_news_description_length'] && $forum_config['o_portal_news_description_length'] > 0)
		{
			$forum_page['post_message'] = utf8_substr($forum_page['post_message'], 0, $forum_config['o_portal_news_description_length']).'...';
			$forum_page['info'][] = '<a href="'.forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))).'">'.$lang_portal['Read more'].'</a>';
		}

		$forum_page['post_message'] = parse_message($forum_page['post_message'], $cur_news['hide_smilies']);

//		$forum_page['info'][] = $lang_portal['Views'].': '.$cur_news['num_views'];
		$forum_page['info-right'][] = '<a href="'.forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))).'">'.$lang_portal['Comments'].': '.$cur_news['num_replies'].'</a>';

		($hook = get_hook('xn_portal_by_daris_nw_row_pre_display')) ? eval($hook) : null;

?>
<div class="panel">

	<div class="main-head">
<!--<?php if (!empty($forum_page['main_head_options'])) : ?>		<p class="main-options"><?php echo implode(' ', $forum_page['main_head_options']) ?></p><?php endif; ?>-->
		<h2 class="hn"><span><a href="<?php echo forum_link($forum_url['topic'], array($cur_news['id'], sef_friendly($cur_news['subject']))) ?>"><?php echo $cur_news['subject'] ?></a></span></h2>
	</div>

	<div class="main-content news panel-content">
		<div class="entry-content">
			<?php echo $forum_page['post_message'] ?>
			<div class="news-info-right"><?php echo implode(' | ', $forum_page['info-right']) ?></div>
			<div class="news-info"><?php echo implode(' | ', $forum_page['info']) ?></div>
		</div>
	</div>

</div>

<?php
		$forum_page['main_head_options'] = array();
	}
}
// Else there are no news in selected forums
else
{


?>
<div class="panel">

	<div class="main-head">
		<h2 class="hn"><span><?php echo $lang_portal['News'] ?></span></h2>
	</div>

	<div class="main-content news panel-content">
		<div class="entry-content">
			<?php echo $lang_portal['No news'] ?>
		</div>
	</div>
</div>
<?php

}

//$forum_id = $id;

($hook = get_hook('xn_portal_by_daris_nw_end')) ? eval($hook) : null;

$tpl_temp = trim(ob_get_contents());
$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
ob_end_clean();
// END SUBST - <!-- forum_main -->

require FORUM_ROOT.'footer.php';
