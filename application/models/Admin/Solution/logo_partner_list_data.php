<?php
class logo_partner_list_data{
	public $logo_id;
	public $logo_partner_id;
	public $logo_title;
	public $post_date;
	public $status;
	public $logo_image_dark;

	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'logo_image_dark':
					if(array_key_exists('logo_image_dark', $arr) AND $arr['logo_image_dark'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/logo/'.$arr['logo_image_dark'];
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
