<?php
class Introduction_data{
	public $text_id;
	public $text_title;
	public $text_sub_title;
	public $text_intro;
	public $text_image;
	public $text_link;
	public $status;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'text_image':
					if(array_key_exists('text_image', $arr) AND $arr['text_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/about/'.$arr['text_image'];
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
