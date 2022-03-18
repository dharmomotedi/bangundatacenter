<?php

class Insight_query extends CI_Model {


	public function Insight_header(){
		require_once('Insight_banner_data.php');
		$this->db->select([
			'a.header_title as header_title',
			'a.header_subtitle as header_subtitle',
			'a.header_link as header_link',
			'a.header_image as header_image'
		]);
		$this->db->where('a.header_page','insight');
		$this->db->where('a.status', 1);
		$this->db->order_by('a.post_date','DESC');
		$this->db->limit(1);
		$query = $this->db->get('header a');
		if($query->num_rows() > 0){
			$insight_header = [];
			array_map(function($item) use(&$insight_header){
				$insight_header[] = (new Insight_banner_data($item))->to_array();
				//$category_list[0]['curr_category'] = "subcategory";
			}, $query->result_array());

			$query->free_result();
			$this->db->reset_query();
			return $insight_header;

		}else{
			return false;
		}
	}

	function get_id_categorty($slug){
		$this->db->select([
		 'a.category_id as category_id'
		]);
		$this->db->where('a.category_title',$slug);
		$query = $this->db->get('insight_category a');
		foreach($query->result() as $row){
				 return $row->category_id;
		 }
	}

	function Insight_get_view($slug){
		$this->db->select([
		 'a.insight_view as insight_view'
		]);
		$this->db->where('a.insight_slug',$slug);
		$query = $this->db->get('insight_data a');
		foreach($query->result() as $row){
				 return $row->insight_view;
		 }
	}

	public function Insight_view_update($insight,$slug){
		$this->db->where('insight_slug',$slug);
		$result = $this->db->update('insight_data',$insight);
		if($result){
			return true;
		}else{
			return false;
		}
	}

	function insight_total_rows($insight_category = null){
      $this->db->select([
       'count(*) as allcount'
      ]);
      $this->db->where('a.delete_date', NULL);
      $this->db->where('a.status', 1);
      if(isset($insight_category)){
        $this->db->where('a.insight_category', $insight_category);
      }
      $query = $this->db->get('insight_data a');
      foreach($query->result() as $row){
			     return $row->allcount;
		   }
    }

		function insight_list_pageing($slug=null, $start, $limit){
			require_once('Insight_list_data.php');
      $this->db->select([
        'a.insight_id as insight_id',
        'a.insight_title as insight_title',
        'a.insight_slug as insight_slug',
        'a.insight_image as insight_image',
        'a.post_date as post_date',
        'b.category_title as category_title'
       ]);
       if(isset($slug) && $slug != 'all_category'){
          $slug= $this->db->escape($slug);
          $this->db->join('insight_category b','a.insight_category = b.category_id AND b.category_title ='.$slug);
       }else{
          $this->db->join('insight_category b','a.insight_category = b.category_id');
       }
       $this->db->where('a.delete_date', NULL);
       //$this->db->where('a.arsip_status', 0);
       $this->db->where('a.status', 1);
       $this->db->order_by('a.post_date','DESC');
       $this->db->limit($limit, $start);
       $query = $this->db->get('insight_data a');
       if($query){
           $insight_list = [];
           //return $query->result_array();
           array_map(function($item) use(&$insight_list){
   					$insight_list[] = (new Insight_list_data($item))->to_array();
   					//$category_list[0]['curr_category'] = "subcategory";
   				}, $query->result_array());

          $query->free_result();
  				$this->db->reset_query();

          //return $record_list;

          return $insight_list;


       }else{
         return false;
       }
    }

		public function Insight_category(){
			require_once('Insight_category_list_data.php');
			$this->db->select([
				'a.category_id as category_id',
				'a.category_title as category_title'
			]);
			$this->db->where('a.status', 1);
			$this->db->where('a.delete_date', null);
			$this->db->order_by('a.category_title','ASC');
			$query = $this->db->get('insight_category a');
			if($query->num_rows() > 0){
				$insight_category = [];
				array_map(function($item) use(&$insight_category){
					$insight_category[] = (new Insight_category_list_data($item))->to_array();
					//$category_list[0]['curr_category'] = "subcategory";
				}, $query->result_array());

				$query->free_result();
				$this->db->reset_query();
				return $insight_category;

			}else{
				return false;
			}
		}

		public function Insight_detail($slug){
			require_once('Insight_detail_data.php');
			$this->db->select([
				'a.insight_id as insight_id',
				'a.insight_title as insight_title',
				'a.insight_content as insight_content',
				'a.insight_slug as insight_slug',
				'a.insight_image as insight_image',
				'a.post_date as post_date',
				'b.category_title as category_title'
			]);
			$this->db->where('a.insight_slug',$slug);
			$this->db->join('insight_category b','a.insight_category = b.category_id');
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

		public function Insight_list(){
			require_once('Insight_list_data.php');
			$this->db->select([
				'a.insight_id as insight_id',
				'a.insight_title as insight_title',
				'a.insight_slug as insight_slug',
				'a.insight_image as insight_image',
				'a.post_date as post_date',
				'b.category_title as category_title'
			]);
			$this->db->where('a.status', 1);
			$this->db->order_by('a.post_date','DESC');
			$this->db->join('insight_category b','a.insight_category = b.category_id');
			$this->db->limit(3);
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

		public function Insight_other_list($slug){
			require_once('Insight_list_data.php');
			$this->db->select([
				'a.insight_id as insight_id',
				'a.insight_title as insight_title',
				'a.insight_slug as insight_slug',
				'a.insight_image as insight_image',
				'a.post_date as post_date',
				'b.category_title as category_title'
			]);
			$this->db->where('a.status', 1);
			$this->db->where('a.insight_slug !=', $slug);
			$this->db->order_by('a.post_date','DESC');
			$this->db->join('insight_category b','a.insight_category = b.category_id');
			$this->db->limit(3);
			$query = $this->db->get('insight_data a');
			if($query->num_rows() > 0){
				$insight_other_list = [];
				array_map(function($item) use(&$insight_other_list){
					$insight_other_list[] = (new Insight_list_data($item))->to_array();
					//$category_list[0]['curr_category'] = "subcategory";
				}, $query->result_array());

				$query->free_result();
				$this->db->reset_query();
				return $insight_other_list;

			}else{
				return false;
			}
		}



}
