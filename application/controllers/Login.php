<?php
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
	}

	public function index(){
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("user","user","required|min_length[2]|max_length[12]|is_unique[usr.username]");
		$this->form_validation->set_rules("email","email","required|valid_email|is_unique[usr.email]");
		$this->form_validation->set_rules("password","password","required");
		$this->form_validation->set_rules("passwordConfirm","passwordConfirm","required|matches[password]");


		//验证码模块，不太好，之后换js
		$data["cap"]=$this->user_model->set_code();
		$ok = 0;
		if(!empty($_POST['captcha'])){
		$ok=$this->user_model->commit_code();
		}
		// Then see if a captcha exists
		//页面逻辑控制
		if ($this->form_validation->run() === FALSE||!$ok)
	    {
	     	$this->load->view("sign_in/header");
			$this->load->view("sign_in/sign-up3",$data);
			$this->load->view("sign_in/foot");
	    }
	    else
	    {
	       $this->user_model->set_user();
	       redirect('login/login_real');
	    }
	}

	public function login_real(){

		$data["cap"]=$this->user_model->set_code();
		$ok = 0;
		if(!empty($_POST['captcha'])){
		$ok=$this->user_model->commit_code();
		}

		if($this->user_model->check_login()){
			$this->session->set_userdata('user',$this->input->post("user"));
			$this->user_model->login_record();
			redirect('frame/index');
		}else{
	     	$this->load->view("sign_in/header");
			$this->load->view("sign_in/index3",$data);
			$this->load->view("sign_in/foot");
	    }
	}

	public function forget(){
			$this->load->view("sign_in/header");
			$this->load->view("sign_in/forgot3");
			$this->load->view("sign_in/foot");
	}

}
?>