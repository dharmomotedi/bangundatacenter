<?php

class Insight_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Category_list(){
		require_once('Insight_category_list_data.php');
		$this->db->select([
				'a.category_id as category_id',
				'a.category_title as category_title',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('delete_date',null);
		$query = $this->db->get('insight_category a');
		if($query->num_rows() > 0){
					$category_list = [];
					array_map(function($item) use(&$category_list){
						$category_list[] = (new Insight_category_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $category_list;
				}else{
					return false;
				}
	}

	public function Category_detail($category_id){
		require_once('Insight_category_detail_data.php');
		$this->db->select([
				'a.category_id as category_id',
				'a.category_title as category_title',
				'a.status as status'
		]);
		$this->db->where('a.category_id',$category_id);
		$query = $this->db->get('insight_category a');
		if($query->num_rows() > 0){
					$category_detail = [];
					array_map(function($item) use(&$category_detail){
						$category_detail[] = (new Insight_category_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $category_detail;
				}else{
					return false;
				}
	}



	public function Category_status_update($category,$category_id){
			$this->db->where('category_id',$category_id);
			$result = $this->db->update('insight_category',$category);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Category_update($category,$category_id){
		$this->db->where('category_id',$category_id);
		$result = $this->db->update('insight_category',$category);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function Category_delete($category,$category_id){
			$this->db->where('category_id',$category_id);
			$result = $this->db->update('insight_category',$category);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Category_submit($category){
		$result =	$this->db->insert_batch('insight_category',$category);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}


	public function Insight_list(){
		require_once('Insight_list_data.php');
		$this->db->select([
				'a.insight_id as insight_id',
				'a.insight_title as insight_title',
				'a.insight_view as insight_view',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('delete_date',null);
		$query = $this->db->get('insight_data a');
		if($query->num_rows() > 0){
					$insight_list = [];
					array_map(function($item) use(&$insight_list){
						$insight_list[] = (new Insight_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $insight_list;
				}else{
					return false;
				}
	}

	public function Insight_update($insight,$insight_id){
			$this->db->where('insight_id',$insight_id);
			$result = $this->db->update('insight_data',$insight);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Insight_status_update($insight,$insight_id){
			$this->db->where('insight_id',$insight_id);
			$result = $this->db->update('insight_data',$insight);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Insight_delete($insight,$insight_id){
			$this->db->where('insight_id',$insight_id);
			$result = $this->db->update('insight_data',$insight);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Insight_detail($insight_id){
		require_once('Insight_detail_data.php');
		$this->db->select([
				'a.insight_id as insight_id',
				'a.insight_title as insight_title',
				'a.insight_content as insight_content',
				'a.insight_category as insight_category',
				'a.insight_image as insight_image',
				'a.status as status'
		]);
		$this->db->where('a.insight_id',$insight_id);
		$query = $this->db->get('insight_data a');
		if($query->num_rows() > 0){
					$insight_detail = [];
					array_map(function($item) use(&$insight_detail){
						$insight_detail[] = (new Insight_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $insight_detail;
				}else{
					return false;
				}
	}

	public function Get_title($insight_id){
			$this->db->select([
				'a.insight_title as insight_title'
			]);
			$this->db->where('insight_id',$insight_id);
			$query = $this->db->get('insight_data a');
			if($query){
				foreach($query->result() as $row){
				 return $row->insight_title;
				}
			}else{
				return false;
			}
		}

		public function Get_image($insight_id){
				$this->db->select([
					'a.insight_image as insight_image'
				]);
				$this->db->where('insight_id',$insight_id);
				$query = $this->db->get('insight_data a');
				if($query){
					foreach($query->result() as $row){
					 return $row->insight_image;
					}
				}else{
					return false;
				}
			}

		public function Get_slug($insight_id){
				$this->db->select([
					'a.insight_title as insight_title'
				]);
				$this->db->where('insight_id',$insight_id);
				$query = $this->db->get('insight_data a');
				if($query){
					foreach($query->result() as $row){
					 return $row->insight_title;
					}
				}else{
					return false;
				}
			}

			public function Insight_submit($insight){
				$result =	$this->db->insert_batch('insight_data',$insight);
				if($result){
					 return true;
				}else{
					 return false;
				}
			}








}
