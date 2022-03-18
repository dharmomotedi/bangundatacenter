<?php

class Faq_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Faq_list(){
		require_once('Faq_list_data.php');
		$this->db->select([
				'a.faq_id as faq_id',
				'a.faq_title as faq_title',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('delete_date',null);
		$query = $this->db->get('faq a');
		if($query->num_rows() > 0){
					$faq_list = [];
					array_map(function($item) use(&$faq_list){
						$faq_list[] = (new Faq_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $faq_list;
				}else{
					return false;
				}
	}

	public function Faq_detail($faq_id){
		require_once('Faq_detail_data.php');
		$this->db->select([
				'a.faq_id as faq_id',
				'a.faq_title as faq_title',
				'a.faq_content as faq_content',
				'a.status as status'
		]);
		$this->db->where('a.faq_id',$faq_id);
		$query = $this->db->get('faq a');
		if($query->num_rows() > 0){
					$faq_detail = [];
					array_map(function($item) use(&$faq_detail){
						$faq_detail[] = (new Faq_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $faq_detail;
				}else{
					return false;
				}
	}



	public function Faq_status_update($faq,$faq_id){
			$this->db->where('faq_id',$faq_id);
			$result = $this->db->update('faq',$faq);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Faq_update($faq,$faq_id){
		$this->db->where('faq_id',$faq_id);
		$result = $this->db->update('faq',$faq);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	public function Faq_delete($faq,$faq_id){
			$this->db->where('faq_id',$faq_id);
			$result = $this->db->update('faq',$faq);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Faq_submit($faq){
		$result =	$this->db->insert_batch('faq',$faq);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}






}
