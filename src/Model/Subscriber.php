<?php

namespace TobyMaxham\Newsletter\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Subscriber
 * @package TobyMaxham\Newsletter\Model
 * @author Tobias Maxham <git2015@maxham.de>
 */
class Subscriber extends Model
{
	use SoftDeletes, UID;

	protected $table = 'tmx_subscribers';

	public function save(array $options = [])
	{
		if (!$this->exists) $this->uid = $this->genNewUID();
		return parent::save($options);
	}

	public function lists()
	{
		return $this->belongsToMany('TobyMaxham\Newsletter\Model\NewsletterList', 'tmx_newsletter_list_subscriber', 'subscriber', 'list');
	}

} 