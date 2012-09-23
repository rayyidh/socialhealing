<?php
class Comment extends CI_Controller {

	function index(){

	}

	function commpost($post_id = NULL){
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
		$this->load->model('comment_model');
		$data['popular'] =$this->post_model->getpopposts();
		 // Get ID
		if($post_id == NULL){ $post_id = $this->url->segment(3); }
		$data['comments'] = $this->comment_model->get_post_comment($post_id);
		$data['post_id'] = $post_id;
		$data['total_comments'] = $this->comment_model->total_post($post_id);
		$data['posts'] =$this->post_model->getpostbyid($post_id);
		$this->post_model->getpostsview($post_id);
		$data['main_content']='post/comment';
		$this->load->view('common/template',$data);
	}
	function commevent($event_id = NULL){
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
		$this->load->model('events_model');
		$this->load->model('comment_model');
		$this->load->model('post_model');
		$data['popular'] =$this->post_model->getpopposts();
		 // Get ID
		if($event_id == NULL){ $event_id = $this->url->segment(3); }
		$data['comments'] = $this->comment_model->get_event_comment($event_id);
		$data['event_id'] = $event_id;
		$data['total_comments'] = $this->comment_model->total_event($event_id);
		$data['events'] =$this->events_model->geteventsbyid($event_id);
		$data['main_content']='event/comment';
		$this->load->view('common/template',$data);
	}	
	function add_post_comm(){
		if($this->session->userdata('validated')){
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
		$data['places'] =$this->post_model->getPlaces();
		$data['categories'] =$this->category_model->getchildcat();
		if($this->input->post('submit')){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment','Comment','trim|required');
		$post_id=$this->input->post('post_id');

		if($this->form_validation->run() == false){
		$data['main_content']='post/comment';
		$this->load->view('common/template',$data);	
		}
		else{
		$this->load->model('comment_model');
		$this->comment_model->add_new_comment();
		$this->commpost($post_id);
		}
	 	}
	 }
	 else{
		redirect('login');
		}
	}
	function add_event_comm(){
		if($this->session->userdata('validated')){
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
		$data['places'] =$this->post_model->getPlaces();
		$data['categories'] =$this->category_model->getchildcat();
		if($this->input->post('submit')){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comment','Comment','trim|required');
		$event_id=$this->input->post('post_id');

		if($this->form_validation->run() == false){
		$data['main_content']='event/comment';
		$this->load->view('common/template',$data);	
		}
		else{

		$this->load->model('comment_model');
		$this->comment_model->add_new_comment();
		$this->commevent($event_id);

		}
	 }
	}
	 else{
		redirect('login');
		}
	  }

}