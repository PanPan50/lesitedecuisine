<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


$count = 10; // count posts
$subject_len = 20; // length of topic title


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

// Fetch some info about the posts
$query = array(
	'SELECT'	=> 't.subject, t.last_post, t.last_poster, t.last_post_id',
	'FROM'		=> 'topics AS t',
	'JOINS'		=> array(
		array(
			'LEFT JOIN'		=> 'forum_perms AS fp',
			'ON'			=> '(fp.forum_id=t.forum_id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL',
	'ORDER BY'	=> 't.last_post DESC',
	'LIMIT'		=> '0, '.$count
);
($hook = get_hook('pr_qr_get_recent_posts')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

// If there are any posts
if ($forum_db->num_rows($result) > 0)
{

?>
		<ul class="recent-posts">
<?php

	while ($cur_topic = $forum_db->fetch_assoc($result))
	{

		if ($forum_config['o_censoring'] == '1')
			$cur_topic['subject'] = censor_words($cur_topic['subject']);

		$subject = (utf8_strlen($cur_topic['subject']) > $subject_len ? utf8_substr($cur_topic['subject'], 0, $subject_len).'...' : $cur_topic['subject']);
		$subject = forum_htmlencode($subject);
		$title = forum_htmlencode($cur_topic['subject']);
		$title .= ', '.$lang_portal['By'].': '.forum_htmlencode($cur_topic['last_poster']);
		$title .= ', '.$lang_portal['Posted'].': '.format_time($cur_topic['last_post'])
		
?>
			<li><a href="<?php echo forum_link($forum_url['post'], array($cur_topic['last_post_id'])) ?>" title="<?php echo $title ?>"><?php echo $subject ?></a></li>
<?php

	}

?>
		</ul>
<?php
}
// If there are no posts do not display panel
