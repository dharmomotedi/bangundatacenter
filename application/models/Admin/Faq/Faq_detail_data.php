<?php
class Faq_detail_data{
	public $faq_id;
	public $faq_title;
	public $faq_content;
	public $status;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			if(array_key_exists($key, $arr))
				$this->$key = $arr[$key];
		}
	}


	public function to_array() { return (array) $this; }
}
