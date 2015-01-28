<?php
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
    'TOTAL_BAN'          => 'C&apos;&egrave; un utente bannato',
    'TOTALS_BAN'          => 'Ci sono %s utenti bannati',
));
