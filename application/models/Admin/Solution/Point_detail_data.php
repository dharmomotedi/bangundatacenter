<?php
class Point_detail_data{
	public $list_id;
	public $solution_id;
	public $list_title;
	public $list_text;
	public $status;

	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			if(array_key_exists($key, $arr))
				$this->$key = $arr[$key];
		}
	}


	public function to_array() { return (array) $this; }
}
