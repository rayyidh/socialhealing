<?php
class Post extends CI_Controller {
	function index(){
	$this->load->model('admin/post_model');
	$data['post'] =$this->post_model->getall();
	$data['main_content']='admin/posts/post_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/post_model');
	$this->load->model('admin/category_model');
	$data['places'] =$this->post_model->getPlaces();
	$data['categories'] =$this->category_model->getchildcat(); 
 	$data['title'] = 'Add Post';
  	$data['main_content']='admin/posts/post_form';
	$this->load->view('admin/common/template',$data);
	}

	function edit($post_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/post_model');
	 // Get ID
	 if($post_id == NULL){ $post_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['post'] = $this->post_model->Get($post_id); 
	 $data['title'] = 'Edit Post';
	 $this->load->model('admin/category_model');
	$data['places'] =$this->post_model->getPlaces();
	$data['categories'] =$this->category_model->getchildcat(); 
	 $data['main_content']='admin/posts/post_form';
	 $this->load->view('admin/common/template',$data);
	}

	function save(){
		$this->load->model('admin/post_model');
		if($this->input->post('submit')){
		$post_id = $this->input->post('post_id');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('category_id','Category','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		$this->form_validation->set_rules('place_id','Place','trim|required');

		if($this->form_validation->run() == false){
		 // Validation failed
			if($post_id != NULL){
	      		return $this->edit($post_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
  		 // Create array for database fields & data
		// Now see if we are editing or adding
		    if($post_id != NULL){
		       // We have an ID, updating existing record 

		      $this->post_model->edit($post_id);
		    }
		    else {
		    
		    	// No ID, adding new record
		        $this->post_model->insert_post();
		    }
		}
		$this->index();

		}
	}
	function getchildpos(){
	$this->load->model('admin/post_model');
		$data['records'] =$this->post_model->getchildpos();
		$data['main_content']='admin/posts/post_form';
		$this->load->view('admin/common/template',$data);
	}
	function delete($post_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/post_model');
	 // Get ID
	if($post_id == NULL){ $post_id = $this->url->segment(3); }
	$this->post_model->delete($post_id);
	$this->index();
	}	

}
?>