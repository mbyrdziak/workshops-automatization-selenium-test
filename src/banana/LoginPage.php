<?php
require_once 'ProductBacklogPage.php';
require_once 'Page.php';

class LoginPage extends Page {
	const CORRECT_USERNAME = 'admin';
	const CORRECT_PASSSWORD = 'password';
	
	public function open() {
		$this->driver->url('/');
		return $this;
	}
	
	public function correctLogin() {
		$this->driver->byId("login")->value(self::CORRECT_USERNAME);
		$this->driver->byId("password")->value(self::CORRECT_PASSSWORD);
		$this->driver->byName("commit")->click();
		return new ProductBacklogPage($this->driver);
	}
}