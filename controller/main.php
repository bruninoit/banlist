<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace staffit\banlist\controller;

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
protected $db; 

	/**
	* Constructor
	*
	* @param \phpbb\config\config		$config
	* @param \phpbb\controller\helper	$helper
	* @param \phpbb\template\template	$template
	* @param \phpbb\user				$user
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
 $this->db = $db;
$this->user = $user; 
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
	}
/**
	* Demo controller for route /demo/{name}
	*
	* @param string		$name
	* @return \Symfony\Component\HttpFoundation\Response A Symfony Response object
	*/
	public function handle()
	{
		$time = time();
 //query
$sql="SELECT ban_userid, ban_start, ban_end, ban_reason, user_id, username
FROM ".BANLIST_TABLE.",".USERS_TABLE."
WHERE ban_userid > 0
AND ban_userid = user_id
AND ban_end < $time";
//eseguo la query
$result = $this->db-> sql_query($sql);
//ciclo
while($row = $this->db->sql_fetchrow($result))
{
	$ban = $row['ban_end'];
	$banstart = $row['ban_start'];
	if ($ban == 0)
	{
		$ban = (string)$this->user->lang['PERMABAN'];
	}
	else
	{
		$ban=$this->user-> format_date ($row['ban_end']);
	}
	$ban_reason= $row['ban_reason'];
//motivo ban non presente
if(empty($ban_reason))
	{	$ban_reason=(string)$this->user-> lang['NO_REASON_BAN'];
	}
//date
	$banstart=$this->user-> format_date($row['ban_start']);
//template
	$this->template-> assign_block_vars('risultati',array(
		'NOME'=> $row['username'],
		'BANIN'=> $banstart,
		'BAN'=> $ban,
		'MOTIVO'=> $ban_reason
	));
	}
$this->db->sql_freeresult();

// query totale ban
$sql_ary = "SELECT COUNT(*) AS bans
FROM ".BANLIST_TABLE.",".USERS_TABLE."
WHERE ban_userid > 0
AND ban_userid = user_id";
//la eseguo
$result = $this->db->sql_query($sql_ary);
//risultati
$total_results = $this->db->sql_fetchfield('bans');
$this->db->sql_freeresult($result);
//mando al template
if($total_results == 1)
{
$this->template->assign_vars(array('TOTAL_BAN'       => $this->user->lang['TOTAL_BAN'])); 
}else{
$this->template->assign_vars(array(
   'TOTAL_BAN'       => sprintf($this->user->lang['TOTAL_BANS'], $total_results),
)); 
}
		//$l_message = !$this->config['acme_demo_goodbye'] ? 'DEMO_HELLO' : 'DEMO_GOODBYE';
		//$this->template->assign_var('DEMO_MESSAGE', $this->user->lang($l_message, $name));
//$this->template->assign_vars(array(
//			'U_BANLIST_PAGE_TYPE'	=> $this->helper->route('staffit_banlist_controller'),
//			'CHANGE_TYPE'	=> $this->helper->route('staffit_banlist_controller'),
//		));
//controllo type


		return $this->helper->render('banlist_body.html', $this->user->lang['BAN_LIST']);
	}
}
