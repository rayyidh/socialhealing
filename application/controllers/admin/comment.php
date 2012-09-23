<?php
class Comment extends CI_Controller {
	function index(){
	$this->load->model('admin/comment_model');
	$data['comment'] =$this->comment_model->getall();
	$data['main_content']='admin/comment/comment_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/category_model');
	$data['childcat'] =$this->category_model->getparent();  
 	$data['title'] = 'Add Category';
  	$data['main_content']='admin/comment/comment_form';
	$this->load->view('admin/common/template',$data);
	}


	function edit($comment_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/comment_model');
	 // Get ID
	 if($comment_id == NULL){ $comment_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['comment'] = $this->comment_model->Get($comment_id);
	// $data['parentcat'] =$this->comment_model->getparent();  
	 $data['title'] = 'Edit Comment';
	 $data['main_content']='admin/comment/comment_form';
	 $this->load->view('admin/common/template',$data);
	}


	function save(){
		$this->load->model('admin/comment_model');
		if($this->input->post('submit')){
		$comment_id = $this->input->post('comment_id');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('comm','Comment','trim|required');

		if($this->form_validation->run() == false){
		 // Validation failed
			if($comment_id != NULL){
	      		return $this->edit($comment_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
  		 // Create array for database fields & data
		$comment=array(
			'comment' =>$this->input->post('comm'),
			
			);
		// Now see if we are editing or adding
	    if($comment_id != NULL){
	      // No ID, adding new record

	      $this->comment_model->edit($comment_id,$comment);
	    }
	    else {
	      // We have an ID, updating existing record
	        $this->comment_model->insert_comment($comment);
	    }
	}
		$this->index();

		}
	}
	function getchildcom(){
	$this->load->model('admin/comment_model');
		$data['records'] =$this->comment_model->getchildcom();
		$data['main_content']='admin/comment/comment_form';
		$this->load->view('admin/common/template',$data);
	}
	function delete($comment_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/comment_model');
	 // Get ID
	if($comment_id == NULL){ $comment_id = $this->url->segment(3); }
	$this->comment_model->delete($comment_id);
	$this->index();
	}	

}
?>