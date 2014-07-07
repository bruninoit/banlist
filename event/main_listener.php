<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'						=> 'add_page_header_link',
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
		$this->helper = $helper;
		$this->template = $template;
	}

	public function add_page_header_link($event)
	{
		$this->template->assign_vars(array(
			'U_WEBROOTPATH'		=> $this->helper->route('acme_demo_controller'),
			'U_WEBROOTPATH_AJAX'=> $this->helper->route('acme_demo_controller', array('_referer' => $this->helper->get_current_url())),
		));
	}
}
