<?php
class Home extends CI_Controller {
	function index(){
		$this->load->model('category_model');
		$data['parent'] =$this->category_model->getparent();
		$data['main_content']='admin/welcome';
		$this->load->view('admin/common/template',$data);
	}
	function category(){
		$data['main_content']='admin/category';
		$this->load->view('admin/common/template',$data);	
	}

}