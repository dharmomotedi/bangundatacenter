<?php

class Solution_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function solution_list(){
		require_once('Solution_list_data.php');
		$this->db->select([
				'a.solution_id as solution_id',
				'a.solution_title as solution_title',
				'a.solution_list as solution_list',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('a.delete_date',NULL);
		$query = $this->db->get('solution a');

		if($query->num_rows() > 0){
					$solution_list = [];
					array_map(function($item) use(&$solution_list){
						$solution_list[] = (new Solution_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());

					$query->free_result();
					$this->db->reset_query();
					return $solution_list;

				}else{
					return false;
				}
	}

	public function detail_header($header_id){
		require_once('Header_home_detail_data.php');
		$this->db->select([
				'a.header_id as header_id',
				'a.header_title as header_title',
				'a.header_subtitle as header_subtitle',
				'a.header_link as header_link',
				'a.header_image as header_image',
				'a.status as status'
		]);
		$this->db->where('a.header_id',$header_id);
		$query = $this->db->get('header a');

		if($query->num_rows() > 0){

					$header_detail = [];

					array_map(function($item) use(&$header_detail){
						$header_detail[] = (new Header_home_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());

					$query->free_result();
					$this->db->reset_query();
					return $header_detail;

				}else{
					return false;
				}
	}

	public function Solution_submit($solution){
		$result =	$this->db->insert_batch('solution',$solution);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}

	public function Solution_update($solution , $solution_id){
		$this->db->where('solution_id',$solution_id);
			$result = $this->db->update('solution',$solution);
			if($result){
				return true;
			}else{
				return false;
			}
	}



	public function Get_image(){
			require_once('Solution_image_data.php');
			$this->db->select([
				'a.solution_id as solution_id',
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

		public function Solution_image_update($solution , $solution_id){
			$this->db->where('solution_id',$solution_id);
				$result = $this->db->update('solution_image',$solution);
				if($result){
					return true;
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

		public function solution_detail($solution_id){
			require_once('Solution_detail_data.php');
			$this->db->select([
					'a.solution_id as solution_id',
					'a.solution_title as solution_title',
					'a.solution_list as solution_list'
			]);
			$this->db->where('a.solution_id',$solution_id);
			$query = $this->db->get('solution a');

			if($query->num_rows() > 0){
						$solution_detail = [];
						array_map(function($item) use(&$solution_detail){
							$solution_detail[] = (new Solution_detail_data($item))->to_array();
							//$category_list[0]['curr_category'] = "subcategory";
						}, $query->result_array());

						$query->free_result();
						$this->db->reset_query();
						return $solution_detail;

					}else{
						return false;
					}
		}

		public function solution_point($solution_id){
			require_once('solution_point_list_data.php');
			$this->db->select([
					'a.list_id as list_id',
					'a.solution_id as solution_id',
					'a.list_title as list_title',
					'a.list_text as list_text',
					'a.status as status'
			]);
			$this->db->where('a.solution_id',$solution_id);
			$this->db->where('a.delete_date',null);
			$query = $this->db->get('solution_list a');

			if($query->num_rows() > 0){
						$point_list = [];
						array_map(function($item) use(&$point_list){
							$point_list[] = (new solution_point_list_data($item))->to_array();
							//$category_list[0]['curr_category'] = "subcategory";
						}, $query->result_array());

						$query->free_result();
						$this->db->reset_query();
						return $point_list;

					}else{
						return false;
					}
		}

		public function Point_submit($point){
			$result =	$this->db->insert_batch('solution_list',$point);
			if($result){
				 return true;
			}else{
				 return false;
			}
		}

		public function Solution_point_update($point,$list_id){
			$this->db->where('list_id',$list_id);
				$result = $this->db->update('solution_list',$point);
				if($result){
					return true;
				}else{
					return false;
				}
		}

		public function Solution_point_delete($point,$list_id){
			$this->db->where('list_id',$list_id);
				$result = $this->db->update('solution_list',$point);
				if($result){
					return true;
				}else{
					return false;
				}
		}

		public function point_detail($list_id){
			require_once('Point_detail_data.php');
			$this->db->select([
					'a.list_id as list_id',
					'a.solution_id as solution_id',
					'a.list_title as list_title',
					'a.list_text as list_text',
					'a.status as status'
			]);
			$this->db->where('a.list_id',$list_id);
			$query = $this->db->get('solution_list a');

			if($query->num_rows() > 0){
						$point_detail = [];
						array_map(function($item) use(&$point_detail){
							$point_detail[] = (new Point_detail_data($item))->to_array();
							//$category_list[0]['curr_category'] = "subcategory";
						}, $query->result_array());

						$query->free_result();
						$this->db->reset_query();
						return $point_detail;

					}else{
						return false;
					}
		}


		public function Get_logo_partner(){
				require_once('logo_partner_data.php');
				$this->db->select([
					'a.logo_id as logo_id',
					'a.logo_name as logo_name'
				]);
				$query = $this->db->get('logo a');
				if($query->num_rows() > 0){
							$partner_list = [];
							array_map(function($item) use(&$partner_list){
								$partner_list[] = (new logo_partner_data($item))->to_array();
								//$category_list[0]['curr_category'] = "subcategory";
							}, $query->result_array());
							$query->free_result();
							$this->db->reset_query();
							return $partner_list;

						}else{
							return false;
						}
			}

			public function logo_list(){
				require_once('logo_partner_list_data.php');
				$this->db->select([
						'a.logo_id as logo_id',
						'a.logo_partner_id as logo_partner_id',
						'a.logo_title as logo_title',
						'a.post_date as post_date',
						'a.status as status',
						'b.logo_image_dark as logo_image_dark'
				]);
				$this->db->where('a.delete_date',null);
				$this->db->order_by('a.post_date','ASC');
				$this->db->join('logo b','a.logo_partner_id = b.logo_id','LEFT');
				$query = $this->db->get('solution_logo a');

				if($query->num_rows() > 0){
							$logo_list = [];
							array_map(function($item) use(&$logo_list){
								$logo_list[] = (new logo_partner_list_data($item))->to_array();
								//$category_list[0]['curr_category'] = "subcategory";
							}, $query->result_array());

							$query->free_result();
							$this->db->reset_query();
							return $logo_list;

						}else{
							return false;
						}

			}


			public function logo_submit($logo){
				$result =	$this->db->insert_batch('solution_logo',$logo);
				if($result){
					 return true;
				}else{
					 return false;
				}
			}

			public function Solution_logo_update($logo,$logo_id){
				$this->db->where('logo_id',$logo_id);
					$result = $this->db->update('solution_logo',$logo);
					if($result){
						return true;
					}else{
						return false;
					}
			}

			public function logo_detail($logo_id){
				require_once('Logo_detail_data.php');
				$this->db->select([
						'a.logo_id as logo_id',
						'a.logo_partner_id as logo_partner_id',
						'a.logo_title as logo_title',
						'a.status as status'
				]);
				$this->db->where('a.logo_id',$logo_id);
				$query = $this->db->get('solution_logo a');

				if($query->num_rows() > 0){
							$logo_detail = [];
							array_map(function($item) use(&$logo_detail){
								$logo_detail[] = (new Logo_detail_data($item))->to_array();
								//$category_list[0]['curr_category'] = "subcategory";
							}, $query->result_array());

							$query->free_result();
							$this->db->reset_query();
							return $logo_detail;

						}else{
							return false;
						}
			}







}
