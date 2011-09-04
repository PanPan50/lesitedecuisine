<?php
/***********************************************************************

	FluxBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('FORUM'))
	exit;

function install()
{
	global $forum_db;

	// it's an upgrade
	if (defined('EXT_CUR_VERSION'))
	{
		// do upgrade...


	}
	// it's a fresh install
	else
	{
		// Table pages
		$schema = array(
			'FIELDS'		=> array(
				'id'			=> array(
					'datatype'		=> 'SERIAL',
					'allow_null'	=> false
				),
				'title'			=> array(
					'datatype'		=> 'VARCHAR(255)',
					'allow_null'	=> true
				),
				'content'			=> array(
					'datatype'		=> 'text',
					'allow_null'	=> true
				)
			),
			'PRIMARY KEY'	=> array('id')
		);
		
		$forum_db->create_table('pages', $schema);
	
		$query = array(
			'INSERT'	=> 'title, content',
			'INTO'		=> 'pages',
			'VALUES'	=> '\'Example page\', \'Example content\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		$page_id = $forum_db->insert_id();

		// Table panels
		$schema = array(
			'FIELDS'		=> array(
				'id'			=> array(
					'datatype'		=> 'SERIAL',
					'allow_null'	=> false
				),
				'position'		=> array(
					'datatype'		=> 'INT(10) UNSIGNED',
					'allow_null'	=> true,
					'default'	=> 0
				),
				'name'			=> array(
					'datatype'		=> 'VARCHAR(255)',
					'allow_null'	=> true
				),
				'content'			=> array(
					'datatype'		=> 'text',
					'allow_null'	=> true
				),
				'file'			=> array(
					'datatype'		=> 'VARCHAR(255)',
					'allow_null'	=> true
				),
				'location'			=> array(
					'datatype'		=> 'INT(10) UNSIGNED',
					'allow_null'	=> true,
					'default'	=> 0
				),
				'enable'		=> array(
					'datatype'		=> 'INT(1) UNSIGNED',
					'allow_null'	=> true,
					'default'	=> 1
				),
			),
			'PRIMARY KEY'	=> array('id')
		);
		
		$forum_db->create_table('panels', $schema);

		$menu_content  = '<a href="<?php echo forum_link($forum_url[\'index\']) ?>"><?php echo $lang_common[\'Index\'] ?></a><br />';
		$menu_content .= '<a href="<?php echo forum_link($forum_url[\'forums\']) ?>"><?php echo $lang_common[\'Forum\'] ?></a><br />';
		$menu_content .= '<a href="<?php echo forum_link($forum_url[\'users\']) ?>"><?php echo $lang_common[\'User list\'] ?></a><br />';
		$menu_content .= '<a href="<?php echo forum_link($forum_url[\'page_id\'], array('.$page_id.', sef_friendly(\'Example page\'))) ?>">Example page</a>';

		$query = array(
			'INSERT'	=> 'location, position, name, content',
			'INTO'		=> 'panels',
			'VALUES'	=> '0, 0, \'Main menu\', \''.str_replace('\'', '\\\'', $menu_content).'\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'location, position, name, content',
			'INTO'		=> 'panels',
			'VALUES'	=> '0, 1, \'Links\', \'<a href="http://fluxbb.org">FluxBB</a>\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		
		$query = array(
			'INSERT'	=> 'location, position, name, content',
			'INTO'		=> 'panels',
			'VALUES'	=> '1, 0, \'Welcome message\', \'Welcome to my portal\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		
		$query = array(
			'INSERT'	=> 'location, position, name, file',
			'INTO'		=> 'panels',
			'VALUES'	=> '1, 1, \'Active topics\', \'portal_by_daris/panels/active_topics.php\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'location, position, name, file',
			'INTO'		=> 'panels',
			'VALUES'	=> '3, 0, \'Who\\\'s online\', \'portal_by_daris/panels/who_is_online.php\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'location, position, name, file',
			'INTO'		=> 'panels',
			'VALUES'	=> '3, 1, \'Search\', \'portal_by_daris/panels/search.php\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'location, position, name, file',
			'INTO'		=> 'panels',
			'VALUES'	=> '3, 2, \'Recent posts\', \'portal_by_daris/panels/recent_posts.php\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
		
		$query = array(
			'INSERT'	=> 'location, position, name, file',
			'INTO'		=> 'panels',
			'VALUES'	=> '3, 3, \'Top posters\', \'portal_by_daris/panels/top_posters.php\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);


		// Config values
		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_news_forums\', 1'
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_news_count\', 10'
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_left_width\', \'15\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_right_width\', \'15\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_panels_all_pages\', \'0\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

		$query = array(
			'INSERT'	=> 'conf_name, conf_value',
			'INTO'		=> 'config',
			'VALUES'	=> '\'o_portal_news_description_length\', \'1500\''
		);
		$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	}

	// Regenerate panels cache
	require FORUM_ROOT.'extensions/portal_by_daris/include/cache.php';
	generate_panels_cache();
}


function uninstall()
{
	global $forum_db;

	$forum_db->drop_table('pages');
	$forum_db->drop_table('panels');
	
	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_news_forums\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_news_count\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_left_width\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_right_width\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_panels_all_pages\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
	
	$query = array(
		'DELETE'	=> 'config',
		'WHERE'		=> 'conf_name=\'o_portal_news_description_length\''
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
}
