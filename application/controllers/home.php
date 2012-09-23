<?php
class Home extends CI_Controller {
	function index(){
		$this->load->model('category_model');
		$this->load->model('events_model');
		$data['parent'] =$this->category_model->getparent();
		$data['crime'] =$this->category_model->getcrime();
		$data['politics'] =$this->category_model->getpolitic();
		$data['religion'] =$this->category_model->getreligion();
		$data['resdis'] =$this->category_model->getresdis();
		$data['tricon'] =$this->category_model->gettricon();
		$data['natharz'] =$this->category_model->getnatharz();
		$data['wars'] =$this->category_model->getwars();
		$data['others'] =$this->category_model->getothers();
		$this->load->model('post_model');
		$this->load->model('comment_model');
		$data['comments'] =$this->comment_model->get_comment();
		$data['places'] =$this->post_model->getPlaces();
		$data['events'] =$this->events_model->getrecentevents();
		$data['popular'] =$this->post_model->getpopposts();
		$data['main_content']='common/slideshow';
		$this->load->view('common/template',$data);
	}
	function latest(){
		$this->load->model('category_model');
		$data['parent'] =$this->category_model->getparent();
		$data['crime'] =$this->category_model->getcrime();
		$data['politics'] =$this->category_model->getpolitic();
		$data['religion'] =$this->category_model->getreligion();
		$data['resdis'] =$this->category_model->getresdis();
		$data['tricon'] =$this->category_model->gettricon();
		$data['natharz'] =$this->category_model->getnatharz();
		$data['wars'] =$this->category_model->getwars();
		$data['others'] =$this->category_model->getothers();
		$this->load->model('post_model');
		$this->load->model('events_model');
		$data['events'] =$this->events_model->getrecentevents();
		$data['places'] =$this->post_model->getPlaces();
		$data['popular'] =$this->post_model->getlatestposts();
		$data['main_content']='common/popular';
		$this->load->view('common/template',$data);
	}
	function comment(){
		$this->load->model('category_model');
		$data['parent'] =$this->category_model->getparent();
		$data['crime'] =$this->category_model->getcrime();
		$data['politics'] =$this->category_model->getpolitic();
		$data['religion'] =$this->category_model->getreligion();
		$data['resdis'] =$this->category_model->getresdis();
		$data['tricon'] =$this->category_model->gettricon();
		$data['natharz'] =$this->category_model->getnatharz();
		$data['wars'] =$this->category_model->getwars();
		$data['others'] =$this->category_model->getothers();
		$this->load->model('comment_model');
		$data['comments'] =$this->comment_model->get_comment();
		$this->load->model('events_model');
		$data['events'] =$this->events_model->getrecentevents();
		$data['main_content']='common/comment';
		$this->load->view('common/template',$data);
	}

}