<?php

namespace TobyMaxham\Newsletter\Sauerkraut;

use TobyMaxham\Newsletter\Model\NewsletterList;
use TobyMaxham\Newsletter\Model\Subscriber;

/**
 * Class Newsletter
 * @package TobyMaxham\Newsletter\Sauerkraut
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Newsletter
{

	public function subscribe($email, $list = NULL)
	{
		if (!is_null($list)) $list = $this->findOrCreateList($list);
		$subscriber = new Subscriber();
		$subscriber->email = $email;
		$subscriber->save();
	}

	/**
	 * @param string $listName
	 * @return NewsletterList $list
	 */
	public function createList($listName)
	{
		$list = new NewsletterList();
		$list->name = $listName;
		$list->save();
		return $list;
	}

	public function findOrCreateList($listName, $uid = FALSE)
	{
		$field = $uid ? 'uid' : 'name';
		$list = NewsletterList::where($field, $listName)->first();
		if (is_null($list)) return $this->createList($listName);
		return $list;
	}


}