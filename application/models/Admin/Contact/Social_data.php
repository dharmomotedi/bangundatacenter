<?php
class Social_data{
	public $social_id;
	public $social_title;
	public $social_icon;
	public $social_link;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			if(array_key_exists($key, $arr))
				$this->$key = $arr[$key];
		}
	}

	public function to_array() { return (array) $this; }
}
