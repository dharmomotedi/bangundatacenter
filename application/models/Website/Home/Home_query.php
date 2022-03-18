<?php

class Home_query extends CI_Model {


	public function Home_banner(){
		require_once('Home_banner_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_link as header_link',
			'a.header_image as header_image'
		]);
		$this->db->where('a.header_page','home');
		$this->db->where('a.status', 1);
		$this->db->order_by('a.post_date','DESC');
		$this->db->limit(1);
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$home_banner = [];
			array_map(function($item) use(&$home_banner){
				$home_banner[] = (new Home_banner_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $home_banner;

		}else{
			return false;
		}
	}


	public function Home_partner(){
		require_once('Home_partner_data.php');
		$this->db->select([
			'a.logo_image as logo_image',
			'a.logo_link as logo_link'
		]);
		$this->db->where('a.logo_type','partner');
		$this->db->where('a.status', 1);
		$this->db->where('a.delete_date', null);
		$this->db->order_by('a.post_date','ASC');
		$this->db->limit(10);
		$query = $this->db->get('logo a');
		if($query->num_rows() > 0){
			$home_partner = [];
			array_map(function($item) use(&$home_partner){
				$home_partner[] = (new Home_partner_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $home_partner;

		}else{
			return false;
		}
	}

	public function Home_intro(){
		require_once('Home_intro_data.php');
		$this->db->select([
			'a.text_title as text_title',
			'a.text_sub_title as text_sub_title',
			'a.text_intro as text_intro',
			'a.text_image as text_image',
			'a.text_link as text_link'
		]);
		$this->db->where('a.status', 1);
		$this->db->order_by('a.post_date','ASC');
		$this->db->limit(3);
		$query = $this->db->get('introduction_text a');
		if($query->num_rows() > 0){
			$home_intro = [];
			array_map(function($item) use(&$home_intro){
				$home_intro[] = (new Home_intro_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $home_intro;

		}else{
			return false;
		}
	}

	public function Home_faq_intro(){
		require_once('Home_intro_data.php');
		$this->db->select([
			'a.text_title as text_title',
			'a.text_sub_title as text_sub_title',
			'a.text_intro as text_intro',
			'a.text_image as text_image',
			'a.text_link as text_link'
		]);
		$this->db->where('a.text_id', 4);
		$query = $this->db->get('introduction_text a');
		if($query->num_rows() > 0){
			$home_intro = [];
			array_map(function($item) use(&$home_intro){
				$home_intro[] = (new Home_intro_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $home_intro;

		}else{
			return false;
		}
	}

	public function Custumer_list(){
		require_once('Custumer_list_data.php');
		$this->db->select([
			'a.logo_image as logo_image'
		]);
		$this->db->where('a.status', 1);
		$this->db->where('a.delete_date', NULL);
		$this->db->where('a.logo_type','customer');
		$this->db->order_by('a.post_date','ASC');
		$this->db->limit(11);
		$query = $this->db->get('logo a');
		if($query->num_rows() > 0){
			$customer_list = [];
			array_map(function($item) use(&$customer_list){
				$customer_list[] = (new Custumer_list_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());
			$query->free_result();
			$this->db->reset_query();
			return $customer_list;
		}else{
			return false;
		}
	}


}
