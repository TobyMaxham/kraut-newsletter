<?php

namespace TobyMaxham\Newsletter\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsletterList
 * @package TobyMaxham\Newsletter\Model
 * @author Tobias Maxham <git2015@maxham.de>
 */
class NewsletterList extends Model
{
	use SoftDeletes, UID;

	protected $table = 'tmx_lists';

	public function save(array $options = [])
	{
		if (!$this->exists) $this->uid = $this->genNewUID();
		return parent::save($options);
	}

	public function subscribers()
	{
		return $this->belongsToMany('TobyMaxham\Newsletter\Model\Subscriber', 'tmx_newsletter_list_subscriber', 'list', 'subscriber');
	}

} 