<?php

class Faq_query extends CI_Model {

	public function Faq_list(){
		require_once('Faq_data.php');
		$this->db->select([
			'a.faq_id as faq_id',
			'a.faq_title as faq_title',
			'a.faq_content as faq_content'
		]);
		$this->db->where('a.status', 1);
		$this->db->order_by('a.post_date','ASC');
		$query = $this->db->get('faq a');
		if($query->num_rows() > 0){
			$faq_list = [];
			array_map(function($item) use(&$faq_list){
				$faq_list[] = (new Faq_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $faq_list;

		}else{
			return false;
		}
	}

	public function Faq_header(){
		require_once('Faq_header_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_image	 as header_image'
		]);
		$this->db->where('a.header_page','faq');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$faq_header = [];
			array_map(function($item) use(&$faq_header){
			$faq_header[] = (new Faq_header_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $faq_header;

		}else{
			return false;
		}
	}

	function contact_number(){
		$this->db->select([
		 'a.contact_content as contact_content'
		]);
		$this->db->where('a.contact_type','phone');
		$query = $this->db->get('contact_us a');
		foreach($query->result() as $row){
				 return $row->contact_content;
		 }
	}



}
