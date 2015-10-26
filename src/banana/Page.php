<?php
abstract class Page {
	/**
	 * @var PHPUnit_Extensions_Selenium2TestCase
	 */
	protected $driver;
	
	public function __construct($driver) {
		$this->driver = $driver;
	}
	
	/**
	 * @param string $xpath
	 * @param number $timeout
	 * @return PHPUnit_Extensions_Selenium2TestCase_Element
	 */
	protected function waitForElementByXPath($xpath, $timeout = 8000) {
		return $this->driver->waitUntil(function($driver) use($xpath) {
			try {
				$element = $driver->byXPath($xpath);
                if ($element->displayed()) {
                	return $element;
                }
			} catch (PHPUnit_Extensions_Selenium2TestCase_WebDriverException $e) {
				return NULL;
			}
		}, $timeout);
	}
}