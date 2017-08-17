<?php
class User_model extends CI_Model{
	
	public function  __construct(){
		$this->load->database();
	}

	public function get_user($slug = false){
		
	}

	public function set_user(){
	$this->load->helper("url");

	$slug = url_title($this->input->post("user"),"dash",true);
	date_default_timezone_set('PRC');

	$data=array(
		"username"=>$this->input->post("user"),
		"password"=>md5($this->input->post("password")),
		"slug"=>$slug,
		"email"=>$this->input->post("email"),
		"status"=>1,
		"role"=>1,
		"regis_time"=>date("Y-m-d-H:i:s"),
		"regis_ip"=>$_SERVER["REMOTE_ADDR"]
		);
	return $this->db->insert("usr",$data);
	}

	public function set_code(){

		$vals = array(
   		'img_path'  => './captcha/',
   		'img_url'   => 'http://123.207.226.25/demo/captcha/',
   		'expiration'    => 10,
   		'word_length'   => 4,
   		'pool'      => '0123456789abcdefghijklmnopqrstuvwxyz'
  		);
		$cap = create_captcha($vals);
		$data = array(
  		'captcha_time'  => $cap['time'],
  		'ip_address'    => $_SERVER["REMOTE_ADDR"],
  		'word'      => $cap['word']
		);
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);

		return $cap;
	}

	public function commit_code(){

		$expiration = time() - 100; // Two hour limit
		$this->db->where('captcha_time < ', $expiration)
			 ->delete('captcha');

		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		return $row->count;
	}

	public function check_login(){
		$name = $this->input->post("user");
		$password = md5($this->input->post("password"));
		$query = $this->db->get_where("usr",array("username"=>$name, "password"=>$password));
		return $query->num_rows();
	}

	public function login_record(){
		$data=array(
		"last_time"=>date("Y-m-d-H:i:s"),
		"last_ip"=>$_SERVER["REMOTE_ADDR"]
		);
		$this->db->where("username",$this->input->post("user"));
		return  $this->db->update("usr",$data);
	}

	public function haha(){
		return  "haha";
	}
}

?>