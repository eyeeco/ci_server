<?php
class News_model extends CI_Model{
	public function  __construct(){
		$this->load->database();
	}

public function get_category(){
	$query = $this->db->query("select * from category");
	return $query->result();
}

public function get_ca1($slug = 1){
	$query = $this->db->get_where("category",array("category_id"=>$slug));
	return $query->result();
}

public function get_ca2($slug = 1){
	$query = $this->db->get_where("category2",array("category_id"=>$slug));
	return $query->result();
}

public function view_up($id ){
	$query = $this->db->get_where("article",array("id"=>$id));
	$re = $query->result();
    $overview = get_object_vars($re[0])["overview"];
    $overview++;
    $data=array(
		"overview"=>$overview,
		);
		$this->db->where("id",$id);
		return  $this->db->update("article",$data);
}


//得到一篇文章所有的赞数
public function get_thumbs_up($slug1 = false){

	$data = array(
		"article_id"=>$slug1,
	//	"usr"=>$this->session->userdata('user'),
		"ca1"=>1
		);
	$query = $this->db->get_where("usr_link",$data);
	return $query->num_rows();

}

//不让一个用户一直点赞
public function get_thumbs($slug1 = false){

	$data = array(
		"article_id"=>$slug1,
		"usr"=>$this->session->userdata('user'),
		"ca1"=>1
		);
	$query = $this->db->get_where("usr_link",$data);
	return $query->num_rows();

}
//用户点赞刷新该表
public function flash_up($id){
	$query = $this->db->get_where("article",array("id"=>$id));
	$re = $query->result();
    $thumbs = get_object_vars($re[0])["thumbs_up"];
    $thumbs++;
    $data=array(
		"thumbs_up"=>$thumbs,
		);
		$this->db->where("id",$id);
		return  $this->db->update("article",$data);
}

public function thumbs_up($slug1 = false,$slug2 = false){

	$data = array(
		"article_id"=>$slug1,
		"usr"=>$this->session->userdata('user'),
		"ca1"=>1
		);
	return $this->db->insert("usr_link",$data);

}

public function get_news($slug1 = false,$slug2 = false){
	

	if($slug1 ==false&&$slug2 ==false){
		$query = $this->db->get_where("article",array("category2"=>1));
		return $query->result();
	}

	if($slug2 ==false){
		$query = $this->db->get_where("article",array("category2"=>$slug1));
		return $query->result();
	}

	$query = $this->db->get_where("article",array("category1"=>$slug2,"category2"=>$slug1));
	return $query->result();
}

public function get_news_byid($id = false){
	

	if($id ==false){
		$query = $this->db->query("select * from article");
		return $query->result();
	}

	$query = $this->db->get_where("article",array("id"=>$id));
	return $query->result();
}

public function get_news_by_name($name = false){
	

	if($name ==false){
		$query = $this->db->query("select * from article");
		return $query->result();
	}

	$query = $this->db->get_where("article",array("name"=>$name));
	return $query->result_array();
}

public function set_news(){
	$this->load->helper("url");
	date_default_timezone_set('PRC');
	$data = array(
		"name"=>$this->input->post("title"),
		"author"=>$this->session->userdata('user'),
		"http"=>".",
		"date"=>date("Y-m-d-H:i:s"),
		"text"=>$this->input->post("text"),
		"category1"=>$this->input->post("category1"),
		"category2"=>$this->input->post("category2"),
		"category3"=>$this->input->post("category3")
		);
	return $this->db->insert("article",$data);
}

}
?>