<?php

if (!defined('QA_VERSION')) {
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
}

require_once QA_PLUGIN_DIR.'q2a-random-avatar/pupi_ra_module_admin.php';
require_once QA_PLUGIN_DIR.'q2a-random-avatar/random-avatar-class.php';

error_log('-------------------- set avatar start --------------------');
// $start = microtime(true);
$ra = new random_avatar();
$ra->set_random_avatar();
// $end = microtime(true);
// error_log ("処理時間：" . ($end - $start) . "秒");
error_log('-------------------- set avatar finish --------------------');

/*
	Omit PHP closing tag to help avoid accidental output
*/
