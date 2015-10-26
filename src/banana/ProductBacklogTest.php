<?php
require_once 'LoginPage.php';
require_once 'StringUtils.php';

class BananaScrumTest extends PHPUnit_Extensions_Selenium2TestCase
{
	protected function setUp()
	{
		$this->setBrowser("firefox");
		$this->setBrowserUrl("https://szkolenia.bananascrum.com/");
	}

	public function testAddItem() {
		$loginPage = (new LoginPage($this))->open();
		$productBacklogPage = $loginPage->correctLogin();
		
		$userStory = StringUtils::randString();
		$productBacklogPage->addItem($userStory);
		
		$this->assertTrue($productBacklogPage->hasUserStory($userStory));
	}
}