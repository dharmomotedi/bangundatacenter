<?php
class Custumer_list_data {

	public $logo_image;

	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'logo_image':
					if(array_key_exists('logo_image', $arr) AND $arr['logo_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/logo/'.$arr['logo_image'];
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
