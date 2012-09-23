<?php
class Members extends CI_Controller {
	function index(){
	$this->load->model('admin/members_model');
	$data['members'] =$this->members_model->getall();
	$data['main_content']='admin/members/members_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/members_model');
	//$data['childcat'] =$this->category_model->getparent();  
 	$data['title'] = 'Add Members';
  	$data['main_content']='admin/members/memebers_form';
	$this->load->view('admin/common/template',$data);
	}


	function edit($members_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/members_model');
	 // Get ID
	 if($members_id == NULL){ $members_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['members'] = $this->members_model->Get($members_id);
	 //$data['childcat'] =$this->category_model->getparent();  
	 $data['title'] = 'Edit Members';
	 $data['main_content']='admin/members/members_form';
	 $this->load->view('admin/common/template',$data);
	}

	function save(){
		$this->load->model('admin/members_model');
		if($this->input->post('submit')){
		$members_id = $this->input->post('members_id');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Members Name','trim|required');
		$this->form_validation->set_rules('user_id','User Category','trim|required');
		$this->form_validation->set_rules('username','Username','trim|required');

		if($this->form_validation->run() == false){
		 // Validation failed
			if($members_id != "X"){
	      		return $this->edit($members_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
  		 // Create array for database fields & data
		$members=array(
			'name' =>$this->input->post('name'),
			'user_id' =>$this->input->post('user_id'),
			'username' =>$this->input->post('username'),
			
			);
		// Now see if we are editing or adding
	    if($members_id != NULL){
	      // No ID, adding new record

	      $this->members_model->edit($members_id,$members);
	    }
	    else {
	      // We have an ID, updating existing record
	        $this->members_model->insert_members($members);
	    }
	}
		$this->index();

		}
	}
	function getchildmem(){
	$this->load->model('admin/members_model');
		$data['records'] =$this->members_model->getchildmem();
		$data['main_content']='admin/members/members_form';
		$this->load->view('admin/common/template',$data);
	}
	function delete($members_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/members_model');
	 // Get ID
	if($members_id == NULL){ $members_id = $this->url->segment(3); }
	$this->members_model->delete($members_id);
	$this->index();
	}	

}
?>