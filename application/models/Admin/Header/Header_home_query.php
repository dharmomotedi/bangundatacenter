<?php

class Header_home_query extends CI_Model {

	private $table = 'header'; //nama tabel dari database
	private $column_order = array(null, 'header_title', '	header_image', 'post_date', 'status'); //field yang ada di table sekolah
	private $column_search = array('header_title', 'header_image', 'post_date', 'status'); //field yang diizin untuk pencarian
	private $order = array('post_date' => 'desc'); // default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function List_header($header_page){
		require_once('Header_home_list_data.php');
		$this->db->select([
				'a.header_id as header_id',
				'a.header_title as header_title',
				'a.header_image as header_image',
				'a.post_date as post_date',
				'a.status as status'
		]);
		$this->db->where('a.header_page',$header_page);
		$this->db->where('a.delete_date',NULL);
		$query = $this->db->get('header a');

		if($query->num_rows() > 0){

					$header_list = [];

					array_map(function($item) use(&$header_list){
						$header_list[] = (new Header_home_list_data($item))->to_array();
						//$category_list[0]['curr_category'] = "subcategory";
					}, $query->result_array());

					$query->free_result();
					$this->db->reset_query();
					return $header_list;

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

	public function Header_submit($header){
		$result =	$this->db->insert_batch('header',$header);
		if($result){
			 return true;
		}else{
			 return false;
		}
	}

	public function Header_update($header , $header_id){
		$this->db->where('header_id',$header_id);
			$result = $this->db->update('header',$header);
			if($result){
				return true;
			}else{
				return false;
			}
	}

	public function Get_image($header_id){
			$this->db->select([
				'a.header_image as header_image'
			]);
			$this->db->where('a.header_id',$header_id);
			$query = $this->db->get('header a');
			if($query){
				foreach($query->result() as $row){
				 return $row->header_image;
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
					'a.header_link as header_link',
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
