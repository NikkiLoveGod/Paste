<?php

class Paste extends Eloquent 
{
	public static $timestamps = true;

	public function parent()
	{
		return $this->belongs_to('Paste');
	}

	public function children()
	{
		return $this->has_many('Paste', 'parent_id');
	}

	public static function generateShortcode()
	{
		$bytes = openssl_random_pseudo_bytes(3);
		$hex = bin2hex($bytes);

		return $hex;
	}

}