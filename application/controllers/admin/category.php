<?php
class Category extends CI_Controller {
	function index(){
	$this->load->model('admin/category_model');
	$data['category'] =$this->category_model->getall();
	$data['main_content']='admin/category/category_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/category_model');
	$data['childcat'] =$this->category_model->getparent();  
 	$data['title'] = 'Add Category';
  	$data['main_content']='admin/category/category_form';
	$this->load->view('admin/common/template',$data);
	}


	function edit($category_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/category_model');
	 // Get ID
	 if($category_id == NULL){ $category_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['category'] = $this->category_model->Get($category_id);
	 $parent=$this->category_model->Get($category_id);

	 
	 $data['parentcat'] =$this->category_model->getparent();  
	 $data['title'] = 'Edit Category';
	 $data['main_content']='admin/category/category_form';
	 $this->load->view('admin/common/template',$data);
	}

	function save(){
		$this->load->model('admin/category_model');
		if($this->input->post('submit')){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Category Name','trim|required');
		$this->form_validation->set_rules('parent_id','Parent Category','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
		$category_id = $this->input->post('category_id');

		if($this->form_validation->run() == false){
		 // Validation failed
			if($category_id != NULL){
	      		return $this->edit($category_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
  		 // Create array for database fields & data
		$category=array(
			'name' =>$this->input->post('name'),
			'parent_id' =>$this->input->post('parent_id'),
			'description' =>$this->input->post('description'),
			
			);
		// Now see if we are editing or adding
	    if($category_id != NULL){
	      // No ID, adding new record

	      $this->category_model->edit($category_id,$category);
	    }
	    else {
	      // We have an ID, updating existing record
	        $this->category_model->insert_category($category);
	    }
	}
		$this->index();

		}
	}
	function getchildcat(){
	$this->load->model('admin/category_model');
		$data['records'] =$this->category_model->getchildcat();
		$data['main_content']='admin/category/category_form';
		$this->load->view('admin/common/template',$data);
	}
	function delete($category_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/category_model');
	 // Get ID
	if($category_id == NULL){ $category_id = $this->url->segment(3); }
	$this->category_model->delete($category_id);
	$this->index();
	}	

}
?>