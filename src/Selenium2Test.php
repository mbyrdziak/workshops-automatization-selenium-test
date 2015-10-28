<?php
class Selenium2Test extends PHPUnit_Extensions_Selenium2TestCase
{
	protected function setUp()
	{
		$this->setBrowser("firefox");
		$this->setBrowserUrl("https://szkolenia.bananascrum.com/");

	}

	public function testMyTestCase()
	{ 
		$this->url("/login");
		$this->byId("login")->value("admin");
		$this->byId("password")->value("password");
		$this->byName("commit")->click();
// 		$this->waitUntil(function() {
// 			return $this->byName("dupa")->displayed();
// 		}, 10);
	}
}