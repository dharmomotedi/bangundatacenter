<?php
class Inquiry_header_data {

	public $header_title;
	public $header_subtitle;
	public $header_image;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'header_image':
					if(array_key_exists('header_image', $arr) AND $arr['header_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/header/'.$arr['header_image'];
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
