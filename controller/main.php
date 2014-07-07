<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace acme\demo\controller;

class main
{
	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \phpbb\user */
	protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config
	* @param \phpbb\controller\helper	$helper
	* @param \phpbb\template\template	$template
	* @param \phpbb\user				$user
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;

		global $phpbb_root_path, $phpEx;
		include_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
	}

	/**
	* Demo controller for route /demo/{name}
	*
	* @param string		$name
	* @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function handle()
	{
		$rank = array();
		get_user_rank($this->user->data['user_rank'], $this->user->data['user_posts'], $rank['rank_title'], $rank['rank_image'], $rank['rank_image_src']);
		$signature_preview = generate_text_for_display($this->user->data['user_sig'], $this->user->data['user_sig_bbcode_uid'], $this->user->data['user_sig_bbcode_bitfield'], OPTION_FLAG_BBCODE + OPTION_FLAG_LINKS + OPTION_FLAG_SMILIES);
		$this->template->assign_vars(array(
			'RANK_IMG'	=> $rank['rank_image'],
			'SIGNATURE_PREVIEW'	=> $signature_preview,
			'U_WEBROOTTEST_CONTROLLER'	=> $this->helper->route('acme_demo_controller'),
		));
		confirm_box(false, 'Hi ajax', '', 'demo_body.html');
	}
}
