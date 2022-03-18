<?php

class About_query extends CI_Model {

	public function About_detail(){
		require_once('About_data.php');
		$this->db->select([
			'a.about_text as about_text',
			'a.about_team as about_team',
			'a.about_image as about_image'
		]);
		$query = $this->db->get('about a');
		if($query->num_rows() > 0){
			$about_detail = [];
			array_map(function($item) use(&$about_detail){
				$about_detail[] = (new About_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $about_detail;

		}else{
			return false;
		}
	}

	public function About_header(){
		require_once('About_header_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_image	 as header_image'
		]);
		$this->db->where('a.header_page','about');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$about_header = [];
			array_map(function($item) use(&$about_header){
			$about_header[] = (new About_header_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $about_header;

		}else{
			return false;
		}
	}

	public function About_custumer(){
		require_once('About_custumer_data.php');
		$this->db->select([
			'a.logo_image as logo_image'
		]);
		$this->db->where('a.status', 1);
		$this->db->where('a.delete_date', NULL);
		$this->db->where('a.logo_type','customer');
		$this->db->order_by('a.post_date','ASC');
		$query = $this->db->get('logo a');
		if($query->num_rows() > 0){
			$about_custumer = [];
			array_map(function($item) use(&$about_custumer){
				$about_custumer[] = (new About_custumer_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());
			$query->free_result();
			$this->db->reset_query();
			return $about_custumer;
		}else{
			return false;
		}
	}



}
