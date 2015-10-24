<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Editors-xtd.BackToTop
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Nepoh <nepoh@outlook.de>
 */
 
defined('_JEXEC') or die;

class PlgButtonBackToTop extends JPlugin
{
	const PLACEHOLDER = "{backtotop}";
	
	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.1
	 */
	protected $autoloadLanguage = true;

	/**
	 * Display the button
	 *
	 * @param   string  $name  The name of the button to add
	 */
	public function onDisplay($name)
	{
		// hide button when content plugin is not enabled
		//if (!JPluginHelper::isEnabled('content', 'backtotop') return;
		
		$button = new JObject;
		$button->modal = false;
		$button->class = 'btn';
		$button->onclick = 'jInsertEditorText(\'' . self::PLACEHOLDER . '\', \'' . $name . '\');return false;';
		$button->text = JText::_('PLG_EDITORS-XTD_BACKTOTOP_BUTTON');
		$button->name = 'arrow-up';

		// @TODO: The button writer needs to take into account the javascript directive
		// $button->link', 'javascript:void(0)');
		$button->link = '#';

		return $button;
	}
}
