<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

if (file_exists(FORUM_ROOT.'extensions/portal_by_daris/lang/'.$forum_user['language'].'/admin_portal.php'))
	require FORUM_ROOT.'extensions/portal_by_daris/lang/'.$forum_user['language'].'/admin_portal.php';
else
	require FORUM_ROOT.'extensions/portal_by_daris/lang/English/admin_portal.php';

// Setup the form
$forum_page['part_count'] = $forum_page['fld_count'] = $forum_page['set_count'] = 0;

// Setup breadcrumbs
$forum_page['crumbs'] = array(
	array($forum_config['o_board_title'], forum_link($forum_url['index'])),
	array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
	array($lang_admin_common['Settings'], forum_link($forum_url['admin_settings_setup'])),
	$lang_admin_portal['Portal']
);

($hook = get_hook('aop_portal_pre_header_load')) ? eval($hook) : null;

define('FORUM_PAGE_SECTION', 'settings');
define('FORUM_PAGE', 'admin-settings-portal');
require FORUM_ROOT.'header.php';

ob_start();

// Reset counter
$forum_page['group_count'] = $forum_page['item_count'] = 0;


?>
	<div class="main-content main-frm">
		<div class="content-head">
			<h2 class="hn"><span><?php echo $lang_admin_portal['Index page head']  ?></span></h2>
		</div>
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_settings_portal']) ?>">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_settings_portal'])) ?>" />
				<input type="hidden" name="form_sent" value="1" />
			</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_portal['Forums for news legend'] ?></strong></legend>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_checkbox')) ? eval($hook) : null; ?>
				<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="txt-box textarea">
						<label for="fld<?php echo $forum_page['fld_count']+1 ?>"><span><?php echo $lang_admin_portal['Forums for news label'] ?></span></label>
						<div class="txt-input">
							<div class="checklist">
<?php

$forums_for_news = explode(',', $forum_config['o_portal_news_forums']);

// Get the list of categories and forums
$query = array(
	'SELECT'	=> 'c.id AS cid, c.cat_name, f.id AS fid, f.forum_name, f.redirect_url',
	'FROM'		=> 'categories AS c',
	'JOINS'		=> array(
		array(
			'INNER JOIN'	=> 'forums AS f',
			'ON'			=> 'c.id=f.cat_id'
		),
		array(
			'LEFT JOIN'		=> 'forum_perms AS fp',
			'ON'			=> '(fp.forum_id=f.id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'WHERE'		=> '(fp.read_forum IS NULL OR fp.read_forum=1) AND f.redirect_url IS NULL',
	'ORDER BY'	=> 'c.disp_position, c.id, f.disp_position'
);

($hook = get_hook('se_qr_get_cats_and_forums')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

$cur_category = 0;
while ($cur_forum = $forum_db->fetch_assoc($result))
{
	($hook = get_hook('se_forum_loop_start')) ? eval($hook) : null;

	if ($cur_forum['cid'] != $cur_category)	// A new category since last iteration?
	{
		if ($cur_category)
			echo "\t\t\t\t\t\t\t".'</fieldset>'."\n";

		echo "\t\t\t\t\t\t\t".'<fieldset>'."\n\t\t\t\t\t\t\t\t".'<legend><span>'.forum_htmlencode($cur_forum['cat_name']).':</span></legend>'."\n";
		$cur_category = $cur_forum['cid'];
	}

	echo "\t\t\t\t\t\t\t\t".'<div class="checklist-item"><span class="fld-input"><input type="checkbox" id="fld'.(++$forum_page['fld_count']).'"  name="form[portal_news_forums][]" value="'.$cur_forum['fid'].'"'.(in_array($cur_forum['fid'], $forums_for_news) ? ' checked="checked"' : '').'/></span> <label for="fld'.$forum_page['fld_count'].'">'.forum_htmlencode($cur_forum['forum_name']).'</label></div>'."\n";
}

?>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
<? ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>">
							<span><?php echo $lang_admin_portal['News count label'] ?></span>
						</label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[portal_news_count]" size="5" maxlength="5" value="<?php echo forum_htmlencode($forum_config['o_portal_news_count']) ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>">
							<span><?php echo $lang_admin_portal['News description length'] ?></span>
						</label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[portal_news_description_length]" size="5" maxlength="5" value="<?php echo forum_htmlencode($forum_config['o_portal_news_description_length']) ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset_end')) ? eval($hook) : null; ?>
			</fieldset>
<?php

	($hook = get_hook('aop_features_sig_fieldset_end')) ? eval($hook) : null;

	// Reset counter
	$forum_page['group_count'] = $forum_page['item_count'] = 0;

?>
			<div class="content-head">
				<h2 class="hn"><span><?php echo $lang_admin_portal['Size head'] ?></span></h2>
			</div>
			
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_portal['Size legend'] ?></strong></legend>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_portal['Left side width'] ?></span><small><?php echo $lang_admin_portal['Left side width help'] ?></small></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[portal_left_width]" size="3" maxlength="3" value="<?php echo $forum_config['o_portal_left_width'] ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_portal['Right side width'] ?></span><small><?php echo $lang_admin_portal['Right side width help'] ?></small></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[portal_right_width]" size="3" maxlength="3" value="<?php echo $forum_config['o_portal_right_width'] ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset_end')) ? eval($hook) : null; ?>
			</fieldset>
<?php


	($hook = get_hook('aop_features_sig_fieldset_end')) ? eval($hook) : null;

	// Reset counter
	$forum_page['group_count'] = $forum_page['item_count'] = 0;

?>
			<div class="content-head">
				<h2 class="hn"><span><?php echo $lang_admin_portal['Advanced settings head'] ?></span></h2>
			</div>
			
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_portal['Advanced settings legend'] ?></strong></legend>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[portal_panels_all_pages]" value="1"<?php if ($forum_config['o_portal_panels_all_pages'] == '1') echo ' checked="checked"' ?> /></span>
						<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_admin_portal['Panels on all pages'] ?></span> <?php echo $lang_admin_portal['Panels on all pages info'] ?></label>
					</div>
				</div>
<?php ($hook = get_hook('aop_maintenance_pre_maintenance_fieldset_end')) ? eval($hook) : null; ?>
			</fieldset>
			
<?php ($hook = get_hook('aop_maintenance_maintenance_fieldset_end')) ? eval($hook) : null; ?>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="save" value="<?php echo $lang_admin_common['Save changes'] ?>" /></span>
			</div>
		</form>
	</div>
<?php

