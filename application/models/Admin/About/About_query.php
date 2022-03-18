<?php

class About_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function About_detail(){
		require_once('About_detail_data.php');
		$this->db->select([
				'a.about_text as about_text',
				'a.about_team as about_team',
				'a.about_image as about_image'
		]);
		$query = $this->db->get('about a');
		if($query->num_rows() > 0){
					$about_detail = [];
					array_map(function($item) use(&$about_detail){
						$about_detail[] = (new About_detail_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $about_detail;
				}else{
					return false;
				}
	}


	public function About_update($about){
			$result = $this->db->update('about',$about);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Get_image(){
			$this->db->select([
				'a.about_image as about_image'
			]);
			$query = $this->db->get('about a');
			if($query){
				foreach($query->result() as $row){
				 return $row->about_image;
				}
			}else{
				return false;
			}
		}




}
