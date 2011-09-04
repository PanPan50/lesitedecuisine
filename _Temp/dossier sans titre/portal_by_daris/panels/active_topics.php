<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

$count = 5; // active topics count
$cur_panel['class'] = 'forum';

// Load the viewforum.php language file
require_once FORUM_ROOT.'lang/'.$forum_user['language'].'/forum.php';
require_once FORUM_ROOT.'lang/'.$forum_user['language'].'/search.php';

// Fetch list of topics
$query = array(
	'SELECT'	=> 't.id, t.poster, t.subject, t.posted, t.first_post_id, t.last_post, t.last_post_id, t.last_poster, t.num_views, t.num_replies, t.closed, t.sticky, t.moved_to, t.forum_id',
	'FROM'		=> 'topics AS t',
	'JOINS'		=> array(
		array(
			'LEFT JOIN' 		=> 'forums as f',
			'ON'			=> 't.forum_id=f.id'
		),
		array(
			'LEFT JOIN'		=> 'forum_perms AS fp',
			'ON'			=> '(fp.forum_id=t.forum_id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL',
	'ORDER BY'	=> 't.last_post DESC',
	'LIMIT'		=> '0, '.$count
);

// With "has posted" indication
if (!$forum_user['is_guest'] && $forum_config['o_show_dot'] == '1')
{
	$subquery = array(
		'SELECT'	=> 'COUNT(p.id)',
		'FROM'		=> 'posts AS p',
		'WHERE'		=> 'p.poster_id='.$forum_user['id'].' AND p.topic_id=t.id'
	);

	($hook = get_hook('xn_portal_by_daris_at_qr_get_has_posted')) ? eval($hook) : null;
	$query['SELECT'] .= ', ('.$forum_db->query_build($subquery, true).') AS has_posted';
}

($hook = get_hook('xn_portal_by_daris_at_qr_get_topics')) ? eval($hook) : null;
$result_at = $forum_db->query_build($query) or error(__FILE__, __LINE__);

// Get topic/forum tracking data
if (!$forum_user['is_guest'])
	$tracked_topics = get_tracked_topics();


($hook = get_hook('xn_portal_by_daris_at_pre_header_load')) ? eval($hook) : null;


$forum_page['item_header'] = array();
$forum_page['item_header']['subject']['title'] = '<strong class="subject-title">'.$lang_forum['Topics'].'</strong>';
$forum_page['item_header']['info']['replies'] = '<strong class="info-replies">'.$lang_forum['replies'].'</strong>';

if ($forum_config['o_topic_views'] == '1')
	$forum_page['item_header']['info']['views'] = '<strong class="info-views">'.$lang_forum['views'].'</strong>';

$forum_page['item_header']['info']['lastpost'] = '<strong class="info-lastpost">'.$lang_forum['last post'].'</strong>';

($hook = get_hook('xn_portal_by_daris_at_main_output_start')) ? eval($hook) : null;

// If there are topics in this forum
if ($forum_db->num_rows($result_at))
{

?>
	<div class="main-subhead">
		<p class="item-summary<?php echo ($forum_config['o_topic_views'] == '1') ? ' forum-views' : ' forum-noview' ?>"><span><?php printf($lang_forum['Forum subtitle'], implode(' ', $forum_page['item_header']['subject']), implode(', ', $forum_page['item_header']['info'])) ?></span></p>
	</div>
	<div id="forum" class="main-content main-forum<?php echo ($forum_config['o_topic_views'] == '1') ? ' forum-views' : ' forum-noview' ?>">
<?php

	($hook = get_hook('xn_portal_by_daris_at_pre_topic_loop_start')) ? eval($hook) : null;

	$forum_page['item_count'] = 0;

	while ($cur_topic = $forum_db->fetch_assoc($result_at))
	{
		($hook = get_hook('xn_portal_by_daris_at_topic_loop_start')) ? eval($hook) : null;

		++$forum_page['item_count'];

		// Start from scratch
		$forum_page['item_subject'] = $forum_page['item_body'] = $forum_page['item_status'] = $forum_page['item_nav'] = $forum_page['item_title'] = $forum_page['item_title_status'] = array();
		$forum_page['item_indicator'] = '';

		if ($forum_config['o_censoring'] == '1')
			$cur_topic['subject'] = censor_words($cur_topic['subject']);

		if ($cur_topic['moved_to'] != null)
		{
			$forum_page['item_status']['moved'] = 'moved';
			$forum_page['item_title']['link'] = '<span class="item-status"><em class="moved">'.sprintf($lang_forum['Item status'], $lang_forum['Moved']).'</em></span> <a href="'.forum_link($forum_url['topic'], array($cur_topic['moved_to'], sef_friendly($cur_topic['subject']))).'">'.forum_htmlencode($cur_topic['subject']).'</a>';

			// Combine everything to produce the Topic heading
			$forum_page['item_body']['subject']['title'] = '<h3 class="hn"><span class="item-num">'.forum_number_format($forum_page['start_from'] + $forum_page['item_count']).'</span>'.$forum_page['item_title']['link'].'</h3>';

			($hook = get_hook('xn_portal_by_daris_at_topic_loop_moved_topic_pre_item_subject_merge')) ? eval($hook) : null;

			if ($forum_config['o_topic_views'] == '1')
				$forum_page['item_body']['info']['views'] = '<li class="info-views"><span class="label">'.$lang_forum['No views info'].'</span></li>';

			$forum_page['item_body']['info']['replies'] = '<li class="info-replies"><span class="label">'.$lang_forum['No replies info'].'</span></li>';
			$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost"><span class="label">'.$lang_forum['No lastpost info'].'</span></li>';
		}
		else
		{
			// Assemble the Topic heading

			// Should we display the dot or not? :)
			if (!$forum_user['is_guest'] && $forum_config['o_show_dot'] == '1' && $cur_topic['has_posted'] > 0)
			{
				$forum_page['item_title']['posted'] = '<span class="posted-mark">'.$lang_forum['You posted indicator'].'</span>';
				$forum_page['item_status']['posted'] = 'posted';
			}

			if ($cur_topic['sticky'] == '1')
			{
				$forum_page['item_title_status']['sticky'] = '<em class="sticky">'.$lang_forum['Sticky'].'</em>';
				$forum_page['item_status']['sticky'] = 'sticky';
			}

			if ($cur_topic['closed'] == '1')
			{
				$forum_page['item_title_status']['closed'] = '<em class="closed">'.$lang_forum['Closed'].'</em>';
				$forum_page['item_status']['closed'] = 'closed';
			}

			($hook = get_hook('xn_portal_by_daris_at_topic_loop_normal_topic_pre_item_title_status_merge')) ? eval($hook) : null;

			if (!empty($forum_page['item_title_status']))
				$forum_page['item_title']['status'] = '<span class="item-status">'.sprintf($lang_forum['Item status'], implode(', ', $forum_page['item_title_status'])).'</span>';

			$forum_page['item_title']['link'] = '<a href="'.forum_link($forum_url['topic'], array($cur_topic['id'], sef_friendly($cur_topic['subject']))).'">'.forum_htmlencode($cur_topic['subject']).'</a>';

			($hook = get_hook('xn_portal_by_daris_at_topic_loop_normal_topic_pre_item_title_merge')) ? eval($hook) : null;

			$forum_page['item_body']['subject']['title'] = '<h3 class="hn"><span class="item-num">'.$forum_page['item_count'].'</span> '.implode(' ', $forum_page['item_title']).'</h3>';

			// Assemble the Topic subject

			if (empty($forum_page['item_status']))
				$forum_page['item_status']['normal'] = 'normal';

			$forum_page['item_pages'] = ceil(($cur_topic['num_replies'] + 1) / $forum_user['disp_posts']);

			if ($forum_page['item_pages'] > 1)
				$forum_page['item_nav']['pages'] = '<span>'.$lang_forum['Pages'].'&#160;</span>'.paginate($forum_page['item_pages'], -1, $forum_url['topic'], $lang_common['Page separator'], array($cur_topic['id'], sef_friendly($cur_topic['subject'])));

			// Does this topic contain posts we haven't read? If so, tag it accordingly.
			if (!$forum_user['is_guest'] && $cur_topic['last_post'] > $forum_user['last_visit'] && (!isset($tracked_topics['topics'][$cur_topic['id']]) || $tracked_topics['topics'][$cur_topic['id']] < $cur_topic['last_post']))
			{
				$forum_page['item_nav']['new'] = '<em class="item-newposts"><a href="'.forum_link($forum_url['topic_new_posts'], array($cur_topic['id'], sef_friendly($cur_topic['subject']))).'">'.$lang_forum['New posts'].'</a></em>';
				$forum_page['item_status']['new'] = 'new';
			}

			($hook = get_hook('xn_portal_by_daris_at_topic_loop_normal_topic_pre_item_nav_merge')) ? eval($hook) : null;

			if (!empty($forum_page['item_nav']))
				$forum_page['item_subject']['nav'] = '<span class="item-nav">'.sprintf($lang_forum['Topic navigation'], implode('&#160;&#160;', $forum_page['item_nav'])).'</span>';

			($hook = get_hook('xn_portal_by_daris_at_topic_loop_normal_topic_pre_item_subject_merge')) ? eval($hook) : null;

			$forum_page['item_body']['info']['replies'] = '<li class="info-replies"><strong>'.forum_number_format($cur_topic['num_replies']).'</strong> <span class="label">'.(($cur_topic['num_replies'] == 1) ? $lang_forum['reply'] : $lang_forum['replies']).'</span></li>';

			if ($forum_config['o_topic_views'] == '1')
				$forum_page['item_body']['info']['views'] = '<li class="info-views"><strong>'.forum_number_format($cur_topic['num_views']).'</strong> <span class="label">'.(($cur_topic['num_views'] == 1) ? $lang_forum['view'] : $lang_forum['views']).'</span></li>';

			$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost"><span class="label">'.$lang_forum['Last post'].'</span> <strong><a href="'.forum_link($forum_url['post'], $cur_topic['last_post_id']).'">'.format_time($cur_topic['last_post']).'</a></strong> <cite>'.sprintf($lang_forum['by poster'], forum_htmlencode($cur_topic['last_poster'])).'</cite></li>';
		}

		$forum_page['item_subject']['starter'] = '<span class="item-starter">'.sprintf($lang_forum['Topic starter'], '<cite>'.forum_htmlencode($cur_topic['poster']).'</cite>').'</span>';
		$forum_page['item_body']['subject']['desc'] = implode(' ', $forum_page['item_subject']);

		($hook = get_hook('xn_portal_by_daris_at_row_pre_item_status_merge')) ? eval($hook) : null;

		$forum_page['item_style'] = (($forum_page['item_count'] % 2 != 0) ? ' odd' : ' even').(($forum_page['item_count'] == 1) ? ' main-first-item' : '').((!empty($forum_page['item_status'])) ? ' '.implode(' ', $forum_page['item_status']) : '');

		($hook = get_hook('xn_portal_by_daris_at_row_pre_display')) ? eval($hook) : null;

?>
		<div id="topic<?php echo $cur_topic['id'] ?>" class="main-item<?php echo $forum_page['item_style'] ?>">
			<span class="icon <?php echo implode(' ', $forum_page['item_status']) ?>"><!-- --></span>
			<div class="item-subject">
				<?php echo implode("\n\t\t\t\t", $forum_page['item_body']['subject'])."\n" ?>
			</div>
			<ul class="item-info">
				<?php echo implode("\n\t\t\t\t", $forum_page['item_body']['info'])."\n" ?>
			</ul>
		</div>
<?php

	}

?>
	</div>
<?php

}
// Else there are no topics in this forum
else
{
	$forum_page['item_body']['subject']['title'] = '<h3 class="hn">'.$lang_forum['No topics'].'</h3>';
	$forum_page['item_body']['subject']['desc'] = '<p>'.$lang_forum['First topic nag'].'</p>';

	($hook = get_hook('xn_portal_by_daris_at_no_results_row_pre_display')) ? eval($hook) : null;

?>
	<div id="forum" class="main-content main-forum">
		<div class="main-item empty main-first-item">
			<span class="icon empty"><!-- --></span>
			<div class="item-subject">
				<?php echo implode("\n\t\t\t\t", $forum_page['item_body']['subject'])."\n" ?>
			</div>
		</div>
	</div>
<?php

}
?>
	<div class="main-options gen-content">
		<p class="options">
			<span class="item1"><a href="<?php echo forum_link($forum_url['search_recent']) ?>"><?php echo $lang_search['Recently active topics'] ?></a></span>
			<span><a href="<?php echo forum_link($forum_url['search_unanswered']) ?>"><?php echo $lang_search['Unanswered topics'] ?></a></span>
<?php if (!$forum_user['is_guest']): ?>
			<span><a href="<?php echo forum_link($forum_url['search_subscriptions'], array($forum_user['id'])) ?>"><?php echo $lang_search['Subscriptions'] ?></a></span>
<?php endif; ?>
		</p>
	</div>