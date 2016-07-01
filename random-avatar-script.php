<?php

if (!defined('QA_VERSION')) {
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
}

require_once QA_PLUGIN_DIR.'q2a-random-avatar/pupi_ra_module_admin.php';
require_once QA_PLUGIN_DIR.'q2a-random-avatar/random-avatar-class.php';

/*
	Omit PHP closing tag to help avoid accidental output
*/
