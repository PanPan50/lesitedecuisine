<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/

if (defined('FORUM_PORTAL') && $forum_user['g_read_board'] != '0')
{
	if (file_exists(FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php'))
		require_once FORUM_PORTAL.'lang/'.$forum_user['language'].'/portal.php';
	else
		require_once FORUM_PORTAL.'lang/English/portal.php';

	$left_width = isset($forum_config['o_portal_left_width']) ? intval($forum_config['o_portal_left_width']) : '15';
	$right_width = isset($forum_config['o_portal_right_width']) ? intval($forum_config['o_portal_right_width']) : '15';

	$panels_output = array(
		0 => array(),
		1 => array(),
		2 => array(),
		3 => array()
	);

	foreach ($forum_panels as $location => $panels)
	{
		foreach ($panels as $cur_panel)
		{
			if ($left_width == 0 && $location == 0 || $right_width == 0 && $location == 3 || FORUM_PAGE == 'pages' && $location == 3 || $forum_config['o_portal_panels_all_pages'] == 1 && $location == 3 && !in_array(FORUM_PAGE, array('news', 'pages')))
				continue;
			
			ob_start();
	
			// default class for content element, panels can change it
			$cur_panel['class'] = 'panel-content';
	
			$file = FORUM_ROOT.'extensions/'.$cur_panel['file'];
			
			// if panel file exists require it
			if ($cur_panel['file'] != '' && file_exists($file) && is_file($file))
				require_once $file;

			// if panel doesn't contain php code just echo it
			else if (strpos($cur_panel['content'], '<?') === false)
				echo $cur_panel['content'];
	
			// else evaluate panel content
			else
				eval('?>'.$cur_panel['content']);
	
			$cur_panel['content'] = ob_get_contents();
			ob_end_clean();

			if (!trim($cur_panel['content']))
				continue;
		
				ob_start();
?>	<div class="panel">

		<div class="main-head">
			<h2 class="hn"><span><?php echo $cur_panel['name'] ?></span></h2>
		</div>

		<div class="main-content <?php echo $cur_panel['class'] ?>">
<?php echo $cur_panel['content'] ?>

		</div>

	</div>
<?php

			// insert panel html to specified side
			$panels_output[$location][] = ob_get_contents();
	
			ob_end_clean();
		}
	}

	// generate portal_top replacement
	$tpl_temp = "\n".'<div id="leftside">';
	$tpl_temp .= "\n".implode("\n", $panels_output[0]);
	$tpl_temp .= "\n".'</div>';

	$tpl_temp .= "\n".'<div id="rightside">';
	$tpl_temp .= "\n".implode("\n", $panels_output[3]);
	$tpl_temp .= "\n".'</div>';

	$tpl_temp .= "\n".'<div id="center">';
	$tpl_temp .= (FORUM_PAGE == 'news' ? "\n".implode("\n", $panels_output[1]) : '');
	
	$tpl_main = str_replace('<!-- portal_top -->', $tpl_temp, $tpl_main);

	// generate portal_bottom replacement
	$tpl_temp = (FORUM_PAGE == 'news' ? "\n".implode("\n", $panels_output[2]) : '');
	$tpl_temp .= "\n".'</div>';

	$tpl_temp .= "\n".'<div style="clear: both"></div>';
	$tpl_main = str_replace('<!-- portal_bottom -->', $tpl_temp, $tpl_main);

	$style_center = '';

	if (!count($panels_output[0]))
		$left_width = 0;
	
	if (!count($panels_output[3]))
		$right_width = 0;

	// Calculate center width
	$center_width = 100 - $left_width - $right_width;
	if (count($panels_output[0]) && count($panels_output[3]))
	{
		$center_width -= 2;
		$left_width .= '%; margin-right: 1'; // 1%
	}
	elseif (!count($panels_output[0]) && !count($panels_output[3])) { /* do nothing */ }
	
	elseif (!count($panels_output[0]))
		$center_width -= 1;

	elseif (!count($panels_output[3]))
	{
		$center_width -= 1;
		$style_center .= 'float: right;';
	}
	
	// Generate css
	$style = array();
	if ($left_width != 0)
		$style[] = '#leftside { width: '.$left_width.'%; }';
		
	if ($right_width != 0)
		$style[] = '#rightside { width: '.$right_width.'%; }';
	
	$style[] = '#center { width: '.$center_width.'%; '.$style_center.'}';

	$style_html = '<style type="text/css">'."\n".implode("\n", $style)."\n".'</style>';

	$tpl_main = str_replace('</head>', $style_html."\n".'</head>', $tpl_main);
}
