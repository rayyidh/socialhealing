<?php
class Events_model extends CI_Model {
	var $gallery_path;
	var $gallery_path_url;

	function __construct()
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../images/event/');
		$this->gallery_path_url = base_url().'images/event/';
	}

	function index()
	{
		$this->load->view('admin/event/event_form', array('error' => ' ' ));
	}
	function insert_event(){
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		$this->upload->do_upload();
		$image_data = $this->upload->data();
		
		    $config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'maintain_ration' => true,
			'width' => 150,
			'height' => 100
		);
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();  

		$events=array(
			'org_name' =>$this->input->post('org_name'),
			'org_email' =>$this->input->post('org_email'),
			'event_name' =>$this->input->post('event_name'),
			'county_id' =>$this->input->post('place_id'),
			'venue' =>$this->input->post('venue'),
			'start_date' =>$this->input->post('start_date'),
			'end_date' =>$this->input->post('end_date'),
			'time' =>$this->input->post('time'),
			'description' =>$this->input->post('desc'),
			'image' =>$image_data['file_name']
			);
		$insert =$this->db->insert('events',$events);
		return $insert;	

	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('events');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('event_id', $id);
	    $this->db->limit('1');
	    $query = $this->db->get();
	    if( $query->num_rows() == 1 ){
	      // One row, match!
	      return $query->row();        
	    } else {
	      // None
	      return false;
	    }
	  	}
	  	else {
	    // Get all
	    $query = $this->db->get();
	    if($query->num_rows() > 0){
	      // Got some rows, return as assoc array
	      return $query->result();
	    } else {
	      // No rows
	      return false;
	    }
	  }

	}

	function edit($id){
		$config = array(
				'allowed_types' => 'jpg|jpeg|gif|png',
				'upload_path' => $this->gallery_path,
				'max_size' => 2000
			);
			
			$this->load->library('upload', $config);
			$this->upload->do_upload();
			$image_data = $this->upload->data();
			
			    $config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 150,
				'height' => 100
			);
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();  

			$events=array(
				'org_name' =>$this->input->post('org_name'),
				'org_email' =>$this->input->post('org_email'),
				'event_name' =>$this->input->post('event_name'),
				'county_id' =>$this->input->post('place_id'),
				'venue' =>$this->input->post('venue'),
				'start_date' =>$this->input->post('start_date'),
				'end_date' =>$this->input->post('end_date'),
				'time' =>$this->input->post('time'),
				'description' =>$this->input->post('desc'),
				'image' =>$image_data['file_name']
				);
	  $this->db->where('event_id', $id);
	  $result = $this->db->update('events', $events);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($event_id){
	  $this->db->where('event_id',$event_id);
	  $this->db->delete('events');
	  // Return
	} 
	function getall() {
		$this->db->order_by("date_added", "desc");
		$query=$this->db->get('events');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getevent($event_id) {
		$data=array();
		$this->db->where('event_id','event_id');
		$query=$this->db->get('events');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	

}