<?php

class Login extends CI_Model {


	public function login_admin($username) {
		$this->db->select([
			'admin_id ',
			'admin_username',
			'admin_password',
			'admin_role'
		]);
		$this->db->where('admin_username',$username);
    $this->db->where('status', 1);
		$query = $this->db->get('admin');
    if($query){
			return $query->result_array();
		}else{
			return false;
		}

	}
}
