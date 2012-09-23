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
		$this->load->view('event/event_form', array('error' => ' ' ));
	}
	public function getevents() {
		$data=array();
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
	public function getpastevents() {
		$data=array();
		$this->db->order_by("end_date", 'asc');  
		$query=$this->db->get('events');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	public function getrecentevents() {
		$data=array();
		$this->db->order_by("date_added", "desc"); 
		$this->db->limit('5');
		$query=$this->db->get('events');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function geteventsbyid($event_id) {
		
		$data=array();
		$this->db->where('event_id',$event_id);
		$query=$this->db->get('events');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
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

}