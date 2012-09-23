<?php
class News extends CI_Controller {
	function index(){
	$this->load->model('category_model');
	$data['crime'] =$this->category_model->getcrime();
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
	$data['news'] =$this->news_model->getall();
	$data['main_content']='news/news_list';
	$this->load->view('common/template',$data);		
	}

	function newscat($category_id = NULL){
	$this->load->model('category_model');
	$data['crime'] =$this->category_model->getcrime();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$data['others'] =$this->category_model->getothers();
	$this->load->helper('field');
	$this->load->model('news_model');
	 // Get ID
	if($category_id == NULL){ $category_id = $this->url->segment(3); }
	$data['news'] =$this->news_model->getnews($category_id);
	$data['main_content']='news/news_list';
	$this->load->view('common/template',$data);		
	}

	function insert(){
	$this->load->model('category_model');
	$data['crime'] =$this->category_model->getcrime();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$data['others'] =$this->category_model->getothers();
	$this->load->model('news_model');
	$data['places'] =$this->news_model->getPlaces();
	$data['categories'] =$this->category_model->getchildcat();
	$data['main_content']='post/post_form';
	$this->load->view('common/template',$data);	
	}

	function add_post(){
		$this->load->model('category_model');
		$data['crime'] =$this->category_model->getcrime();
		$data['politics'] =$this->category_model->getpolitic();
		$data['religion'] =$this->category_model->getreligion();
		$data['resdis'] =$this->category_model->getresdis();
		$data['tricon'] =$this->category_model->gettricon();
		$data['natharz'] =$this->category_model->getnatharz();
		$data['wars'] =$this->category_model->getwars();
		$data['others'] =$this->category_model->getothers();
		$this->load->model('news_model');
		$data['places'] =$this->news_model->getPlaces();
		$data['categories'] =$this->category_model->getchildcat();
		if($this->input->post('submit')){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('category_id','Category','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		$this->form_validation->set_rules('place_id','Place','trim|required');

		if($this->form_validation->run() == false){
		$data['main_content']='post/post_form';
		$this->load->view('common/template',$data);	
		}
		else{

		$this->load->model('news_model');
		$this->news_model->insert_news();
		$this->index();

		}
	 }
	}
}