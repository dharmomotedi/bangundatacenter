<?php
class Header_home_list_data{
	public $header_id;
	public $header_title;
	public $header_image;
	public $post_date;
	public $status;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'header_image':
					if(array_key_exists('header_image', $arr) AND $arr['header_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/header/'.$arr['header_image'];
					}
				break;
				case 'post_date':
						if(array_key_exists($key, $arr)) {
								date_default_timezone_set('Asia/Jakarta');
							$date = (new DateTime())->createFromFormat('Y-m-d H:i:s', $arr[$key])->format('d F Y');
							$this->$key = $date;
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
