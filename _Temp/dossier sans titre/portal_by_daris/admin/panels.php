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

($hook = get_hook('xn_portal_by_daris_apn_start')) ? eval($hook) : null;

if ($forum_user['g_id'] != FORUM_ADMIN)
	message($lang_common['No permission']);

// Load the admin.php language file
require FORUM_ROOT.'lang/'.$forum_user['language'].'/admin_common.php';

if (file_exists(PORTAL_ROOT.'lang/'.$forum_user['language'].'/admin_panels.php'))
	require PORTAL_ROOT.'lang/'.$forum_user['language'].'/admin_panels.php';
else
	require PORTAL_ROOT.'lang/English/admin_panels.php';
	
require PORTAL_ROOT.'include/functions.php';

$location_names = array(
	0 => 'Left side',
	1 => 'Center top',
	2 => 'Center bottom',
	3 => 'Right side'
);

// Add a "default" forum
if (isset($_POST['add_panel']))
{
	$panel_name = forum_trim($_POST['name']);
	$location = intval($_POST['location']);
	$file = $_POST['file'];
	$position = /*intval($_POST['position'])*/0;

	($hook = get_hook('xn_portal_by_daris_apn_add_panel_form_submitted')) ? eval($hook) : null;

	if ($panel_name == '')
		message($lang_admin_panels['Must enter forum message']);

	$query = array(
		'INSERT'	=> 'name, location, file, position',
		'INTO'		=> 'panels',
		'VALUES'	=> '\''.$forum_db->escape($panel_name).'\', '.$location.', \''.$forum_db->escape($file).'\', '.$position
	);

	($hook = get_hook('xn_portal_by_daris_apn_add_panel_qr_add_panel')) ? eval($hook) : null;
	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	// Regenerate the quickjump cache
	if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
		require PORTAL_ROOT.'include/cache.php';

	generate_panels_cache();

	($hook = get_hook('xn_portal_by_daris_apn_add_panel_pre_redirect')) ? eval($hook) : null;

	redirect(forum_link($forum_url['admin_panels']), $lang_admin_panels['Panel added'].' '.$lang_admin_common['Redirect']);
}


// Delete a forum
else if (isset($_GET['del_panel']))
{
	$panel_to_delete = intval($_GET['del_panel']);
	if ($panel_to_delete < 1)
		message($lang_common['Bad request']);

	// User pressed the cancel button
	if (isset($_POST['del_panel_cancel']))
		redirect(forum_link($forum_url['admin_panels']), $lang_admin_common['Cancel redirect']);

	($hook = get_hook('xn_portal_by_daris_apn_del_panel_form_submitted')) ? eval($hook) : null;

	if (isset($_POST['del_panel_comply']))	// Delete a forum with all posts
	{

		// Delete the forum and any forum specific group permissions
		$query = array(
			'DELETE'	=> 'panels',
			'WHERE'		=> 'id='.$panel_to_delete
		);

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_qr_delete_panel')) ? eval($hook) : null;
		$forum_db->query_build($query) or error(__FILE__, __LINE__);

		// Regenerate the panels cache
		if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
			require PORTAL_ROOT.'include/cache.php';

		generate_panels_cache();

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_pre_redirect')) ? eval($hook) : null;

		redirect(forum_link($forum_url['admin_panels']), $lang_admin_panels['Panel deleted'].' '.$lang_admin_common['Redirect']);
	}
	else	// If the user hasn't confirmed the delete
	{
		$query = array(
			'SELECT'	=> 'pn.name',
			'FROM'		=> 'panels AS pn',
			'WHERE'		=> 'pn.id='.$panel_to_delete
		);

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_qr_get_panel_name')) ? eval($hook) : null;
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		if (!$forum_db->num_rows($result))
			message($lang_common['Bad request']);

		$panel_name = $forum_db->result($result);


		// Setup breadcrumbs
		$forum_page['crumbs'] = array(
			array($forum_config['o_board_title'], forum_link($forum_url['index'])),
			array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
			array($lang_admin_common['Start'], forum_link($forum_url['admin_index'])),
			array($lang_admin_panels['Panels'], forum_link($forum_url['admin_panels'])),
			$lang_admin_panels['Delete panel']
		);

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_pre_header_load')) ? eval($hook) : null;

		define('FORUM_PAGE_SECTION', 'start');
		define('FORUM_PAGE', 'admin-panels');
		require FORUM_ROOT.'header.php';

		// START SUBST - <!-- forum_main -->
		ob_start();

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php printf($lang_admin_panels['Confirm delete panel'], forum_htmlencode($panel_name)) ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_panels']) ?>?del_panel=<?php echo $panel_to_delete ?>">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_panels']).'?del_panel='.$panel_to_delete) ?>" />
			</div>
			<div class="ct-box warn-box">
				<p class="warn"><?php echo $lang_admin_panels['Delete panel warning'] ?></p>
			</div>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="del_panel_comply" value="<?php echo $lang_admin_panels['Delete panel'] ?>" /></span>
				<span class="cancel"><input type="submit" name="del_panel_cancel" value="<?php echo $lang_admin_common['Cancel'] ?>" /></span>
			</div>
		</form>
	</div>

<?php

		($hook = get_hook('xn_portal_by_daris_apn_del_panel_end')) ? eval($hook) : null;

		$tpl_temp = forum_trim(ob_get_contents());
		$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
		ob_end_clean();
		// END SUBST - <!-- forum_main -->

		require FORUM_ROOT.'footer.php';
	}
}


// Update forum positions
else if (isset($_POST['update_positions']))
{
	$positions = array_map('intval', $_POST['position']);

	($hook = get_hook('xn_portal_by_daris_apn_update_positions_form_submitted')) ? eval($hook) : null;

	$query = array(
		'SELECT'	=> 'p.id, p.position',
		'FROM'		=> 'panels AS p',
		'ORDER BY'	=> 'p.position'
	);

	($hook = get_hook('xn_portal_by_daris_apn_qr_get_panels')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	while ($cur_panel = $forum_db->fetch_assoc($result))
	{
		// If these aren't set, we're looking at a forum that was added after
		// the admin started editing: we don't want to mess with it
		if (isset($positions[$cur_panel['id']]))
		{
			$new_disp_position = $positions[$cur_panel['id']];

// 			if ($new_disp_position < 0)
// 				message($lang_admin['Must be integer']);

			// We only want to update if we changed the position
			if ($cur_panel['position'] != $new_disp_position)
			{
				$query = array(
					'UPDATE'	=> 'panels',
					'SET'		=> 'position='.$new_disp_position,
					'WHERE'		=> 'id='.$cur_panel['id']
				);

				($hook = get_hook('xn_portal_by_daris_apn_qr_update_panel_position')) ? eval($hook) : null;
				$forum_db->query_build($query) or error(__FILE__, __LINE__);
			}
		}
	}

	// Regenerate the panels cache
	require_once PORTAL_ROOT.'include/cache.php';
	generate_panels_cache();
	
	($hook = get_hook('xn_portal_by_daris_apn_update_positions_pre_redirect')) ? eval($hook) : null;

	redirect(forum_link($forum_url['admin_panels']), $lang_admin_panels['Panels updated'].' '.$lang_admin_common['Redirect']);
}


else if (isset($_GET['edit_panel']))
{
	$panel_id = intval($_GET['edit_panel']);
	if ($panel_id < 1)
		message($lang_common['Bad request']);

	($hook = get_hook('xn_portal_by_daris_apn_edit_panel_selected')) ? eval($hook) : null;

	// Update panel
	if (isset($_POST['save']))
	{
		($hook = get_hook('xn_portal_by_daris_apn_save_panel_form_submitted')) ? eval($hook) : null;

		$name = trim($_POST['name']);
		$content = forum_linebreaks(trim($_POST['content']));
		$location = intval($_POST['location']);
		$file = trim($_POST['file']);

		// security - directory travesal
		if (strpos($file, '../') !== false)
			message($lang_common['Bad request']);

		$query = array(
			'UPDATE'	=> 'panels',
			'SET'		=> 'name=\''.$forum_db->escape($name).'\', content=\''.$forum_db->escape($content).'\', file=\''.$forum_db->escape($file).'\', location='.$location,
			'WHERE'		=> 'id='.$panel_id
		);

		($hook = get_hook('xn_portal_by_daris_apn_qr_update_panel')) ? eval($hook) : null;
		$forum_db->query_build($query) or error(__FILE__, __LINE__);

		// Regenerate the panels cache
		require_once PORTAL_ROOT.'include/cache.php';
		generate_panels_cache();

		redirect(forum_link($forum_url['admin_panels']), $lang_admin_panels['Panel updated'].' '.$lang_admin_common['Redirect']);
	}

	// Fetch panel info
	$query = array(
		'SELECT'	=> 'pn.id, pn.name, pn.content, pn.file, pn.location',
		'FROM'		=> 'panels AS pn',
		'WHERE'		=> 'pn.id='.$panel_id
	);

	($hook = get_hook('xn_portal_by_daris_apn_qr_get_panel_details')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	if (!$forum_db->num_rows($result))
		message($lang_common['Bad request']);
		
	$cur_panel = $forum_db->fetch_assoc($result);

	// Setup the form
	$forum_page['item_count'] = $forum_page['group_count'] = $forum_page['fld_count'] = 0;

	// Setup breadcrumbs
	$forum_page['crumbs'] = array(
		array($forum_config['o_board_title'], forum_link($forum_url['index'])),
		array($lang_admin_common['Forum administration'], forum_link($forum_url['admin_index'])),
		array($lang_admin_common['Start'], forum_link($forum_url['admin_index'])),
		array($lang_admin_panels['Panels'], forum_link($forum_url['admin_panels'])),
		$lang_admin_panels['Edit panel']
	);

	($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_header_load')) ? eval($hook) : null;

	define('FORUM_PAGE_SECTION', 'start');
	define('FORUM_PAGE', 'admin-panels');
	require FORUM_ROOT.'header.php';

	// START SUBST - <!-- forum_main -->
	ob_start();

	($hook = get_hook('xn_portal_by_daris_apn_edit_panel_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php printf($lang_admin_panels['Edit panel head'], forum_htmlencode($cur_panel['name'])) ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form method="post" class="frm-form" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_panels']) ?>?edit_panel=<?php echo $panel_id ?>">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_panels']).'?edit_panel='.$panel_id) ?>" />
			</div>
			<div class="content-head">
				<h3 class="hn"><span><?php echo $lang_admin_panels['Edit panel details head'] ?></span></h3>
			</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_details_fieldset')) ? eval($hook) : null; ?>
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_panels['Edit panel details legend'] ?></strong></legend>
<?php ($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_panel_name')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel name'] ?></span> <small><?php echo $lang_admin_panels['Panel name help'] ?></small></label>
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="name" size="50" value="<?php echo forum_htmlencode($cur_panel['name']) ?>" /></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_panel_file')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box select">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel file'] ?></span></label><br />
						<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="file">
<?php echo get_panel_files($cur_panel['file']) ?>
						</select></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_panel_location')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box select">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel location'] ?></span></label><br />
						<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="location">
<?php
	foreach ($location_names as $location => $name)
		echo '<option value="'.$location.'"'.($cur_panel['location'] == $location ? ' selected="selected"' : '').'>'.$lang_admin_panels[$name].'</option>';
?>
						</select></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_edit_panel_pre_panel_content')) ? eval($hook) : null; ?>
				<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="txt-box textarea">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel content'] ?></span> <small><?php echo $lang_admin_panels['Panel content help'] ?></small></label><br />
						<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="content" rows="8" cols="50"><?php echo forum_htmlencode($cur_panel['content']) ?></textarea></span></div>
					</div>
				</div>
			</fieldset>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="save" value="<?php echo $lang_admin_common['Save changes'] ?>" /></span>
			</div>
		</form>
	</div>
<?php

	($hook = get_hook('xn_portal_by_daris_apn_edit_panel_end')) ? eval($hook) : null;

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
	array($lang_admin_common['Start'], forum_link($forum_url['admin_index'])),
	array($lang_admin_panels['Panels'], forum_link($forum_url['admin_panels']))
);

($hook = get_hook('xn_portal_by_daris_apn_pre_header_load')) ? eval($hook) : null;

define('FORUM_PAGE_SECTION', 'start');
define('FORUM_PAGE', 'admin-panels');
require FORUM_ROOT.'header.php';

// START SUBST - <!-- forum_main -->
ob_start();

($hook = get_hook('xn_portal_by_daris_apn_main_output_start')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_admin_panels['Add panel head'] ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_panels']) ?>?action=adddel">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_panels']).'?action=adddel') ?>" />
			</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_add_panel_fieldset')) ? eval($hook) : null; ?>
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_admin_panels['Add panel legend'] ?></strong></legend>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_add_panel_name')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel name'] ?></span></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="name" size="50" /></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_add_panel_location')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box select">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel location'] ?></span></label><br />
						<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="location">
<?php
	foreach ($location_names as $location => $name)
		echo '<option value="'.$location.'">'.$lang_admin_panels[$name].'</option>';
?>
						</select></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_add_panel_file')) ? eval($hook) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box select">
						<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Panel file'] ?></span></label><br />
						<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="file">
<?php echo get_panel_files() ?>
						</select></span>
					</div>
				</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_add_panel_fieldset_end')) ? eval($hook) : null; ?>
			</fieldset>
<?php ($hook = get_hook('xn_portal_by_daris_apn_add_panel_fieldset_end')) ? eval($hook) : null; ?>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="add_panel" value=" <?php echo $lang_admin_panels['Add panel'] ?> " /></span>
			</div>
		</form>
	</div>

<?php

// Display all the panels
$query = array(
	'SELECT'	=> 'pn.id, pn.name, pn.content, pn.position, pn.location, pn.enable, pn.file',
	'FROM'		=> 'panels AS pn',
	'ORDER BY'	=> 'pn.location, pn.position'
);

($hook = get_hook('xn_portal_by_daris_apn_qr_get_panels')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

if ($forum_db->num_rows($result))
{
	// Reset fieldset counter
	$forum_page['set_count'] = 0;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_admin_panels['Edit panels head'] ?></span></h2>
	</div>
	<div class="main-content main-frm">
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo forum_link($forum_url['admin_panels']) ?>?action=edit">
			<div class="hidden">
				<input type="hidden" name="csrf_token" value="<?php echo generate_form_token(forum_link($forum_url['admin_panels']).'?action=edit') ?>" />
			</div>

<?php

	$cur_category = -1;
	$i = 2;
	$forum_page['item_count'] = 0;

	while ($cur_panel = $forum_db->fetch_assoc($result))
	{

		if ($cur_panel['location'] != $cur_category)	// A new category since last iteration?
		{
			if ($i > 2) echo "\t\t\t".'</div>'."\n";

			$forum_page['group_count'] = $forum_page['item_count'] = 0;
?>
			<div class="content-head">
				<h3 class="hn"><span><?php printf($lang_admin_panels['Panels for'], $lang_admin_panels[$location_names[$cur_panel['location']]]) ?></span></h3>
			</div>
			<div class="frm-group frm-hdgroup group<?php echo ++$forum_page['group_count'] ?>">

<?php

			$cur_category = $cur_panel['location'];
		}

($hook = get_hook('xn_portal_by_daris_apn_pre_edit_cur_panel_fieldset')) ? eval($hook) : null;

?>
				<fieldset class="mf-set set<?php echo ++$forum_page['item_count'] ?><?php echo ($forum_page['item_count'] == 1) ? ' mf-head' : ' mf-extra' ?>">
					<legend><span><?php printf($lang_admin_panels['Edit or delete'], '<a href="'.forum_link($forum_url['admin_panels']).'?edit_panel='.$cur_panel['id'].'">'.$lang_admin_panels['Edit'].'</a>', '<a href="'.forum_link($forum_url['admin_panels']).'?del_panel='.$cur_panel['id'].'">'.$lang_admin_panels['Delete'].'</a>') ?></span></legend>
					<div class="mf-box">
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_edit_cur_panel_name')) ? eval($hook) : null; ?>
						<div class="mf-field mf-field1 forum-field">
							<span class="aslabel"><?php echo $lang_admin_panels['Panel name'] ?></span>
							<span class="fld-input"><?php echo forum_htmlencode($cur_panel['name']) ?></span>
						</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_edit_cur_panel_position')) ? eval($hook) : null; ?>
						<div class="mf-field">
							<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_admin_panels['Position label'] ?></span></label><br />
							<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="position[<?php echo $cur_panel['id'] ?>]" size="3" maxlength="3" value="<?php echo $cur_panel['position'] ?>" /></span>
						</div>
					</div>
<?php ($hook = get_hook('xn_portal_by_daris_apn_pre_edit_cur_panel_fieldset_end')) ? eval($hook) : null; ?>
				</fieldset>
<?php

		($hook = get_hook('xn_portal_by_daris_apn_edit_cur_panel_fieldset_end')) ? eval($hook) : null;

		++$i;
	}

?>
			</div>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="update_positions" value="<?php echo $lang_admin_panels['Update positions'] ?>" /></span>
			</div>
		</form>
	</div>
<?php

}


($hook = get_hook('xn_portal_by_daris_apn_end')) ? eval($hook) : null;

$tpl_temp = forum_trim(ob_get_contents());
$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
ob_end_clean();
// END SUBST - <!-- forum_main -->

require FORUM_ROOT.'footer.php';
