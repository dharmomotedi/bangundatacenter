<?php

class Logo_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function List_logo($logo_type){
		require_once('Logo_list_data.php');
		$this->db->select([
				'a.logo_id as logo_id',
				'a.logo_name as logo_name',
				'a.logo_image	as logo_image',
				'a.logo_image_dark	as logo_image_dark',
				'a.logo_type as logo_type',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('a.logo_type',$logo_type);
		$this->db->where('a.delete_date',NULL);
		$query = $this->db->get('logo a');

		if($query->num_rows() > 0){

					$logo_list = [];

					array_map(function($item) use(&$logo_list){
						$logo_list[] = (new Logo_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());

					$query->free_result();
					$this->db->reset_query();
					return $logo_list;

				}else{
					return false;
				}
	}

	public function Logo_status_update($logo , $logo_id){
		$this->db->where('logo_id',$logo_id);
			$result = $this->db->update('logo',$logo);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Logo_delete($logo , $logo_id){
		$this->db->where('logo_id',$logo_id);
			$result = $this->db->update('logo',$logo);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Detail_logo($logo_id){
		require_once('logo_detail_data.php');
		$this->db->select([
				'a.logo_id as logo_id',
				'a.logo_name as logo_name',
				'a.logo_link as logo_link',
				'a.logo_image as logo_image',
				'a.logo_image_dark as logo_image_dark',
				'a.logo_type as logo_type',
				'a.status as status'
		]);
		$this->db->where('a.logo_id',$logo_id);
		$query = $this->db->get('logo a');

		if($query->num_rows() > 0){

					$logo_detail = [];

					array_map(function($item) use(&$logo_detail){
						$logo_detail[] = (new logo_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());

					$query->free_result();
					$this->db->reset_query();
					return $logo_detail;

				}else{
					return false;
				}
	}

	public function Logo_submit($logo){
		$result =	$this->db->insert_batch('logo',$logo);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}

	public function Logo_update($logo , $logo_id){
		$this->db->where('logo_id',$logo_id);
			$result = $this->db->update('logo',$logo);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Get_image($logo_id){
			$this->db->select([
				'a.logo_image as logo_image'
			]);
			$this->db->where('a.logo_id',$logo_id);
			$query = $this->db->get('logo a');
			if($query){
				foreach($query->result() as $row){
				 return $row->logo_image;
				}
			}else{
				return false;
			}
		}

		public function Get_image_dark($logo_id){
				$this->db->select([
					'a.logo_image_dark as logo_image_dark'
				]);
				$this->db->where('a.logo_id',$logo_id);
				$query = $this->db->get('logo a');
				if($query){
					foreach($query->result() as $row){
					 return $row->logo_image_dark;
					}
				}else{
					return false;
				}
			}


		public function List_other(){
			require_once('Header_other_list_data.php');
			$this->db->select([
					'a.header_id as header_id',
					'a.header_title as header_title',
					'a.header_subtitle as header_subtitle',
					'a.header_image as header_image',
					'a.header_page as header_page',
					'a.status as status'
			]);
			$this->db->where('a.header_page !=','home');
			$this->db->where('a.delete_date',NULL);
			$this->db->order_by('a.header_id');
			$query = $this->db->get('header a');

			if($query->num_rows() > 0){

						$other_list = [];

						array_map(function($item) use(&$other_list){
							$other_list[] = (new Header_other_list_data($item))->to_array();
							//$category_list[0]['curr_category'] = "subcategory";
						}, $query->result_array());

						$query->free_result();
						$this->db->reset_query();
						return $other_list;

					}else{
						return false;
					}
		}


}
