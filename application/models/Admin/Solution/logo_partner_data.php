<?php
class logo_partner_data{
	public $logo_id;
	public $logo_name;
	
	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			if(array_key_exists($key, $arr))
				$this->$key = $arr[$key];
		}
	}


	public function to_array() { return (array) $this; }
}
