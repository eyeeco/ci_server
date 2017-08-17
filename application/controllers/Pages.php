<?php
class Pages extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("news_model");
		$this->load->helper("url_helper");
	}

	//默认方法、主页
	public function index($page = "home"){
		
		$data["news"]=$this->news_model->get_news();
		$data["title"] = "news";

		$this->load->view("head",$data);
		$this->load->view("news/index",$data);
		$this->load->view("footer",$data);
	}

}

?> 