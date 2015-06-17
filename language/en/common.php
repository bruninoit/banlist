<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'BANNED_NAME'			=> 'Users',
	'BAN_LIST'			=> 'Ban List',
	'BAN_IN'			=> 'Start Ban',
	'BAN_OUT'			=> 'End Ban',
	'BAN_REASON'			=> 'Reason',
    'PERMABAN'           => 'Permanent Ban',
    'NO_REASON_BAN'      => 'No Reason',
    'TOTAL_BAN'          => 'There is one user banned',
    'TOTAL_BANS'          => 'There are %s users banned',
      'CHANGE_TYPE_ALL'          => 'Archive of all bans (also bans concluded)',
    'CHANGE_TYPE_LIMIT'          => 'List of current bans',
));
