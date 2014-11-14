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
	'BANNED_NAME'			=> 'Nickname',
	'BAN_LIST'			=> 'Lista Ban',
	'BAN_IN'			=> 'Inizio Ban',
	'BAN_OUT'			=> 'Fine Ban',
	'BAN_REASON'			=> 'Motivo',
    'PERMABAN'           => 'Ban Permanente',
    'NO_REASON_BAN'      => 'Nessuna motivazione specificata',
    'TOTAL_BAN'          => 'Un utente bannato',
    'TOTAL_BANS'          => '%s utenti bannati',
));
