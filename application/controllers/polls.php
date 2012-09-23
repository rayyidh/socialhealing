<?php
class Polls extends CI_Controller {
	function index(){
	$this->load->model('category_model');
	$data['crime'] =$this->category_model->getcrime();
	$data['parent'] =$this->category_model->getparent();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$this->load->model('post_model');
	$data['popular'] =$this->post_model->getpopposts();
	$data['main_content']='polls/polls_list';
	$this->load->view('common/template',$data);	
	}

}
?>