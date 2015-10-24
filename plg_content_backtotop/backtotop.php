<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.BackToTop
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Nepoh <nepoh@outlook.de>
 */

defined('_JEXEC') or die;

class PlgContentBackToTop extends JPlugin
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
	 * 
	 *
	 * @param   string   $context  The context of the content being passed to the plugin.
	 * @param   object   &$row     The article object.  Note $article->text is also available
	 * @param   mixed    &$params  The article params
	 * @param   integer  $page     The 'page' number
	 *
	 * @return  mixed  Always returns void or true
	 */
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		if ($context != 'com_content.article')
		{
			return;
		}
		
		/*$link = '<a href="'.$uri->toString().'#'.$this->params->get('fragment', 'top').'" class="back-top '.$this->params->get('class').'">'
				.'<span class="'.$this->params->get('icon', 'icon-arrow-up').'"></span>'
				.$this->params->get('text', JText::_('PLG_CONTENT_BACKTOTOP_TEXT_DEFAULT'))
				.'</a>'
		;*/
		
		$link = $this->getBackToTopLink(
					$this->params->get('fragment', null),
					$this->params->get('text', null),
					$this->params->get('icon', null),
					$this->params->get('class', null)
		);
		
		$row->text = str_replace(self::PLACEHOLDER, $link, $row->text);
		
		if ($this->params->get('headings'))
		{
			$searchHeadings = implode('', $this->params->get('headings'));
			
			$row->text = preg_replace('#(</h['.$searchHeadings.']>)#', $link.'$1', $row->text);
		}
		
		return true;
	}
	
	/**
	 * Creates the "back to top" link
	 * 
	 * @param	string	$fragment (optional)
	 * @param	string	$text (optional) 
	 * @param	string	$icon (optional) 
	 * @param	string	$class (optional) 
	 */
	protected function getBackToTopLink($fragment = null, $text = null, $icon = null, $class = null)
	{
		$uri = JFactory::getURI();
		
		if (empty($fragment))	$fragment = 'top';
		if (empty($text))		$text = JText::_('PLG_CONTENT_BACKTOTOP_TEXT_DEFAULT');
		if (is_null($icon))		$icon = 'icon-arrow-up';
		if (is_null($class))	$class = '';
		
		$link = '<span class="'.implode(' ', array('back-top', $class)).'">'
					.'<a href="'.$uri->toString().'#'.$fragment.'">'
						.'<span class="'.$icon.'"></span>'
						.$text
					.'</a>'
				.'</span>'
		;
		
		return $link;
	}
}
