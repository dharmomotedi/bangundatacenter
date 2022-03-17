<?php
class Logo_detail_data{
	public $logo_id;
	public $logo_name;
	public $logo_image;
	public $logo_image_dark;
	public $logo_link;
	public $logo_type;
	public $status;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'logo_image':
					if(array_key_exists('logo_image', $arr) AND $arr['logo_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/logo/'.$arr['logo_image'];
					}
				break;
				case 'logo_image_dark':
					if(array_key_exists('logo_image_dark', $arr) AND $arr['logo_image_dark'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/logo/'.$arr['logo_image_dark'];
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
