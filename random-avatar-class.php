<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}
require_once QA_INCLUDE_DIR.'qa-db-selects.php';
require_once QA_INCLUDE_DIR.'qa-app-options.php';
require_once QA_INCLUDE_DIR.'app/users.php';
require_once QA_INCLUDE_DIR.'app/users-edit.php';
require_once QA_INCLUDE_DIR.'db/users.php';

class random_avatar
{
	private $globPath;
	private $imageFiles;
	private $pupi_ra_plugin_enabled;
	private $userids;

	public function __construct()
	{
		$this->globPath = dirname(__FILE__) . '/avatars/*';
		$this->imageFiles = glob($this->globPath);
		$this->pupi_ra_plugin_enabled = qa_opt(PUPI_RA_Module_Admin::SETTING_PLUGIN_ENABLED);
		$this->userids = $this->get_no_avatar_users();
	}

	public function get_no_avatar_users()
	{
		$userids = array();
		$sql = "
SELECT userid
 FROM ^users
 WHERE avatarblobid IS NULL
";
		$query = qa_db_query_sub($sql);
		$userids = qa_db_read_all_values($query);
		return $userids;
	}

	public function set_random_avatar()
	{
		if ($this->pupi_ra_plugin_enabled) {
			if (!empty($this->imageFiles)) {
				$userids = $this->get_no_avatar_users();
				// error_log('count:'.count($this->userids));
				foreach ($this->userids as $userId) {
					$selectedAvatarIndex = array_rand($this->imageFiles);
					$selectedAvatarFilePath = $this->imageFiles[$selectedAvatarIndex];
					qa_set_user_avatar($userId, file_get_contents($selectedAvatarFilePath), null);
				}
			}
		}
	}
}
