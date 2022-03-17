<?php

class Footer_query extends CI_Model {


	public function Address_content(){
		require_once('Contact_data.php');
		$this->db->select([
			'a.contact_content as contact_content'
		]);
		$this->db->where('a.contact_type','address');
		$this->db->order_by('a.post_date','ASC');
		$this->db->limit(1);
		$query = $this->db->get('contact_us a');
		if($query->num_rows() > 0){
			$contact_data = [];
			array_map(function($item) use(&$contact_data){
				$contact_data[] = (new Contact_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $contact_data;
		}else{
			return false;
		}
	}

	public function Social_content(){
		require_once('Social_data.php');
		$this->db->select([
			'a.social_icon as social_icon',
			'a.social_link as social_link'
		]);
		$this->db->where('a.status',1);
		$this->db->order_by('a.social_title','ASC');
		$query = $this->db->get('social_media a');
		if($query->num_rows() > 0){
			$social_data = [];
			array_map(function($item) use(&$social_data){
				$social_data[] = (new Social_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $social_data;
		}else{
			return false;
		}
	}

	public function Footer_data(){
		require_once('Footer_data.php');
		$this->db->select([
			'a.header_image as header_image'
		]);
		$this->db->where('a.header_page','footer');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$footer_data = [];
			array_map(function($item) use(&$footer_data){
				$footer_data[] = (new Footer_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $footer_data;
		}else{
			return false;
		}
	}

	public function Section_data(){
		require_once('Section_data.php');
		$this->db->select([
			'a.header_subtitle as header_subtitle',
			'a.header_link as header_link',
			'a.header_image as header_image'
		]);
		$this->db->where('a.header_page','section');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$section_data = [];
			array_map(function($item) use(&$section_data){
				$section_data[] = (new Section_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $section_data;
		}else{
			return false;
		}
	}



}
