<?php
class Solution_image_data{
	public $solution_id;
	public $solution_image;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key){
				case 'solution_image':
					if(array_key_exists('solution_image', $arr) AND $arr['solution_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/solution/'.$arr['solution_image'];
					}
				break;
				default:
					if(array_key_exists($key, $arr))
						$this->$key = $arr[$key];
					break;
			}
		}
	}

	public function to_array() { return (array) $this; }
}
