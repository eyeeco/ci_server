<?php
class Frame extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("news_model");
		$this->load->model("upload_model");
	}

	//默认方法、主页
	public function index(){
	$sta = $this->session->userdata('user');
 		if (!isset($sta) ){
 			redirect('login/login_real');
 		}
	$data["usr"] = $sta;

	$this->load->view("frame/top",$data);
	$this->load->view("frame/mid");
	$this->load->view("frame/foot");

	}

	//课程选择页面
	public function index2(){
	//判定 登录后观看
	$sta = $this->session->userdata('user');
 		if (!isset($sta) ){
 			redirect('login/login_real');
 		}

	$data["usr"] = $sta;
	$data["article_info"] = $this->news_model->get_news_byid($this->uri->segment(3));

	//浏览量
	$this->news_model->view_up($this->uri->segment(3));

	//得到赞数
	$data["thumbs_up"]=$this->news_model->get_thumbs_up($this->uri->segment(3));

	//当前用户点赞
	$thumbs_up_cr = $this->news_model->get_thumbs($this->uri->segment(3));
	//点赞
	if($this->uri->segment(4)&&!$thumbs_up_cr){
	$this->news_model->thumbs_up($this->uri->segment(3),$this->uri->segment(4));
	$this->news_model->flash_up($this->uri->segment(3));
	}

	// $data["resouce1"]=$this->upload_model->get_resource($this->uri->segment(3),0);
	// $data["resouce2"]=$this->upload_model->get_resource($this->uri->segment(3),1);

	$data["file"]=$this->upload_model->get_resource($this->uri->segment(3));

	//得到级别 高中/初中
	$ca2 = get_object_vars($data["article_info"][0])["category2"];
	$data["ca2_info"] = $this->news_model->get_ca2($ca2);
	//得到科目 
	$ca1 = get_object_vars($data["article_info"][0])["category1"];
	$data["ca1_info"] = $this->news_model->get_ca1($ca1);

	//展示页面
	$this->load->view("frame/top",$data);
	$this->load->view("frame/list",$data);
	$this->load->view("frame/foot");

	}

	public function thumbs_up(){

	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect('login/login_real');
	}



}

?> 