<?php
/**
 * @package     Joomla.Plugin
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Nepoh <nepoh@outlook.de>
 */

defined( '_JEXEC' ) or die;

class pkg_backtotopInstallerScript
{
	public function install ()
	{
		// enable plugins on installation
		$query = "update `#__extensions` set enabled=1 where type = 'plugin' and element = 'backtotop'";
		$db = JFactory::getDBO();
		$db->setQuery($query);
		$db->query();
	}
}
