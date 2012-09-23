<?php
class Quotes extends CI_Controller {
	function index(){
	$this->load->model('admin/quotes_model');
	$data['quotes'] =$this->quotes_model->getall();
	$data['main_content']='admin/quotes/quotes_list';
	$this->load->view('admin/common/template',$data);		
	}
	function add(){
	$this->load->helper('field');
	$this->load->model('admin/quotes_model');
	//$data['childcat'] =$this->category_model->getparent();  
 	$data['title'] = 'Add Quotes';
  	$data['main_content']='admin/quotes/quotes_form';
	$this->load->view('admin/common/template',$data);
	}


	function edit($quote_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/quotes_model');
	 // Get ID
	 if($quote_id == NULL){ $quote_id = $this->url->segment(3); }
	 // Load view
	 // Get department info by ID
	 $data['quotes'] = $this->quotes_model->Get($quote_id);
	 //$data['childcat'] =$this->category_model->getparent();  
	 $data['title'] = 'Edit Quotes';
	 $data['main_content']='admin/quotes/quotes_form';
	 $this->load->view('admin/common/template',$data);
	}

	function save(){
		$this->load->model('admin/quotes_model');
		if($this->input->post('submit')){
		$quotes_id = $this->input->post('quote_id');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Quotes Name','trim|required');
		$this->form_validation->set_rules('admin_id','Admin Category','trim|required');
		$this->form_validation->set_rules('quote','Quotes','trim|required');

		if($this->form_validation->run() == false){
		 // Validation failed
			if($quote_id != "X"){
	      		return $this->edit($quote_id);
	    	} else {
	      		return $this->add();
	    	}
		}
		else{
		// Validation succeeded!
  		 // Create array for database fields & data
		$category=array(
			'name' =>$this->input->post('name'),
			'quote_id' =>$this->input->post('quote_id'),
			'quote' =>$this->input->post('quote'),
			
			);
		// Now see if we are editing or adding
	    if($quote_id != NULL){
	      // No ID, adding new record

	      $this->quotes_model->edit($quote_id,$quotes);
	    }
	    else {
	      // We have an ID, updating existing record
	        $this->quotes_model->insert_quote($quotes);
	    }
	}
		$this->index();

		}
	}
	
	function delete($quote_id = NULL){
	$this->load->helper('field');
	$this->load->model('admin/quotes_model');
	 // Get ID
	if($quote_id == NULL){ $quote_id = $this->url->segment(3); }
	$this->quotes_model->delete($quote_id);
	$this->index();
	}	

}
?>