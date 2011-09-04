<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


if (!defined('FORUM_ROOT'))
	define('FORUM_ROOT', '../../../');
require FORUM_ROOT.'include/common.php';
require FORUM_ROOT.'include/common_admin.php';

define('PORTAL_ROOT', '../');

($hook = get_hook('xn_portal_by_daris_apg_start')) ? eval($hook) : null;

if ($forum_user['g_id'] != FORUM_ADMIN)
	message($lang_common['No permission']);

// Load the admin.php language file
require FORUM_ROOT.'lang/'.$forum_user['language'].'/admin_common.php';

if (file_exists(PORTAL_ROOT.'lang/'.$forum_user['language'].'/admin_pages.php'))
	require PORTAL_ROOT.'lang/'.$forum_user['language'].'/admin_pages.php';
else
	require PORTAL_ROOT.'lang/English/admin_pages.php';


// Add a "default" forum
if (isset($_POST['add_page']))
{
	$page_title = forum_trim($_POST['page_title']);

	($hook = get_hook('xn_portal_by_daris_apg_add_page_form_submitted')) ? eval($hook) : null;

	if ($page_title == '')
		message($lang_admin_pages['Must enter page message']);

	$query = array(
		'INSERT'	=> 'title',
		'INTO'		=> 'pages',
		'VALUES'	=> '\''.$forum_db->escape($page_title).'\''
	);

	($hook = get_hook('xn_portal_by_daris_apg_add_page_qr_add_forum')) ? eval($hook) : null;
	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	($hook = get_hook('xn_portal_by_daris_apg_add_page_pre_redirect')) ? eval($hook) : null;

	redirect(forum_link($forum_url['admin_pages']), $lang_admin_pages['Page added'].' '.$lang_admin_common['Redirect']);
}


// Delete a forum
else if (isset($_GET['del_page']))
{
	$page_to_delete = intval($_GET['del_page']);
	if ($page_to_delete < 1)
		message($lang_common['Bad request']);

	// User pressed the cancel button
	if (isset($_POST['del_page_cancel']))
		redirect(forum_link($forum_url['admin_pages']), $lang_admin_common['Cancel redirect']);

	($hook = get_hook('xn_portal_by_daris_apg_del_page_form_submitted')) ? eval($hook) : null;

	if (isset($_POST['del_page_comply']))	// Delete a forum with all posts
	{

		// Delete the forum and any forum specific group permissions
		$query = array(
			'DELETE'	=> 'pages',
			'WHERE'		=> 'id='.$page_to_delete
		);

		($hook = get_hook('xn_portal_by_daris_apg_del_page_qr_delete_forum')) ? eval($hook) : null;
		$forum_db->query_build($query) or error(__FILE__, __LINE__);

		($hook = get_hook('xn_portal_by_daris_apg_del_page_pre_redirect')) ? eval($hook) : null;

		redirect(forum_link($forum_url['admin_pages']), $lang_admin_pages['Page deleted'].' '.$lang_admin_common['Redirect']);
	}
	else	// If the user hasn't confirmed the delete
	{
		$query = array(
			'SELECT'	=> 'pg.title',
			'FROM'		=> 'pages AS pg',
			'WHERE'		=> 'pg.id='.$page_to_delete
		);

		($hook = get_hook('xn_portal_by_daris_apg_del_page_qr_get_page_name')) ? eval($hook) : null;
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		if (!$forum_db->num_rows($result))
			message($lang_common['Bad request']);

		$page_title = $forum_db->result($result);


		// Setup breadcrumbs
		$forum_page['crumbs'] = array(
			array($forum_config['o_board_title'], forum_link($forum_url['index'])),
			array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
			array($lang_admin_pages['Pages'], forum_link($forum_url['admin_pages'])),
			$lang_admin_pages['Delete page']
		);

		($hook = get_hook('xn_portal_by_daris_apg_del_page_pre_header_load')) ? eval($hook) : null;

		define('FORUM_PAGE_SECTION', 'start');
		define('FORUM_PAGE', 'admin-pages');
		require FORUM_ROOT.'header.php';

		// START SUBST - <!-- forum_main -->
		ob_start();

		($hook = get_hook('xn_portal_by_daris_apg_del_page_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php printf($lang_admin_pages['Confirm delete page'], forum_htmlencode($page_title)) ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_pages']) ?>?del_page=<?php echo $page_to_delete ?>">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_pages']).'?del_page='.$page_to_delete) ?>" />
			</div>
			<div class="ct-box warn-box">
				<p class="warn"><?php echo $lang_admin_pages['Delete page warning'] ?></p>
			</div>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="del_page_comply" value="<?php echo $lang_admin_pages['Delete page'] ?>" /></span>
				<span class="cancel"><input type="submit" name="del_page_cancel" value="<?php echo $lang_admin_common['Cancel'] ?>" /></span>
			</div>
		</form>
	</div>

<?php

		($hook = get_hook('xn_portal_by_daris_apg_del_page_end')) ? eval($hook) : null;

		$tpl_temp = forum_trim(ob_get_contents());
		$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
		ob_end_clean();
		// END SUBST - <!-- forum_main -->

		require FORUM_ROOT.'footer.php';
	}
}


else if (isset($_GET['edit_page']))
{
	$page_id = intval($_GET['edit_page']);
	if ($page_id < 1)
		message($lang_common['Bad request']);

	($hook = get_hook('xn_portal_by_daris_apg_edit_page_selected')) ? eval($hook) : null;

	// Fetch page info
	$query = array(
			'SELECT'	=> 'pg.id, pg.title, pg.content',
			'FROM'		=> 'pages AS pg',
			'WHERE'		=> 'pg.id='.$page_id
		);

	($hook = get_hook('xn_portal_by_daris_apg_edit_page_qr_get_page_details')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	if (!$forum_db->num_rows($result))
		message($lang_common['Bad request']);

	$cur_page = $forum_db->fetch_assoc($result);

	// Update group permissions for $page_id
	if (isset($_POST['save']))
	{
		($hook = get_hook('xn_portal_by_daris_apg_save_page_form_submitted')) ? eval($hook) : null;

		// Start with the forum details
		$page_title = forum_trim($_POST['page_title']);
		$page_content = forum_linebreaks(forum_trim($_POST['page_content']));

		if ($page_title == '')
			message($lang_admin_pages['Must enter page message']);

		$query = array(
			'UPDATE'	=> 'pages',
			'SET'		=> 'title=\''.$forum_db->escape($page_title).'\', content=\''.$forum_db->escape($page_content).'\'',
			'WHERE'		=> 'id='.$page_id
		);

		($hook = get_hook('xn_portal_by_daris_apg_save_page_qr_update_page')) ? eval($hook) : null;
		$forum_db->query_build($query) or error(__FILE__, __LINE__);

		($hook = get_hook('xn_portal_by_daris_apg_save_page_pre_redirect')) ? eval($hook) : null;

		redirect(forum_link($forum_url['admin_pages']), $lang_admin_pages['Page updated'].' '.$lang_admin_common['Redirect']);
	}


	$forum_page['form_info'] = array();

	// Setup the form
	$forum_page['item_count'] = $forum_page['group_count'] = $forum_page['fld_count'] = 0;

	// Setup breadcrumbs
	$forum_page['crumbs'] = array(
		array($forum_config['o_board_title'], forum_link($forum_url['index'])),
		array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
		array($lang_admin_pages['Pages'], forum_link($forum_url['admin_pages'])),
		$lang_admin_pages['Edit page']
	);

	($hook = get_hook('xn_portal_by_daris_apg_edit_page_pre_header_load')) ? eval($hook) : null;

	define('FORUM_PAGE_SECTION', 'start');
	define('FORUM_PAGE', 'admin-pages');
	require FORUM_ROOT.'header.php';

	// START SUBST - <!-- forum_main -->
	ob_start();

	($hook = get_hook('xn_portal_by_daris_apg_edit_page_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php printf($lang_admin_pages['Edit page head'], forum_htmlencode($cur_page['title'])) ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form method="post" class="frm-form" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_pages']) ?>?edit_page=<?php echo $page_id ?>">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_pages']).'?edit_page='.$page_id) ?>" />
			</div>
			<div class="content-head">
				<h3 class="hn"><span><?php echo $lang_admin_pages['Edit page details head'] ?></span></h3>
			</div>
<?php ($hook = get_hook('xn_portal_by_daris_apg_edit_page_pre_details_fieldset')) ? eval($hook) : null; ?>
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_pages['Edit forum details legend'] ?></strong></legend>
<?php ($hook = get_hook('xn_portal_by_daris_apg_edit_page_pre_page_name')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_pages['Page title'] ?></span></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="page_title" size="35" maxlength="80" value="<?php echo forum_htmlencode($cur_page['title']) ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apg_edit_page_pre_page_content')) ? eval($hook) : null; ?>
				<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="txt-box textarea">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_pages['Page content'] ?></span> <small><?php echo $lang_admin_pages['Page content help'] ?></small></label><br />
						<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="page_content" rows="10" cols="50"><?php echo forum_htmlencode($cur_page['content']) ?></textarea></span></div>
					</div>
				</div>

			</fieldset>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="save" value="<?php echo $lang_admin_common['Save changes'] ?>" /></span>
			</div>
		</form>
	</div>
<?php

	($hook = get_hook('xn_portal_by_daris_apg_edit_page_end')) ? eval($hook) : null;

	$tpl_temp = forum_trim(ob_get_contents());
	$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
	ob_end_clean();
	// END SUBST - <!-- forum_main -->

	require FORUM_ROOT.'footer.php';
}

// Setup the form
$forum_page['fld_count'] = $forum_page['group_count'] = $forum_page['item_count'] = 0;

// Setup breadcrumbs
$forum_page['crumbs'] = array(
	array($forum_config['o_board_title'], forum_link($forum_url['index'])),
	array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
	$lang_admin_pages['Pages']
);

($hook = get_hook('xn_portal_by_daris_apg_pre_header_load')) ? eval($hook) : null;

define('FORUM_PAGE_SECTION', 'start');
define('FORUM_PAGE', 'admin-pages');
require FORUM_ROOT.'header.php';

// START SUBST - <!-- forum_main -->
ob_start();

($hook = get_hook('xn_portal_by_daris_apg_main_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_admin_pages['Add page head'] ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_pages']) ?>?action=adddel">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_pages']).'?action=adddel') ?>" />
			</div>
<?php ($hook = get_hook('xn_portal_by_daris_apg_pre_add_page_fieldset')) ? eval($hook) : null; ?>
			<fieldset class="frm-group set<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_pages['Add page legend'] ?></strong></legend>
<?php ($hook = get_hook('xn_portal_by_daris_apg_pre_new_page_name')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_pages['Page title label'] ?></span></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="page_title" size="35" maxlength="80" /></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apg_pre_add_page_fieldset_end')) ? eval($hook) : null; ?>
			</fieldset>
<?php ($hook = get_hook('xn_portal_by_daris_apg_add_page_fieldset_end')) ? eval($hook) : null; ?>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" class="button" name="add_page" value=" <?php echo $lang_admin_pages['Add page'] ?> " /></span>
			</div>
		</form>
	</div>

<?php

// Display all the categories and forums
$query = array(
	'SELECT'	=> 'pg.id, pg.title',
	'FROM'		=> 'pages AS pg'
);

($hook = get_hook('xn_portal_by_daris_apg_qr_get_pages')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

if ($forum_db->num_rows($result))
{
	// Reset fieldset counter
	$forum_page['set_count'] = 0;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_admin_pages['Edit pages head'] ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_pages']) ?>?action=edit">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_pages']).'?action=edit') ?>" />
			</div>

			<div class="content-head">
				<h3 class="hn"><span><?php echo $lang_admin_pages['Pages'] ?></span></h3>
			</div>
			<div class="frm-group frm-hdgroup group">

<?php

	$i = 2;
	$forum_page['item_count'] = 0;

	while ($cur_page = $forum_db->fetch_assoc($result))
	{

($hook = get_hook('xn_portal_by_daris_apg_pre_edit_cur_page_fieldset')) ? eval($hook) : null;

?>
				<fieldset class="mf-set set<?php echo ++$forum_page['item_count'] ?><?php echo ($forum_page['item_count'] == 1) ? ' mf-head' : ' mf-extra' ?>">
					<legend><span><?php printf($lang_admin_pages['Edit or delete'], '<a href="'.forum_link($forum_url['admin_pages']).'?edit_page='.$cur_page['id'].'">'.$lang_admin_pages['Edit'].'</a>', '<a href="'.forum_link($forum_url['admin_pages']).'?del_page='.$cur_page['id'].'">'.$lang_admin_pages['Delete'].'</a>') ?></span></legend>
					<div class="mf-box">
<?php ($hook = get_hook('xn_portal_by_daris_apg_pre_edit_cur_page_name')) ? eval($hook) : null; ?>
						<div class="mf-field mf-field1 forum-field">
							<span class="aslabel"><?php echo $lang_admin_pages['Page name'] ?></span>
							<span class="fld-input"><?php echo forum_htmlencode($cur_page['title']) ?></span>
						</div>
					</div>
<?php ($hook = get_hook('xn_portal_by_daris_apg_pre_edit_cur_page_fieldset_end')) ? eval($hook) : null; ?>
				</fieldset>
<?php

		($hook = get_hook('xn_portal_by_daris_apg_edit_cur_page_fieldset_end')) ? eval($hook) : null;

		++$i;
	}

?>
			</div>
		</form>
	</div>
<?php

}


($hook = get_hook('xn_portal_by_daris_apg_end')) ? eval($hook) : null;

$tpl_temp = forum_trim(ob_get_contents());
$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
ob_end_clean();
// END SUBST - <!-- forum_main -->

require FORUM_ROOT.'footer.php';
