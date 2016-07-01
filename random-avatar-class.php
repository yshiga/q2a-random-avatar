<?php
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}
require_once QA_INCLUDE_DIR.'qa-db-selects.php';
require_once QA_INCLUDE_DIR.'qa-app-options.php';

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
		return array();
	}

	public function set_random_avatar()
	{
		if ($this->pupi_ra_plugin_enabled) {
			if (!empty($this->imageFiles)) {
				$selectedAvatarIndex = array_rand($imageFiles);
				$selectedAvatarFilePath = $imageFiles[$selectedAvatarIndex];
				$userids = $this->get_no_avatar_users();
				foreach ($this->userids as $userId) {
					qa_set_user_avatar($userId, file_get_contents($selectedAvatarFilePath), null);
				}
			}
		}
	}
}
