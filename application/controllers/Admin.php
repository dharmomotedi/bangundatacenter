<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	 function __construct(){
 		 parent::__construct();
 		 $this->load->helper(array('url','html','form','slug'));
 		 $this->load->library('cart');
 		 $this->load->library('pagination');
 		 $this->load->library('session');
 		 $this->load->library('upload');
 		 $this->load->library('form_validation');
 		 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  }

	public function tes_dir(){
			echo $upload_config['upload_path'] = 'assets/' . $this->config->item('header');
	}

	private function render() {
 	 //$this->master["header_menu"] = $this->load->view("website/header_menu.php",$this->header_data, TRUE);
	 if(isset($_SESSION['admin_id'])){
	 		$this->master["header_menu"] = $this->load->view("admin/header_menu.php",[], TRUE);
	 		$this->master["side_menu"] = $this->load->view("admin/side_menu.php",[], TRUE);
 		}

 	 $this->master["main_js"] = $this->load->view("admin/main_js.php", [], TRUE);
 	 $this->master["main_css"] = $this->load->view('admin/main_css.php', [], TRUE);
 	 $this->master["footer"] = $this->load->view("admin/footer.php",[], TRUE);
 	 $this->load->view("admin/master", $this->master);
  }

	public function hash_password($password) {
	  echo password_hash($password, PASSWORD_DEFAULT);
	}


	public function login(){
		$this->master["content"] = $this->load->view("admin/login/content.php",[], TRUE);
		$this->render();
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect("Admin");
	}

	public function Submit_login()
	{
		$this->load->model('Admin/Login','Login', true);

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');

		if($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = $this->input->post("password");

			$data['admin'] = $this->Login->login_admin($username);

			if($data['admin']){
					if(password_verify($password,$data['admin'][0]['admin_password'])) {
						$newdata = array(
							'admin_id' => $data['admin'][0]['admin_id'],
							'admin_username' => $data['admin'][0]['admin_name'],
							'admin_rule' => $data['admin'][0]['admin_role']
						);
						$this->session->set_userdata($newdata);
						$this->session->set_flashdata('success', "Berhasil login");
						//echo "masuk";
						$_SESSION['admin_id'];
						redirect("Admin");
					}else{
						$this->session->set_flashdata('error', "username / password salah");
						redirect("Admin/login");
					}
					//$this->index();
						}else{
							$this->session->set_flashdata('error', "terjadi kesalahan database");
							redirect("Admin/login");
							//echo "terjadi kesalahan database";
						}
				}else{
						$this->session->set_flashdata('error', "username / password kosong");
						redirect("Admin/login");
							//echo "username / password kosong";
			}
	}

	public function index()
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = "";
			//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/home/content.php",[], TRUE);
			$this->render();
		}
	}

	public function Header_home($header_id = null)
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$header_page ="home";
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);
			$this->data['data']['header_list'] = $this->Header_home_query->List_header($header_page);

			if(isset($header_id)){
					$this->data['data']['header_detail'] = $this->Header_home_query->detail_header($header_id);
			}

			$this->master["custume_css"] = $this->load->view("admin/header/home/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/header/home/custume_js.php",[], TRUE);
			//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/header/home/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Submit_home_header(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);
			$this->form_validation->set_rules('header_title', 'header_title', 'trim|required');
			$this->form_validation->set_rules('header_subtitle', 'header_subtitle', 'trim');
			$this->form_validation->set_rules('header_link', 'header_link', 'trim|valid_url');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $header_title = $this->input->post('header_title');
				 $header_subtitle = $this->input->post('header_subtitle');
				 $header_link = $this->input->post('header_link');
				 $draf = $this->input->post('draf');
				 $header_page = "home";

				 $date = date_create();
				 $post_date = date("Y-m-d H:i:s");
				 $post_by = $_SESSION['admin_id'];
				 $image_name = "header-home";

				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}

				 if($_FILES['header_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('header');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 1080;
		 					$upload_config['max_width'] = 1920;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('header_image')){
		 						$header_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$header_image = "header-defalut.svg";
							$save_status = true;
	 				}


				 $header[] =[
					 	"header_id" => null,
						"header_title" => $header_title,
						"header_subtitle" => $header_subtitle,
						"header_link" => $header_link,
						"header_image" => $header_image,
						"header_page" => $header_page,
						"post_date" => $post_date,
						"post_by" => $post_by,
						"update_date" => null,
						"update_by" => null,
						"delete_date" => null,
						"delete_by" => null,
						"status" => $status
				 ];

				 $submit_header = $this->Header_home_query->Header_submit($header);
				 if($submit_header){
					 $this->session->set_flashdata('success', "Header berhasil di simpan");
				 }else{
					 $this->session->set_flashdata('error', "Header gagal di simpan");
				 }
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
				redirect("Admin/Header_home");
		}
	}

	public function Update_home_header(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);
			$this->form_validation->set_rules('header_id', 'header_id', 'trim|required');
			$this->form_validation->set_rules('header_title', 'header_title', 'trim|required');
			$this->form_validation->set_rules('header_subtitle', 'header_subtitle', 'trim');
			$this->form_validation->set_rules('header_link', 'header_link', 'trim|valid_url');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $header_id = $this->input->post('header_id');
				 $header_title = $this->input->post('header_title');
				 $header_subtitle = $this->input->post('header_subtitle');
				 $header_link = $this->input->post('header_link');
				 $draf = $this->input->post('draf');
				 $header_page = "home";

				 $parameter_id = $header_id;

				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = "header-home";

				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}

				 if($_FILES['header_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('header');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 1080;
		 					$upload_config['max_width'] = 1920;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('header_image')){
		 						$header_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$header_image =  $this->Header_home_query->Get_image($header_id);
							$save_status = true;
	 				}


				 $header =[
					 	"header_id" => $header_id,
						"header_title" => $header_title,
						"header_subtitle" => $header_subtitle,
						"header_link" => $header_link,
						"header_image" => $header_image,
						"update_date" => $update_date,
						"update_by" => $update_by,
						"status" => $status
				 ];

				 $update_header = $this->Header_home_query->Header_update($header,$header_id);
				 if($update_header){
					 $this->session->set_flashdata('success', "Header berhasil di simpan");
				 }else{
					 $this->session->set_flashdata('error', "Header gagal di simpan");
				 }
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
				redirect("Admin/Header_home/".$parameter_id);
		}
	}

	public function Update_home_status($header_id,$status){
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);

			$header_id = $header_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $header =[
				 	"header_id" => $header_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Header_home_query->Header_update($header,$header_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			 	redirect("Admin/Header_home");
	}

	public function Delete_home_header($header_id,$status){
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);

			$header_id = $header_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $header =[
				 	"header_id" => $header_id,
					"delete_date" => $delete_date,
					"delete_by" => $delete_by
			 ];

			 $delete_header = $this->Header_home_query->Header_update($header,$header_id);

			 if($delete_header){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			 	redirect("Admin/Header_home");
	}



	public function Header_other()
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);
			$this->data['data']['header_other'] = $this->Header_home_query->List_other();
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = $this->load->view("admin/header/other/custume_js.php",$this->data, TRUE);
			//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/header/other/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_other_header(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Header/Header_home_query','Header_home_query', true);
			$this->form_validation->set_rules('header_id', 'header_id', 'trim|required');
			$this->form_validation->set_rules('header_title', 'header_title', 'trim|required');
			$this->form_validation->set_rules('header_subtitle', 'header_subtitle', 'trim');
			$this->form_validation->set_rules('header_link', 'header_link', 'trim|valid_url');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $header_id = $this->input->post('header_id');
				 $header_title = $this->input->post('header_title');
				 $header_subtitle = $this->input->post('header_subtitle');
				 $header_link = $this->input->post('header_link');
				 $draf = $this->input->post('draf');
				 $header_page = $this->input->post('header_page');

				 $parameter_id = $header_id;

				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = $header_page;

				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}

				 if($_FILES['header_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('header');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 1080;
		 					$upload_config['max_width'] = 1920;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('header_image')){
		 						$header_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$header_image =  $this->Header_home_query->Get_image($header_id);
							$save_status = true;
	 				}


				 $header =[
					 	"header_id" => $header_id,
						"header_title" => $header_title,
						"header_subtitle" => $header_subtitle,
						"header_link" => $header_link,
						"header_image" => $header_image,
						"update_date" => $update_date,
						"update_by" => $update_by,
						"status" => $status
				 ];

				 $update_header = $this->Header_home_query->Header_update($header,$header_id);
				 if($update_header){
					 $this->session->set_flashdata('success', "Header berhasil di simpan");
				 }else{
					 $this->session->set_flashdata('error', "Header gagal di simpan");
				 }
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
				redirect("Admin/Header_other/");
		}
	}

	Public function Partners_management($logo_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$logo_type = "partner";
			$this->data['data']['logo_type'] = $logo_type;

			$this->data['data']['List_logo'] = $this->Logo_query->List_logo($logo_type);

			if(isset($logo_id)){
					$this->data['data']['logo_detail'] = $this->Logo_query->Detail_logo($logo_id);
			}

			$this->master["custume_css"] = $this->load->view("admin/logo/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/logo/custume_js.php",$this->data, TRUE);
			//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/logo/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_logo_status($logo_id,$status,$logo_type){
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$logo_id = $logo_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $logo =[
				 	"logo_id" => $logo_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Logo_query->Logo_status_update($logo,$logo_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }

			 if($logo_type == "partner"){
				 	redirect("Admin/Partners_management");
			 }else if($logo_type == "customer"){
				 	redirect("Admin/Customers_management");
			 }
	}

	public function Delete_logo($logo_id,$logo_type){
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$logo_id = $logo_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $logo =[
					"delete_date" => $delete_date,
					"delete_by" => $delete_by,
			 ];

			 $delete_logo = $this->Logo_query->Logo_delete($logo,$logo_id);

			 if($delete_logo){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }

			 if($logo_type == "partner"){
				 	redirect("Admin/Partners_management");
			 }else if($logo_type == "customer"){
				 	redirect("Admin/Customers_management");
			 }
	}

	Public function Customers_management($logo_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$logo_type = "customer";
			$this->data['data']['logo_type'] = $logo_type;
			$this->data['data']['List_logo'] = $this->Logo_query->List_logo($logo_type);
			if(isset($logo_id)){
					$this->data['data']['logo_detail'] = $this->Logo_query->Detail_logo($logo_id);
			}
			$this->master["custume_css"] = $this->load->view("admin/logo/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/logo/custume_js.php",$this->data, TRUE);
			//$this->master["content"] = $this->load->view("website/home/content.php", $this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/logo/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Submit_logo(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$this->form_validation->set_rules('logo_name', 'logo_name', 'trim|required');
			$this->form_validation->set_rules('logo_type', 'logo_type', 'trim|required');
			$this->form_validation->set_rules('logo_link', 'logo_link', 'trim|valid_url');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $logo_name = $this->input->post('logo_name');
				 $logo_type = $this->input->post('logo_type');
				 $logo_link = $this->input->post('logo_link');
				 $draf = $this->input->post('draf');

				 $date = date_create();
				 $post_date = date("Y-m-d H:i:s");
				 $post_by = $_SESSION['admin_id'];

				 $set_name = str_replace(" ","-",$logo_name);

				 $image_name = "logo-".$logo_type."-".$set_name;

				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}

				 if($_FILES['logo_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('logo');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 300;
		 					$upload_config['max_width'] = 500;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('logo_image')){
		 						$logo_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
						$save_status = false;
	 				}

					if($_FILES['logo_image_dark']['error'] === 0) {
 		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('logo');
 		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
 		 					$upload_config['max_height'] = 300;
 		 					$upload_config['max_width'] = 500;
 		 					$upload_config['file_name'] = $image_name."-dark-".date_timestamp_get($date);
 		 					$this->upload->initialize($upload_config);
 		 			if($this->upload->do_upload('logo_image_dark')){
 		 						$logo_image_dark = $this->upload->data('file_name');
 								$save_status = true;
 	 					}else{
 	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
 	 						$save_status = false;
 	 					}
 	 				}else{
 						$logo_image_dark = null;
 						$save_status = true;
 	 				}

				if($save_status == true){
					 $logo[] =[
						 	"logo_id" => null,
							"logo_name" => $logo_name,
							"logo_image" => $logo_image,
							"logo_image_dark" => $logo_image_dark,
							"logo_link" => $logo_link,
							"logo_type" => $logo_type,
							"post_date" => $post_date,
							"post_by" => $post_by,
							"update_date" => null,
							"update_by" => null,
							"delete_date" => null,
							"delete_by" => null,
							"status" => $status
					 ];

					 $submit_logo = $this->Logo_query->Logo_submit($logo);
					 if($submit_logo){
						 $this->session->set_flashdata('success', "Header berhasil di simpan");
					 }else{
						 $this->session->set_flashdata('error', "Header gagal di simpan");
					 }
			 	}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
			if($logo_type == "partner"){
				 redirect("Admin/Partners_management");
			}else if($logo_type == "customer"){
				 redirect("Admin/Customers_management");
			}
		}
	}

	public function Update_logo(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Logo/Logo_query','Logo_query', true);
			$this->form_validation->set_rules('logo_id', 'logo_id', 'trim|required');
			$this->form_validation->set_rules('logo_name', 'logo_name', 'trim|required');
			$this->form_validation->set_rules('logo_type', 'logo_type', 'trim|required');
			$this->form_validation->set_rules('logo_link', 'logo_link', 'trim|valid_url');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $logo_id = $this->input->post('logo_id');
				 $logo_name = $this->input->post('logo_name');
				 $logo_type = $this->input->post('logo_type');
				 $logo_link = $this->input->post('logo_link');
				 $draf = $this->input->post('draf');

				 $parameter_id = $logo_id;
				 $set_name = str_replace(" ","-",$logo_name);

				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = $logo_type."-".$set_name;

				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}

				 if($_FILES['logo_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('logo');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 300;
		 					$upload_config['max_width'] = 500;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('logo_image')){
		 						$logo_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$logo_image =  $this->Logo_query->Get_image($logo_id);
							$save_status = true;
	 				}

					if($_FILES['logo_image_dark']['error'] === 0) {
 		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('logo');
 		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
 		 					$upload_config['max_height'] = 300;
 		 					$upload_config['max_width'] = 500;
 		 					$upload_config['file_name'] = $image_name."-dark-".date_timestamp_get($date);
 		 					$this->upload->initialize($upload_config);
 		 			if($this->upload->do_upload('logo_image_dark')){
 		 						$logo_image_dark = $this->upload->data('file_name');
 								$save_status = true;
 	 					}else{
 	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
 	 						$save_status = false;
 	 					}
 	 				}else{
 	 						$logo_image_dark =  $this->Logo_query->Get_image_dark($logo_id);
 							$save_status = true;
 	 				}


					$logo =[
						 "logo_id" => $logo_id,
						 "logo_name" => $logo_name,
						 "logo_image" => $logo_image,
						 "logo_image_dark" => $logo_image_dark,
						 "logo_link" => $logo_link,
						 "logo_type" => $logo_type,
						 "update_date" => $update_date,
						 "update_by" => $update_by,
						 "status" => $status
					];
				 $update_logo = $this->Logo_query->Logo_update($logo,$logo_id);
				 if($update_logo){
					 $this->session->set_flashdata('success', "Header berhasil di simpan");
				 }else{
					 $this->session->set_flashdata('error', "Header gagal di simpan");
				 }
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
			if($logo_type == "partner"){
				 redirect("Admin/Partners_management/".$parameter_id);
			}else if($logo_type == "customer"){
				 redirect("Admin/Customers_management/".$parameter_id);
			}
		}
	}

	public function About_us()
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/About/About_query','About_query', true);
			$this->data['data']['about'] = $this->About_query->About_detail();
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = $this->load->view("admin/about/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/about/content.php",$this->data, TRUE);
			$this->render();
		}
	}


	public function About_us_update(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/About/About_query','About_query', true);
			$this->form_validation->set_rules('about_text', 'about_text', 'trim|required');
			$this->form_validation->set_rules('about_team', 'about_team', 'trim|required');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $about_text = $this->input->post('about_text');
				 $about_team = $this->input->post('about_team');


				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = "about-";



				 if($_FILES['about_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('about');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 2000;
		 					$upload_config['max_width'] = 2000;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('about_image')){
		 						$about_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$about_image =  $this->About_query->Get_image();
							$save_status = true;

	 				}

					if($save_status){
							$about =[
								 "about_text" => $about_text,
								 "about_team" => $about_team,
								 "about_image" => $about_image
							];
						 $update_about = $this->About_query->About_update($about);
						 if($update_about){
							 $this->session->set_flashdata('success', "Data berhasil di update");
						 }else{
							 $this->session->set_flashdata('error', "Data gagal di update");
						 }
			 		}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
			redirect("Admin/About_us");

		}
	}

	public function Introduction()
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Introduction/Introduction_query','Introduction_query', true);
			$this->data['data']['introduction'] = $this->Introduction_query->Introduction_list();
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = $this->load->view("admin/introduction/custume_js.php",$this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/introduction/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_introduction(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Introduction/Introduction_query','Introduction_query', true);
			$this->form_validation->set_rules('text_id', 'text_id', 'trim|required');
			$this->form_validation->set_rules('text_title', 'text_title', 'trim|required');
			$this->form_validation->set_rules('text_sub_title', 'text_sub_title', 'trim');
			$this->form_validation->set_rules('text_intro', 'text_intro', 'trim');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $text_id = $this->input->post('text_id');
				 $text_title = $this->input->post('text_title');
				 $text_sub_title = $this->input->post('text_sub_title');
				 $text_intro = $this->input->post('text_intro');
				 $text_sub_title = str_replace(" ","-",$text_sub_title);

				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = "introduction-".$text_sub_title;

				 if($_FILES['text_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('about');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 600;
		 					$upload_config['max_width'] = 600;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('text_image')){
		 						$text_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$text_image =  $this->Introduction_query->Get_image();
							$save_status = true;
	 				}

					if($save_status){
							$introduction =[
								 "text_title" => $text_title,
								 "text_sub_title" => $text_sub_title,
								 "text_intro" => $text_intro,
								 "text_image" => $text_image,
								 "update_date" =>  $update_date,
								 "update_by" =>  $update_by
							];
						 $update_introduction = $this->Introduction_query->Introduction_update($introduction,$text_id);
						 if($update_introduction){
							 $this->session->set_flashdata('success', "Data berhasil di update");
						 }else{
							 $this->session->set_flashdata('error', "Data gagal di update");
						 }
			 		}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");

			}
			redirect("Admin/Introduction");

		}
	}

	public function Contact_us()
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Contact/Contact_query','Contact_query', true);
			$this->data['data']['contact'] = $this->Contact_query->Contact_detail();
			$this->data['data']['social'] = $this->Contact_query->Contact_social();
			$this->master["custume_css"] = "";
			$this->master["custume_js"] = $this->load->view("admin/contact_us/custume_js.php",$this->data, TRUE);
			$this->master["content"] = $this->load->view("admin/contact_us/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Contact_us_update(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Contact/Contact_query','Contact_query', true);
				$this->form_validation->set_rules('contact_id[]', 'contact_id', 'trim|required');
				$this->form_validation->set_rules('contact_content[]', 'contact_content', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
				 	$contact_id = $this->input->post('contact_id');
 				 	$contact_content = $this->input->post('contact_content');
					$update_date = date("Y-m-d H:i:s");
 				  $update_by = $_SESSION['admin_id'];

					if($save_status){
						$contact = array();
						foreach ($contact_id as $key => $value) {
							$contact =[
								 "contact_id" => $contact_id[$key],
								 "contact_content" =>  $contact_content[$key],
								 "update_date" =>  $update_date,
								 "update_by" =>  $update_by
							];
							$update_contact = $this->Contact_query->Contact_update($contact,$contact_id[$key]);
						}

						if($update_contact){
							$this->session->set_flashdata('success', "Data berhasil di update");
						}else{
							$this->session->set_flashdata('error', "Data gagal di update");
						}
					}

				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
				redirect("Admin/Contact_us");
		}
	}

	public function Social_update(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Contact/Contact_query','Contact_query', true);
				$this->form_validation->set_rules('social_id[]', 'social_id', 'trim|required');
				$this->form_validation->set_rules('social_title[]', 'social_title', 'trim|required');
				$this->form_validation->set_rules('social_icon[]', 'social_icon', 'trim|required');
				$this->form_validation->set_rules('social_link[]', 'social_link', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
						$social_id = $this->input->post('social_id');
						$social_title = $this->input->post('social_title');
						$social_icon = $this->input->post('social_icon');
						$social_link = $this->input->post('social_link');

						$social = array();
						foreach ($social_id as $key => $value) {
							$social =[
								 "social_id" => $social_id[$key],
								 "social_title" =>  $social_title[$key],
								 "social_icon" =>  $social_icon[$key],
								 "social_link" =>  $social_link[$key]
							];
							$Social_update = $this->Contact_query->Social_update($social,$social_id[$key]);
						}



				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
				redirect("Admin/Contact_us");

		}
	}

	public function Faq($faq_id = null)
	{
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Faq/Faq_query','Faq_query', true);


			if(isset($faq_id)){
						$this->data['data']['faq_detail'] = $this->Faq_query->Faq_detail($faq_id);
			}

			$this->data['data']['faq_list'] = $this->Faq_query->Faq_list();
			$this->master["custume_css"] = $this->load->view("admin/faq/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/faq/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/faq/content.php",$this->data, TRUE);
			$this->render();
		}
	}


	public function Update_faq_status($faq_id,$status){
			$this->load->model('Admin/Faq/Faq_query','Faq_query', true);
			$faq_id = $faq_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $faq =[
				 	"faq_id" => $faq_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Faq_query->Faq_status_update($faq,$faq_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			redirect("Admin/Faq");
	}

	public function Delete_faq($faq_id){
			$this->load->model('Admin/Faq/Faq_query','Faq_query', true);
			$faq_id = $faq_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $faq =[
					"faq_id" => $faq_id,
					"delete_date" => $delete_date,
					"delete_by" => $delete_by,
			 ];

			 $delete_faq = $this->Faq_query->Faq_delete($faq,$faq_id);

			 if($delete_faq){
				 $this->session->set_flashdata('success', "Data berhasil di hapus");
			 }else{
				 $this->session->set_flashdata('error', "Data gagal di hapus");
			 }
			redirect("Admin/Faq");
	}

	public function Update_faq(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Faq/Faq_query','Faq_query', true);
				$this->form_validation->set_rules('faq_id', 'faq_id', 'trim|required');
				$this->form_validation->set_rules('faq_title', 'faq_title', 'trim|required');
				$this->form_validation->set_rules('faq_content', 'faq_content', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
				 	$faq_id = $this->input->post('faq_id');
					$faq_title = $this->input->post('faq_title');
 				 	$faq_content = $this->input->post('faq_content');
					$draf = $this->input->post('draf');
					$update_date = date("Y-m-d H:i:s");
 				  $update_by = $_SESSION['admin_id'];

					$parameter_id = $faq_id;

					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

					 $faq =[
							"faq_id" => $faq_id,
							"faq_title" => $faq_title,
							"faq_content" => $faq_content,
							"update_date" => $update_date,
							"update_by" => $update_by,
							"status" => $status
					 ];
					$update_faq = $this->Faq_query->Faq_update($faq,$faq_id);
					if($update_faq){
						$this->session->set_flashdata('success', "Header berhasil di simpan");
					}else{
						$this->session->set_flashdata('error', "Header gagal di simpan");
					}
				redirect("Admin/Faq/".$parameter_id);
			}
		}
	}

	public function Submit_faq(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Faq/Faq_query','Faq_query', true);
				$this->form_validation->set_rules('faq_title', 'faq_title', 'trim|required');
				$this->form_validation->set_rules('faq_content', 'faq_content', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
				 	$faq_id = $this->input->post('faq_id');
					$faq_title = $this->input->post('faq_title');
 				 	$faq_content = $this->input->post('faq_content');
					$draf = $this->input->post('draf');
					$post_date = date("Y-m-d H:i:s");
 				  $post_by = $_SESSION['admin_id'];

					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

					 $faq [] = [
							"faq_id" => null,
							"faq_title" => $faq_title,
							"faq_content" => $faq_content,
							"post_date" => $post_date,
							"post_by" => $post_by,
							"update_date" => null,
							"update_by" => null,
							"delete_date" => null,
							"delete_by" => null,
							"status" => $status
					 ];
					$submit_faq = $this->Faq_query->Faq_submit($faq);
					if($submit_faq){
						$this->session->set_flashdata('success', "Header berhasil di simpan");
					}else{
						$this->session->set_flashdata('error', "Header gagal di simpan");
					}
				redirect("Admin/Faq/");
			}
		}
	}



	public function Insight_category($category_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);

			if(isset($category_id)){
						$this->data['data']['category_detail'] = $this->Insight_query->Category_detail($category_id);
			}

			$this->data['data']['category_list'] = $this->Insight_query->Category_list();
			$this->master["custume_css"] = $this->load->view("admin/Insight_category/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/Insight_category/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/Insight_category/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_category_status($category_id,$status){
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$category_id = $category_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $category =[
				 	"category_id" => $category_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Insight_query->Category_status_update($category,$category_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			redirect("Admin/Insight_category");
	}

	public function Delete_category($category_id){
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$category_id = $category_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $category =[
					"category_id" => $category_id,
					"delete_date" => $delete_date,
					"delete_by" => $delete_by,
			 ];

			 $delete_category = $this->Insight_query->Category_delete($category,$category_id);

			 if($delete_category){
				 $this->session->set_flashdata('success', "Data berhasil di hapus");
			 }else{
				 $this->session->set_flashdata('error', "Data gagal di hapus");
			 }
			redirect("Admin/Insight_category");
	}

	public function Update_category(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
				$this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
				$this->form_validation->set_rules('category_title', 'category_title', 'trim|required');
				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
				 	$category_id = $this->input->post('category_id');
					$category_title = $this->input->post('category_title');
					$draf = $this->input->post('draf');
					$update_date = date("Y-m-d H:i:s");
 				  $update_by = $_SESSION['admin_id'];

					$parameter_id = $category_id;

					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

					 $category =[
							"category_id" => $category_id,
							"category_title" => $category_title,
							"update_date" => $update_date,
							"update_by" => $update_by,
							"status" => $status
					 ];
					$Update_category = $this->Insight_query->Category_update($category,$category_id);
					if($Update_category){
						$this->session->set_flashdata('success', "Header berhasil di simpan");
					}else{
						$this->session->set_flashdata('error', "Header gagal di simpan");
					}
				redirect("Admin/Insight_category/".$parameter_id);
			}
		}
	}


	public function Submit_category(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
				$this->form_validation->set_rules('category_title', 'category_title', 'trim|required');
				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
					$category_title = $this->input->post('category_title');
					$draf = $this->input->post('draf');
					$post_date = date("Y-m-d H:i:s");
 				  $post_by = $_SESSION['admin_id'];


					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

					 $category []=[
							"category_id" => null,
							"category_title" => $category_title,
							"post_date" => $post_date,
							"post_by" => $post_by,
							"update_date" => null,
							"update_by" => null,
							"delete_date" => null,
							"delete_by" => null,
							"status" => $status
					 ];
					$Submit_category = $this->Insight_query->Category_submit($category);
					if($Submit_category){
						$this->session->set_flashdata('success', "Header berhasil di simpan");
					}else{
						$this->session->set_flashdata('error', "Header gagal di simpan");
					}
				redirect("Admin/Insight_category/".$parameter_id);
			}
		}
	}

	public function Insight($insight_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);

			if(isset($insight_id)){
					$this->data['data']['insight_detail'] = $this->Insight_query->Insight_detail($insight_id);
			}

			$this->data['data']['insight_list'] = $this->Insight_query->Insight_list();
			$this->data['data']['category_list'] = $this->Insight_query->Category_list();
			$this->master["custume_css"] = $this->load->view("admin/Insight/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/Insight/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/Insight/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_insight_status($insight_id,$status){
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$insight_id = $insight_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $insight =[
				 	"insight_id" => $insight_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Insight_query->Insight_status_update($insight,$insight_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			redirect("Admin/Insight");
	}

	public function Delete_insight($insight_id){
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$insight_id = $insight_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $insight =[
					"insight_id" => $insight_id,
					"delete_date" => $delete_date,
					"delete_by" => $delete_by,
			 ];

			 $delete_insight = $this->Insight_query->Insight_delete($insight,$insight_id);

			 if($delete_insight){
				 $this->session->set_flashdata('success', "Data berhasil di hapus");
			 }else{
				 $this->session->set_flashdata('error', "Data gagal di hapus");
			 }
			redirect("Admin/Insight");
	}

	public function Update_insight(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$this->form_validation->set_rules('insight_id', 'insight_id', 'trim|required');
			$this->form_validation->set_rules('insight_title', 'insight_title', 'trim|required');
			$this->form_validation->set_rules('insight_content', 'insight_content', 'trim|required');
			$this->form_validation->set_rules('insight_category', 'insight_category', 'trim|required');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $insight_id = $this->input->post('insight_id');
				 $insight_title = $this->input->post('insight_title');
				 $insight_content = $this->input->post('insight_content');
				 $insight_category = $this->input->post('insight_category');
				 $draf = $this->input->post('draf');

				 if($draf == 'on'){
						$status = 0;
					}else{
						$status = 1;
					}

				 $slug = strtolower($insight_title);
				 $slug = str_replace(" ","-",$slug);

				 $parameter_id = $insight_id;

				 $date = date_create();
				 $update_date = date("Y-m-d H:i:s");
				 $update_by = $_SESSION['admin_id'];
				 $image_name = "insight-".$slug;

				 if($_FILES['insight_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('insight');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 2000;
		 					$upload_config['max_width'] = 2000;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('insight_image')){
		 						$insight_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$insight_image =  $this->Insight_query->Get_image($insight_id);
							$save_status = true;
	 				}

					if($save_status){
							$insight =[
								 "insight_id" => $insight_id,
								 "insight_title" => $insight_title,
								 "insight_content" => $insight_content,
								 "insight_slug" => $slug,
								 "insight_category" => $insight_category,
								 "insight_image" => $insight_image,
								 "update_date" =>  $update_date,
								 "update_by" =>  $update_by,
								 "status" => $status
							];

						 $update_insight = $this->Insight_query->Insight_update($insight,$insight_id);
						 if($update_insight){
							 $this->session->set_flashdata('success', "Data berhasil di update");
						 }else{
							 $this->session->set_flashdata('error', "Data gagal di update");
						 }
			 		}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
			}
			redirect("Admin/Insight/".$parameter_id);

		}
	}

	public function Submit_insight(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
			$this->form_validation->set_rules('insight_title', 'insight_title', 'trim|required');
			$this->form_validation->set_rules('insight_content', 'insight_content', 'trim|required');
			$this->form_validation->set_rules('insight_category', 'insight_category', 'trim|required');

			if($this->form_validation->run() == TRUE)
			{
				 $save_status = true;
				 $insight_title = $this->input->post('insight_title');
				 $insight_content = $this->input->post('insight_content');
				 $insight_category = $this->input->post('insight_category');

				 $slug = strtolower($insight_title);
				 $slug = str_replace(" ","-",$slug);

				 $draf = $this->input->post('draf');
				 if($draf == 'on'){
					$status = 0;
					}else{
						$status = 1;
					}


				 $insight_view = 1;


				 $date = date_create();
				 $post_date = date("Y-m-d H:i:s");
				 $post_by = $_SESSION['admin_id'];
				 $image_name = "insight-".$slug;

				 if($_FILES['insight_image']['error'] === 0) {
		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('insight');
		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
		 					$upload_config['max_height'] = 2000;
		 					$upload_config['max_width'] = 2000;
		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
		 					$this->upload->initialize($upload_config);
		 			if($this->upload->do_upload('insight_image')){
		 						$insight_image = $this->upload->data('file_name');
								$save_status = true;
	 					}else{
	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
	 						$save_status = false;
	 					}
	 				}else{
	 						$insight_image =  "";
							$save_status = true;

	 				}

					if($save_status){
							$insight [ ]=[
								 "insight_id" => null,
								 "insight_title" => $insight_title,
								 "insight_content" => $insight_content,
								 "insight_slug" => $slug,
								 "insight_category" => $insight_category,
								 "insight_image" => $insight_image,
								 "insight_view" => $insight_view,
								 "post_date" => $post_date,
		 						 "post_by" => $post_by,
		 						 "update_date" => null,
		 						 "update_by" => null,
		 						 "delete_date" => null,
		 						 "delete_by" => null,
		 						 "status" => $status

							];

						 $submit_insight = $this->Insight_query->Insight_submit($insight,$insight_id);
						 if($submit_insight){
							 $this->session->set_flashdata('success', "Data berhasil di update");
						 }else{
							 $this->session->set_flashdata('error', "Data gagal di update");
						 }
			 		}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
			}
			redirect("Admin/Insight/");

		}
	}

	public function Solutions(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$this->data['data']['solution_image'] = $this->Solution_query->Get_image();
			$this->data['data']['solution_list'] = $this->Solution_query->solution_list();
			$this->master["custume_css"] = $this->load->view("admin/solution/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/solution/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/solution/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Update_solution(){
		$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->form_validation->set_rules('solution_id', 'solution_id', 'trim|required');
			$this->form_validation->set_rules('solution_title', 'solution_title', 'trim|required');

			if($this->form_validation->run() == TRUE)
			{
				$save_status = true;
				$solution_id = $this->input->post('solution_id');
				$solution_title = $this->input->post('solution_title');
				$detail = $this->input->post('detail');
				if($detail == 'on'){
				 $solution_list = 1;
				 }else{
					 $solution_list = 0;
				 }

				 $parameter_id = $solution_id;

				 $solution =[
					 "solution_title" => $solution_title,
					 "solution_list" => $solution_list,
					 "update_date" => $update_date,
					 "update_by" => $update_by
				 ];

				 $update_solution = $this->Solution_query->Solution_update($solution,$solution_id);

				if($update_solution){
					$this->session->set_flashdata('success', "Update berhasil di simpan");
				}else{
					$this->session->set_flashdata('error', "Update gagal di simpan");
				}
			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
			}
				 redirect("Admin/Solution_detail/".$parameter_id."/".$list_id = null);
		}
	}

	public function Update_solution_status($solution_id,$status){
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$solution_id = $solution_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $solution =[
				 	"solution_id" => $solution_id,
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Solution_query->Solution_update($solution,$solution_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			redirect("Admin/Solutions");
	}

	public function Delete_solution($solution_id){
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$solution_id = $solution_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];

			 $solution =[
					"solution_id" => $solution_id,
					"delete_date" => $delete_date,
					"delete_by" => $delete_by,
			 ];

			 $delete_solution = $this->Solution_query->Solution_update($solution,$solution_id);

			 if($delete_solution){
				 $this->session->set_flashdata('success', "Data berhasil di hapus");
			 }else{
				 $this->session->set_flashdata('error', "Data gagal di hapus");
			 }
			redirect("Admin/Solutions");
	}

	public function Update_solution_image(){
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			if(!isset($_SESSION['admin_id'])){
					$this->login();
			}else{
				$this->form_validation->set_rules('solution_id', 'solution_id', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
					$solution_id = $this->input->post('solution_id');

				 $date = date_create();
 				 $update_date = date("Y-m-d H:i:s");
 				 $update_by = $_SESSION['admin_id'];
 				 $image_name = "solution-";

 				 if($_FILES['solution_image']['error'] === 0) {
 		 					$upload_config['upload_path'] = 'assets/' . $this->config->item('solution');
 		 					$upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
 		 					$upload_config['max_height'] = 1000;
 		 					$upload_config['max_width'] = 1000;
 		 					$upload_config['file_name'] = $image_name."-".date_timestamp_get($date);
 		 					$this->upload->initialize($upload_config);
 		 			if($this->upload->do_upload('solution_image')){
 		 						$solution_image = $this->upload->data('file_name');
 								$save_status = true;
 	 					}else{
 	 						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
 	 						$save_status = false;
 	 					}
 	 				}else{
						$this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
						$save_status = false;
 	 				}

					if($save_status){
						$solution =[
							 "solution_image" => $solution_image,
							 "update_date" => $update_date,
							 "update_by" => $update_by,
						];

						$update_image_solution = $this->Solution_query->Solution_image_update($solution,$solution_id);

						if($update_image_solution){
							$this->session->set_flashdata('success', "Data berhasil di hapus");
						}else{
							$this->session->set_flashdata('error', "Data gagal di hapus");
						}
					}
				}
			}
			redirect("Admin/Solutions");
	}

	public function Submit_solution(){
		$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{

				$this->form_validation->set_rules('solution_title', 'solution_title', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
				 	$solution_title = $this->input->post('solution_title');

					$post_date = date("Y-m-d H:i:s");
					$post_by = $_SESSION['admin_id'];

				 $detail = $this->input->post('detail');
				 if($detail == 'on'){
					$solution_list = 1;
					}else{
						$solution_list = 0;
					}

					if($save_status){
							$solution [ ]=[
								 "solution_id" => null,
								 "solution_title" => $solution_title,
								 "solution_list" => $solution_list,
								 "post_date" => $post_date,
		 						 "post_by" => $post_by,
		 						 "update_date" => null,
		 						 "update_by" => null,
		 						 "delete_date" => null,
		 						 "delete_by" => null,
		 						 "status" => 1
							];

							$submit_solution = $this->Solution_query->Solution_submit($solution);
							if($submit_solution){
								$this->session->set_flashdata('success', "Data berhasil di tambah");
							}else{
								$this->session->set_flashdata('error', "Data gagal di tambah");
							}
					}


				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
				redirect("Admin/Solutions");
		}
	}

	public function Solution_detail($solution_id,$list_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$this->data['data']['solution_detail'] = $this->Solution_query->solution_detail($solution_id);
			$this->data['data']['solution_point'] = $this->Solution_query->solution_point($solution_id);
			if(isset($list_id)){
				$this->data['data']['point_detail'] = $this->Solution_query->point_detail($list_id);
			}

			$this->master["custume_css"] = $this->load->view("admin/solution_list/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/solution_list/custume_js.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/solution_list/content.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function Submit_solution_point(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
				$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
				$this->form_validation->set_rules('solution_id', 'solution_id', 'trim|required');
				$this->form_validation->set_rules('list_title', 'list_title', 'trim|required');
				$this->form_validation->set_rules('list_text', 'list_text', 'trim|required');


				if($this->form_validation->run() == TRUE)
				{
					$save_status = true;
					$solution_id = $this->input->post('solution_id');
					$list_title = $this->input->post('list_title');
					$list_text = $this->input->post('list_text');

					$parameter_id = $solution_id;

					$post_date = date("Y-m-d H:i:s");
					$post_by = $_SESSION['admin_id'];

					$draf = $this->input->post('draf');
					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

						 $point [] = [
								"list_id" => null,
								"solution_id" => $solution_id,
								"list_title" => $list_title,
								"list_text" => $list_text,
								"post_date" => $post_date,
								"post_by" => $post_by,
								"update_date" => null,
								"update_by" => null,
								"delete_date" => null,
								"delete_by" => null,
								"status" => 1
						 ];
						 $submit_point = $this->Solution_query->Point_submit($point);
						 if($submit_point){
							 $this->session->set_flashdata('success', "Data berhasil di tambah");
						 }else{
							 $this->session->set_flashdata('error', "Data gagal di tambah");
						 }



				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
				redirect("Admin/Solution_detail/".$parameter_id."/".$list_id = null);

		}
	}

	public function Update_point_status($list_id,$status,$solution_id){
		$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
		$list_id = $list_id;
		$solution_id = $solution_id;
		$update_date = date("Y-m-d H:i:s");
		$update_by = $_SESSION['admin_id'];
		$status = $status;

		if($status == 1)
		{
			$status = 0;
		}else{
			$status = 1;
		}

		 $point =[
				"update_date" => $update_date,
				"update_by" => $update_by,
				"status" => $status
		 ];

		 $update_status = $this->Solution_query->Solution_point_update($point,$list_id);

		 if($update_status){
			 $this->session->set_flashdata('success', "Update berhasil di simpan");
		 }else{
			 $this->session->set_flashdata('error', "Update gagal di simpan");
		 }
		redirect("Admin/Solution_detail/".$solution_id."/".$list_id = null);

	}

	public function Delete_point($list_id,$solution_id){
		$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
		$list_id = $list_id;
		$solution_id = $solution_id;
		$delete_date = date("Y-m-d H:i:s");
		$delete_by = $_SESSION['admin_id'];

		 $point =[
				"delete_date" => $delete_date,
				"delete_by" => $delete_by
		 ];

		 $delete_point = $this->Solution_query->Solution_point_delete($point,$list_id);

		 if($delete_point){
			 $this->session->set_flashdata('success', "data berhasil di hapus");
		 }else{
			 $this->session->set_flashdata('error', "data gagal di hapus");
		 }
		redirect("Admin/Solution_detail/".$solution_id."/".$list_id = null);
	}

	public function Update_solution_point(){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$this->form_validation->set_rules('list_id', 'list_id', 'trim|required');
			$this->form_validation->set_rules('solution_id', 'solution_id', 'trim|required');
			$this->form_validation->set_rules('list_title', 'list_title', 'trim|required');
			$this->form_validation->set_rules('list_text', 'list_text', 'trim|required');

			if($this->form_validation->run() == TRUE)
			{
				$save_status = true;
				$list_id = $this->input->post('list_id');
				$solution_id = $this->input->post('solution_id');
				$list_title = $this->input->post('list_title');
				$list_text = $this->input->post('list_text');

				$parameter_id = $list_id;

				$update_date = date("Y-m-d H:i:s");
				$update_by = $_SESSION['admin_id'];

				$draf = $this->input->post('draf');
				if($draf == 'on'){
				 $status = 0;
				 }else{
					 $status = 1;
				 }

				 $point =[
					 "list_title" => $list_title,
					 "list_text" => $list_text,
					 "status" => $status
					];

				$update_status = $this->Solution_query->Solution_point_update($point,$list_id);

				if($update_status){
					$this->session->set_flashdata('success', "Update berhasil di simpan");
				}else{
					$this->session->set_flashdata('error', "Update gagal di simpan");
				}

			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
			}
			redirect("Admin/Solution_detail/".$solution_id."/".$parameter_id);

		}
	}

	public function Upload_image(){
		 $date = date_create();
		if($_FILES['file']['error'] === 0) {
				 $upload_config['upload_path'] = 'assets/' . $this->config->item('insight');
				 $upload_config['allowed_types'] = 'jpg|jpeg|png|svg';
				 $upload_config['max_height'] = 3000;
				 $upload_config['max_width'] = 3000;
				 $upload_config['file_name'] = "upload"."-".date_timestamp_get($date);
				 $this->upload->initialize($upload_config);
		 if($this->upload->do_upload('file')){
					 //$file = $this->upload->data('file_name');
					 		$insight_image = $this->upload->data('file_name');
						$this->output
							->set_content_type('application/json', 'utf-8')
							->set_output(json_encode(['location' => base_url().'assets/'.$this->config->item('insight').$insight_image]))
							->_display();
						exit;
			 }else{
				 $this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
				 $save_status = false;
			 }
		 }else{
			 $this->session->set_flashdata('error', 'File image: ' . $this->upload->display_errors('', ''));
			 $save_status = false;
		 }
	}


	public function Insight_test($insight_id = null){
		if(!isset($_SESSION['admin_id'])){
				$this->login();
		}else{
			$this->load->model('Admin/Insight/Insight_query','Insight_query', true);

			if(isset($insight_id)){
					$this->data['data']['insight_detail'] = $this->Insight_query->Insight_detail($insight_id);
			}
			$this->master["custume_css"] = $this->load->view("admin/Insight/custume_css.php",[], TRUE);
			$this->master["custume_js"] = $this->load->view("admin/Insight/js_peserta.php",[], TRUE);
			$this->master["content"] = $this->load->view("admin/Insight/peserta.php",$this->data, TRUE);
			$this->render();
		}
	}

	public function insight_all(){
		$this->load->model('Admin/Insight/Insigt_data_list','Insigt_data_list', true);
    $list = $this->Insigt_data_list->get_datatables();
		$data = array();
    $no = $_POST['start'];
		date_default_timezone_set('Asia/Jakarta');
		foreach ($list as $field) {
            $no++;
						$post_date = (new DateTime())->createFromFormat('Y-m-d H:i:s', $field->post_date)->format('d F Y');
						if($field->status == 1){ $status = "active"; $button="btn-success"; $icon="fas fa-eye"; }else{ $status = "non active"; $icon="fas fa-eye-slash"; $button="btn-warning";};
						$row = array();
						$row[] = $no;
						$row[] = '<a href="'.base_url().'Admin/Insight/'.$field->insight_id.'">'.$field->insight_title.'</a>';
						$row[] = $field->insight_view;
						$row[] = $post_date;
            $row[] = $status;
						$row[] = '<a class="btn '.$button.' btn-circle" href="'.base_url().'Admin/Update_insight_status/'.$field->insight_id.'/'.$field->status.'">	<i class="'.$icon.'"></i></a><a class="btn btn-danger btn-circle" href="'.base_url().'Admin/Delete_insight/'.$field->insight_id.'">	<i class="fas fa-trash"></i></a>';
						$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Insigt_data_list->count_all(),
			"recordsFiltered" => $this->Insigt_data_list->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
    }


		public function Solution_logo($logo_id = null)
		{
			if(!isset($_SESSION['admin_id'])){
					$this->login();
			}else{
				$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
				$this->data['data']['logo_list'] = $this->Solution_query->logo_list();
				$this->data['data']['partner_list'] = $this->Solution_query->Get_logo_partner();
				if(isset($logo_id)){
					$this->data['data']['logo_detail'] = $this->Solution_query->logo_detail($logo_id);
				}
				$this->master["custume_css"] =  $this->load->view("admin/solution/custume_css.php",[], TRUE);
				$this->master["custume_js"] = $this->load->view("admin/solution/custume_js.php",[], TRUE);
				$this->master["content"] = $this->load->view("admin/solution/content_logo.php",$this->data, TRUE);
				$this->render();
			}
		}

		public function Submit_solution_logo(){
			if(!isset($_SESSION['admin_id'])){
					$this->login();
			}else{
				$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
				$this->form_validation->set_rules('logo_title', 'logo_title', 'trim|required');
				$this->form_validation->set_rules('logo_partner_id', 'logo_partner_id', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{
					 $save_status = true;
					 $logo_title = $this->input->post('logo_title');
					 $logo_partner_id = $this->input->post('logo_partner_id');

					 $draf = $this->input->post('draf');
					 if($draf == 'on'){
						$status = 0;
						}else{
							$status = 1;
						}

					 $date = date_create();
					 $post_date = date("Y-m-d H:i:s");
					 $post_by = $_SESSION['admin_id'];


						if($save_status){
								$logo [ ]=[
									 "logo_id" => null,
									 "logo_partner_id" => $logo_partner_id,
									 "logo_title" => $logo_title,
									 "post_date" => $post_date,
			 						 "post_by" => $post_by,
			 						 "update_date" => null,
			 						 "update_by" => null,
			 						 "delete_date" => null,
			 						 "delete_by" => null,
			 						 "status" => $status

								];

							 $submit_logo = $this->Solution_query->logo_submit($logo);
							 if($submit_logo){
								 $this->session->set_flashdata('success', "Data berhasil di update");
							 }else{
								 $this->session->set_flashdata('error', "Data gagal di update");
							 }
				 		}
				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
				redirect("Admin/Solution_logo/".$logo_id = null);

			}
		}

		public function Update_solution_logo_status($logo_id,$status){
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$logo_id = $logo_id;
			$update_date = date("Y-m-d H:i:s");
			$update_by = $_SESSION['admin_id'];
			$status = $status;

			if($status == 1)
			{
				$status = 0;
			}else{
				$status = 1;
			}

			 $logo =[
					"update_date" => $update_date,
					"update_by" => $update_by,
					"status" => $status
			 ];

			 $update_status = $this->Solution_query->Solution_logo_update($logo,$logo_id);

			 if($update_status){
				 $this->session->set_flashdata('success', "Update berhasil di simpan");
			 }else{
				 $this->session->set_flashdata('error', "Update gagal di simpan");
			 }
			redirect("Admin/Solution_logo/".$logo_id = null);
		}

		public function Delete_solution_logo($logo_id){
			$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
			$logo_id = $logo_id;
			$delete_date = date("Y-m-d H:i:s");
			$delete_by = $_SESSION['admin_id'];


			 $logo =[
					"delete_date" => $delete_date,
					"delete_by" => $delete_by
			 ];

			 $delete_status = $this->Solution_query->Solution_logo_update($logo,$logo_id);

			 if($delete_status){
				 $this->session->set_flashdata('success', "data berhasil di hapus");
			 }else{
				 $this->session->set_flashdata('error', "data gagal di hapus");
			 }
			redirect("Admin/Solution_logo/".$logo_id = null);
		}

		public function Update_solution_logo(){
				$this->load->model('Admin/Solution/Solution_query','Solution_query', true);
				$this->form_validation->set_rules('logo_id', 'logo_id', 'trim|required');
				$this->form_validation->set_rules('logo_title', 'logo_title', 'trim|required');
				$this->form_validation->set_rules('logo_partner_id', 'logo_partner_id', 'trim|required');

				if($this->form_validation->run() == TRUE)
				{

					$save_status = true;
					$logo_id = $this->input->post('logo_id');
					$logo_title = $this->input->post('logo_title');
					$logo_partner_id = $this->input->post('logo_partner_id');

					$draf = $this->input->post('draf');
					if($draf == 'on'){
					 $status = 0;
					 }else{
						 $status = 1;
					 }

					 $parameter_id = $logo_id;

					 $date = date_create();
					 $update_date = date("Y-m-d H:i:s");
					 $update_by = $_SESSION['admin_id'];

					 if($save_status){
							 $logo =[
									"logo_partner_id" => $logo_partner_id,
									"logo_title" => $logo_title,
									"update_date" => null,
									"update_by" => null,
									"delete_date" => null,
									"delete_by" => null,
									"status" => $status
							 ];

							$update_logo = $this->Solution_query->Solution_logo_update($logo,$logo_id);
							if($update_logo){
								$this->session->set_flashdata('success', "Data berhasil di update");
							}else{
								$this->session->set_flashdata('error', "Data gagal di update");
							}
					 }


				}else{
					$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
				}
					redirect("Admin/Solution_logo/".$parameter_id);
		}

		public function Submit_inquiry(){
			$this->load->model('Admin/Inquiry/Inquiry_query','Inquiry_query', true);
			$this->form_validation->set_rules('inquiry_name', 'inquiry_name', 'trim|required');
			$this->form_validation->set_rules('inquiry_company', 'inquiry_company', 'trim');
			$this->form_validation->set_rules('inquiry_phone', 'inquiry_phone', 'trim|is_natural|required');
			$this->form_validation->set_rules('inquiry_industry', 'inquiry_industry', 'trim');
			$this->form_validation->set_rules('inquiry_needs', 'inquiry_needs', 'trim|min_length[5]|required');

			if($this->form_validation->run() == TRUE)
			{
				$save_status = true;
				$inquiry_name = $this->input->post('inquiry_name');
				$inquiry_company = $this->input->post('inquiry_company');
				$inquiry_phone = $this->input->post('inquiry_phone');
				$inquiry_industry = $this->input->post('inquiry_industry');
				$inquiry_needs = $this->input->post('inquiry_needs');

				$post_date = date("Y-m-d H:i:s");

				if($save_status){
						$inquiry []=[
							 "inquiry_id" => null,
							 "inquiry_name" => $inquiry_name,
							 "inquiry_company" => $inquiry_company,
							 "inquiry_phone" => $inquiry_phone,
							 "inquiry_industry" => $inquiry_industry,
							 "inquiry_needs" => $inquiry_needs,
							 "post_date" => $post_date,
							 "delete_date" => null,
							"delete_by" => null,
							 "read_by" => null,
							 "status" => 1

						];

					 $Submit_inquiry = $this->Inquiry_query->inquiry_submit($inquiry);
					 if($Submit_inquiry){
						 $this->session->set_flashdata('success', "Data berhasil di submit");
					 }else{
						 $this->session->set_flashdata('error', "Data gagal di submit");
					 }
				}

			}else{
				$this->session->set_flashdata('error:', "Pastikan form terisi dengan benar");
			}
			redirect("Website/Inquiry");

		}

		public function Inquiry(){
			if(!isset($_SESSION['admin_id'])){
					$this->login();
			}else{
				$this->load->model('Admin/Insight/Insight_query','Insight_query', true);
				$this->master["custume_css"] = $this->load->view("admin/Inquiry/custume_css.php",[], TRUE);
				$this->master["custume_js"] = $this->load->view("admin/Inquiry/custume_js.php",[], TRUE);
				$this->master["content"] = $this->load->view("admin/Inquiry/content.php",[], TRUE);
				$this->render();
			}
		}

		public function Inquiry_all(){
			$this->load->model('Admin/Inquiry/Inquiry_data_list','Inquiry_data_list', true);
	    $list = $this->Inquiry_data_list->get_datatables();
			$data = array();
	    $no = $_POST['start'];
			date_default_timezone_set('Asia/Jakarta');
			foreach ($list as $field) {
	            $no++;
							$post_date = (new DateTime())->createFromFormat('Y-m-d H:i:s', $field->post_date)->format('d F Y');
							if(isset($field->read_by)){ $read_by = "read"; $visible="hidden";}else{ $read_by = "waiting read";$visible="";};
							$row = array();
							$row[] = $no;
							$row[] = $field->inquiry_name;
							$row[] = $field->inquiry_company;
							$row[] = $field->inquiry_phone;
							$row[] = $field->inquiry_industry;
							$row[] = $field->inquiry_needs;
							$row[] = $post_date;
							$row[] = $read_by;
							$row[] = '<a style="visibility:'.$visible.'" class="btn btn-success btn-circle" href="'.base_url().'Admin/Inquiry_read/'.$field->inquiry_id.'">	<i class="fas fa-eye"></i></a><a class="btn btn-danger btn-circle" href="'.base_url().'Admin/Inquiry_delete/'.$field->inquiry_id.'">	<i class="fas fa-trash"></i></a>';
							$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->Inquiry_data_list->count_all(),
				"recordsFiltered" => $this->Inquiry_data_list->count_filtered(),
				"data" => $data,
			);
			//output dalam format JSON
			echo json_encode($output);
	    }

			public function Inquiry_read($inquiry_id){
					$this->load->model('Admin/Inquiry/Inquiry_query','Inquiry_query', true);
					$inquiry_id = $inquiry_id;
					$read_by = $_SESSION['admin_id'];

					$inquiry =[
						 "read_by" => $read_by
					];

					$update_read = $this->Inquiry_query->Inquiry_read_update($inquiry,$inquiry_id);

					if($update_read){
						$this->session->set_flashdata('success', "data berhasil di update");
					}else{
						$this->session->set_flashdata('error', "data gagal di update");
					}
				 redirect("Admin/Inquiry");

			}

			public function Inquiry_delete($inquiry_id){
					$this->load->model('Admin/Inquiry/Inquiry_query','Inquiry_query', true);
					$inquiry_id = $inquiry_id;
					$delete_date = date("Y-m-d H:i:s");
					$delete_by = $_SESSION['admin_id'];

					$inquiry =[
						 "delete_date" => $delete_date,
						 "delete_by" => $delete_by
					];

					$inquiry_delete = $this->Inquiry_query->Inquiry_delete($inquiry,$inquiry_id);

					if($inquiry_delete){
						$this->session->set_flashdata('success', "data berhasil di delete");
					}else{
						$this->session->set_flashdata('error', "data gagal di delete");
					}
				 redirect("Admin/Inquiry");

			}





}
