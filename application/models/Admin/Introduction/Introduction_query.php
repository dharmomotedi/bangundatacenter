<?php

class Introduction_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Introduction_list(){
		require_once('Introduction_data.php');
		$this->db->select([
				'a.text_id as text_id',
				'a.text_title as text_title',
				'a.text_sub_title as text_sub_title',
				'a.text_intro as text_intro',
				'a.text_image as text_image',
				'a.text_link as text_link',
				'a.status as status'
		]);
		$query = $this->db->get('introduction_text a');
		if($query->num_rows() > 0){
					$introduction_list = [];
					array_map(function($item) use(&$introduction_list){
						$introduction_list[] = (new Introduction_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $introduction_list;
				}else{
					return false;
				}
	}


	public function Introduction_update($introduction,$text_id){
			$this->db->where('text_id',$text_id);
			$result = $this->db->update('introduction_text',$introduction);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Get_image(){
			$this->db->select([
				'a.text_image as text_image'
			]);
			$query = $this->db->get('introduction_text a');
			if($query){
				foreach($query->result() as $row){
				 return $row->text_image;
				}
			}else{
				return false;
			}
		}




}
