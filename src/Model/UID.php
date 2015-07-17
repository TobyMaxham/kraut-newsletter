<?php

namespace TobyMaxham\Newsletter\Model;

/**
 * Trait UID
 * @package TobyMaxham\Newsletter\Model
 * @author Tobias Maxham <git2015@maxham.de>
 */
trait UID
{
	protected function genNewUID()
	{
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
	}
} 