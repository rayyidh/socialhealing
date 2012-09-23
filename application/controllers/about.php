<?php
class About extends CI_Controller {

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
	$data['others'] =$this->category_model->getothers();
	$this->load->helper('field');
	$this->load->model('post_model');
	 // Get ID
	$data['posts'] =$this->post_model->getall();
	$data['places'] =$this->post_model->getPlaces();
	$this->load->model('events_model');
	$data['events'] =$this->events_model->getrecentevents();
	$data['popular'] =$this->post_model->getlatestposts();
	$data['main_content']='common/about';
	$this->load->view('common/template',$data);		
	}
}