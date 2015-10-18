<?php

class SeleniumTest extends PHPUnit_Extensions_SeleniumTestCase
{
    protected function setUp()
    {
        $this->setBrowser("firefox");
        $this->setBrowserUrl("https://szkolenia.bananascrum.com/");
    }

    public function testMyTestCase()
    {
        $this->open("/login");
        $this->type("id=login", "admin");
        $this->type("id=password", "password");
        $this->click("name=commit");
        $this->waitForPageToLoad("30000");
    }
}