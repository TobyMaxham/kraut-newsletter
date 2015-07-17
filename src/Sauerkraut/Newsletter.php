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

	public function subscribe($email, $info = NULL, $listname = NULL)
	{
		// So we can pass a list as second value without userinfo
		if (func_num_args() == 2 && is_string($info))
			list($info, $listname) = [[], $info];

		if (!is_null($listname)) $list = $this->findOrCreateList($listname);
		else $list = NULL;
		if (is_null($info)) $info = [];
		$info = array_merge($info, ['email' => $email]);

		if (!is_null($subscriber = Subscriber::where('email', $email)->first())) {
			if (!is_null($list) && !$list->subscribers->contains($subscriber->id)) {
				$list->subscribers()->attach($subscriber);
				$list->save();
			}
			return;
		}

		$this->createSubscriber($info, $list);
	}

	public function findOrCreateList($listName, $uid = FALSE)
	{
		$field = $uid ? 'uid' : 'name';
		$list = NewsletterList::where($field, $listName)->first();
		if (is_null($list)) return $this->createList($listName);
		return $list;
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

	/**
	 * @param array $data
	 * @param NewsletterList|NULL $list
	 */
	private function createSubscriber($data, $list)
	{
		$subscriber = new Subscriber();
		foreach ($data as $key => $value) $subscriber->{$key} = $value;
		$subscriber->save();

		if (!is_null($list)) {
			$list->subscribers()->attach($subscriber);
			$list->save();
		}
	}

	/**
	 * @param string $email
	 * @param string|NULL $listName
	 */
	public function unsubscribe($email, $listName = NULL)
	{
		$subscriber = Subscriber::where('email', $email)->first();
		if(is_null($subscriber)) return;

		foreach($subscriber->lists as $list)
		{
			if($list->name == $listName || $listName === NULL) {
				$list->subscribers()->detach($subscriber);
			}
		}

		if(is_null($listName))
		{
			$subscriber->delete();
		}
	}


}