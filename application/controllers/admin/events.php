<?php
class Events extends CI_Controller {
	function index(){
	$this->load->model('admin/events_model');
	$data['event'] =$this->events_model->getall();
	$data['main_content']='admin/events/events_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/events_model');
	//$data['childcat'] =$this->category_model->getparent();  
 	$data['title'] = 'Add Event';
 	$this->load->model('admin/events_model');
 	$this->load->model('admin/post_model');
	$data['places'] =$this->post_model->getPlaces();
	//$data['places'] =$this->events_model->getPlaces();
  	$data['main_content']='admin/events/events_form';
	$this->load->view('admin/common/template',$data);
	}


	function edit($event_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/events_model');
	 // Get ID
	 if($event_id == NULL){ $event_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['event'] = $this->events_model->Get($event_id);
	 //$data['childcat'] =$this->category_model->getparent();  
	 $data['title'] = 'Edit Event';
	 $this->load->model('admin/events_model');
	 $this->load->model('admin/post_model');
	 $data['places'] =$this->post_model->getPlaces();
	 $data['main_content']='admin/events/events_form';
	 $this->load->view('admin/common/template',$data);
	}

	function save(){
		$this->load->model('admin/events_model');
		if($this->input->post('submit')){
		$event_id = $this->input->post('event_id');
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
		 // Validation failed
			if($event_id != NULL){
	      		return $this->edit($event_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
		// Now see if we are editing or adding
	    if($event_id != NULL){
	      // No ID, adding new record

	      $this->events_model->edit($event_id);
	    }
	    else {
	      // We have an ID, updating existing record
	        $this->events_model->insert_event();
	    }
	}
		$this->index();

		}
	}
	function getchildev(){
	$this->load->model('admin/events_model');
		$data['records'] =$this->events_model->getchildev();
		$data['main_content']='admin/events/events_form';
		$this->load->view('admin/common/template',$data);
	}
	function delete($event_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/events_model');
	 // Get ID
	if($event_id == NULL){ $event_id = $this->url->segment(3); }
	$this->events_model->delete($event_id);
	$this->index();
	}	

}
?>