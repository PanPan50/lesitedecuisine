<?php
/***********************************************************************

	PunBB extension
	Portal
	Daris <daris91@gmail.com>

************************************************************************/


function get_panel_files($selected = '')
{
	global $lang_admin_panels;
	
	$output = '<option value="">'.$lang_admin_panels['None'].'</option>';
	
	$dir = dir(FORUM_ROOT.'extensions');
	$last_extension = '';
	
	// Go through extension directory
	while ($cur_extension = $dir->read())
	{
		$panels_dir = FORUM_ROOT.'extensions/'.$cur_extension.'/panels';
		
		// Search panels directory in current extension folder
		if (file_exists($panels_dir) && is_dir($panels_dir))
		{
			$ext_dir = dir($panels_dir);
			
			// Get all panels
			while ($file = $ext_dir->read())
			{
				if (substr(strtolower($file), strlen($file) - 4) == '.php' && substr($file, 0, 1) != '.')
				{
					 // A new extension since last iteration?
					if ($last_extension != $cur_extension)
					{
						$new_extension_name = forum_htmlencode(ucfirst(str_replace('_', ' ', $cur_extension)));
						//$new_extension_name .= (!in_array($cur_extension, $enabled_extensions) ? ' '.$lang_portal['Disabled'] : '');
						
						$output .= ($last_extension != '' ? "\n\t\t\t\t\t\t\t\t".'</optgroup>' : '') . "\n\t\t\t\t\t\t\t\t".'<optgroup label="'.$new_extension_name.'">';
					}
					
					$ext_file = $cur_extension.'/panels/'.$file;
					$ext_name = forum_htmlencode(ucfirst(str_replace('_', ' ', substr($file, 0, strrpos($file, '.')))));
					
					$output .= "\n\t\t\t\t\t\t\t\t\t".'<option value="'.$ext_file.'"'.($selected == $ext_file ? ' selected="selected"' : '').'>'.$ext_name.'</option>';
					
					$last_extension = $cur_extension;
				}
	
			}
			$ext_dir->close();
		}
	}
	$dir->close();
	
	$output .= '</optgroup>';
	return $output;
}