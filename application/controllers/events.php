<?php
class Events extends CI_Controller {
	function index(){
	$this->load->model('category_model');
	$this->load->model('events_model');
	$data['crime'] =$this->category_model->getcrime();
	$data['parent'] =$this->category_model->getparent();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$data['others'] =$this->category_model->getothers();
	$data['events'] =$this->events_model->getevents();
	$this->load->model('post_model');
	$data['popular'] =$this->post_model->getpopposts();
	$data['main_content']='event/event_list';
	$this->load->view('common/template',$data);	

	}
	function pastevent(){
	$this->load->model('category_model');
	$this->load->model('events_model');
	$data['crime'] =$this->category_model->getcrime();
	$data['parent'] =$this->category_model->getparent();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$data['others'] =$this->category_model->getothers();
	$data['events'] =$this->events_model->getpastevents();
	$this->load->model('post_model');
	$data['popular'] =$this->post_model->getpopposts();
	$data['main_content']='event/past_events';
	$this->load->view('common/template',$data);	

	}
	function postevent(){
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
	$this->load->model('post_model');
	$data['popular'] =$this->post_model->getpopposts();
	$data['places'] =$this->post_model->getPlaces();
	$data['main_content']='event/event_form';
	$this->load->view('common/template',$data);	
	}
	function add_event(){
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
		$data['others'] =$this->category_model->getothers();
		$this->load->model('post_model');
		$data['places'] =$this->post_model->getPlaces();
		if($this->input->post('submit')){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('org_name','Organisation Name','trim|required');
		$this->form_validation->set_rules('org_email','Organisation Email','trim|required');
		$this->form_validation->set_rules('event_name','Event Name','trim|required');
		$this->form_validation->set_rules('place_id','County','trim|required');
		$this->form_validation->set_rules('time','Time','trim|required');
		$this->form_validation->set_rules('venue','Venue','trim|required');
		$this->form_validation->set_rules('start_date','Start Date','trim|required');
		$this->form_validation->set_rules('end_date','End Date','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');

		if($this->form_validation->run() == false){
		$data['main_content']='event/event_form';
		$this->load->view('common/template',$data);	
		}
		else{

		$this->load->model('events_model');
		$this->events_model->insert_event();
		$this->index();

		}
	 }
	 }
	else{
	redirect('login');
	}
	}
}
?>