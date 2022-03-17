<?php
class Insight_detail_data{
	public $insight_id;
	public $insight_title;
	public $insight_content;
	public $insight_category;
	public $insight_image;
	public $status;


	public function __construct($arr) {
		foreach(get_object_vars($this) as $key => $val) {
			switch($key) {
				case 'insight_image':
					if(array_key_exists('insight_image', $arr) AND $arr['insight_image'] !== NULL) {
						$CI =& get_instance();
						$this->$key = $CI->config->item('website_source').'img/insight/'.$arr['insight_image'];
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
