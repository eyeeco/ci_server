<?php
class News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("news_model");
		$this->load->helper("url_helper");
	}

	public function index(){
		$data["news"] = $this->news_model->get_news();
	}

	// 单个新闻页面模块
	public function view($slug = null){
		$data["news_item"]=$this->news_model->get_news($slug);
		if(empty($data["news_item"])){
			show_404();
		}

		$data["title"]=$data["news_item"]["title"];


		$this->load->view("news/view",$data);
		$this->load->view("footer");
	}

	//添加信息模块
	public function create(){
		$this->load->helper("form");
		$this->load->library("form_validation");

		$data["title"] = "create a news item";

		$this->form_validation->set_rules("title","Title","required");
		$this->form_validation->set_rules("text","Text","required");

		if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('news/create',$data);


    }
    else
    {
        $this->news_model->set_news();
        redirect("news/create");
    }
	}
}


?>