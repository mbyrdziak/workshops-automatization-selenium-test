<?php
require_once 'Page.php';

class ProductBacklogPage extends Page {
	const ADD_ITEM_BUTTON_XPATH = "//a[contains(@class, 'new-backlog-item')]";	
	const ADD_ITEM_USER_STORY_XPATH = "//input[@id='item_user_story']";
	const ADD_ITEM_CREATE_XPATH = "//input[@name='commit']";
	const ITEMS_XPATH = "//li[contains(@class, 'backlog-item')]";
	
	public function addItem($userStory) {
		$this->driver->byXPath(self::ADD_ITEM_BUTTON_XPATH)->click();
		
		$userStoryElement = $this->waitForElementByXPath(self::ADD_ITEM_USER_STORY_XPATH);
		$userStoryElement->value($userStory);
		
		$this->driver->byXPath(self::ADD_ITEM_CREATE_XPATH)->click();
		$this->waitForElementByXPath(sprintf("//li[contains(@class, 'backlog-item')]//div[contains(@class,'item-user-story')][text()='%s']", $userStory));
		return $this;
	}
	
	public function hasUserStory($userStory) {
		$items = $this->driver->elements($this->driver->using("xpath")->value(self::ITEMS_XPATH));
		foreach ($items as $item) {
			if ($item->byXPath(".//div[contains(@class,'item-user-story')]")->text() == $userStory) {
				return TRUE;
			}
		}
		return FALSE;
	}
}