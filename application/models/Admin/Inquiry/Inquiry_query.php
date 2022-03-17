<?php

class Inquiry_query extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function Inquiry_submit($inquiry){
		$result =	$this->db->insert_batch('inquiry',$inquiry);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}

	public function Inquiry_read_update($inquiry,$inquiry_id){
			$this->db->where('inquiry_id',$inquiry_id);
			$result = $this->db->update('inquiry',$inquiry);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Inquiry_delete($inquiry,$inquiry_id){
			$this->db->where('inquiry_id',$inquiry_id);
			$result = $this->db->update('inquiry',$inquiry);
			if($result){
				return true;
			}else{
				return false;
			}
	}



}
