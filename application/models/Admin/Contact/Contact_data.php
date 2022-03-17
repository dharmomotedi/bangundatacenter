<?php
class Contact_data{
	public $contact_id;
	public $contact_title;
	public $contact_content;
	public $contact_type;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			if(array_key_exists($key, $arr))
				$this->$key = $arr[$key];
		}
	}

	public function to_array() { return (array) $this; }
}
