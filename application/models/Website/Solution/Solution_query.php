<?php

class Solution_query extends CI_Model {

	public function Solution_list(){
		require_once('Solution_data.php');
		$this->db->select([
			'a.solution_id as solution_id',
			'a.solution_title as solution_title',
			'a.solution_list as solution_list'
		]);
		$this->db->where('a.status', 1);
		$this->db->order_by('a.post_date','ASC');
		$query = $this->db->get('solution a');
		if($query->num_rows() > 0){
			$solution_list = [];
			array_map(function($item) use(&$solution_list){
				$solution_list[] = (new Solution_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();

			return $solution_list;
		}else{
			return false;
		}
	}

	public function list($solution_id){
		require_once('List_data.php');
		$this->db->select([
			'a.list_id as list_id',
			'a.solution_id as solution_id',
			'a.list_title as list_title',
			'a.list_text as list_text',
		]);
		$this->db->where('a.status', 1);
		$this->db->where('a.solution_id', $solution_id);
		$this->db->order_by('a.post_date','DESC');
		$query = $this->db->get('solution_list a');
		if($query->num_rows() > 0){
			$list = [];
			array_map(function($item) use(&$list){
				$list[] = (new List_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();

			return $list;
		}else{
			return false;
		}
	}

	public function Solution_header(){
		require_once('Solution_header_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_image	 as header_image'
		]);
		$this->db->where('a.header_page','solution');
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$solution_header = [];
			array_map(function($item) use(&$solution_header){
			$solution_header[] = (new Solution_header_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $solution_header;

		}else{
			return false;
		}
	}


	public function Solution_image(){
		require_once('Solution_image_data.php');
		$this->db->select([
			'a.solution_image as solution_image'
		]);
		$query = $this->db->get('solution_image a');
		if($query->num_rows() > 0){
			$solution_image = [];
			array_map(function($item) use(&$solution_image){
			$solution_image[] = (new Solution_image_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $solution_image;

		}else{
			return false;
		}
	}

	public function Solution_partner(){
		require_once('Solution_partner_data.php');
		$this->db->select([
			'a.logo_title as logo_title',
			'b.logo_image_dark as logo_image_dark'
		]);
		$this->db->where('a.status', 1);
		$this->db->where('a.delete_date', NULL);
		$this->db->where('b.logo_type','partner');
		$this->db->order_by('a.post_date','ASC');
		$this->db->join('logo b','a.logo_partner_id = b.logo_id','LEFT');
		$query = $this->db->get('solution_logo a');
		if($query->num_rows() > 0){
			$solution_partner = [];
			array_map(function($item) use(&$solution_partner){
				$solution_partner[] = (new Solution_partner_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $solution_partner;
		}else{
			return false;
		}
	}



}
