<?php
class Contact extends CI_Controller {
	function index(){
		$this->load->model('category_model');
		$data['parent'] =$this->category_model->getparent();
		$data['main_content']='common/contact';
		$this->load->view('admin/common/template',$data);
	}
}