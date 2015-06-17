<?php
/**
*
* @package phpBB Extension - Acme Demo
* @copyright (c) 2013 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'BANNED_NAME'			=> 'الأعضاء',
	'BAN_LIST'			=> 'قائمة المحظورين',
	'BAN_IN'			=> 'بداية الحظر',
	'BAN_OUT'			=> 'نهاية الحظر',
	'BAN_REASON'			=> 'السبب',
    'PERMABAN'           => 'حظر دائم',
    'NO_REASON_BAN'      => 'بدون سبب',
    'TOTAL_BAN'          => 'تم حظر 1 عضو',
    'TOTAL_BANS'          => 'تم حظر عدد %s أعضاء',
      'CHANGE_TYPE_ALL'          => 'أرشيف جميع المحظورين (مع الذين أنتهت فترة حظرهم)',
    'CHANGE_TYPE_LIMIT'          => 'قائمة المحظورين حالياً',
));
