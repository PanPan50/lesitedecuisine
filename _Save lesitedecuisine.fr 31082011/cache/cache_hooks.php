<?php

define('FORUM_HOOKS_LOADED', 1);

$forum_hooks = array (
  'pf_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'hotfix_135_in_admin_bans_and_profile\',
\'path\'			=> FORUM_ROOT.\'extensions/hotfix_135_in_admin_bans_and_profile\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/hotfix_135_in_admin_bans_and_profile\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_url[\'admin_bans\'] = \'admin/bans.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aba_pre_header_load' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'hotfix_135_in_admin_bans_and_profile\',
\'path\'			=> FORUM_ROOT.\'extensions/hotfix_135_in_admin_bans_and_profile\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/hotfix_135_in_admin_bans_and_profile\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_url[\'admin_bans\'] = \'admin/bans.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aba_main_output_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'hotfix_135_in_admin_bans_and_profile\',
\'path\'			=> FORUM_ROOT.\'extensions/hotfix_135_in_admin_bans_and_profile\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/hotfix_135_in_admin_bans_and_profile\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_page[\'form_action\'] = forum_link($forum_url[\'admin_bans\']).\'?action=more\';
			$forum_page[\'hidden_fields\'] = array(
				\'csrf_token\'	=> \'<input type="hidden" name="csrf_token" value="\'.generate_form_token($forum_page[\'form_action\']).\'" />\'
			);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ft_about_pre_copyright' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_ninja2\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_ninja2\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_ninja2\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (FORUM_PAGE == \'viewtopic\' && !empty($pun_quote_js_arrays)) {
		$text = $pun_quote_js_arrays;
						
		if (strpos($text, \'ninja\') !== false && strpos($text, \'/ninja\') !== false) {
			if($forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 1 || $forum_user[\'is_admmod\'] || $forum_user[\'g_id\'] == 21 || $forum_user[\'g_id\'] == 4 || $forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 16) {
				$text_ninja = preg_replace(\'#\\[ninja\\=gr([0-9]*)](.*?)\\[/ninja\\]#s\', \'</p><div class="quotebox"><cite>\'.$lang_nya_bbcode[\'Hidden text group\'].\'[$1]:</cite><blockquote><p><i>$2</i></p></blockquote></div><p>\', $temp[0][$i]);
			} else {
				$text = preg_replace(\'#\\[ninja\\](.*?)\\[\\/ninja\\]#si\', \'\', $text);
			}
		}
		
		$pun_quote_js_arrays = $text;	
	}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (defined(\'PUN_BBCODE_BAR_INCLUDE\')) {
	include $ext_info[\'path\'].\'/bar.php\';
?>
<script type="text/javascript"><!--
var pun_bbcode_bar = document.getElementById("pun_bbcode_bar");
if (pun_bbcode_bar) {
	pun_bbcode_bar.innerHTML = "<?php echo pun_bbcode_bar(); ?>";
	pun_bbcode_bar.style.display = "block";
	pun_bbcode_bar.style.visibility = "visible";
}
--></script>
<?php
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (FORUM_PAGE == \'viewtopic\' && !empty($pun_quote_js_arrays))
				echo \'<script type="text/javascript"><!--\'."\\n".\'var pun_quote_posts = new Array(\'.$forum_page[\'item_count\'].\');\'."\\n".\'var pun_quote_authors = new Array(\'.$forum_page[\'item_count\'].\');\'."\\n".$pun_quote_js_arrays.\'--></script>\'."\\n";

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'co_common' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_admin_manage_extensions_improved\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_admin_manage_extensions_improved\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_admin_manage_extensions_improved\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    4 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    5 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    6 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_extensions_used = array_merge(isset($pun_extensions_used) ? $pun_extensions_used : array(), array($ext_info[\'id\']));

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_view_details_selected' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'is_guest\'] && $user[\'num_posts\'] < $forum_config[\'p_sig_min_posts\'])
{
	unset($parsed_signature);
	$user[\'url\'] = \'\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_post_loop_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($cur_post[\'g_id\'] != FORUM_ADMIN && $cur_post[\'num_posts\'] < $forum_config[\'p_sig_min_posts\'])
{
	$cur_post[\'signature\'] = \'\';
	$cur_post[\'url\'] = \'\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_change_details_identity_contact_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ((isset($form[\'url\']) ? forum_htmlencode($form[\'url\']) : forum_htmlencode($user[\'url\'])) != \'\' && !$forum_user[\'is_admmod\'] && $forum_user[\'num_posts\'] < $forum_config[\'p_sig_min_posts\'])
{
	if (!isset($lang_pun_antispam))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

?>
			<div class="ct-box info-box">
				<p class="warn"><?php echo $lang_pun_antispam[\'No website yet\']; ?></p>
			</div>
<?php

}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_features_validation' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($form[\'pun_antispam_captcha_register\']) || $form[\'pun_antispam_captcha_register\'] != \'1\') $form[\'pun_antispam_captcha_register\'] = \'0\';
if (!isset($form[\'pun_antispam_captcha_login\']) || $form[\'pun_antispam_captcha_login\'] != \'1\') $form[\'pun_antispam_captcha_login\'] = \'0\';
if (!isset($form[\'pun_antispam_captcha_guestpost\']) || $form[\'pun_antispam_captcha_guestpost\'] != \'1\') $form[\'pun_antispam_captcha_guestpost\'] = \'0\';
if (!isset($form[\'pun_antispam_captcha_restorepass\']) || $form[\'pun_antispam_captcha_restorepass\'] != \'1\') $form[\'pun_antispam_captcha_restorepass\'] = \'0\';
$form[\'sig_min_posts\'] = isset($form[\'sig_min_posts\']) ? intval($form[\'sig_min_posts\']) : \'0\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($form[\'pun_poll_enable_read\']) || $form[\'pun_poll_enable_read\'] != \'1\') $form[\'pun_poll_enable_read\'] = \'0\';
			if (!isset($form[\'pun_poll_enable_revote\']) || $form[\'pun_poll_enable_revote\'] != \'1\') $form[\'pun_poll_enable_revote\'] = \'0\';
			$form[\'pun_poll_max_answers\'] = intval($form[\'pun_poll_max_answers\']);

			if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
			if ($form[\'pun_poll_max_answers\'] > 100)
				$form[\'pun_poll_max_answers\'] = 100;
			if ($form[\'pun_poll_max_answers\'] < 2)
				$form[\'pun_poll_max_answers\'] = 2;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_stat_counters\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_stat_counters\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_stat_counters\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// GA
			$form[\'fancy_stat_counter_enable_ga\'] = (!isset($form[\'fancy_stat_counter_enable_ga\']) || (int) $form[\'fancy_stat_counter_enable_ga\'] <= 0) ? \'0\' : \'1\';
			$form[\'fancy_stat_counter_id_ga\'] = (isset($form[\'fancy_stat_counter_id_ga\'])) ? utf8_substr(forum_trim($form[\'fancy_stat_counter_id_ga\']), 0, 20) : \'\';

			// YM
			$form[\'fancy_stat_counter_enable_ym\'] = (!isset($form[\'fancy_stat_counter_enable_ym\']) || (int) $form[\'fancy_stat_counter_enable_ym\'] <= 0) ? \'0\' : \'1\';
			$form[\'fancy_stat_counter_id_ym\'] = (isset($form[\'fancy_stat_counter_id_ym\'])) ? utf8_substr(forum_trim($form[\'fancy_stat_counter_id_ym\']), 0, 20) : \'\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$form[\'pun_pm_inbox_size\'] = (!isset($form[\'pun_pm_inbox_size\']) || (int) $form[\'pun_pm_inbox_size\'] <= 0) ? \'0\' : (string)(int) $form[\'pun_pm_inbox_size\'];
$form[\'pun_pm_outbox_size\'] = (!isset($form[\'pun_pm_outbox_size\']) || (int) $form[\'pun_pm_outbox_size\'] <= 0) ? \'0\' : (string)(int) $form[\'pun_pm_outbox_size\'];
if (!isset($form[\'pun_pm_show_new_count\']) || $form[\'pun_pm_show_new_count\'] != \'1\')
	$form[\'pun_pm_show_new_count\'] = \'0\';
if (!isset($form[\'pun_pm_show_global_link\']) || $form[\'pun_pm_show_global_link\'] != \'1\')
	$form[\'pun_pm_show_global_link\'] = \'0\';

($hook = get_hook(\'pun_pm_aop_features_validation_end\')) ? eval($hook) : null;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    4 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if(!isset($form[\'pm_email_enable\']) || $form[\'pm_email_enable\'] != \'1\') $form[\'pm_email_enable\'] = \'0\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    5 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$form[\'fancy_video_tag_html5\'] = (!isset($form[\'fancy_video_tag_html5\']) || intval($form[\'fancy_video_tag_html5\'], 10) <= 0) ? \'0\' : \'1\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_change_details_signature_pre_fieldset' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($forum_page[\'sig_demo\']) && $forum_page[\'sig_demo\'] != \'\' && !$forum_user[\'is_admmod\'] && $forum_user[\'num_posts\'] < $forum_config[\'p_sig_min_posts\'])
{
	if (!isset($lang_pun_antispam))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

?>
			<div class="ct-box info-box">
				<p class="warn"><?php echo $lang_pun_antispam[\'No signature yet\']; ?></p>
			</div>
<?php

}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_features_pre_sig_content_fieldset' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

?>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Min posts for sig\'] ?></span><small><?php echo $lang_pun_antispam[\'Min posts for sig info\'] ?></small></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page[\'fld_count\'] ?>" name="form[sig_min_posts]" size="5" maxlength="5" value="<?php echo $forum_config[\'p_sig_min_posts\'] ?>" /></span>
					</div>
				</div>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_features_avatars_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_page[\'group_count\'] = $forum_page[\'item_count\'] = 0;

?>
			<div class="content-head">
				<h2 class="hn"><span><?php echo $lang_pun_antispam[\'Captcha admin head\'] ?></span></h2>
			</div>
			<div class="ct-box"><p><?php echo $lang_pun_antispam[\'Captcha admin info\'] ?></p></div>
			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><span><?php echo $lang_pun_antispam[\'Captcha admin legend\'] ?></span></legend>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_antispam_captcha_register]" value="1"<?php if ($forum_config[\'o_pun_antispam_captcha_register\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Captcha admin legend\'] ?></span><?php echo $lang_pun_antispam[\'Captcha registrations info\'] ?></label>
					</div>
				</div>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_antispam_captcha_login]" value="1"<?php if ($forum_config[\'o_pun_antispam_captcha_login\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"> <?php echo $lang_pun_antispam[\'Captcha login info\'] ?></label>
					</div>
				</div>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_antispam_captcha_guestpost]" value="1"<?php if ($forum_config[\'o_pun_antispam_captcha_guestpost\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"> <?php echo $lang_pun_antispam[\'Captcha guestpost info\'] ?></label>
					</div>
				</div>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_antispam_captcha_restorepass]" value="1"<?php if ($forum_config[\'o_pun_antispam_captcha_restorepass\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"> <?php echo $lang_pun_antispam[\'Captcha reset info\'] ?></label>
					</div>
				</div>
			</fieldset>
<?php

// Reset fieldset counter
$forum_page[\'set_count\'] = 0;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

?>
					<div class="content-head">
						<h2 class="hn"><span><?php echo $lang_pun_poll[\'Name plugin\'] ?></span></h2>
					</div>
					<fieldset class="frm-group group1">
						<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
							<div class="sf-box checkbox">
								<span class="fld-input">
									<input id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" type="checkbox" name="form[pun_poll_enable_revote]" value="1"<?php if ($forum_config[\'p_pun_poll_enable_revote\'] == \'1\') echo \' checked="checked"\' ?>/>
								</span>
								<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>">
									<span><?php echo $lang_pun_poll[\'Disable revoting info\'] ?></span>
									<?php echo $lang_pun_poll[\'Disable revoting\'] ?>
								</label>
							</div>
						</div>
						<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
							<div class="sf-box checkbox">
								<span class="fld-input">
									<input id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" type="checkbox" name="form[pun_poll_enable_read]" value="1"<?php if ($forum_config[\'p_pun_poll_enable_read\'] == \'1\') echo \' checked="checked"\' ?>/>
								</span>
								<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>">
									<span><?php echo $lang_pun_poll[\'Disable see results\'] ?></span>
									<?php echo $lang_pun_poll[\'Disable see results info\'] ?>
								</label>
							</div>
						</div>
						<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
							<div class="sf-box text">
								<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>">
									<span><?php echo $lang_pun_poll[\'Maximum answers info\'] ?></span>
									<small><?php echo $lang_pun_poll[\'Maximum answers\'] ?></small>
								</label>
								</br>
								<span class="fld-input">
									<input id="fld<?php echo $forum_page[\'fld_count\'] ?>" type="text" name="form[pun_poll_max_answers]" size="6" maxlength="6" value="<?php echo $forum_config[\'p_pun_poll_max_answers\'] ?>"/>
								</span>
							</div>
						</div>
					</fieldset>
			<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Admin options
if (!isset($lang_pun_pm))
{
	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
		include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
	else
		include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
}

$forum_page[\'group_count\'] = $forum_page[\'item_count\'] = 0;

?>
			<div class="content-head">
				<h2 class="hn"><span><?php echo $lang_pun_pm[\'Features title\'] ?></span></h2>
			</div>
			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><span><?php echo $lang_pun_pm[\'PM settings\'] ?></span></legend>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_pm[\'Inbox limit\'] ?></span><small><?php echo $lang_pun_pm[\'Inbox limit info\'] ?></small></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page[\'fld_count\'] ?>" name="form[pun_pm_inbox_size]" size="6" maxlength="6" value="<?php echo $forum_config[\'o_pun_pm_inbox_size\'] ?>" /></span>
					</div>
				</div>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_pm[\'Outbox limit\'] ?></span><small><?php echo $lang_pun_pm[\'Outbox limit info\'] ?></small></label><br />
						<span class="fld-input"><input type="text" id="fld<?php echo $forum_page[\'fld_count\'] ?>" name="form[pun_pm_outbox_size]" size="6" maxlength="6" value="<?php echo $forum_config[\'o_pun_pm_outbox_size\'] ?>" /></span>
					</div>
				</div>
				<fieldset class="mf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<legend><span><?php echo $lang_pun_pm[\'Navigation links\'] ?></span></legend>
					<div class="mf-box">
						<div class="mf-item">
							<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_pm_show_new_count]" value="1"<?php if ($forum_config[\'o_pun_pm_show_new_count\'] == \'1\') echo \' checked="checked"\' ?> /></span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_pun_pm[\'Snow new count\'] ?></label>
						</div>
						<div class="mf-item">
							<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_pm_show_global_link]" value="1"<?php if ($forum_config[\'o_pun_pm_show_global_link\'] == \'1\') echo \' checked="checked"\' ?> /></span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_pun_pm[\'Show global link\'] ?></label>
						</div>
					</div>
				</fieldset>
<?php ($hook = get_hook(\'pun_pm_aop_features_pre_pm_settings_fieldset_end\')) ? eval($hook) : null; ?>
			</fieldset>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_pre_guest_info_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_pun_antispam_captcha_guestpost\'] == \'1\' && empty($_SESSION[\'pun_antispam_confirmed_user\']))
{
?>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text required">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Captcha\'] ?> <em><?php echo $lang_common[\'Required\'] ?></em></span> <small><?php echo $lang_pun_antispam[\'Captcha Info\'] ?></small></label><br />
						<span class="fld-input"><input id="fld<?php echo $forum_page[\'fld_count\'] ?>" type="text" name="pun_antispam_input" value="" size="20" maxlength="10" /></span>
					</div>
					<img id="pun_antispam_image" src="<?php echo $ext_info[\'url\'].\'/image.php?\'.md5(time()) ?>" style="vertical-align: middle; margin: 0 1em;" alt="<?php echo $lang_pun_antispam[\'img alt\'] ?>" /><br />
					<script type="text/javascript">document.write("<small><a href=\\"#\\" onclick=\\"document.getElementById(\'pun_antispam_image\').src = \'<?php echo $ext_info[\'url\'].\'/image.php?\' ?>\' + Math.random(); return false\\"><?php echo $lang_pun_antispam[\'reload image\'] ?></a></small>");</script>
				</div>
<?php
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_end_validation' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'is_guest\'] && $forum_config[\'o_pun_antispam_captcha_guestpost\'] == \'1\')
{
	if (session_id() == "")
		session_start();

	if (empty($_SESSION[\'pun_antispam_confirmed_user\']))
	{
		if (!isset($_SESSION[\'pun_antispam_text\']))
		{
			if (!isset($_POST[\'preview\']))
				$errors[] = $lang_pun_antispam[\'No cookies\'];
		}
		else if ((empty($_SESSION[\'pun_antispam_text\']) || strcmp(utf8_strtolower(trim($_POST[\'pun_antispam_input\'])), utf8_strtolower($_SESSION[\'pun_antispam_text\'])) !== 0))
		{
			if (!isset($_POST[\'preview\']))
				$errors[] = $lang_pun_antispam[\'Invalid Text\'];
		}
		else
			$_SESSION[\'pun_antispam_confirmed_user\'] = 1;
	}

	$_SESSION[\'pun_antispam_text\'] = \'\';

	// Post is to be written to DB, ask CAPTCHA for the next posting
	if (empty($errors) && !isset($_POST[\'preview\']))
		$_SESSION[\'pun_antispam_confirmed_user\'] = 0;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($fid && isset($_POST[\'update_poll\']) && empty($errors))
{
	$new_poll_ans_count = isset($_POST[\'poll_ans_count\']) && intval($_POST[\'poll_ans_count\']) > 0 ? intval($_POST[\'poll_ans_count\']) : FALSE;

	if (!$new_poll_ans_count)
		$errors[] = $lang_pun_poll[\'Empty option count\'];
	if ($new_poll_ans_count < 2)
	{
		$errors[] = $lang_pun_poll[\'Min cnt options\'];
		$new_poll_ans_count = 2;
	}
	if ($new_poll_ans_count > $forum_config[\'p_pun_poll_max_answers\'])
	{
		$errors[] = sprintf($lang_pun_poll[\'Max cnt options\'], $forum_config[\'p_pun_poll_max_answers\']);
		$new_poll_ans_count = $forum_config[\'p_pun_poll_max_answers\'];
	}
	$_POST[\'preview\'] = 1;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_login_form_submitted' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (session_id() == "")
	session_start();

if ($forum_config[\'o_pun_antispam_captcha_login\'] == \'1\' && (isset($_SESSION[\'pun_antispam_logins\']) && $_SESSION[\'pun_antispam_logins\'] > 5) && (empty($_SESSION[\'pun_antispam_text\']) || strcmp(utf8_strtolower(trim($_POST[\'pun_antispam_input\'])), utf8_strtolower($_SESSION[\'pun_antispam_text\'])) !== 0))
	$errors[] = $lang_pun_antispam[\'Invalid Text\'];

$_SESSION[\'pun_antispam_text\'] = \'\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_login_pre_auth_message' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($authorized && empty($errors))
	$_SESSION[\'pun_antispam_logins\'] = 0;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_login_pre_remember_me_checkbox' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_pun_antispam_captcha_login\'] == \'1\')
{
	if (empty($errors) && session_id() == "")
		session_start();

	if (!isset($_SESSION[\'pun_antispam_logins\']))
		$_SESSION[\'pun_antispam_logins\'] = 1;
	else
		$_SESSION[\'pun_antispam_logins\']++;

	// Output CAPTCHA if first attempts failed
	if ($_SESSION[\'pun_antispam_logins\'] > 5)
	{
?>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text required">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Captcha\'] ?> <em><?php echo $lang_common[\'Required\'] ?></em></span> <small><?php echo $lang_pun_antispam[\'Captcha Info\'] ?></small></label><br />
						<span class="fld-input"><input id="fld<?php echo $forum_page[\'fld_count\'] ?>" type="text" name="pun_antispam_input" value="" size="20" maxlength="10" /></span>
					</div>
					<img id="pun_antispam_image" src="<?php echo $ext_info[\'url\'].\'/image.php?\'.md5(time()) ?>" style="vertical-align: middle; margin: 0 1em;" alt="<?php echo $lang_pun_antispam[\'img alt\'] ?>" /><br />
					<script type="text/javascript">document.write("<small><a href=\\"#\\" onclick=\\"document.getElementById(\'pun_antispam_image\').src = \'<?php echo $ext_info[\'url\'].\'/image.php?\' ?>\' + Math.random(); return false\\"><?php echo $lang_pun_antispam[\'reload image\'] ?></a></small>");</script>
				</div>
<?php
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_forgot_pass_selected' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_POST[\'form_sent\']))
{
	if (session_id() == "")
		session_start();

	if ($forum_config[\'o_pun_antispam_captcha_restorepass\'] == \'1\' && (empty($_SESSION[\'pun_antispam_text\']) || strcmp(utf8_strtolower(trim($_POST[\'pun_antispam_input\'])), utf8_strtolower($_SESSION[\'pun_antispam_text\'])) !== 0))
		$errors[] = $lang_pun_antispam[\'Invalid Text\'];

	$_SESSION[\'pun_antispam_text\'] = \'\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_forgot_pass_pre_group_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_pun_antispam_captcha_restorepass\'] == \'1\')
{
?>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text required">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Captcha\'] ?> <em><?php echo $lang_common[\'Required\'] ?></em></span> <small><?php echo $lang_pun_antispam[\'Captcha Info\'] ?></small></label><br />
						<span class="fld-input"><input id="fld<?php echo $forum_page[\'fld_count\'] ?>" type="text" name="pun_antispam_input" value="" size="20" maxlength="10" /></span>
					</div>
					<img id="pun_antispam_image" src="<?php echo $ext_info[\'url\'].\'/image.php?\'.md5(time()) ?>" style="vertical-align: middle; margin: 0 1em;" alt="<?php echo $lang_pun_antispam[\'img alt\'] ?>" /><br />
					<script type="text/javascript">document.write("<small><a href=\\"#\\" onclick=\\"document.getElementById(\'pun_antispam_image\').src = \'<?php echo $ext_info[\'url\'].\'/image.php?\' ?>\' + Math.random(); return false\\"><?php echo $lang_pun_antispam[\'reload image\'] ?></a></small>");</script>
				</div>
<?php
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'rg_register_pre_add_user' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$_SESSION[\'pun_antispam_confirmed_user\'] = 0;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'rg_register_pre_language' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_pun_antispam_captcha_register\'] == \'1\' && empty($_SESSION[\'pun_antispam_confirmed_user\']))
{
?>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text required">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_antispam[\'Captcha\'] ?> <em><?php echo $lang_common[\'Required\'] ?></em></span> <small><?php echo $lang_pun_antispam[\'Captcha Info\'] ?></small></label><br />
						<span class="fld-input"><input id="fld<?php echo $forum_page[\'fld_count\'] ?>" type="text" name="pun_antispam_input" value="" size="20" maxlength="10" /></span>
					</div>
					<img id="pun_antispam_image" src="<?php echo $ext_info[\'url\'].\'/image.php?\'.md5(time()) ?>" style="vertical-align: middle; margin: 0 1em;" alt="<?php echo $lang_pun_antispam[\'img alt\'] ?>" /><br />
					<script type="text/javascript">document.write("<small><a href=\\"#\\" onclick=\\"document.getElementById(\'pun_antispam_image\').src = \'<?php echo $ext_info[\'url\'].\'/image.php?\' ?>\' + Math.random(); return false\\"><?php echo $lang_pun_antispam[\'reload image\'] ?></a></small>");</script>
				</div>
<?php
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'rg_register_form_submitted' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_pun_antispam_captcha_register\'] == \'1\')
{
	if (session_id() == "")
		session_start();

	if (empty($_SESSION[\'pun_antispam_confirmed_user\']))
	{
		if ((empty($_SESSION[\'pun_antispam_text\']) || strcmp(utf8_strtolower(trim($_POST[\'pun_antispam_input\'])), utf8_strtolower($_SESSION[\'pun_antispam_text\'])) !== 0))
			$errors[] = $lang_pun_antispam[\'Invalid Text\'];
		else
			$_SESSION[\'pun_antispam_confirmed_user\'] = 1;
	}

	$_SESSION[\'pun_antispam_text\'] = \'\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Load the captcha language file
if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
include $ext_info[\'path\'].\'/functions.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'li_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Load the captcha language file
if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'rg_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Load the captcha language file
if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Load the captcha language file
if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_POST[\'form\'][\'portal_news_forums\']))
	$_POST[\'form\'][\'portal_news_forums\'] = implode(\',\', $_POST[\'form\'][\'portal_news_forums\']);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aex_section_manage_output_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_admin_manage_extensions_improved\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_admin_manage_extensions_improved\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_admin_manage_extensions_improved\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_page[\'fld_count\'] = 0;
			if (isset($_POST[\'selected_extens\']))
				$sel_extens = explode(\',\', $_POST[\'selected_extens\']);
			else
				$sel_extens = array();

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aex_new_action' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_admin_manage_extensions_improved\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_admin_manage_extensions_improved\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_admin_manage_extensions_improved\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_GET[\'reinstall\']))
{
	$id = preg_replace(\'/[^0-9a-z_]/\', \'\', $_GET[\'reinstall\']);

	//include language file
	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
		require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
	else
		require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

	// We validate the CSRF token. If it\'s set in POST and we\'re at this point, the token is valid.
	// If it\'s in GET, we need to make sure it\'s valid.
	if (!isset($_POST[\'csrf_token\']) && (!isset($_GET[\'csrf_token\']) || $_GET[\'csrf_token\'] !== generate_form_token(\'reinstall\'.$id)))
		csrf_confirm_form();

	// Setup breadcrumbs
	$forum_page[\'crumbs\'] = array(
		array($forum_config[\'o_board_title\'], forum_link($forum_url[\'index\'])),
		array($lang_admin_common[\'Forum administration\'], forum_link($forum_url[\'admin_index\'])),
		$lang_admin_common[\'Manage extensions\']
	);

	if (isset($_POST[\'reinstall_cancel\']))
	{
		$display_group_buttons = true;
		include $ext_info[\'path\'].\'/extension_list.php\';
	}
	else
	{
		//Check for dependencies first
		$query = array(
			\'SELECT\'	=> \'e.id\',
			\'FROM\'		=> \'extensions AS e\',
			\'WHERE\'		=> \'e.disabled=0 AND e.dependencies LIKE \\\'%\'.$forum_db->escape($id).\'%\\\'\'
		);

		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		if ($forum_db->num_rows($result))
		{
			$dependency = $forum_db->fetch_assoc($result);
			$head_notice = sprintf($lang_pun_man_ext_improved[\'Reinstall ext\'], $id);
			$important_message = sprintf($lang_pun_man_ext_improved[\'Reinstall with deps\'], $dependency[\'id\'], \'"\'.$id.\'"\');
			$type = \'reinstall\';
			$handle = $base_url.\'/admin/extensions.php?section=manage&amp;reinstall=\'.$id;
		
			include  $ext_info[\'path\'].\'/continue.php\';	
		}
	}

	// Fetch info about the extension
	$query = array(
		\'SELECT\'	=> \'e.title, e.version, e.description, e.author, e.uninstall, e.uninstall_note\',
		\'FROM\'		=> \'extensions AS e\',
		\'WHERE\'		=> \'e.id=\\\'\'.$forum_db->escape($id).\'\\\'\'
	);

	($hook = get_hook(\'aex_qr_get_extension\')) ? eval($hook) : null;

	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	if (!$forum_db->num_rows($result))
		message($lang_common[\'Bad request\']);

	$old_ext_data = $forum_db->fetch_assoc($result);

	// Load manifest (either locally or from punbb.informer.com updates service)
	if (strpos($id, \'hotfix_\') === 0)
		$manifest = @end(get_remote_file(\'http://punbb.informer.com/update/manifest/\'.$id.\'.xml\', 16));
	else
		$manifest = @file_get_contents(FORUM_ROOT.\'extensions/\'.$id.\'/manifest.xml\');

	// Parse manifest.xml into an array and validate it
	$ext_data = xml_to_array($manifest);
	$errors = validate_manifest($ext_data, $id);

	if (!isset($_POST[\'reinstall_continue\']) && isset($_GET[\'only_hoks\']) && version_compare($ext_data[\'extension\'][\'version\'], $old_ext_data[\'version\'], \'>\'))
	{
		//Show continue page
		$important_message = sprintf($lang_pun_man_ext_improved[\'Update error\'], $id);
		$head_notice = $lang_pun_man_ext_improved[\'Ext update\'];
		$type = \'reinstall\';
		$handle = $base_url.\'/admin/extensions.php?section=manage&amp;multy&amp;only_hoks&amp;reinstall=\'.$id;

		include $ext_info[\'path\'].\'/continue.php\';
	}
	if (!empty($errors))
		message(isset($_GET[\'install\']) ? $lang_common[\'Bad request\'] : $lang_admin_common[\'Hotfix download failed\']);

	// Is there some uninstall code to store in the db?
	$uninstall_code = (isset($ext_data[\'extension\'][\'uninstall\']) && trim($ext_data[\'extension\'][\'uninstall\']) != \'\') ? \'\\\'\'.$forum_db->escape(trim($ext_data[\'extension\'][\'uninstall\'])).\'\\\'\' : \'NULL\';

	// Is there an uninstall note to store in the db?
	$uninstall_note = \'NULL\';
	foreach ($ext_data[\'extension\'][\'note\'] as $cur_note)
	{
		if ($cur_note[\'attributes\'][\'type\'] == \'uninstall\' && trim($cur_note[\'content\']) != \'\')
			$uninstall_note = \'\\\'\'.$forum_db->escape(trim($cur_note[\'content\'])).\'\\\'\';
	}
	// Run uninstall + install only if all previous steps are OK

	
	// Run uninstall code
	if (!isset($_GET[\'only_hoks\']))
		eval($old_ext_data[\'uninstall\']);

	// Now delete the extension and its hooks from the db
	$query = array(
		\'DELETE\'	=> \'extension_hooks\',
		\'WHERE\'		=> \'extension_id = \\\'\'.$forum_db->escape($id).\'\\\'\'
	);
	
	($hook = get_hook(\'aex_qr_uninstall_delete_hooks\')) ? eval($hook) : null;
	
	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	$query = array(
		\'DELETE\'	=> \'extensions\',
		\'WHERE\'	 => \'id = \\\'\'.$forum_db->escape($id).\'\\\'\'
	);

	($hook = get_hook(\'aex_qr_delete_extension\')) ? eval($hook) : null;

	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	require_once $ext_info[\'path\'].\'/functions.php\';

	regenerate_glob_vars();

	// Run the author supplied install code
	if (isset($ext_data[\'extension\'][\'install\']) && trim($ext_data[\'extension\'][\'install\']) != \'\' && !isset($_GET[\'only_hoks\']))
		eval($ext_data[\'extension\'][\'install\']);

	// Make sure we have an array of dependencies
	if (!isset($ext_data[\'extension\'][\'dependencies\']))
		$ext_data[\'extension\'][\'dependencies\'] = array();
	else if (!is_array(current($ext_data[\'extension\'][\'dependencies\'])))
		$ext_data[\'extension\'][\'dependencies\'] = array($ext_data[\'extension\'][\'dependencies\'][\'dependency\']);
	else
		$ext_data[\'extension\'][\'dependencies\'] = $ext_data[\'extension\'][\'dependencies\'][\'dependency\'];

	// Add the new extension
	$query = array(
		\'INSERT\'	=> \'id, title, version, description, author, uninstall, uninstall_note, dependencies\',
		\'INTO\'		=> \'extensions\',
		\'VALUES\'	=> \'\\\'\'.$forum_db->escape($ext_data[\'extension\'][\'id\']).\'\\\', \\\'\'.$forum_db->escape($ext_data[\'extension\'][\'title\']).\'\\\', \\\'\'.$forum_db->escape($ext_data[\'extension\'][\'version\']).\'\\\', \\\'\'.$forum_db->escape($ext_data[\'extension\'][\'description\']).\'\\\', \\\'\'.$forum_db->escape($ext_data[\'extension\'][\'author\']).\'\\\', \'.$uninstall_code.\', \'.$uninstall_note.\', \\\'|\'.implode(\'|\', $ext_data[\'extension\'][\'dependencies\']).\'|\\\'\',
	);
	
	($hook = get_hook(\'aex_qr_add_ext\')) ? eval($hook) : null;
	
	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	// Now insert the hooks
	foreach ($ext_data[\'extension\'][\'hooks\'][\'hook\'] as $ext_hook)
	{
		$cur_hooks = explode(\',\', $ext_hook[\'attributes\'][\'id\']);
		foreach ($cur_hooks as $cur_hook)
		{
			$query = array(
				\'INSERT\'	=> \'id, extension_id, code, installed, priority\',
				\'INTO\'		=> \'extension_hooks\',
				\'VALUES\'	=> \'\\\'\'.$forum_db->escape(trim($cur_hook)).\'\\\', \\\'\'.$forum_db->escape($id).\'\\\', \\\'\'.$forum_db->escape(trim($ext_hook[\'content\'])).\'\\\', \'.time().\', \'.(isset($ext_hook[\'attributes\'][\'priority\']) ? $ext_hook[\'attributes\'][\'priority\'] : 5)
			);
			
			($hook = get_hook(\'aex_qr_add_hook\')) ? eval($hook) : null;
			
			$forum_db->query_build($query) or error(__FILE__, __LINE__);
		}
	}

	// Refresh system after install

	regenerate_glob_vars();

	// Regenerate the hooks cache
	require_once FORUM_ROOT.\'include/cache.php\';
	generate_config_cache();
	generate_hooks_cache();

	$display_group_buttons = true;

	include $ext_info[\'path\'].\'/extension_list.php\';
}

$display_group_buttons = true;

if (isset($_GET[\'multy\']) && (isset($_POST[\'disable_selected\']) || isset($_POST[\'enable_selected\']) || isset($_POST[\'uninstall_selected\'])) && (!isset($_POST[\'extens\']) || !is_array(array_keys($_POST[\'extens\'])) || array_keys($_POST[\'extens\']) == array()))
	$no_selected_extensions = true;
else if (isset($_GET[\'multy\']))
{
	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
		require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
	else
		require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

	if ((isset($_GET[\'disable_sel\']) || isset($_GET[\'enable_sel\']) || isset($_GET[\'uninstall_sel\'])) && (!isset($_POST[\'selected_extens\']) || !is_scalar($_POST[\'selected_extens\'])))
		redirect(forum_link($forum_url[\'admin_extensions_manage\']), $lang_pun_man_ext_improved[\'Input error\'].\' \'.$lang_admin_common[\'Redirect\']);

	if (!isset($_POST[\'csrf_token\']))
		csrf_confirm_form();

	require_once $ext_info[\'path\'].\'/functions.php\';
	
	//Working with list of selected extensions
	$sel_extens = validate_ext_list(isset($_POST[\'extens\']) ? array_keys($_POST[\'extens\']) : explode(\',\', $_POST[\'selected_extens\']));
	if (empty($sel_extens))
		$no_selected_extensions = true;
	else
	{
		$selected_key = is_key_exists($_POST, array(\'disable_selected\', \'enable_selected\', \'uninstall_selected\'));
		if ($selected_key)
		{
			$type = substr($selected_key, 0, -9);
			eval(\'$dependencies_error = get_dependencies_error_\'.$type.\'($sel_extens);\');
			if (!empty($dependencies_error))
				$continue_page = true;
			else
			{
				switch ($type)
				{
					case \'enable\':
						flip_extensions(\'0\', $sel_extens);
						break;
					case \'disable\':
						flip_extensions(\'1\', $sel_extens);
						break;
					case \'uninstall\':
						uninstall_extensions($sel_extens);
						redirect(forum_link($forum_url[\'admin_extensions_manage\']), $lang_pun_man_ext_improved[\'Uninstall selected\'].\' \'.$lang_admin_common[\'Redirect\']);
						break;
				}
			}
		}
		//Continue disable selected
		else if (isset($_GET[\'disable_sel\']) && isset($_POST[\'disable_continue\']))
		{
			if (!isset($_POST[\'disable_type\']) || ($_POST[\'disable_type\'] != 0 && $_POST[\'disable_type\'] != 1))
				message($lang_common[\'Bad request\']);

			if ($_POST[\'disable_type\'] == 0)
				flip_extensions(\'1\', $sel_extens);
			else
			{
				flip_extensions(\'1\', $sel_extens);
				$dependencies_error = get_dependencies_error_disable($sel_extens);
				if (!empty($dependencies_error))
				{
					$disable_dep_exts = array();
					foreach ($dependencies_error as $dep_ext => $main_exts)
					{
						if (!in_array($dep_ext, $sel_extens) && array_intersect($main_exts, $sel_extens) != array())
							$disable_dep_exts[] = $dep_ext;
					}
					flip_extensions(\'1\', $disable_dep_exts);
				}
			}

			redirect(forum_link($forum_url[\'admin_extensions_manage\']), $lang_pun_man_ext_improved[\'Disable selected\'].\' \'.$lang_admin_common[\'Redirect\']);
		}
		//Continue enable selected
		else if (isset($_GET[\'enable_sel\']) && isset($_POST[\'enable_continue\']))
		{
			if (!isset($_POST[\'enable_type\']) || ($_POST[\'enable_type\'] != 0 && $_POST[\'enable_type\'] != 1))
				message($lang_common[\'Bad request\']);

			if (!$_POST[\'enable_type\'])
				flip_extensions(\'0\', $sel_extens);
			else
			{
				flip_extensions(\'0\', $sel_extens);
				$dependencies_error = get_dependencies_error_enable($sel_extens);
				if (!empty($dependencies_error))
				{
					$disable_dep_exts = array();
					foreach ($dependencies_error as $dep_ext => $main_exts)
					{
						foreach ($main_exts as $ext)
							$disable_dep_exts[] = $ext;
					}
					flip_extensions(\'0\', array_unique($disable_dep_exts));
				}
			}

			redirect(forum_link($forum_url[\'admin_extensions_manage\']), $lang_pun_man_ext_improved[\'Enable selected\'].\' \'.$lang_admin_common[\'Redirect\']);
		}
		//Continue uninstall selected
		else if (isset($_GET[\'uninstall_sel\']) && isset($_POST[\'uninstall_continue\']))
		{
			if (!isset($_POST[\'uninstall_type\']) || !in_array($_POST[\'uninstall_type\'], array(0, 1, 2)))
				message($lang_common[\'Bad request\']);

			if ($_POST[\'uninstall_type\'] == 0)
				uninstall_extensions( $sel_extens );
			else if ($_POST[\'uninstall_type\'] == 1 || $_POST[\'uninstall_type\'] == 2)
			{
				uninstall_extensions($sel_extens);
				$dependencies_error = get_dependencies_error_uninstall($sel_extens);

				if ($_POST[\'uninstall_type\'] == 1)
					flip_extensions(\'1\', array_keys($dependencies_error));
				else
					uninstall_extensions(array_keys($dependencies_error));
			}

			redirect(forum_link($forum_url[\'admin_extensions_manage\']), $lang_pun_man_ext_improved[\'Uninstall selected\'].\' \'.$lang_admin_common[\'Redirect\']);
		}
	}

	if (isset($continue_page))
	{
		$display_group_buttons = false;
		include $ext_info[\'path\'].\'/continue.php\';
	}
}
if ($section == \'manage\')
	include $ext_info[\'path\'].\'/extension_list.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Clear pun_repository cache
if (isset($_GET[\'pun_repository_update\']))
{
	// Validate CSRF token
	if (!isset($_POST[\'csrf_token\']) && (!isset($_GET[\'csrf_token\']) || $_GET[\'csrf_token\'] !== generate_form_token(\'pun_repository_update\')))
		csrf_confirm_form();

	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\'))
		include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\';
	else
		include $ext_info[\'path\'].\'/lang/English/pun_repository.php\';

	@unlink(FORUM_CACHE_DIR.\'cache_pun_repository.php\');
	if (file_exists(FORUM_CACHE_DIR.\'cache_pun_repository.php\'))
		message($lang_pun_repository[\'Unable to remove cached file\'], \'\', $lang_pun_repository[\'PunBB Repository\']);

	redirect($base_url.\'/admin/extensions.php?section=manage\', $lang_pun_repository[\'Cache has been successfully cleared\']);
}

if (isset($_GET[\'pun_repository_download_and_install\']))
{
	$ext_id = preg_replace(\'/[^0-9a-z_]/\', \'\', $_GET[\'pun_repository_download_and_install\']);

	// Validate CSRF token
	if (!isset($_POST[\'csrf_token\']) && (!isset($_GET[\'csrf_token\']) || $_GET[\'csrf_token\'] !== generate_form_token(\'pun_repository_download_and_install_\'.$ext_id)))
		csrf_confirm_form();

	// TODO: Should we check again for unresolved dependencies here?

	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\'))
		include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\';
	else
		include $ext_info[\'path\'].\'/lang/English/pun_repository.php\';

	require_once $ext_info[\'path\'].\'/pun_repository.php\';

	($hook = get_hook(\'pun_repository_download_and_install_start\')) ? eval($hook) : null;

	// Download extension
	$pun_repository_error = pun_repository_download_extension($ext_id, $ext_data);

	if ($pun_repository_error == \'\')
	{
		if (empty($ext_data))
			redirect($base_url.\'/admin/extensions.php?section=manage\', $lang_pun_repository[\'Incorrect manifest.xml\']);

		// Validate manifest
		$errors = validate_manifest($ext_data, $ext_id);
		if (!empty($errors))
			redirect($base_url.\'/admin/extensions.php?section=manage\', $lang_pun_repository[\'Incorrect manifest.xml\']);

		// Everything is OK. Start installation.
		redirect($base_url.\'/admin/extensions.php?install=\'.urlencode($ext_id), $lang_pun_repository[\'Download successful\']);
	}

	($hook = get_hook(\'pun_repository_download_and_install_end\')) ? eval($hook) : null;
}

// Handling the download and update extension action
if (isset($_GET[\'pun_repository_download_and_update\']))
{
	$ext_id = preg_replace(\'/[^0-9a-z_]/\', \'\', $_GET[\'pun_repository_download_and_update\']);

	// Validate CSRF token
	if (!isset($_POST[\'csrf_token\']) && (!isset($_GET[\'csrf_token\']) || $_GET[\'csrf_token\'] !== generate_form_token(\'pun_repository_download_and_update_\'.$ext_id)))
		csrf_confirm_form();

	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\'))
		include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\';
	else
		include $ext_info[\'path\'].\'/lang/English/pun_repository.php\';

	require_once $ext_info[\'path\'].\'/pun_repository.php\';

	$pun_repository_error = \'\';

	($hook = get_hook(\'pun_repository_download_and_update_start\')) ? eval($hook) : null;

	@pun_repository_rm_recursive(FORUM_ROOT.\'extensions/\'.$ext_id.\'.old\');

	// Check dependancies
	$query = array(
		\'SELECT\'	=> \'e.id\',
		\'FROM\'		=> \'extensions AS e\',
		\'WHERE\'		=> \'e.disabled=0 AND e.dependencies LIKE \\\'%|\'.$forum_db->escape($ext_id).\'|%\\\'\'
	);

	($hook = get_hook(\'aex_qr_get_disable_dependencies\')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	if ($forum_db->num_rows($result) != 0)
	{
		$dependency = $forum_db->fetch_assoc($result);
		$pun_repository_error = sprintf($lang_admin[\'Disable dependency\'], $dependency[\'id\']);
	}

	if ($pun_repository_error == \'\' && ($ext_id != $ext_info[\'id\']))
	{
		// Disable extension
		$query = array(
			\'UPDATE\'	=> \'extensions\',
			\'SET\'		=> \'disabled=1\',
			\'WHERE\'		=> \'id=\\\'\'.$forum_db->escape($ext_id).\'\\\'\'
		);

		($hook = get_hook(\'aex_qr_update_disabled_status\')) ? eval($hook) : null;
		$forum_db->query_build($query) or error(__FILE__, __LINE__);

		// Regenerate the hooks cache
		require_once FORUM_ROOT.\'include/cache.php\';
		generate_hooks_cache();
	}

	if ($pun_repository_error == \'\')
	{
		if ($ext_id == $ext_info[\'id\'])
		{
			// Hey! That\'s me!
			// All the necessary files should be included before renaming old directory
			// NOTE: Self-updating is to be tested more in real-life conditions
			if (!defined(\'PUN_REPOSITORY_TAR_EXTRACT_INCLUDED\'))
				require $ext_info[\'path\'].\'/pun_repository_tar_extract.php\';
		}

		$pun_repository_error = pun_repository_download_extension($ext_id, $ext_data, FORUM_ROOT.\'extensions/\'.$ext_id.\'.new\'); // Download the extension

		if ($pun_repository_error == \'\')
		{
			if (is_writable(FORUM_ROOT.\'extensions/\'.$ext_id))
				pun_repository_dir_copy(FORUM_ROOT.\'extensions/\'.$ext_id.\'.new/\'.$ext_id, FORUM_ROOT.\'extensions/\'.$ext_id);
			else
				$pun_repository_error = sprintf($lang_pun_repository[\'Copy fail\'], FORUM_ROOT.\'extensions/\'.$ext_id);
		}
	}

	if ($pun_repository_error == \'\')
	{
		// Do we have extension data at all? :-)
		if (empty($ext_data))
			$errors = array(true);

		// Validate manifest
		if (empty($errors))
			$errors = validate_manifest($ext_data, $ext_id);

		if (!empty($errors))
			$pun_repository_error = $lang_pun_repository[\'Incorrect manifest.xml\'];
	}

	if ($pun_repository_error == \'\')
	{
		($hook = get_hook(\'pun_repository_download_and_update_ok\')) ? eval($hook) : null;

		// Everything is OK. Start installation.
		pun_repository_rm_recursive(FORUM_ROOT.\'extensions/\'.$ext_id.\'.new\');
		redirect($base_url.\'/admin/extensions.php?install=\'.urlencode($ext_id), $lang_pun_repository[\'Download successful\']);
	}

	($hook = get_hook(\'pun_repository_download_and_update_error\')) ? eval($hook) : null;

	// Enable extension
	$query = array(
		\'UPDATE\'	=> \'extensions\',
		\'SET\'		=> \'disabled=0\',
		\'WHERE\'		=> \'id=\\\'\'.$forum_db->escape($ext_id).\'\\\'\'
	);

	($hook = get_hook(\'aex_qr_update_enabled_status\')) ? eval($hook) : null;
	$forum_db->query_build($query) or error(__FILE__, __LINE__);

	// Regenerate the hooks cache
	require_once FORUM_ROOT.\'include/cache.php\';
	generate_hooks_cache();

	($hook = get_hook(\'pun_repository_download_and_update_end\')) ? eval($hook) : null;
}

// Do we have some error?
if (!empty($pun_repository_error))
{
	// Setup breadcrumbs
	$forum_page[\'crumbs\'] = array(
		array($forum_config[\'o_board_title\'], forum_link($forum_url[\'index\'])),
		array($lang_admin_common[\'Forum administration\'], forum_link($forum_url[\'admin_index\'])),
		array($lang_admin_common[\'Extensions\'], forum_link($forum_url[\'admin_extensions_manage\'])),
		array($lang_admin_common[\'Manage extensions\'], forum_link($forum_url[\'admin_extensions_manage\'])),
		$lang_pun_repository[\'PunBB Repository\']
	);

	($hook = get_hook(\'pun_repository__pre_header_load\')) ? eval($hook) : null;

	define(\'FORUM_PAGE_SECTION\', \'extensions\');
	define(\'FORUM_PAGE\', \'admin-extensions-pun-repository\');
	require FORUM_ROOT.\'header.php\';

	// START SUBST - <!-- forum_main -->
	ob_start();

	($hook = get_hook(\'pun_repository_display_error_output_start\')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_pun_repository[\'PunBB Repository\'] ?></span></h2>
	</div>
	<div class="main-content">
		<div class="ct-box warn-box">
			<p class="warn"><?php echo $pun_repository_error ?></p>
		</div>
	</div>
<?php

	($hook = get_hook(\'pun_repository_display_error_pre_ob_end\')) ? eval($hook) : null;

	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace(\'<!-- forum_main -->\', $tpl_temp, $tpl_main);
	ob_end_clean();
	// END SUBST - <!-- forum_main -->

	require FORUM_ROOT.\'footer.php\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aex_section_manage_pre_ext_actions' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_admin_manage_extensions_improved\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_admin_manage_extensions_improved\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_admin_manage_extensions_improved\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
			$forum_page[\'ext_actions\'][] = \'<span><a href="\'.$base_url.\'/admin/extensions.php?section=manage&amp;reinstall=\'.$id.\'&amp;csrf_token=\'.generate_form_token(\'reinstall\'.$id).\'">\'.$lang_pun_man_ext_improved[\'Reinstall\'].\'</a></span>\';
			$forum_page[\'ext_actions\'][] = \'<span><a href="\'.$base_url.\'/admin/extensions.php?section=manage&amp;only_hoks&amp;reinstall=\'.$id.\'&amp;csrf_token=\'.generate_form_token(\'reinstall\'.$id).\'">\'.$lang_pun_man_ext_improved[\'Only hooks\'].\'</a></span>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (defined(\'PUN_REPOSITORY_EXTENSIONS_LOADED\') && isset($pun_repository_extensions[$id]) && version_compare($ext[\'version\'], $pun_repository_extensions[$id][\'version\'], \'<\') && is_writable(FORUM_ROOT.\'extensions/\'.$id))
{
	// Check for unresolved dependencies
	if (isset($pun_repository_extensions[$id][\'dependencies\']))
		$pun_repository_extensions[$id][\'dependencies\'] = pun_repository_check_dependencies($inst_exts, $pun_repository_extensions[$id][\'dependencies\']);

	if (empty($pun_repository_extensions[$id][\'dependencies\'][\'unresolved\']))
		$forum_page[\'ext_actions\'][] = \'<span><a href="\'.$base_url.\'/admin/extensions.php?pun_repository_download_and_update=\'.$id.\'&amp;csrf_token=\'.generate_form_token(\'pun_repository_download_and_update_\'.$id).\'">\'.$lang_pun_repository[\'Download and update\'].\'</a></span>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($fancy_video_tag)) {
				if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\')) {
					require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\';
				} else {
					require $ext_info[\'path\'].\'/lang/English/lang.php\';
				}
			}

			if ($ext[\'id\'] == \'fancy_video_tag\' && !isset($forum_page[\'ext_actions\'][\'fancy_video_tag_settings\'])) {
				$forum_page[\'ext_actions\'][\'fancy_video_tag_settings\'] = \'<span><a href="\'.forum_link($forum_url[\'admin_settings_features\']).\'#\'.$ext_info[\'id\'].\'_settings\'.\'">\'.$fancy_video_tag[\'Go to settings\'].\'</a></span>\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'hd_head' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\'] && ((FORUM_PAGE == \'viewtopic\' && $forum_config[\'o_quickpost\']) || in_array(FORUM_PAGE, array(\'post\', \'postedit\'))))
{
	if (!defined(\'FORUM_PARSER_LOADED\'))
		require FORUM_ROOT.\'include/parser.php\';

	$forum_head[\'style_pun_bbcode\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'.$ext_info[\'url\'].\'/styles.css" />\';
	$forum_head[\'js_pun_bbcode\'] = \'<script type="text/javascript" src="\'.$ext_info[\'url\'].\'/scripts.js"></script>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!$forum_user[\'is_guest\'] && FORUM_PAGE == \'viewtopic\')
				$forum_head[\'quote_js\'] = \'<script type="text/javascript" src="\'.$ext_info[\'url\'].\'/scripts.js"></script>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ((FORUM_PAGE == \'viewtopic\') || in_array(FORUM_PAGE, array(\'post\', \'postedit\')))
		{
		$forum_head[\'style_pun_extended_bbcode\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'.$ext_info[\'url\'].\'/styles.css" />\';
		}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// hd_head hook could be executed from a function (like message), so we need to globalize language variable
global $lang_portal;

if (FORUM_PAGE != \'index\') 
{
	$first_crumb = is_array($forum_page[\'crumbs\'][0]) ? $forum_page[\'crumbs\'][0][0] : $forum_page[\'crumbs\'][0];
	$crumb = array($first_crumb, forum_link($forum_url[\'forums\']));
	
	array_insert($forum_page[\'crumbs\'], 1, $crumb);
	
	if (FORUM_PAGE != \'news\')
		$forum_page[\'crumbs\'][0][0] = $lang_common[\'Index\'];
}
else
{
	// Setup breadcrumbs
	$forum_page[\'crumbs\'] = array(
		array($lang_common[\'Index\'], forum_link($forum_url[\'index\'])),
		array($forum_config[\'o_board_title\'], forum_link($forum_url[\'forums\'])),
	);
}


if (!defined(\'FORUM_PORTAL\') && $forum_config[\'o_portal_panels_all_pages\'] == 1 && strpos(FORUM_PAGE, \'profile-\') === false && strpos(FORUM_PAGE, \'admin-\') === false && FORUM_PAGE != \'message\')
	define(\'FORUM_PORTAL\', $ext_info[\'path\'].\'/\');

if (defined(\'FORUM_PORTAL\'))
{
	$forum_head[\'style_portal\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'. $ext_info[\'url\'].\'/style/style.css" />\';

	$tpl_main = str_replace(\'<!-- forum_crumbs_top -->\', \'\', $tpl_main);
	$tpl_main = str_replace(\'<!-- forum_crumbs_end -->\', \'\', $tpl_main);

	// add portal_top before forum_main
	$tpl_main = str_replace(\'<div id="brd-main">\', \'<!-- forum_crumbs_top -->\'."\\n".\'<!-- portal_top -->\'."\\n".\'<div id="brd-main">\', $tpl_main);
	
/*	if (FORUM_PAGE == \'news\' || FORUM_PAGE == \'pages\')
		$tpl_main = str_replace(\'<!-- forum_main_head -->\', \'\', $tpl_main);
	*/
	// add portal_bottom before forum_stats
	$tpl_main = str_replace(\'<!-- forum_info -->\', "\\n".\'<!-- portal_bottom -->\'."\\n".\'<!-- forum_crumbs_end -->\'."\\n".\'<!-- forum_info -->\', $tpl_main);
	
	
	if (file_exists(FORUM_CACHE_DIR.\'cache_panels.php\'))
		require FORUM_CACHE_DIR.\'cache_panels.php\';

	if (!defined(\'FORUM_PANELS_LOADED\'))
	{
		require FORUM_PORTAL.\'include/cache.php\';
		generate_panels_cache();
		require FORUM_CACHE_DIR.\'cache_panels.php\';
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    4 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Incuding styles for pun_pm
if (defined(\'FORUM_PAGE\') && \'pun_pm\' == substr(FORUM_PAGE, 0, 6))
{
	if (file_exists($ext_info[\'path\'].\'/styles/\'.$forum_user[\'style\'].\'/\'))
		$forum_head[\'style_pun_pm\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'.$ext_info[\'url\'].\'/styles/\'.$forum_user[\'style\'].\'/style.css" />\';
	else
		$forum_head[\'style_pun_pm\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'.$ext_info[\'url\'].\'/styles/Oxygen/style.css" />\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    5 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_head[\'fancy_video_tag_css\'] = \'<style>.brd .entry-content div.fancy_video_tag_player { max-width: 60em !important; overflow: none !important; }</style>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_pm_fn_send_form_pre_output' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\'])
{
	global $smilies, $base_url;
	if (!defined(\'FORUM_PARSER_LOADED\'))
		require FORUM_ROOT.\'include/parser.php\';

	$forum_head[\'style_pun_bbcode\'] = \'<link rel="stylesheet" type="text/css" media="screen" href="\'.$ext_info[\'url\'].\'/styles.css" />\';
	$forum_head[\'js_pun_bbcode\'] = \'<script type="text/javascript" src="\'.$ext_info[\'url\'].\'/scripts.js"></script>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_pre_post_contents' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\']) {
	define(\'PUN_BBCODE_BAR_INCLUDE\', 1);
	echo "\\t\\t\\t".\'<div class="sf-set" id="pun_bbcode_bar"></div>\'."\\n";
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_quickpost_pre_message_box' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\']) {
	define(\'PUN_BBCODE_BAR_INCLUDE\', 1);
	echo "\\t\\t\\t".\'<div class="sf-set" id="pun_bbcode_bar"></div>\'."\\n";
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_pre_message_box' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\']) {
	define(\'PUN_BBCODE_BAR_INCLUDE\', 1);
	echo "\\t\\t\\t".\'<div class="sf-set" id="pun_bbcode_bar"></div>\'."\\n";
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_pm_fn_send_form_pre_textarea_output' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_enabled\']) {
	define(\'PUN_BBCODE_BAR_INCLUDE\', 1);
	echo "\\t\\t\\t".\'<div class="sf-set" id="pun_bbcode_bar"></div>\'."\\n";
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_change_details_settings_validation' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($_POST[\'form\'][\'pun_bbcode_enabled\']) || $_POST[\'form\'][\'pun_bbcode_enabled\'] != \'1\')
	$form[\'pun_bbcode_enabled\'] = \'0\';
else
	$form[\'pun_bbcode_enabled\'] = \'1\';

if (!isset($_POST[\'form\'][\'pun_bbcode_use_buttons\']) || $_POST[\'form\'][\'pun_bbcode_use_buttons\'] != \'1\')
	$form[\'pun_bbcode_use_buttons\'] = \'0\';
else
	$form[\'pun_bbcode_use_buttons\'] = \'1\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Validate option \'quote beginning of message\'
if (!isset($_POST[\'form\'][\'pun_pm_long_subject\']) || $_POST[\'form\'][\'pun_pm_long_subject\'] != \'1\')
	$form[\'pun_pm_long_subject\'] = \'0\';
else
	$form[\'pun_pm_long_subject\'] = \'1\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($_POST[\'form\'][\'enable_pm_email\']) || $_POST[\'form\'][\'enable_pm_email\'] != \'1\')
				$form[\'enable_pm_email\'] = \'0\';
			else
				$form[\'enable_pm_email\'] = \'1\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_change_details_settings_email_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	include $ext_info[\'path\'].\'/lang/English/pun_bbcode.php\';

$forum_page[\'item_count\'] = 0;

?>
			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_bbcode_enabled]" value="1"<?php if ($user[\'pun_bbcode_enabled\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_bbcode[\'Pun BBCode Bar\'] ?></span> <?php echo $lang_pun_bbcode[\'Notice BBCode Bar\'] ?></label>
					</div>
				</div>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_bbcode_use_buttons]" value="1"<?php if ($user[\'pun_bbcode_use_buttons\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pun_bbcode[\'BBCode Graphical\'] ?></span> <?php echo $lang_pun_bbcode[\'BBCode Graphical buttons\'] ?></label>
					</div>
				</div>
			</fieldset>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Per-user option \'quote beginning of message\'
if ($forum_config[\'p_message_bbcode\'] == \'1\')
{
	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	$forum_page[\'item_count\'] = 0;

?>
			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_pun_pm[\'PM settings\'] ?></strong></legend>
				<fieldset class="mf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<legend><span><?php echo $lang_pun_pm[\'Private messages\'] ?></span></legend>
					<div class="mf-box">
						<div class="mf-item">
							<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pun_pm_long_subject]" value="1"<?php if ($user[\'pun_pm_long_subject\'] == \'1\') echo \' checked="checked"\' ?> /></span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_pun_pm[\'Begin message quote\'] ?></label>
						</div>
					</div>
				</fieldset>
<?php ($hook = get_hook(\'pun_pm_pf_change_details_settings_pre_pm_settings_fieldset_end\')) ? eval($hook) : null; ?>
			</fieldset>
<?php
}
else
	echo "\\t\\t\\t".\'<input type="hidden" name="form[pun_pm_long_subject]" value="\'.$user[\'pun_pm_long_subject\'].\'" />\'."\\n";

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_post_actions_selected' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_move_posts\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_move_posts\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_move_posts\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/move_posts.php\'))
				require $ext_info[\'path\'].\'/move_posts.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_move_posts\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_move_posts\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_move_posts\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_post_actions_pre_mod_options' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_move_posts\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_move_posts\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_move_posts\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_page[\'mod_options\'] = array_merge(array(\'<span class="submit first-item"><input type="submit" name="move_posts" value="\'.$lang_pun_move_posts[\'Move selected\'].\'" /></span>\'), $forum_page[\'mod_options\']);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_features_pre_header_load' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'agr_edit_end_qr_update_group' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$query[\'SET\'] .= \', g_poll_add=\'.((isset($_POST[\'poll_add\']) && $_POST[\'poll_add\'] == \'1\') ? 1 : 0);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'agr_add_edit_group_user_permissions_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
			?>

				<fieldset class="mf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<legend>
						<span><?php echo $lang_pun_poll[\'Permission\'] ?></span>
					</legend>
					<div class="mf-box">
						<div class="mf-item">
							<span class="fld-input">
								<input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="poll_add" value="1"<?php if ($group[\'g_poll_add\'] == \'1\') echo \' checked="checked"\' ?>/>
							</span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_pun_poll[\'Poll add\'] ?></label>
						</div>
					</div>
				</fieldset>

			<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'hd_main_elements' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

//Is there something to show?
			if (FORUM_PAGE == \'viewtopic\' && isset($read_unvote_users) && !$forum_user[\'is_guest\'])
			{
				//If we don\'t get count of votes
				if (!isset($vote_count))
				{
					$query_pun_poll = array(
						\'SELECT\'	=>	\'COUNT(id)\',
						\'FROM\'		=>	\'voting\',
						\'WHERE\'		=>	\'topic_id=\'.$id
					);
					$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

					if ($forum_db->num_rows($result_pun_poll) > 0)
						list($vote_count) = $forum_db->fetch_row($result_pun_poll);
				}
				//Showing of vote-form if users can revote or user don\'t vote
				if (!isset($end_voting) && (($is_voted_user && $revote) || !$is_voted_user))
				{
					$query_pun_poll = array(
						\'SELECT\'	=>	\'id, answer\',
						\'FROM\'		=>	\'answers\',
						\'WHERE\'		=>	\'topic_id = \'.$id,
						\'ORDER BY\'	=>	\'id ASC\'
					);
					$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

					if ($forum_db->num_rows($result_pun_poll) > 1)
					{
						$vote_form = \'\';
						$link = forum_link($forum_url[\'topic\'], $id);
						$vote_form = \'<div class="main-subhead"><h2 class="hn"><span><strong>\'.forum_htmlencode($question).\'?</strong></span></h2></div><div class="main-content main-frm"><form class="frm-form" action="\'.$link.\'" accept-charset="utf-8" method="post"><fieldset class="frm-group group1">\';
						$vote_form .= \'<div class="hidden"><input type="hidden" name="csrf_token" value="\'.generate_form_token($link).\'" /></div>\';
						$vote_form .= \'<fieldset class="mf-set set1"><legend><span>\'.$lang_pun_poll[\'Options\'].\'</span></legend><div class="mf-box">\';

						//Determine old answer of user
						if (!isset($old_answer_id))
						{
							$query_pun_poll = array(
								\'SELECT\'	=>	\'answer_id\',
								\'FROM\'		=>	\'voting\',
								\'WHERE\'		=>	\'topic_id = \'.$id.\' AND user_id = \'.$forum_user[\'id\'],
								\'ORDER BY\'	=>	\'answer_id ASC\'
							);
							$result_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

							//If there is something?
							if ($forum_db->num_rows($result_poll) > 0)
								list($old_answer_id) = $forum_db->fetch_row($result_poll);
							unset($result_poll);
						}
						$num = 0;
						while ($answer = $forum_db->fetch_assoc($result_pun_poll)) 
						{
							$vote_form .= \'<div class="mf-item"><span class="fld-input">\';
							$vote_form .= \'<input id="fld\'.++$num.\'" type="radio"\'.((isset($old_answer_id) && $old_answer_id == $answer[\'id\']) ? \' checked="checked"\' : \'\').\' value="\'.$answer[\'id\'].\'" name="answer"/>\';
							$vote_form .= \'</span><label for="fld\'.$num.\'">\'.forum_htmlencode($answer[\'answer\']).\'</label></div>\';
						}
						$vote_form .= \'</div></fieldset></fieldset><div class="frm-buttons"><span class="submit">\';
						$vote_form .= \'<input type="submit" value="\'.$lang_pun_poll[\'But note\'].\'" name="vote"/>\';
						$vote_form .= \'</span></div></form>\';
					}
				}

				//Showing voting results if user have voted or unread user can see voting results
				if (isset($end_voting) || $is_voted_user || (!$is_voted_user && $read_unvote_users))
				{
					if (isset($vote_count) && $vote_count > 0)
					{
						$query_pun_poll = array(
							\'SELECT\'	=>	\'answer, COUNT(v.id)\',
							\'FROM\'		=>	\'answers as a\',
							\'JOINS\'		=>	array(
								array(
									\'LEFT JOIN\'	=>	\'voting AS v\',
									\'ON\'		=>	\'a.id=v.answer_id\'
								)
							),
							\'WHERE\'		=>	\'a.topic_id=\'.$id,
							\'GROUP BY\'	=>	\'a.id\',
							\'ORDER BY\'	=>	\'a.id\'
						);
						$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

						$num = 0;
						$vote_results = isset($vote_form) ? \'\' : \'<div class="main-subhead"><h2 class="hn"><span><strong>\'.forum_htmlencode($question).\'</strong></span></h2></div><div class="main-content main-frm">\';
						$vote_results .= \'<div class="ct-group"><table cellspacing="0"><thead><th class="tc0" scope="col">&nbsp;</th><th class="tc1" scope="col">&nbsp;</th><th class="tc2" scope="col">&nbsp;</th></thead><tbody>\';
						while (list($answer, $count_v) = $forum_db->fetch_row($result_pun_poll))
						{
							$num++;
							$vote_results .= \'<tr class="\'.($num % 2 == 0 ? \'even\' : \'odd\').\'">\';
							$vote_results .= \'<td class="tc0">\'.forum_htmlencode($answer).\'</td>\';
							$vote_results .= \'<td class="tc1">\'.forum_number_format($count_v).\'</td>\';
							$vote_results .= \'<td class="tc2">\'.forum_number_format((float)$count_v/$vote_count * 100, 2).\'%</td></tr>\';
						}
						$num++;
						$vote_results .= \'<tr class="\'.($num % 2 == 0 ? \'even\' : \'odd\').\'"><td class="tc0" colspan="3" style="text-align: center;">\'.$lang_pun_poll[\'Users count\'].$vote_count.\'</td></tr>\';
						$vote_results .= \'</tbody></table></div>\';
					}
					else
						$vote_results = \'<div class="ct-box info-box"><p>\'.$lang_pun_poll[\'No votes\'].\'</p></div>\';
				}
				else
					$vote_results = \'<div class="ct-box info-box"><p>\'.$lang_pun_poll[\'Dis read vote\'].\'</p></div>\';

				if (!empty($main_elements[\'<!-- forum_main_pagepost_top -->\']))
					$tmp_pagepost = $main_elements[\'<!-- forum_main_pagepost_top -->\'];
				$main_elements[\'<!-- forum_main_pagepost_top -->\'] = \'<div class="main-head"><h2 class="hn">\'.$lang_pun_poll[\'Header note\'].\'</h2></div>\';
				$main_elements[\'<!-- forum_main_pagepost_top -->\'] .= isset($vote_form) ? $vote_form : \'\';
				$main_elements[\'<!-- forum_main_pagepost_top -->\'] .= $vote_results;
				$main_elements[\'<!-- forum_main_pagepost_top -->\'] .= \'</div>\';
				$main_elements[\'<!-- forum_main_pagepost_top -->\'] .= isset($tmp_pagepost) ? $tmp_pagepost : \'\';

				unset($tmp_pagepost, $vote_results, $vote_form, $vote_count, $num, $result_pun_poll, $query_pun_poll, $count_v, $question, $answer, $is_voted_user, $end_voting, $read_unvote_users);
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (FORUM_PAGE == \'index\')
{
	// Top breadcrumbs
	if (isset($main_elements[\'<!-- forum_crumbs_top -->\']) && $main_elements[\'<!-- forum_crumbs_top -->\'] == \'\')
		$main_elements[\'<!-- forum_crumbs_top -->\'] = \'<div id="brd-crumbs-top" class="crumbs gen-content">\'."\\n\\t".\'<p>\'.generate_crumbs(false).\'</p>\'."\\n".\'</div>\';

	// Bottom breadcrumbs
	if (isset($main_elements[\'<!-- forum_crumbs_end -->\']) && $main_elements[\'<!-- forum_crumbs_end -->\'] == \'\')
		$main_elements[\'<!-- forum_crumbs_end -->\'] = \'<div id="brd-crumbs-end" class="crumbs gen-content">\'."\\n\\t".\'<p>\'.generate_crumbs(false).\'</p>\'."\\n".\'</div>\';
}
elseif (FORUM_PAGE == \'news\')
{
	$main_elements[\'<!-- forum_crumbs_top -->\'] = \'<div id="brd-crumbs-top">\'."\\n\\t".\'<p>\'./*generate_crumbs(false).*/\'</p>\'."\\n".\'</div>\';
	$main_elements[\'<!-- forum_crumbs_end -->\'] = \'\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_modify_topic_info' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!$forum_user[\'is_guest\'])
			{
				//Get info about poll
				$query_pun_poll = array(
					\'SELECT\'	=>	\'question, read_unvote_users, revote, created, days_count, votes_count\',
					\'FROM\'		=>	\'questions\',
					\'WHERE\'		=>	\'topic_id = \'.$id
				);
				$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

				//Is there something?
				if ($forum_db->num_rows($result_pun_poll) > 0)
				{
					list($question, $read_unvote_users, $revote, $created, $days_count, $max_votes_count) = $forum_db->fetch_row($result_pun_poll);
					
					$revote = ($forum_config[\'p_pun_poll_enable_revote\']) ? $revote : 0;
					$read_unvote_users = ($forum_config[\'p_pun_poll_enable_read\']) ? $read_unvote_users : 0;
					
					//Check up for condition of end poll
					if ($days_count != 0 && time() > $created + $days_count * 86400)
						$end_voting = true;
					else if ($max_votes_count != 0)
					{
						//Get count of votes
						$query_pun_poll = array(
							\'SELECT\'	=>	\'COUNT(id)\',
							\'FROM\'		=>	\'voting\',
							\'WHERE\'		=>	\'topic_id=\'.$id
						);
						$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);
						if ($forum_db->num_rows($result_pun_poll) > 0)
							list($vote_count) = $forum_db->fetch_row($result_pun_poll);

						if (isset($vote_count) && $vote_count >= $max_votes_count)
							$end_voting = true;
					}
					
					if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
						include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
					else
						include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
					//Does user want to vote?
					if (isset($_POST[\'vote\']))
					{
						if (isset($end_voting))
							message($lang_pun_poll[\'End of vote\']);

						$answer_id = isset($_POST[\'answer\']) ? intval($_POST[\'answer\']) : 0;
						if ($answer_id < 1)
							message($lang_common[\'Bad request\']);

						//Is there answer with this id?
						$query_pun_poll = array(
							\'SELECT\'	=>	\'1\',
							\'FROM\'		=>	\'answers\',
							\'WHERE\'		=>	\'topic_id = \'.$id.\' AND id = \'.$answer_id
						);
						$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);
						if ($forum_db->num_rows($result_pun_poll) < 1)
							message($lang_common[\'Bad request\']);

						//Have user voted?
						$query_pun_poll = array(
							\'SELECT\'	=>	\'answer_id\',
							\'FROM\'		=>	\'voting\',
							\'WHERE\'		=>	\'topic_id = \'.$id.\' AND user_id = \'.$forum_user[\'id\']
						);
						$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);
						if (!$revote && $forum_db->num_rows($result_pun_poll) > 0)
							message($lang_pun_poll[\'User vote error\']);

						//If user have voted we update table, if not - insert new record
						if ($revote && $forum_db->num_rows($result_pun_poll) > 0)
						{
							list($old_answer_id) = $forum_db->fetch_row($result_pun_poll);
	
							//Do we needed to update DB?
							if ($old_answer_id != $answer_id)
							{
								$query_pun_poll = array(
									\'UPDATE\'	=>	\'voting\',
									\'SET\'		=>	\'answer_id = \'.$answer_id,
									\'WHERE\'		=>	\'topic_id = \'.$id.\' AND user_id = \'.$forum_user[\'id\']
								);
								$forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

								//Replace old answer id with new for correct output
								$old_answer_id = $answer_id;
							}
						}
						else
						{
							//Add new record
							$query_pun_poll = array(
								\'INSERT\'	=>	\'topic_id, user_id, answer_id\',
								\'INTO\'		=>	\'voting\',
								\'VALUES\'	=>	$id.\', \'.$forum_user[\'id\'].\', \'.$answer_id	
							);
							$forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

							//Manually change votes count for correct results showing
							if (isset($vote_count))
								$vote_count++;
						}
						$is_voted_user = true;
					}
					else
					{
						//Determine user have voted or not
						$query_pun_poll = array(
							\'SELECT\'	=>	\'1\',
							\'FROM\'		=>	\'voting\',
							\'WHERE\'		=>	\'user_id = \'.$forum_user[\'id\'].\' AND topic_id = \'.$id
						);
						$result_pun_poll = $forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);
						
						$is_voted_user = ($forum_db->num_rows($result_pun_poll) > 0) ? true : false;
					}
				}
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'fn_delete_topic_qr_delete_topic' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$query_poll = array(
				\'DELETE\'	=>	\'voting\',
				\'WHERE\'		=>	\'topic_id = \'.$topic_id
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);

			$query_poll = array(
				\'DELETE\'	=>	\'questions\',
				\'WHERE\'		=>	\'topic_id = \'.$topic_id
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);

			$query_poll = array(
				\'DELETE\'	=>	\'answers\',
				\'WHERE\'		=>	\'topic_id = \'.$topic_id
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_qr_get_forum_data' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_POST[\'merge_topics\']) || isset($_POST[\'merge_topics_comply\']))
			{
				$poll_topics = isset($_POST[\'topics\']) && !empty($_POST[\'topics\']) ? $_POST[\'topics\'] : array();
				$poll_topics = array_map(\'intval\', (is_array($poll_topics) ? $poll_topics : explode(\',\', $poll_topics)));

				if (empty($poll_topics))
					message($lang_misc[\'No topics selected\']);

				if (count($poll_topics) == 1)
					message($lang_misc[\'Merge error\']);

				$query_poll = array(
					\'SELECT\'	=>	\'topic_id\',
					\'FROM\'		=>	\'questions\',
					\'WHERE\'		=>	\'topic_id IN(\'.implode(\',\', $poll_topics).\')\'
				);
				$result_pun_poll = $forum_db->query_build($query_poll) or error(__FILE__, __LINE__);
				$num_polls = $forum_db->num_rows($result_pun_poll);

				if ($num_polls > 1)
				{
					if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
						include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
					else
						include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
					message($lang_pun_poll[\'Merge error\']);
				}
				else if ($num_polls == 1)
					list($question_id) = $forum_db->fetch_row($result_pun_poll);

				unset($num_polls);
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_confirm_merge_topics_pre_redirect' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($question_id) && $question_id != $merge_to_tid)
			{
				$query_poll = array(
					\'UPDATE\'	=>	\'questions\',
					\'SET\'		=>	\'topic_id = \'.$merge_to_tid,
					\'WHERE\'		=>	\'topic_id = \'.$question_id
				);
				$forum_db->query_build($query) or error(__FILE__, __LINE__);
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mr_confirm_delete_topics_qr_delete_topics' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_poll_topic_ids = isset($topic_ids) ? $topic_ids : implode(\',\', $topics);
			$query_poll = array(
				\'DELETE\'	=>	\'voting\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);
			
			$query_poll = array(
				\'DELETE\'	=>	\'questions\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);

			$query_poll = array(
				\'DELETE\'	=>	\'answers\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);
			unset($pun_poll_topic_ids);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_req_info_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($fid && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']))
	form_of_poll( isset($poll_question) ? $poll_question : \'\', isset($poll_answers) ? $poll_answers : array(), isset($new_poll_ans_count) ? $new_poll_ans_count : (isset($poll_answers) ? count($poll_answers) : 2), !empty($poll_days) ? $poll_days : \'\', !empty($poll_votes) ? $poll_votes : \'\', isset($poll_read_unvote_users) ? $poll_read_unvote_users : \'0\', isset($poll_revote) ? $poll_revote : \'0\');

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ca_fn_prune_qr_prune_topics' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_poll_topic_ids = isset($topic_ids) ? $topic_ids : implode(\',\', $topics);
			$query_poll = array(
				\'DELETE\'	=>	\'voting\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);
			
			$query_poll = array(
				\'DELETE\'	=>	\'questions\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);

			$query_poll = array(
				\'DELETE\'	=>	\'answers\',
				\'WHERE\'		=>	\'topic_id IN(\'.$pun_poll_topic_ids.\')\'
			);
			$forum_db->query_build($query_poll) or error(__FILE__, __LINE__);
			unset($pun_poll_topic_ids);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_pre_redirect' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($fid && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']) && $poll_question !== FALSE && isset($_POST[\'submit\']) && empty($errors))
	add_poll($new_tid, $poll_question, $poll_answers, $poll_days !== FALSE ? $poll_days : \'NULL\', $poll_votes !== FALSE ? $poll_votes : \'NULL\', $poll_read_unvote_users === FALSE  ? \'0\' : $poll_read_unvote_users, $poll_revote === FALSE ? \'0\' : $poll_revote);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_preview_pre_display' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($fid && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']) && $poll_question !== FALSE && empty($errors))
{
	?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_pun_poll[\'Preview poll\']; ?></span></h2>
	</div>
	<div id="post-preview" class="main-content main-frm">
		<fieldset class="mf-set set1" style="padding:0 0 0 2em">
			<legend>
				<?php echo "\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t".$poll_question; ?>
			</legend>
			<div class="mf-box">
				<?php

					for ($iter = 0; $iter < count($poll_answers); $iter++)
					{
						echo \'<div class="mf-item"><span class="fld-input">\'.($iter + 1).\'</span>\';
						echo \'<label>\'.forum_htmlencode($poll_answers[$iter]).\'</label>\';
						echo \'</div>\';
					}

				?>
			</div>
		</fieldset>
	</div>
	<?php

}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_form_submitted' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($fid && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']))
{
	$poll_question = isset($_POST[\'question_of_poll\']) && !empty($_POST[\'question_of_poll\']) ? $_POST[\'question_of_poll\'] : FALSE;
	if (!empty($poll_question))
	{
		$poll_answers = isset($_POST[\'poll_answer\']) && !empty($_POST[\'poll_answer\']) ? $_POST[\'poll_answer\'] : FALSE;
		$poll_days = isset($_POST[\'allow_poll_days\']) && !empty($_POST[\'allow_poll_days\']) ? $_POST[\'allow_poll_days\'] : FALSE;
		$poll_votes = isset($_POST[\'allow_poll_votes\']) && !empty($_POST[\'allow_poll_votes\']) ? $_POST[\'allow_poll_votes\'] : FALSE;
		$poll_read_unvote_users = isset($_POST[\'read_unvote_users\']) && !empty($_POST[\'read_unvote_users\']) ? $_POST[\'read_unvote_users\'] : FALSE;
		$poll_revote = isset($_POST[\'revouting\']) && !empty($_POST[\'revouting\']) ? $_POST[\'revouting\'] : FALSE;

		data_validation($poll_question, $poll_answers, $poll_days, $poll_votes, $poll_read_unvote_users, $poll_revote);
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_main_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($can_edit_subject && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']))
{
	//Is there something?
	if ($topic_poll)
	{

		?>
		<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
			<div class="sf-set set1">
				<div class="sf-box checkbox">
					<span class="fld-input">
						<input id="fld<?php echo ++ $forum_page[\'fld_count\'] ?>" type="checkbox" value="1" name="reset_poll"/>
					</span>
					<label for="fld<?php echo $forum_page[\'fld_count\'] ?>">
						<span><?php echo $lang_pun_poll[\'Reset res\'] ?></span>
						<?php echo $lang_pun_poll[\'Reset res notice\'] ?>
					</label>
				</div>
			</div>
			<div class="sf-set set2">
				<div class="sf-box checkbox">
					<span class="fld-input">
						<input id="fld<?php echo ++ $forum_page[\'fld_count\'] ?>" type="checkbox" value="1" name="remove_poll"/>
					</span>
					<label for="fld<?php echo $forum_page[\'fld_count\'] ?>">
						<span><?php echo $lang_pun_poll[\'Remove v\'] ?></span>
						<?php echo $lang_pun_poll[\'Remove v notice\'] ?>
					</label>
				</div>
			</div>
		</fieldset>
		<?php
			if ($forum_user[\'group_id\'] == FORUM_ADMIN)
				form_of_poll(isset($new_poll_question) ? $new_poll_question : $poll_question, isset($new_poll_answers) ? $new_poll_answers : $poll_answers, isset($new_poll_ans_count) ? $new_poll_ans_count : (isset($new_poll_answers) ? count($new_poll_answers) : count($poll_answers)), isset($new_poll_days) ? $new_poll_days : $poll_days_count, isset($new_poll_votes) ? $new_poll_votes : $poll_votes_count, isset($new_read_unvote_users) ? $new_read_unvote_users : $poll_read_unvote_users, isset($new_revote) ? $new_revote : $poll_revote);
	}
	else
		form_of_poll(isset($new_poll_question) ? $new_poll_question : \'\', isset($new_poll_answers) ? $new_poll_answers : \'\', isset($new_poll_ans_count) ? $new_poll_ans_count : (isset($new_poll_answers) ? (count($new_poll_answers) > 2 ? count($new_poll_answers) : 2) : 2), isset($new_poll_days) ? $new_poll_days : FALSE, isset($new_poll_votes) ? $new_poll_votes : FALSE, $forum_config[\'p_pun_poll_enable_read\'] ? (isset($new_read_unvote_users) ? $new_read_unvote_users : \'0\') : FALSE, $forum_config[\'p_pun_poll_enable_revote\'] ? (isset($new_revote) ? $new_revote : \'0\') : FALSE);
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_preview_pre_display' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ((($forum_user[\'group_id\'] == FORUM_ADMIN && $can_edit_subject) || ($can_edit_subject && !$topic_poll)) && empty($errors))
{
	if (!empty($new_poll_question) && !empty($new_poll_answers))
	{
		?>
			<div class="main-subhead">
				<h2 class="hn"><span><?php echo $lang_pun_poll[\'Preview poll\']; ?></span></h2>
			</div>
			<div id="post-preview" class="main-content main-frm">
				<fieldset class="mf-set set1" style="padding:0 0 0 2em">
					<legend>
							<?php echo "\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t".forum_htmlencode($new_poll_question); ?>
					</legend>
					<div class="mf-box">
						<?php

							for ($iter = 0; $iter < count($new_poll_answers); $iter++)
							{
								echo \'<div class="mf-item"><span class="fld-input">\'.($iter + 1).\'</span>\';
								echo \'<label>\'.forum_htmlencode($new_poll_answers[$iter]).\'</label>\';
								echo \'</div>\';
							}

						?>
					</div>
				</fieldset>
			</div>
		<?php

	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_form_submitted' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($can_edit_subject && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']))
{
	$reset_poll = (isset($_POST[\'reset_poll\']) && $_POST[\'reset_poll\'] == \'1\') ? true : false;
	$remove_poll = (isset($_POST[\'remove_poll\']) && $_POST[\'remove_poll\'] == \'1\') ? true : false;

	//We need to reset poll
	if ($reset_poll || $remove_poll)
	{
		//Remove voting results
		$query_pun_poll = array(
			\'DELETE\'	=>	\'voting\',
			\'WHERE\'		=>	\'topic_id = \'.$cur_post[\'tid\']
		);
		$forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

		if ($remove_poll)
		{
			//Remove questions
			$query_pun_poll = array(
				\'DELETE\'	=>	\'questions\',
				\'WHERE\'		=>	\'topic_id = \'.$cur_post[\'tid\']
			);
			$forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);

			//Remove answers
			$query_pun_poll = array(
				\'DELETE\'	=>	\'answers\',
				\'WHERE\'		=>	\'topic_id = \'.$cur_post[\'tid\']
			);
			$forum_db->query_build($query_pun_poll) or error(__FILE__, __LINE__);
		}

		redirect(forum_link($forum_url[\'edit\'], $id), $lang_post[\'Edit redirect\']);
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_end_validation' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (($forum_user[\'group_id\'] == FORUM_ADMIN && $can_edit_subject) || ($can_edit_subject && !$topic_poll))
{
	//Get information about new poll.
	$new_poll_question = isset($_POST[\'question_of_poll\']) && !empty($_POST[\'question_of_poll\']) ? $_POST[\'question_of_poll\'] : FALSE;
	if (!empty($new_poll_question))
	{
		$new_poll_answers = isset($_POST[\'poll_answer\']) && !empty($_POST[\'poll_answer\']) ? $_POST[\'poll_answer\'] : FALSE;
		$new_poll_days = isset($_POST[\'allow_poll_days\']) && !empty($_POST[\'allow_poll_days\']) ? $_POST[\'allow_poll_days\'] : FALSE;
		$new_poll_votes = isset($_POST[\'allow_poll_votes\']) && !empty($_POST[\'allow_poll_votes\']) ? $_POST[\'allow_poll_votes\'] : FALSE;
		$new_read_unvote_users = isset($_POST[\'read_unvote_users\']) && !empty($_POST[\'read_unvote_users\']) ? $_POST[\'read_unvote_users\'] : FALSE;
		$new_revote = isset($_POST[\'revouting\']) ? $_POST[\'revouting\'] : FALSE;

		data_validation($new_poll_question, $new_poll_answers, $new_poll_days, $new_poll_votes, $new_read_unvote_users, $new_revote);
	}
	if (isset($_POST[\'update_poll\']))
	{
		$new_poll_ans_count = isset($_POST[\'poll_ans_count\']) && intval($_POST[\'poll_ans_count\']) > 0 ? intval($_POST[\'poll_ans_count\']) : FALSE;

		if (!$new_poll_ans_count)
			$errors[] = $lang_pun_poll[\'Empty option count\'];
		if ($new_poll_ans_count < 2)
		{
			$errors[] = $lang_pun_poll[\'Min cnt options\'];
			$new_poll_ans_count = 2;
		}
		if ($new_poll_ans_count > $forum_config[\'p_pun_poll_max_answers\'])
		{
			$errors[] = sprintf($lang_pun_poll[\'Max cnt options\'], $forum_config[\'p_pun_poll_max_answers\']);
			$new_poll_ans_count = $forum_config[\'p_pun_poll_max_answers\'];
		}
		$_POST[\'preview\'] = 1;
	}
	else if ($new_poll_question !== FALSE && empty($errors) && !isset($_POST[\'preview\']))
	{
		if (!$topic_poll)
			add_poll($cur_post[\'tid\'], $new_poll_question, $new_poll_answers, $new_poll_days !== FALSE ? $new_poll_days : \'NULL\', $new_poll_votes !== FALSE ? $new_poll_votes : \'NULL\', $new_read_unvote_users !== FALSE ? $new_read_unvote_users : \'0\', $new_revote !== FALSE ? $new_revote : \'0\');
		else
			update_poll($cur_post[\'tid\'], $new_poll_question, $new_poll_answers, $new_poll_days !== FALSE ? $new_poll_days : null, $new_poll_votes !== FALSE ? $new_poll_votes : null, $new_read_unvote_users !== FALSE ? $new_read_unvote_users : \'0\', $new_revote !== FALSE ? $new_revote : \'0\', $poll_question, $poll_answers, $poll_days_count, $poll_votes_count, $poll_read_unvote_users, $poll_revote);

		redirect(forum_link($forum_url[\'topic\'], $cur_post[\'tid\']), $lang_pun_poll[\'Poll redirect\']);
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_post_selected' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$topic_poll = FALSE;
if ($can_edit_subject && ($forum_user[\'group_id\'] == FORUM_ADMIN || $forum_user[\'g_poll_add\']))
{
	$pun_poll_query = array(
		\'SELECT\'	=>	\'question, read_unvote_users, revote, created, days_count, votes_count\',
		\'FROM\'		=>	\'questions\',
		\'WHERE\'		=>	\'topic_id = \'.$cur_post[\'tid\']
	);
	$pun_poll_results = $forum_db->query_build($pun_poll_query) or error(__FILE__, __LINE__);

	if (!$forum_db->num_rows($pun_poll_results))
		$topic_poll = FALSE;
	else
	{
		list($poll_question, $poll_read_unvote_users, $poll_revote, $poll_created, $poll_days_count, $poll_votes_count) = $forum_db->fetch_row($pun_poll_results);
		$topic_poll = TRUE;
	}

	if ($topic_poll === TRUE)
	{
		$pun_poll_query = array(
			\'SELECT\'	=>	\'answer\',
			\'FROM\'		=>	\'answers\',
			\'WHERE\'		=>	\'topic_id = \'.$cur_post[\'tid\'],
			\'ORDER BY\'	=>	\'id ASC\'
		);
		$pun_poll_results = $forum_db->query_build($pun_poll_query) or error(__FILE__, __LINE__);
		
		if ($forum_db->num_rows($pun_poll_results) == 0)
			message($lang_common[\'Bad request\']);

		$poll_answers = array();
		while ($cur_answer = $forum_db->fetch_assoc($pun_poll_results))
			$poll_answers[] = $cur_answer[\'answer\'];
	}
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ed_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
	include_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
else
	include_once $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
include $ext_info[\'path\'].\'/functions.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_row_pre_post_actions_merge' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';

			if (!$forum_user[\'is_guest\'])
			{
				$quote_link = forum_link($forum_url[\'quote\'], array($id, $cur_post[\'id\']));
				$forum_page[\'post_actions\'][\'reply\'] = \'<span class="edit-post first-item"><a href="\'.$quote_link.\'" onclick="Reply(\'.$cur_post[\'id\'].\', this); return false;">\'.$lang_pun_quote[\'Reply\'].\'<span>&#160;\'.$lang_topic[\'Post\'].\' \'.($forum_page[\'start_from\'] + $forum_page[\'item_count\']).\'</span></a></span>\';
				//If quick post is enabled generate Quick Quote link
				if ($forum_config[\'o_quickpost\'] == \'1\')
				{
					unset($forum_page[\'post_actions\'][\'quote\']);
					$forum_page[\'post_actions\'][\'quote\'] = \'<span class="edit-post first-item"><a href="\'.$quote_link.\'" onclick="QuickQuote(\'.$cur_post[\'id\'].\'); return false;">\'.$lang_pun_quote[\'Quote\'].\'<span>&#160;\'.$lang_topic[\'Post\'].\' \'.($forum_page[\'start_from\'] + $forum_page[\'item_count\']).\'</span></a></span>\';
				}
				unset($quote_link);
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_qr_get_posts' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pun_quote_js_arrays = \'\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_row_new_post_entry_data' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!$forum_user[\'is_guest\'])
			{
				$pun_quote_js_arrays .= \'pun_quote_posts[\'.$cur_post[\'id\'].\'] = "\'.str_replace(array(\'\\\\\', "\\n"), array(\'\\\\\\\\\', \'\\n\'), forum_htmlencode($cur_post[\'message\'])).\'";\';
				$pun_quote_js_arrays .= \' pun_quote_authors[\'.$cur_post[\'id\'].\'] = "\'.$cur_post[\'username\'].\'";\'."\\n";
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_qr_get_quote' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if(!$forum_user[\'is_guest\'] && isset($_POST[\'post_msg\']))
				$query[\'SELECT\'] = \'p.poster, \\\'\'.$forum_db->escape($_POST[\'post_msg\']).\'\\\'\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!$forum_user[\'is_guest\'])
			{

			?>
			<form id="pun_quote_form" action="<?php echo forum_link(\'post.php\'); ?>" method="post">
				<div class="hidden">
					<input type="hidden" value="" id="post_msg" name="post_msg"/>
					<input type="hidden" value="<?php echo forum_link($forum_url[\'quote\'], array($id, $cur_post[\'id\'])) ?>" id="pun_quote_url" name="pun_quote_url" />
				</div>
			</form>
			<?php

			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_bbcode_buttons_output_loop_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_user[\'pun_bbcode_use_buttons\'])
			{
				if (file_exists($ext_info[\'path\'].\'/buttons/\'.$forum_user[\'style\'].\'/\'))
					$buttons_path = $ext_info[\'path\'].\'/buttons/\'.$forum_user[\'style\'];
				else
					$buttons_path = $ext_info[\'path\'].\'/buttons/Oxygen\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_bbcode_pre_tags_merge' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$tags_without_attr[] = \'spoiler\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$tags_without_attr[] = \'video\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'he_new_bbcode_section' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// add lang file
			if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\')) {
			require($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\');
			} else {
				require($ext_info[\'path\'].\'/lang/English.php\');
			}
			$lang_help = array_merge($lang_help, $lang_help_did);
			?>
			<div class="ct-box help-box">
				<h3 class="hn"><span><?php echo $lang_help[\'List info\'] ?></span></h3>
				<div class="entry-content">
					<code>[spoiler]<?php echo $lang_help[\'Spoiler\'] ?>[/spoiler]</code> <span><?php echo $lang_help[\'produces\'] ?></span>
					<samp><div style="border: 1px dotted gray; padding: 4px; color: #4a566e;"> <?php echo $lang_help[\'str_Spoiler\'] ?> <span style="background-color: #4a566e; border-left: 1px solid #79859d; border-top: 1px solid #79859d; border-bottom: 1px solid black; border-right: 1px solid black; color: white; padding: 2px; font-size: 0.8em; cursor: pointer;" onClick="if(this.innerHTML==\'<?php echo $lang_help[\'str_Show\'] ?>\'){this.parentNode.getElementsByTagName(\'div\')[0].style.display = \'block\';this.innerHTML=\'<?php echo $lang_help[\'str_Hide\'] ?>\';} else {this.parentNode.getElementsByTagName(\'div\')[0].style.display = \'none\';this.innerHTML=\'<?php echo $lang_help[\'str_Show\'] ?>\';}"><?php echo $lang_help[\'str_Show\'] ?></span><div style="margin-top: 4px; border-top: 1px dotted gray; font: 90%; color: black; display: none;"><?php echo $lang_help[\'Spoiler\'] ?></div></div></samp>
				</div>
			</div>
			<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_ninja2\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_ninja2\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_ninja2\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_preparse_tags_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$tags_block[]=\'spoiler\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_bbcode_strike\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_bbcode_strike\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_bbcode_strike\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$tags[] = $tags_opened[] = $tags_closed[] = $tags_inline[] = $tags_fix[] = \'s\';
$tags_limit_bbcode[\'*\'][] = \'s\';
$tags_limit_bbcode[\'url\'][] = \'s\';
$tags_limit_bbcode[\'email\'][] = \'s\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mp3html5\',
\'path\'			=> FORUM_ROOT.\'extensions/mp3html5\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mp3html5\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// add our tag to the list
$tags[] = \'mp3\';
$tags_opened[] = \'mp3\';
$tags_closed[] = \'mp3\';
$tags_inline[] = \'mp3\';
$tags_trim[] = \'mp3\';
$tags_limit_bbcode[\'*\'][] = \'mp3\';
$tags_limit_bbcode[\'url\'][] = \'mp3\';
$tags_limit_bbcode[\'email\'][] = \'mp3\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// add our tag to the list
			$tags[] = \'video\';
			$tags_opened[] = \'video\';
			$tags_closed[] = \'video\';
			$tags_inline[] = \'video\';
			$tags_trim[] = \'video\';

			// we must allow url due to do_clickable
			$tags_limit_bbcode[\'video\'] = array(\'url\');

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    4 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_ninja2\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_ninja2\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_ninja2\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$tags[] = \'ninja\';
			$tags_fix[] = \'ninja\';
			$tags_block[] = \'ninja\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_preparse_bbcode_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

//SPOILER
			$tags[] = \'spoiler\';
			$tags_opened[] = \'spoiler\';
			$tags_closed[] = \'spoiler\';
			
			$tags_fix[] = \'spoiler\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_do_bbcode_replace' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Include language
			if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English.php\';
		//spoiler
			$pattern[] = \'#\\[spoiler\\](.*?)\\[/spoiler\\]#ms\';
			$replace[] = \'<div id="spoiler-container"> \'. $lang_help_did[\'str_Spoiler\'].\' <span id="spoiler-button" onClick="if(this.innerHTML==\\\'\'. $lang_help_did[\'str_Show\'] .\'\\\'){this.parentNode.getElementsByTagName(\\\'div\\\')[0].style.display = \\\'block\\\';this.innerHTML=\\\'\'. $lang_help_did[\'str_Hide\'] .\'\\\';} else {this.parentNode.getElementsByTagName(\\\'div\\\')[0].style.display = \\\'none\\\';this.innerHTML=\\\'\'. $lang_help_did[\'str_Show\'] .\'\\\';}">\'. $lang_help_did[\'str_Show\'] .\'</span><div id="spoiler-hidebox">$1</div></div>\';
			$pattern[] = \'#\\[spoiler?\\=(.*?)](.*?)\\[/spoiler\\]#ms\';
			$replace[] = \'<div id="spoiler-container"> $1 <span id="spoiler-button" onClick="if(this.innerHTML==\\\'\'. $lang_help_did[\'str_Show\'] .\'\\\'){this.parentNode.getElementsByTagName(\\\'div\\\')[0].style.display = \\\'block\\\';this.innerHTML=\\\'\'. $lang_help_did[\'str_Hide\'] .\'\\\';} else {this.parentNode.getElementsByTagName(\\\'div\\\')[0].style.display = \\\'none\\\';this.innerHTML=\\\'\'. $lang_help_did[\'str_Show\'] .\'\\\';}">\'. $lang_help_did[\'str_Show\'] .\'</span><div id="spoiler-hidebox">$2</div></div>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_bbcode_strike\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_bbcode_strike\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_bbcode_strike\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$pattern[] = \'#\\[s\\]([^\\[]+)\\[/s\\]#e\';
$replace[] = \'handle_s_tag(\\\'$1\\\')\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mp3html5\',
\'path\'			=> FORUM_ROOT.\'extensions/mp3html5\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mp3html5\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// add pattern to catch [mp3]blahblah[/mp3]
$pattern[] = \'#\\[mp3\\](.*?)\\[/mp3\\]#se\';
$replace[] = \'handle_mp3_tag(\\\'$1\\\')\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// ADD PARSER, EXCEPT SIG
			if (!$is_signature) {
				$pattern[] = \'`\\[video\\]([^\\[]+)\\[/video\\]`e\';
				$replace[] = \'fancy_video_tag_parse(\\\'$1\\\')\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'he_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_spoiler_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_spoiler_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_spoiler_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Include language
			if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\'))
				require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'.php\';
			else
				require $ext_info[\'path\'].\'/lang/English.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ex_qr_get_topics' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_GET[\'news_feed\']))
	$query[\'WHERE\'] .= \' AND t.forum_id IN(\'.$forum_config[\'o_portal_news_forums\'].\')\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ex_modify_cur_topic_item' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_GET[\'news_feed\']))
{
	require_once FORUM_ROOT.\'include/parser.php\';

	$link = forum_link($forum_url[\'topic\'], array($cur_topic[\'id\'], sef_friendly($cur_topic[\'subject\'])));

	$description = parse_message(strlen($cur_topic[\'message\']) > 1000 ? substr($cur_topic[\'message\'], 0, 1000).\'...\' : $cur_topic[\'message\'], 1);

	$item_id = count($feed[\'items\']) - 1;
	$feed[\'items\'][$item_id][\'description\'] = $description;
	$feed[\'items\'][$item_id][\'link\'] = $link;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ft_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

require $ext_info[\'path\'].\'/panels.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ca_fn_generate_admin_menu_new_sublink' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (FORUM_PAGE_SECTION == \'start\' || FORUM_PAGE_SECTION == \'settings\')
{
	global $lang_portal;

	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/portal.php\'))
		require_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/portal.php\';
	else
		require_once $ext_info[\'path\'].\'/lang/English/portal.php\';
}

if (FORUM_PAGE_SECTION == \'start\')
{
	$forum_page[\'admin_submenu\'][\'pages\'] = \'<li\'.((FORUM_PAGE == \'admin-pages\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'admin_pages\']).\'">\'.$lang_portal[\'Pages\'].\'</a></li>\';
	$forum_page[\'admin_submenu\'][\'panels\'] = \'<li\'.((FORUM_PAGE == \'admin-panels\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'admin_panels\']).\'">\'.$lang_portal[\'Panels\'].\'</a></li>\';
}
elseif (FORUM_PAGE_SECTION == \'settings\')
	$forum_page[\'admin_submenu\'][\'settings-portal\'] = \'<li\'.((FORUM_PAGE == \'admin-settings-portal\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'admin_settings_portal\']).\'">\'.$lang_portal[\'Portal\'].\'</a></li>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_new_section' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($section == \'portal\')
	require $ext_info[\'path\'].\'/admin/portal.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_new_section_validation' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($section == \'portal\')
{
	$form[\'portal_news_count\'] = intval($form[\'portal_news_count\']);
	$form[\'portal_left_width\'] = intval($form[\'portal_left_width\']);
	$form[\'portal_right_width\'] = intval($form[\'portal_right_width\']);
	if (!isset($form[\'portal_panels_all_pages\']) || $form[\'portal_panels_all_pages\'] != \'1\') $form[\'portal_panels_all_pages\'] = \'0\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'fn_generate_navlinks_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

global $lang_portal;

// Load portal.php language file
if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/portal.php\'))
	require_once $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/portal.php\';
else
	require_once $ext_info[\'path\'].\'/lang/English/portal.php\';


$links[\'index\'] = \'<li id="navportal"\'.((FORUM_PAGE == \'news\' || FORUM_PAGE == \'pages\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'index\']).\'"><span>\'.$lang_common[\'Index\'].\'</span></a></li>\';

array_insert($links, 1, \'<li id="navindex"\'.((FORUM_PAGE == \'index\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'forums\']).\'"><span>\'.$lang_common[\'Forum\'].\'</span></a></li>\', \'forum\');

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Link \'PM\' in the main nav menu
if (isset($links[\'profile\']) && $forum_config[\'o_pun_pm_show_global_link\'])
{
	global $lang_pun_pm;

	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	if (\'pun_pm\' == substr(FORUM_PAGE, 0, 6))
		$links[\'profile\'] = str_replace(\' class="isactive"\', \'\', $links[\'profile\']);

	($hook = get_hook(\'pun_pm_pre_main_navlinks_add\')) ? eval($hook) : null;

	$links[\'profile\'] .= "\\n\\t\\t".\'<li id="nav_pun_pm"\'.(\'pun_pm\' == substr(FORUM_PAGE, 0, 6) ? \' class="isactive"\' : \'\').\'><a href="\'.forum_link($forum_url[\'pun_pm\']).\'"><span>\'.$lang_pun_pm[\'Private messages\'].\'</span></a></li>\';

	($hook = get_hook(\'pun_pm_after_main_navlinks_add\')) ? eval($hook) : null;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  're_rewrite_rules' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

require $ext_info[\'path\'].\'/include/rewrite_rules.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$forum_rewrite_rules[\'/^pun_pm[\\/_-]?send(\\.html?|\\/)?$/i\'] = \'misc.php?action=pun_pm_send\';
$forum_rewrite_rules[\'/^pun_pm[\\/_-]?compose[\\/_-]?([0-9]+)(\\.html?|\\/)?$/i\'] = \'misc.php?section=pun_pm&pmpage=compose&receiver_id=$1\';
$forum_rewrite_rules[\'/^pun_pm(\\.html?|\\/)?$/i\'] = \'misc.php?section=pun_pm\';
$forum_rewrite_rules[\'/^pun_pm[\\/_-]?([0-9a-z]+)(\\.html?|\\/)?$/i\'] = \'misc.php?section=pun_pm&pmpage=$1\';
$forum_rewrite_rules[\'/^pun_pm[\\/_-]?([0-9a-z]+)[\\/_-]?(p|page\\/)([0-9]+)(\\.html?|\\/)?$/i\'] = \'misc.php?section=pun_pm&pmpage=$1&p=$3\';
$forum_rewrite_rules[\'/^pun_pm[\\/_-]?([0-9a-z]+)[\\/_-]?([0-9]+)(\\.html?|\\/)?$/i\'] = \'misc.php?section=pun_pm&pmpage=$1&message_id=$2\';

($hook = get_hook(\'pun_pm_after_rewrite_rules_set\')) ? eval($hook) : null;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'in_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (isset($_GET[\'page\']) || isset($_GET[\'pages\']))
	require $ext_info[\'path\'].\'/page.php\';
elseif ((empty($_GET) || (isset($_GET[\'login\']) && count($_GET) == 1)) && basename($_SERVER[\'SCRIPT_NAME\']) == \'index.php\')
	require $ext_info[\'path\'].\'/index.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'co_modify_url_scheme' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Setup the URL rewriting scheme
if (file_exists($ext_info[\'path\'].\'/include/url/\'.$forum_config[\'o_sef\'].\'.php\'))
	require $ext_info[\'path\'].\'/include/url/\'.$forum_config[\'o_sef\'].\'.php\';
else
	require $ext_info[\'path\'].\'/include/url/Default.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/url/\'.$forum_config[\'o_sef\'].\'.php\'))
	require $ext_info[\'path\'].\'/url/\'.$forum_config[\'o_sef\'].\'.php\';
else
	require $ext_info[\'path\'].\'/url/Default.php\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_qpost_output_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'portal_by_daris\',
\'path\'			=> FORUM_ROOT.\'extensions/portal_by_daris\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/portal_by_daris\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'o_portal_panels_all_pages\'] == 1)
	echo \'<div>\'."\\n\\t".\'<p></p>\'."\\n".\'</div>\';

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aop_features_gzip_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_stat_counters\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_stat_counters\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_stat_counters\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($lang_fancy_stat_counters)) {
				if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\')) {
					include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
				} else {
					include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
				}
			}

			$forum_page[\'group_count\'] = $forum_page[\'item_count\'] = 0;
?>
			<!-- GA -->
			<div class="content-head" id="<?php echo $ext_info[\'id\'].\'_settings\'; ?>">
				<h2 class="hn"><span><?php echo $lang_fancy_stat_counters[\'Settings Name GA\'] ?></span></h2>
			</div>

			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><span><?php echo $lang_fancy_stat_counters[\'Settings Name GA\'] ?></span></legend>

				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[fancy_stat_counter_enable_ga]" value="1"<?php if ($forum_config[\'o_fancy_stat_counter_enable_ga\'] == \'1\') echo \' checked="checked"\'; ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_fancy_stat_counters[\'Enabled\'] ?></label>
					</div>
				</div>

				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>">
							<span><?php echo $lang_fancy_stat_counters[\'GA ID Name\'] ?></span>
							<small><?php echo $lang_fancy_stat_counters[\'GA ID Help\'] ?></small>
						</label><br/>
						<span class="fld-input">
							<input type="text" id="fld<?php echo $forum_page[\'fld_count\'] ?>" name="form[fancy_stat_counter_id_ga]" size="20" maxlength="20" value="<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ga\']) ?>"/>
						</span>
					</div>
				</div>
			</fieldset>

<?php
			$forum_page[\'group_count\'] = $forum_page[\'item_count\'] = 0;
?>
			<!-- YM -->

			<div class="content-head" id="<?php echo $ext_info[\'id\'].\'_settings\'; ?>">
				<h2 class="hn"><span><?php echo $lang_fancy_stat_counters[\'Settings Name YM\'] ?></span></h2>
			</div>

			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><span><?php echo $lang_fancy_stat_counters[\'Settings Name YM\'] ?></span></legend>

				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[fancy_stat_counter_enable_ym]" value="1"<?php if ($forum_config[\'o_fancy_stat_counter_enable_ym\'] == \'1\') echo \' checked="checked"\'; ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_fancy_stat_counters[\'Enabled\'] ?></label>
					</div>
				</div>

				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box text">
						<label for="fld<?php echo ++$forum_page[\'fld_count\'] ?>">
							<span><?php echo $lang_fancy_stat_counters[\'YM ID Name\'] ?></span>
							<small><?php echo $lang_fancy_stat_counters[\'YM ID Help\'] ?></small>
						</label><br/>
						<span class="fld-input">
							<input type="text" id="fld<?php echo $forum_page[\'fld_count\'] ?>" name="form[fancy_stat_counter_id_ym]" size="20" maxlength="20" value="<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ym\']) ?>"/>
						</span>
					</div>
				</div>
			</fieldset>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Reset counter
		$forum_page[\'group_count\'] = $forum_page[\'item_count\'] = 0;

		?>

			<div class="content-head">
				<h2 class="hn"><span><?php echo $lang_pm_email[\'PM Email\'] ?></span></h2>
			</div>
			<div class="ct-box">
				<p><?php echo $lang_pm_email[\'PM Email Info\'] ?></p>
			</div>
			<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_pm_email[\'Enable PM Email\'] ?></strong></legend>
				<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[pm_email_enable]" value="1"<?php if ($forum_config[\'o_pm_email_enable\'] == \'1\') echo \' checked="checked"\' ?> /></span>
						<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><span><?php echo $lang_pm_email[\'Enable\'] ?></span> <?php echo $lang_pm_email[\'Enable PM Email\'] ?></label>
					</div>
				</div>
			</fieldset>

		<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($fancy_video_tag)) {
				if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\')) {
					require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\';
				} else {
					require $ext_info[\'path\'].\'/lang/English/lang.php\';
				}
			}

			$forum_page[\'group_count\'] = 0;

?>
				<div class="content-head" id="<?php echo $ext_info[\'id\'].\'_settings\'; ?>">
					<h2 class="hn"><span><?php echo $fancy_video_tag[\'Name\'] ?></span></h2>
				</div>
				<fieldset class="frm-group group<?php echo ++$forum_page[\'group_count\'] ?>">
					<div class="sf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
						<div class="sf-box checkbox">
							<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[fancy_video_tag_html5]" value="1"<?php if ($forum_config[\'o_fancy_video_tag_html5\'] == \'1\') echo \' checked="checked"\' ?> /></span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $fancy_video_tag[\'HTML5 mode desc\'] ?></label>
						</div>
					</div>
				</fieldset>


<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_start' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_bbcode_strike\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_bbcode_strike\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_bbcode_strike\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

function handle_s_tag($text)
{
	$result =
<<<S_BLOCK
	<s>$text</s>
S_BLOCK;

	return forum_trim($result);
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mp3html5\',
\'path\'			=> FORUM_ROOT.\'extensions/mp3html5\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mp3html5\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// tag handling function
function handle_mp3_tag($inputText) {
    return \'<audio src="\'.$inputText.\'" controls preload></audio>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($fancy_video_tag)) {
				if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\')) {
					require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\';
				} else {
					require $ext_info[\'path\'].\'/lang/English/lang.php\';
				}
			}


			// tag handling function
			function fancy_video_tag_parse($videoUri) {
				global $forum_config, $fancy_video_tag;

				$match = array();

				// dirty trick to play arround do_clickable
				preg_match(\'`href="([^"]+)"`\', stripslashes($videoUri), $match);
				if (!empty($match[1])) {
					$videoUri = $match[1];
				}

				// the services list
				$service = array(
					\'youtube\' => array(
						\'match\'			=> \'`youtube.com.*v=([-_a-z0-9]+)`i\',
						\'uri\'			=> \'http://www.youtube.com/v/%s&amp;rel=0\',
						\'html5_uri\'		=> \'<iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/%s" frameborder="0"></iframe>\',
						\'width\'			=> 640,
						\'height\'		=> 385
					),

					\'dailymotion\' => array(
						\'match\'			=> \'`video/([a-z0-9]+)_`i\',
						\'uri\'			=> \'http://www.dailymotion.com/swf/video/%s&amp;amp;related=0&amp;amp;canvas=medium\',
						\'html5_uri\'		=> \'<iframe frameborder="0" width="560" height="382" src="http://www.dailymotion.com/embed/video/%s?width=560&amp;theme=none"></iframe>\',
						\'width\'			=> 560,
						\'height\'		=> 382
					),

					\'vimeo\' => array(
						\'match\' 		=> \'`/([0-9]+)`\',
						\'uri\' 			=> \'http://www.vimeo.com/moogaloop.swf?clip_id=%s&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;fullscreen=1\',
						\'html5_uri\'		=> \'<iframe src="http://player.vimeo.com/video/%s" width="640" height="385" frameborder="0"></iframe>\',
						\'width\'			=> 640,
						\'height\'		=> 385
					),
					
					\'google\' => array(
						\'match\'			=> \'`\\?docid=(-?[0-9]+)`\',
						\'uri\'			=> \'http://video.google.com/googleplayer.swf?docId=%s\',
						\'width\'			=> 640,
						\'height\'		=> 385
					),
					
					\'liveleak\' => array(
						\'match\'			=> \'`liveleak.com.*i=([a-zA-Z0-9-_]+)`\',
						\'uri\'			=> \'http://www.liveleak.com/e/%s\',
						\'width\'			=> 450,
						\'height\'		=> 370
					),

					\'rutube\' => array(
						\'match\'			=> \'`[a-z0-9]+\\.html\\?v=([a-z0-9]+)`i\',
						\'uri\'			=> \'http://rutube.ru/tracks/%s\',
						\'video_uri\'		=> \'http://video.rutube.ru/%s\',
						\'width\'			=> 470,
						\'height\'		=> 353
					),

					\'facebook\' => array(
						\'match\'			=> \'`facebook.com/.*video\\.php\\?v=([0-9]+)`i\',
						\'uri\'			=> \'http://www.facebook.com/v/%s\',
						\'width\'			=> 500,
						\'height\'		=> 280
					)
				);

				// extract service\'s name and check for support
				preg_match(\'`^(?:http|https)://(?:[^\\.]*\\.)?([^\\.]*)\\.[^/]*/`i\', $videoUri, $match);
				if (empty($match[1]) || !array_key_exists($match[1], $service)) {
					return \'<a href="\'.$videoUri.\'">[\'.$fancy_video_tag["unknown_source"].\']</a>\';
				}
				$fancy_video_tag_provider = $service[$match[1]];

				// EXTRACT VIDEO KEY
				preg_match($fancy_video_tag_provider[\'match\'], $videoUri, $match);
				if (empty($match[1])) {
					return \'<a href="\'.$videoUri.\'">[\'.$fancy_video_tag["unknown_source"].\']</a>\';
				}
				$fancy_video_tag_video_key = $match[1];


				// HTML5 MODE
				if ($forum_config[\'o_fancy_video_tag_html5\'] == \'1\' && isset($fancy_video_tag_provider[\'html5_uri\'])) {
					return \'<div class="fancy_video_tag_player">\'.sprintf($fancy_video_tag_provider[\'html5_uri\'], $fancy_video_tag_video_key).\'</div>\';
				}

				// GET PLAYER URL
				if (isset($fancy_video_tag_provider[\'video_uri\'])) {
					$playerUri = sprintf($fancy_video_tag_provider[\'video_uri\'], $fancy_video_tag_video_key);
				} else {
					$playerUri = sprintf($fancy_video_tag_provider[\'uri\'], $fancy_video_tag_video_key);
				}

				// RETURN PLAYER CODE
				return \'<div class="fancy_video_tag_player"><object type="application/x-shockwave-flash" data="\'.$playerUri.\'" width="\'.$fancy_video_tag_provider[\'width\'].\'" height="\'.$fancy_video_tag_provider[\'height\'].\'">\'.
					\'<param name="movie" value="\'.$playerUri.\'" />\'.
					\'<param name="wmode" value="transparent" />\'.
					\'<param name="allowfullscreen" value="true" />\'.
					\'<p><a href="\'.$videoUri.\'">[\'.$fancy_video_tag["no flash"].\']</a></p>\'.
				\'</object></div>\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_change_details_about_pre_header_load' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Link in the profile
if (!$forum_user[\'is_guest\'] && $forum_user[\'id\'] != $user[\'id\'])
{
	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	($hook = get_hook(\'pun_pm_pre_profile_user_contact_add\')) ? eval($hook) : null;

	$forum_page[\'user_contact\'][\'PM\'] = \'<li><span>\'.$lang_pun_pm[\'PM\'].\': <a href="\'.forum_link($forum_url[\'pun_pm_post_link\'], $id).\'">\'.$lang_pun_pm[\'Send PM\'].\'</a></span></li>\';

	($hook = get_hook(\'pun_pm_after_profile_user_contact_add\')) ? eval($hook) : null;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pf_view_details_pre_header_load' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// Link in the profile
if (!$forum_user[\'is_guest\'] && $forum_user[\'id\'] != $user[\'id\'])
{
	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	($hook = get_hook(\'pun_pm_pre_profile_user_contact_add\')) ? eval($hook) : null;

	$forum_page[\'user_contact\'][\'PM\'] = \'<li><span>\'.$lang_pun_pm[\'PM\'].\': <a href="\'.forum_link($forum_url[\'pun_pm_post_link\'], $id).\'">\'.$lang_pun_pm[\'Send PM\'].\'</a></span></li>\';

	($hook = get_hook(\'pun_pm_after_profile_user_contact_add\')) ? eval($hook) : null;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'vt_row_pre_post_contacts_merge' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

global $lang_pun_pm;

if (!isset($lang_pun_pm))
{
	if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
		include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
	else
		include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
}

($hook = get_hook(\'pun_pm_pre_post_contacts_add\')) ? eval($hook) : null;

// Links \'Send PM\' near posts
if (!$forum_user[\'is_guest\'] && $cur_post[\'poster_id\'] > 1 && $forum_user[\'id\'] != $cur_post[\'poster_id\'])
	$forum_page[\'post_contacts\'][\'PM\'] = \'<a class="contact" title="\'.$lang_pun_pm[\'Send PM\'].\'" href="\'.forum_link($forum_url[\'pun_pm_post_link\'], $cur_post[\'poster_id\']).\'">\'.$lang_pun_pm[\'PM\'].\'</a>\';

($hook = get_hook(\'pun_pm_after_post_contacts_add\')) ? eval($hook) : null;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'fn_delete_user_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$query = array(
	\'DELETE\'	=> \'pun_pm_messages\',
	\'WHERE\'		=> \'receiver_id = \'.$user_id.\' AND deleted_by_sender = 1\'
);
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

$query = array(
	\'UPDATE\'	=> \'pun_pm_messages\',
	\'SET\'		=> \'deleted_by_receiver = 1\',
	\'WHERE\'		=> \'receiver_id = \'.$user_id
);
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'hd_visit_elements' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

// \'New messages (N)\' link
if (!$forum_user[\'is_guest\'] && $forum_config[\'o_pun_pm_show_new_count\'])
{
	global $lang_pun_pm;

	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	// TODO: Do not include all functions, divide them into 2 files
	if(!defined(\'PUN_PM_FUNCTIONS_LOADED\'))
		require $ext_info[\'path\'].\'/functions.php\';

	($hook = get_hook(\'pun_pm_hd_visit_elements_pre_change\')) ? eval($hook) : null;

	$visit_elements[\'<!-- forum_visit -->\'] = preg_replace(\'#(<p id="visit-links" class="options">.*?)(</p>)#\', \'$1 <span><a href="\'.forum_link($forum_url[\'pun_pm_inbox\']).\'">\'.pun_pm_unread_messages().\'</a></span>$2\', $visit_elements[\'<!-- forum_visit -->\']);

	($hook = get_hook(\'pun_pm_hd_visit_elements_after_change\')) ? eval($hook) : null;
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'mi_new_action' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($action == \'pun_pm_send\' && !$forum_user[\'is_guest\'])
{
	if(!defined(\'PUN_PM_FUNCTIONS_LOADED\'))
		require $ext_info[\'path\'].\'/functions.php\';

	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	$pun_pm_body = isset($_POST[\'req_message\']) ? $_POST[\'req_message\'] : \'\';
	$pun_pm_subject = isset($_POST[\'pm_subject\']) ? $_POST[\'pm_subject\'] : \'\';
	$pun_pm_receiver_username = isset($_POST[\'pm_receiver\']) ? $_POST[\'pm_receiver\'] : \'\';
	$pun_pm_message_id = isset($_POST[\'message_id\']) ? (int) $_POST[\'message_id\'] : false;

	if (isset($_POST[\'send_action\']) && in_array($_POST[\'send_action\'], array(\'send\', \'draft\', \'delete\', \'preview\')))
		$pun_pm_send_action = $_POST[\'send_action\'];
	elseif (isset($_POST[\'pm_draft\']))
		$pun_pm_send_action = \'draft\';
	elseif (isset($_POST[\'pm_send\']))
		$pun_pm_send_action = \'send\';
	elseif (isset($_POST[\'pm_delete\']))
		$pun_pm_send_action = \'delete\';
	else
		$pun_pm_send_action = \'preview\';

	($hook = get_hook(\'pun_pm_after_send_action_set\')) ? eval($hook) : null;

	if ($pun_pm_send_action == \'draft\')
	{
		// Try to save the message as draft
		// Inside this function will be a redirect, if everything is ok
		$pun_pm_errors = pun_pm_save_message($pun_pm_body, $pun_pm_subject, $pun_pm_receiver_username, $pun_pm_message_id);
		// Remember $pun_pm_message_id = false; inside this function if $pun_pm_message_id is incorrect

		// Well... Go processing errors

		// We need no preview
		$pun_pm_msg_preview = false;
	}
	elseif ($pun_pm_send_action == \'send\')
	{
		// Try to send the message
		// Inside this function will be a redirect, if everything is ok
		$pun_pm_errors = pun_pm_send_message($pun_pm_body, $pun_pm_subject, $pun_pm_receiver_username, $pun_pm_message_id);
		// Remember $pun_pm_message_id = false; inside this function if $pun_pm_message_id is incorrect

		// Well... Go processing errors

		// We need no preview
		$pun_pm_msg_preview = false;
	}
	elseif ($pun_pm_send_action == \'delete\' && $pun_pm_message_id !== false)
	{
		pun_pm_delete_from_outbox(array($pun_pm_message_id));
		redirect(forum_link($forum_url[\'pun_pm_outbox\']), $lang_pun_pm[\'Message deleted\']);
	}
	elseif ($pun_pm_send_action == \'preview\')
	{
		// Preview message
		$pun_pm_errors = array();
		$pun_pm_msg_preview = pun_pm_preview($pun_pm_receiver_username, $pun_pm_subject, $pun_pm_body, $pun_pm_errors);
	}

	($hook = get_hook(\'pun_pm_new_send_action\')) ? eval($hook) : null;

	$pun_pm_page_text = pun_pm_send_form($pun_pm_receiver_username, $pun_pm_subject, $pun_pm_body, $pun_pm_message_id, false, false, $pun_pm_msg_preview);

	// Setup navigation menu
	$forum_page[\'main_menu\'] = array(
		\'inbox\'		=> \'<li class="first-item"><a href="\'.forum_link($forum_url[\'pun_pm_inbox\']).\'"><span>\'.$lang_pun_pm[\'Inbox\'].\'</span></a></li>\',
		\'outbox\'	=> \'<li><a href="\'.forum_link($forum_url[\'pun_pm_outbox\']).\'"><span>\'.$lang_pun_pm[\'Outbox\'].\'</span></a></li>\',
		\'write\'		=> \'<li class="active"><a href="\'.forum_link($forum_url[\'pun_pm_write\']).\'"><span>\'.$lang_pun_pm[\'Compose message\'].\'</span></a></li>\',
	);

	// Setup breadcrumbs
	$forum_page[\'crumbs\'] = array(
		array($forum_config[\'o_board_title\'], forum_link($forum_url[\'index\'])),
		array($lang_pun_pm[\'Private messages\'], forum_link($forum_url[\'pun_pm\'])),
		array($lang_pun_pm[\'Compose message\'], forum_link($forum_url[\'pun_pm_write\']))
	);

	($hook = get_hook(\'pun_pm_pre_send_output\')) ? eval($hook) : null;

	define(\'FORUM_PAGE\', \'pun_pm-write\');
	require FORUM_ROOT.\'header.php\';

	// START SUBST - <!-- forum_main -->
	ob_start();

	echo $pun_pm_page_text;

	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace(\'<!-- forum_main -->\', $tpl_temp, $tpl_main);
	ob_end_clean();
	// END SUBST - <!-- forum_main -->

	require FORUM_ROOT.\'footer.php\';
}

$section = isset($_GET[\'section\']) ? $_GET[\'section\'] : null;

if ($section == \'pun_pm\' && !$forum_user[\'is_guest\'])
{
	if (!isset($lang_pun_pm))
	{
		if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\'))
			include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/\'.$ext_info[\'id\'].\'.php\';
		else
			include $ext_info[\'path\'].\'/lang/English/\'.$ext_info[\'id\'].\'.php\';
	}

	if(!defined(\'PUN_PM_FUNCTIONS_LOADED\'))
		require $ext_info[\'path\'].\'/functions.php\';

	$pun_pm_page = isset($_GET[\'pmpage\']) ? $_GET[\'pmpage\'] : \'\';

	($hook = get_hook(\'pun_pm_pre_page_building\')) ? eval($hook) : null;

	// pun_pm_get_page() performs everything :)
	// Remember $pun_pm_page correction inside pun_pm_get_page() if this variable is incorrect
	$pun_pm_page_text = pun_pm_get_page($pun_pm_page);

	// Setup navigation menu
	$forum_page[\'main_menu\'] = array(
		\'inbox\'		=> \'<li class="first-item\'.($pun_pm_page == \'inbox\' ? \' active\' : \'\').\'"><a href="\'.forum_link($forum_url[\'pun_pm_inbox\']).\'"><span>\'.$lang_pun_pm[\'Inbox\'].\'</span></a></li>\',
		\'outbox\'	=> \'<li\'.(($pun_pm_page == \'outbox\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'pun_pm_outbox\']).\'"><span>\'.$lang_pun_pm[\'Outbox\'].\'</span></a></li>\',
		\'write\'		=> \'<li\'.(($pun_pm_page == \'write\') ? \' class="active"\' : \'\').\'><a href="\'.forum_link($forum_url[\'pun_pm_write\']).\'"><span>\'.$lang_pun_pm[\'Compose message\'].\'</span></a></li>\',
	);

	// Setup breadcrumbs
	$forum_page[\'crumbs\'] = array(
		array($forum_config[\'o_board_title\'], forum_link($forum_url[\'index\'])),
		array($lang_pun_pm[\'Private messages\'], forum_link($forum_url[\'pun_pm\']))
	);
	if ($pun_pm_page == \'inbox\')
		$forum_page[\'crumbs\'][] = array($lang_pun_pm[\'Inbox\'], forum_link($forum_url[\'pun_pm_inbox\']));
	else if ($pun_pm_page == \'outbox\')
		$forum_page[\'crumbs\'][] = array($lang_pun_pm[\'Outbox\'], forum_link($forum_url[\'pun_pm_outbox\']));
	else if ($pun_pm_page == \'write\')
		$forum_page[\'crumbs\'][] = array($lang_pun_pm[\'Compose message\'], forum_link($forum_url[\'pun_pm_write\']));

	($hook = get_hook(\'pun_pm_pre_page_output\')) ? eval($hook) : null;

	define(\'FORUM_PAGE\', \'pun_pm-\'.$pun_pm_page);
	require FORUM_ROOT.\'header.php\';

	// START SUBST - <!-- forum_main -->
	ob_start();

	echo $pun_pm_page_text;

	$tpl_temp = trim(ob_get_contents());
	$tpl_main = str_replace(\'<!-- forum_main -->\', $tpl_temp, $tpl_main);
	ob_end_clean();
	// END SUBST - <!-- forum_main -->

	require FORUM_ROOT.\'footer.php\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aex_section_manage_pre_header_load' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\'))
	include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\';
else
	include $ext_info[\'path\'].\'/lang/English/pun_repository.php\';

require_once $ext_info[\'path\'].\'/pun_repository.php\';

if (!defined(\'PUN_REPOSITORY_EXTENSIONS_LOADED\') && file_exists(FORUM_CACHE_DIR.\'cache_pun_repository.php\'))
	include FORUM_CACHE_DIR.\'cache_pun_repository.php\';

if (!defined(\'FORUM_EXT_VERSIONS_LOADED\') && file_exists(FORUM_CACHE_DIR.\'cache_ext_version_notifications.php\'))
	include FORUM_CACHE_DIR.\'cache_ext_version_notifications.php\';

// Regenerate cache only if automatic updates are enabled and if the cache is more than 12 hours old
if (!defined(\'PUN_REPOSITORY_EXTENSIONS_LOADED\') || !defined(\'FORUM_EXT_VERSIONS_LOADED\') || ($pun_repository_extensions_timestamp < $forum_ext_versions_update_cache))
{
	if (pun_repository_generate_cache($pun_repository_error))
		require FORUM_CACHE_DIR.\'cache_pun_repository.php\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'aex_section_manage_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\'))
	include $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/pun_repository.php\';
else
	include $ext_info[\'path\'].\'/lang/English/pun_repository.php\';

require_once $ext_info[\'path\'].\'/pun_repository.php\';

($hook = get_hook(\'pun_repository_pre_display_ext_list\')) ? eval($hook) : null;

?>
	<div class="main-subhead">
		<h2 class="hn"><span><?php echo $lang_pun_repository[\'PunBB Repository\'] ?></span></h2>
	</div>
	<div class="main-content main-extensions">
		<p class="content-options options"><a href="<?php echo $base_url ?>/admin/extensions.php?pun_repository_update&amp;csrf_token=<?php echo generate_form_token(\'pun_repository_update\') ?>"><?php echo $lang_pun_repository[\'Clear cache\'] ?></a></p>
<?php

if (!defined(\'PUN_REPOSITORY_EXTENSIONS_LOADED\') && file_exists(FORUM_CACHE_DIR.\'cache_pun_repository.php\'))
	include FORUM_CACHE_DIR.\'cache_pun_repository.php\';

if (!defined(\'FORUM_EXT_VERSIONS_LOADED\') && file_exists(FORUM_CACHE_DIR.\'cache_ext_version_notifications.php\'))
	include FORUM_CACHE_DIR.\'cache_ext_version_notifications.php\';

// Regenerate cache only if automatic updates are enabled and if the cache is more than 12 hours old
if (!defined(\'PUN_REPOSITORY_EXTENSIONS_LOADED\') || !defined(\'FORUM_EXT_VERSIONS_LOADED\') || ($pun_repository_extensions_timestamp < $forum_ext_versions_update_cache))
{
	$pun_repository_error = \'\';

	if (pun_repository_generate_cache($pun_repository_error))
	{
		require FORUM_CACHE_DIR.\'cache_pun_repository.php\';
	}
	else
	{

		?>
		<div class="ct-box warn-box">
			<p class="warn"><?php echo $pun_repository_error ?></p>
		</div>
		<?php

		// Stop processing hook
		return;
	}
}

$pun_repository_parsed = array();
$pun_repository_skipped = array();

// Display information about extensions in repository
foreach ($pun_repository_extensions as $pun_repository_ext)
{
	// Skip installed extensions
	if (isset($inst_exts[$pun_repository_ext[\'id\']]))
	{
		$pun_repository_skipped[\'installed\'][] = $pun_repository_ext[\'id\'];
		continue;
	}

	// Skip uploaded extensions (including incorrect ones)
	if (is_dir(FORUM_ROOT.\'extensions/\'.$pun_repository_ext[\'id\']))
	{
		$pun_repository_skipped[\'has_dir\'][] = $pun_repository_ext[\'id\'];
		continue;
	}

	// Check for unresolved dependencies
	if (isset($pun_repository_ext[\'dependencies\']))
		$pun_repository_ext[\'dependencies\'] = pun_repository_check_dependencies($inst_exts, $pun_repository_ext[\'dependencies\']);

	if (empty($pun_repository_ext[\'dependencies\'][\'unresolved\']))
	{
		// \'Download and install\' link
		$pun_repository_ext[\'options\'] = array(\'<a href="\'.$base_url.\'/admin/extensions.php?pun_repository_download_and_install=\'.$pun_repository_ext[\'id\'].\'&amp;csrf_token=\'.generate_form_token(\'pun_repository_download_and_install_\'.$pun_repository_ext[\'id\']).\'">\'.$lang_pun_repository[\'Download and install\'].\'</a>\');
	}
	else
		$pun_repository_ext[\'options\'] = array();

	$pun_repository_parsed[] = $pun_repository_ext[\'id\'];

	// Direct links to archives
	$pun_repository_ext[\'download_links\'] = array();
	foreach (array(\'zip\', \'tgz\', \'7z\') as $pun_repository_archive_type)
		$pun_repository_ext[\'download_links\'][] = \'<a href="\'.PUN_REPOSITORY_URL.\'/\'.$pun_repository_ext[\'id\'].\'/\'.$pun_repository_ext[\'id\'].\'.\'.$pun_repository_archive_type.\'">\'.$pun_repository_archive_type.\'</a>\';

	($hook = get_hook(\'pun_repository_pre_display_ext_info\')) ? eval($hook) : null;

	// Let\'s ptint it all out
?>
		<div class="ct-box info-box extension available" id="<?php echo $pun_repository_ext[\'id\'] ?>">
			<h3 class="ct-legend hn"><span><?php echo forum_htmlencode($pun_repository_ext[\'title\']).\' \'.$pun_repository_ext[\'version\'] ?></span></h3>
			<p><?php echo forum_htmlencode($pun_repository_ext[\'description\']) ?></p>
<?php

	// List extension dependencies
	if (!empty($pun_repository_ext[\'dependencies\'][\'dependency\']))
		echo \'
			<p>\', $lang_pun_repository[\'Dependencies:\'], \' \', implode(\', \', $pun_repository_ext[\'dependencies\'][\'dependency\']), \'</p>\';

?>
			<p><?php echo $lang_pun_repository[\'Direct download links:\'], \' \', implode(\' \', $pun_repository_ext[\'download_links\']) ?></p>
<?php

	// List unresolved dependencies
	if (!empty($pun_repository_ext[\'dependencies\'][\'unresolved\']))
		echo \'
			<div class="ct-box warn-box">
				<p class="warn">\', $lang_pun_repository[\'Resolve dependencies:\'], \' \', implode(\', \', array_map(create_function(\'$dep\', \'return \\\'<a href="#\\\'.$dep.\\\'">\\\'.$dep.\\\'</a>\\\';\'), $pun_repository_ext[\'dependencies\'][\'unresolved\'])), \'</p>
			</div>\';

	// Actions
	if (!empty($pun_repository_ext[\'options\']))
		echo \'
			<p class="options">\', implode(\' \', $pun_repository_ext[\'options\']), \'</p>\';

?>
		</div>
<?php

}

?>
		<div class="ct-box warn-box">
			<p class="warn"><?php echo $lang_pun_repository[\'Files mode and owner\'] ?></p>
		</div>
<?php

if (empty($pun_repository_parsed) && (count($pun_repository_skipped[\'installed\']) > 0 || count($pun_repository_skipped[\'has_dir\']) > 0))
{
	($hook = get_hook(\'pun_repository_no_extensions\')) ? eval($hook) : null;

	?>
		<div class="ct-box info-box">
			<p class="warn"><?php echo $lang_pun_repository[\'All installed or downloaded\'] ?></p>
		</div>
	<?php

}

($hook = get_hook(\'pun_repository_after_ext_list\')) ? eval($hook) : null;

?>
	</div>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_pm_fn_send_message_pre_redirect' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if($forum_config[\'o_pm_email_enable\'] == \'1\')
			{
				global $forum_config, $forum_user, $lang_common, $base_url, $pun_pm_receiver_username;

				$query = array(
				    \'SELECT\'	=> \'email, enable_pm_email\',
				    \'FROM\'		=> \'users\',
				    \'WHERE\'		=> \'username=\\\'\'.$forum_db->escape($pun_pm_receiver_username).\'\\\'\'
				);
				$results = $forum_db->query_build($query) or error(__FILE__, __LINE__);
				$receiver = $forum_db->fetch_assoc($results);

				if($receiver[\'enable_pm_email\'] == \'1\')
				{
				$mail_tpl = forum_trim(file_get_contents($ext_info[\'path\'].\'/lang/mail_template/\'.$forum_user[\'language\'].\'.tpl\'));

				// The first row contains the subject
				$first_crlf = strpos($mail_tpl, "\\n");
				$mail_subject = forum_trim(substr($mail_tpl, 8, $first_crlf-8));
				$mail_message = forum_trim(substr($mail_tpl, $first_crlf));

				$mail_subject = str_replace(\'<board_title>\', $forum_config[\'o_board_title\'], $mail_subject);
				$mail_message = str_replace(\'<board_title>\', $forum_config[\'o_board_title\'], $mail_message);
				$mail_message = str_replace(\'<base_url>\', $base_url.\'/\', $mail_message);
				$mail_message = str_replace(\'<board_mailer>\', sprintf($lang_common[\'Forum mailer\'], $forum_config[\'o_board_title\']), $mail_message);

				$query = array(
					\'SELECT\'	=> \'email\',
					\'FROM\'		=> \'users\',
					\'WHERE\'		=> \'username=\\\'\'.$forum_db->escape($pun_pm_receiver_username).\'\\\'\'
				);
				$results = $forum_db->query_build($query) or error(__FILE__, __LINE__);
				$receiver = $forum_db->fetch_assoc($results);

				if (!defined(\'FORUM_EMAIL_FUNCTIONS_LOADED\'))
					require FORUM_ROOT.\'include/email.php\';

				forum_mail(forum_htmlencode($receiver[\'email\']), $mail_subject, $mail_message);
				}
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'pun_pm_pf_change_details_settings_pre_pm_settings_fieldset_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pm_email\',
\'path\'			=> FORUM_ROOT.\'extensions/pm_email\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pm_email\',
\'dependencies\'	=> array (
\'pun_pm\'	=> array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\'),
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if($forum_config[\'o_pm_email_enable\'] == \'1\')
			{
				?>

				<fieldset class="mf-set set<?php echo ++$forum_page[\'item_count\'] ?>">
					<legend><span><?php echo $lang_pm_email[\'PM Email\'] ?></span></legend>
					<div class="mf-box">
						<div class="mf-item">
							<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page[\'fld_count\'] ?>" name="form[enable_pm_email]" value="1"<?php if ($user[\'enable_pm_email\'] == \'1\') echo \' checked="checked"\' ?> /></span>
							<label for="fld<?php echo $forum_page[\'fld_count\'] ?>"><?php echo $lang_pm_email[\'Enable Legend\'] ?></label>
						</div>
					</div>
				</fieldset>

				<?php
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_preparse_bbcode_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if ($forum_config[\'p_message_bbcode\'] == \'1\' && !$is_signature) {
				while ($new_text = preg_replace(\'/\\[(video)(?:\\=[^\\]]*)?\\]\\[\\/\\1\\]/\', \'\', $text)) {
					if ($new_text != $text) {
						$text = $new_text;
					} else {
						break;
					}
				}
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'he_new_bbcode_link' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_video_tag\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_video_tag\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_video_tag\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!isset($fancy_video_tag)) {
				if (file_exists($ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\')) {
					require $ext_info[\'path\'].\'/lang/\'.$forum_user[\'language\'].\'/lang.php\';
				} else {
					require $ext_info[\'path\'].\'/lang/English/lang.php\';
				}
			}
			$lang_help = array_merge($lang_help, $fancy_video_tag);
?>
			<div class="entry-content">
				<code>[video]<?php echo $lang_help[\'video_uri\'] ?>[/video]</code><span><?php echo $lang_help[\'produces\'] ?></span>
				<?php echo $lang_help[\'video_display\'] ?>
			</div>
<?php

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ps_parse_message_pre_split' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_ninja2\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_ninja2\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_ninja2\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

global $forum_url;
		if (strpos($text, \'ninja\') !== false && strpos($text, \'/ninja\') !== false) {
			if($forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 1 || $forum_user[\'is_admmod\'] || $forum_user[\'g_id\'] == 21 || $forum_user[\'g_id\'] == 4 || $forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 16) {
				$text = preg_replace(\'#\\[ninja\\](.*?)\\[/ninja\\]#s\', \'</p><div class="quotebox"><cite>Ninja :</cite><blockquote><p><i>$1</i></p></blockquote></div><p>\', $text);				
			} else {
				$text = preg_replace(\'#\\[ninja\\](.*?)\\[\\/ninja\\]#si\', \'\', $text);
			}
		}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'po_modify_quote_info' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'mod_ninja2\',
\'path\'			=> FORUM_ROOT.\'extensions/mod_ninja2\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/mod_ninja2\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

$text = $q_message;
							
		if (strpos($text, \'ninja\') !== false && strpos($text, \'/ninja\') !== false) {
			if($forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 1 || $forum_user[\'is_admmod\'] || $forum_user[\'g_id\'] == 21 || $forum_user[\'g_id\'] == 4 || $forum_user[\'g_id\'] == 5 || $forum_user[\'g_id\'] == 16) {
				$text_ninja = preg_replace(\'#\\[ninja\\](.*?)\\[/ninja\\]#s\', \'</p><div class="quotebox"><cite>Ninja :</cite><blockquote><p><i>$1</i></p></blockquote></div><p>\', $text);
			} else {
				$text = preg_replace(\'#\\[ninja\\](.*?)\\[\\/ninja\\]#si\', \'\', $text);
			} 						
		}
		
		$q_message = $text;

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
  'ft_about_end' => 
  array (
    0 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_antispam\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_antispam\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_antispam\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
{
	define(\'PUN_EXTENSIONS_USED\', 1);
	if (count($pun_extensions_used) == 1)
		echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
	else
		echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    1 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_admin_manage_extensions_improved\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_admin_manage_extensions_improved\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_admin_manage_extensions_improved\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
{
	define(\'PUN_EXTENSIONS_USED\', 1);
	if (count($pun_extensions_used) == 1)
		echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
	else
		echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    2 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_bbcode\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_bbcode\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_bbcode\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
{
	define(\'PUN_EXTENSIONS_USED\', 1);
	if (count($pun_extensions_used) == 1)
		echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
	else
		echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    3 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_poll\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_poll\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_poll\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
			{
				define(\'PUN_EXTENSIONS_USED\', 1);
				if (count($pun_extensions_used) == 1)
					echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
				else
					echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    4 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_quote\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_quote\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_quote\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
			{
				define(\'PUN_EXTENSIONS_USED\', 1);
				if (count($pun_extensions_used) == 1)
					echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
				else
					echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    5 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'fancy_stat_counters\',
\'path\'			=> FORUM_ROOT.\'extensions/fancy_stat_counters\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/fancy_stat_counters\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (defined(\'FORUM_PAGE\') && (!in_array(FORUM_PAGE, array(\'redirect\')) && (substr(FORUM_PAGE, 0, 5) != \'admin\'))) {
			// GA
				if ($forum_config[\'o_fancy_stat_counter_enable_ga\'] == \'1\' && !empty($forum_config[\'o_fancy_stat_counter_id_ga\'])) {
?>
					<!-- Google Analytics Code -->
					<script type="text/javascript">
						var _gaq = _gaq || [];
						_gaq.push([\'_setAccount\', \'<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ga\']); ?>\']);
						_gaq.push([\'_trackPageview\']);

						(function() {
							var ga = document.createElement(\'script\');
							ga.type = \'text/javascript\';
							ga.async = true;
							ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\'; var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
						})();
					</script>
<?php
				}

				// YM
				if ($forum_config[\'o_fancy_stat_counter_enable_ym\'] == \'1\' && !empty($forum_config[\'o_fancy_stat_counter_id_ym\'])) {
?>
					<!-- Yandex.Metrika counter -->
					<div style="display:none;"><script type="text/javascript">
					(function(w, c) {
					    (w[c] = w[c] || []).push(function() {
					        try {
					            w.yaCounter<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ym\']); ?> = new Ya.Metrika({id:<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ym\']); ?>, enableAll: true});
					        }
					        catch(e) { }
					    });
					})(window, \'yandex_metrika_callbacks\');
					</script></div>
					<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
					<noscript><div><img src="//mc.yandex.ru/watch/<?php echo forum_htmlencode($forum_config[\'o_fancy_stat_counter_id_ym\']); ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
					<!-- /Yandex.Metrika counter -->
<?php
				}
			}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    6 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_pm\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_pm\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_pm\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
{
	define(\'PUN_EXTENSIONS_USED\', 1);
	if (count($pun_extensions_used) == 1)
		echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
	else
		echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
    7 => '$GLOBALS[\'ext_info_stack\'][] = array(
\'id\'				=> \'pun_repository\',
\'path\'			=> FORUM_ROOT.\'extensions/pun_repository\',
\'url\'			=> $GLOBALS[\'base_url\'].\'/extensions/pun_repository\',
\'dependencies\'	=> array (
)
);
$ext_info = $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];

if (!defined(\'PUN_EXTENSIONS_USED\') && !empty($pun_extensions_used))
{
	define(\'PUN_EXTENSIONS_USED\', 1);
	if (count($pun_extensions_used) == 1)
		echo \'<p style="clear: both; ">The \'.$pun_extensions_used[0].\' official extension is installed. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
	else
		echo \'<p style="clear: both; ">Currently installed <span id="extensions-used" title="\'.implode(\', \', $pun_extensions_used).\'.">\'.count($pun_extensions_used).\' official extensions</span>. Copyright &copy; 2003&ndash;2009 <a href="http://punbb.informer.com/">PunBB</a>.</p>\';
}

array_pop($GLOBALS[\'ext_info_stack\']);
$ext_info = empty($GLOBALS[\'ext_info_stack\']) ? array() : $GLOBALS[\'ext_info_stack\'][count($GLOBALS[\'ext_info_stack\']) - 1];
',
  ),
);

?>