<?php

class Contact_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Contact_detail(){
		require_once('Contact_data.php');
		$this->db->select([
				'a.contact_id as contact_id',
				'a.contact_title as contact_title',
				'a.contact_content as contact_content',
				'a.contact_type as contact_type'
		]);
		$query = $this->db->get('contact_us a');
		if($query->num_rows() > 0){
					$contact_detail = [];
					array_map(function($item) use(&$contact_detail){
						$contact_detail[] = (new Contact_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $contact_detail;
				}else{
					return false;
				}
	}

	public function Contact_social(){
		require_once('Social_data.php');
		$this->db->select([
				'a.social_id as social_id',
				'a.social_title as social_title',
				'a.social_icon as social_icon',
				'a.social_link as social_link'
		]);
		$query = $this->db->get('social_media a');
		if($query->num_rows() > 0){
					$social_list = [];
					array_map(function($item) use(&$social_list){
						$social_list[] = (new Social_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());
					$query->free_result();
					$this->db->reset_query();
					return $social_list;
				}else{
					return false;
				}
	}


	public function Contact_update($contact,$contact_id){

			$this->db->where('contact_id',$contact_id);
			$result = $this->db->update('contact_us',$contact);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Social_update($social,$social_id){
			$this->db->where('social_id',$social_id);
			$result = $this->db->update('social_media',$social);
			//$this->db->update_batch('social_media', $social, 'social_id');
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
