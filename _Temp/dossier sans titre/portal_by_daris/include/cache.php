<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

function generate_panels_cache()
{
	global $forum_db;

	// Get the forum config from the DB
	$query = array(
		'SELECT'	=> 'pn.*',
		'FROM'		=> 'panels AS pn',
		'WHERE'		=> 'pn.enable=1',
		'ORDER BY'	=> 'pn.location, pn.position'
	);

	($hook = get_hook('xn_portal_by_daris_ch_qr_get_panels')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	$output = array();
	while ($cur_panel = $forum_db->fetch_assoc($result))
	{
		if (!isset($output[$cur_panel['location']]))
			$output[$cur_panel['location']] = array();
		
		$output[$cur_panel['location']][] = array(
			'name' => $cur_panel['name'],
			'position' => $cur_panel['position'],
			'content' => $cur_panel['content'],
			'file' => $cur_panel['file']
		);
	}

	// Output config as PHP code
	$fh = @fopen(FORUM_CACHE_DIR.'cache_panels.php', 'wb');
	if (!$fh)
		error('Unable to write configuration cache file to cache directory. Please make sure PHP has write access to the directory \'cache\'.', __FILE__, __LINE__);

	fwrite($fh, '<?php'."\n\n".'define(\'FORUM_PANELS_LOADED\', 1);'."\n\n".'$forum_panels = '.var_export($output, true).';'."\n\n".'?>');

	fclose($fh);
}
