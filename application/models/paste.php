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

	public static function get_files($shortcode)
	{
	    $path = path('storage') . 'files/' . $shortcode;
	    
	    if(!is_dir($path)) {
	    	return false;
	    }

        $folder = scandir($path);

        foreach((array) $folder as $name) {
            if(is_dir($name)) {
                continue;
            }

            $file       = new stdClass;
            $file->name = $name;
            $file->size = get_file_size(filesize($path . '/' . $name));
            $file->url  = URL::base() . '/files/' . $shortcode . '/' . $name;

            $files[] = $file;
        }

	    return $files;
	}

}