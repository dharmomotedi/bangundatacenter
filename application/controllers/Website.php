<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	private function render() {
	 $this->load->model('Website/Footer/footer_query','footer_query', true);
	 $this->data['data']['contact_data'] = $this->footer_query->Address_content();
	 $this->data['data']['social_data'] = $this->footer_query->Social_content();
	 $this->data['data']['footer_data'] = $this->footer_query->Footer_data();
	 $this->data['data']['section_data'] = $this->footer_query->Section_data();
 	 //$this->master["header_menu"] = $this->load->view("website/header_menu.php",$this->header_data, TRUE);
	 $this->master["header_menu"] = $this->load->view("website/header_menu.php",[], TRUE);
 	 $this->master["main_js"] = $this->load->view("website/main_js.php", [], TRUE);
 	 $this->master["main_css"] = $this->load->view('website/main_css.php', [], TRUE);
 	 $this->master["footer"] = $this->load->view("website/footer.php",$this->data, TRUE);
 	 $this->load->view("website/master", $this->master);
  }

	public function index()
	{
		$this->load->model('Website/Home/Home_query','Home_query', true);
		$this->load->model('Website/Faq/Faq_query','Faq_query', true);
		$this->load->model('Website/Insight/Insight_query','Insight_query', true);


		$this->master["custume_css"] = "";
		$this->master["custume_js"] = "";
		$this->data['data']['home_banner'] = $this->Home_query->Home_banner();
		$this->data['data']['home_partner'] = $this->Home_query->Home_partner();
		$this->data['data']['home_intro'] = $this->Home_query->Home_intro();
		$this->data['data']['home_faq_intro'] = $this->Home_query->home_faq_intro();
		$this->data['data']['faq_list'] = $this->Faq_query->faq_list();
		$this->data['data']['insight_list'] = $this->Insight_query->Insight_list();
		$this->data['data']['customer_list'] = $this->Home_query->Custumer_list();
		//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
		$this->master["content"] = $this->load->view("website/home/content.php",$this->data, TRUE);
		$this->render();
	}

	public function About()
	{
			$this->load->model('Website/About/About_query','About_query', true);
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			$this->data['data']['about_header'] = $this->About_query->About_header();
			$this->data['data']['about_detail'] = $this->About_query->About_detail();
			$this->data['data']['about_custumer'] = $this->About_query->about_custumer();
			$this->master["content"] = $this->load->view("website/about/content.php",$this->data, TRUE);
			$this->render();

	}

	public function Faq()
	{
			$this->load->model('Website/Faq/Faq_query','Faq_query', true);
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			$this->data['data']['faq_header'] = $this->Faq_query->Faq_header();
			$this->data['data']['faq_list'] = $this->Faq_query->faq_list();
			$this->data['data']['contact_number'] = $this->Faq_query->contact_number();
			$this->master["content"] = $this->load->view("website/faq/content.php",$this->data, TRUE);
			$this->render();
	}

	public function Solution()
	{
			$this->load->model('Website/Solution/Solution_query','Solution_query', true);
			$Solution_list = $this->Solution_query->Solution_list();
			foreach ($Solution_list as $key => $value) {
				$solution_id = $value['solution_id'];
				$solution_title = $value['solution_title'];
				$solution_list = $value['solution_list'];
				if($solution_list != 0){
					$list = $this->Solution_query->list($solution_id);
				}else{
					$list = 0;
				}

				$data[] = [
						'solution_id' => $solution_id,
						'solution_title' => $solution_title,
						'solution_list' => $solution_list,
						'list' => $list
				];

			}
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			$this->data['data']['solution_data'] = $data;
			$this->data['data']['solution_header'] = $this->Solution_query->Solution_header();
			$this->data['data']['solution_image'] = $this->Solution_query->Solution_image();
			$this->data['data']['solution_partner'] = $this->Solution_query->solution_partner();
			$this->master["content"] = $this->load->view("website/solution/content.php",$this->data, TRUE);
			$this->render();
	}

	public function Insight($slug = null)
	{
			$this->load->model('Website/Insight/Insight_query','Insight_query', true);

			if($slug == null){
				$slug = 'all_category';
			}

				$slug = str_replace("%20"," ",$slug);
				$this->data['data']['slug'] = $slug;

			if($slug != 'all_category'){
				$per_page = 6;
				$get_id_categorty = $this->Insight_query->get_id_categorty($slug);
				$insight_total_rows = $this->Insight_query->insight_total_rows($get_id_categorty);
		}else{
				$get_id_categorty = null;
				$per_page = 6;
				$insight_total_rows = $this->Insight_query->insight_total_rows($get_id_categorty);
		}

		//konfigurasi pagination
		$config['base_url'] = site_url('Website/Insight/'.$slug); //site url
		//$config['total_rows'] = $this->db->count_all('records'); //total row
		$config['total_rows'] = $insight_total_rows;
		$config['per_page'] = $per_page;  //show record per halaman
		$config["uri_segment"] = 4;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		//$config["num_links"] = floor($choice);
		$config["num_links"] = 4;

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$this->data['data']['Insight_list'] = $this->Insight_query->insight_list_pageing($slug,$this->data['page'],$config["per_page"]);
		$this->data['pagination'] = $this->pagination->create_links();

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.

			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			$this->data['data']['insight_header'] = $this->Insight_query->Insight_header();
			$this->data['data']['insight_category'] = $this->Insight_query->Insight_category();
			//$this->data['data']['insight_list'] = $this->Insight_query->Insight_list();
			$this->master["content"] = $this->load->view("website/insight/content.php",$this->data, TRUE);
			$this->render();
	}

	public function Insight_detail($slug)
	{
			$this->load->model('Website/Insight/Insight_query','Insight_query', true);
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			$this->data['data']['insight_header'] = $this->Insight_query->Insight_header();
			$this->data['data']['insight_detail'] = $this->Insight_query->insight_detail($slug);
			$this->data['data']['insight_other_list'] = $this->Insight_query->Insight_other_list($slug);
			$insight_view = $this->Insight_query->Insight_get_view($slug);

			$view_add = $insight_view + 1;

			$insight = [
					'insight_view' => $view_add
			];

			$update_view = $this->Insight_query->Insight_view_update($insight,$slug);

			$this->master["content"] = $this->load->view("website/insight_detail/content.php",$this->data, TRUE);
			$this->render();
	}

	public function Inquiry()
	{
			$this->load->model('Website/Inquiry/Inquiry_query','Inquiry_query', true);
			$this->master["custume_css"] = $this->load->view("website/inquiry/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("website/inquiry/custume_js.php",[], TRUE);
			$this->data['data']['inquiry_header'] = $this->Inquiry_query->Inquiry_header();
			$this->master["content"] = $this->load->view("website/inquiry/content.php",$this->data, TRUE);
			$this->render();

	}

}
