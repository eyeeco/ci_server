<?php
class Admin extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("news_model");
		$this->load->model("upload_model");
	}

	//默认方法、主页
	public function index(){
		$sta = $this->session->userdata('user');
 		if (!isset($sta) ){
 			redirect('login/login_real');
 		}
		$data['category'] = $this->news_model->get_category();
	//	$this->load->view("admin/head");
		$this->load->view("admin/index",$data);
	//	$this->load->view("admin/foot");
	}

	public function top(){
		$data['category'] = $this->news_model->get_category();
		$this->load->view("admin/head");
		$this->load->view("admin/top",$data);
		$this->load->view("admin/foot");
	}

	public function main(){
		$data['get_article_list'] = $this->news_model->get_news($this->uri->segment(3),$this->uri->segment(4));

		$this->load->view("admin/head");
		$this->load->view("admin/main",$data);
		$this->load->view("admin/foot");
	}

	public function bottom(){

		$this->load->view("admin/head");
		$this->load->view("admin/bottom");
		$this->load->view("admin/foot");
	}

}

?> 