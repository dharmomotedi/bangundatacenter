<?php

class Inquiry_query extends CI_Model {

	public function Inquiry_header(){
		require_once('Inquiry_header_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_image	 as header_image'
		]);
		$this->db->where('a.header_page','inquery');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$about_header = [];
			array_map(function($item) use(&$about_header){
			$about_header[] = (new Inquiry_header_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $about_header;

		}else{
			return false;
		}
	}




}
