<?php
include('src/pages/BananaScrumLoginPage.php');

class BananaScrumTest extends PHPUnit_Extensions_Selenium2TestCase {
	
    /**
     * @beforeClass
     */
    public static function setUpSomeSharedFixtures()
    {
        self::shareSession(true);
    }
	
    /**
     * @before
     */
	public function setUp() {
		$this->setBrowser ( "firefox" );
		$this->setBrowserUrl ( "https://szkolenia.bananascrum.com/" );
	}
	
	/**
	 * @test
	 */
	public function shouldLogIn() {
		// given
		$loginPage = new BananaScrumLoginPage();
		$loginPage->open();
	}

}