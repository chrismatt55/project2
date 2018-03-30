<?php


class Session {
	
	private $admin_id;
	public $userName;

	public function __construct() {
		session_start();
		$this->check_stored_login();
	}

	public function login($admin) {
		if($admin) {
		// prevent session fixation attack
		session_regenerate_id();
		$this->admin_id = $_SESSION['admin_id'] = $admin->userid;
		$this->userName = $_SESSION['userName'] = $admin->userName;
		}
		return true;
	}

	public function is_logged_in() {
		return isset($this->admin_id);
	}

	public function logout() {
		unset($_SESSION['admin_id']);
		unset($this->admin_id);
		return true;
	}

	private function check_stored_login() {
		if(isset($_SESSION['admin_id'])) {
			$this->admin_id = $_SESSION['admin_id'];
		}
	}
}
?> 