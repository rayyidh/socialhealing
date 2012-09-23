<?php
class Post_model extends CI_Model {
	var $gallery_path;
	var $gallery_path_url;

	function __construct()
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../images/upload/');
		$this->gallery_path_url = base_url().'images/upload/';
	}

	function index()
	{
		$this->load->view('admin/post/post_form', array('error' => ' ' ));
	}

	function insert_post(){
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

		$posts=array(
			'post_title' =>$this->input->post('title'),
			'category_id' =>$this->input->post('category_id'),
			'description' =>$this->input->post('desc'),
			'place_id' =>$this->input->post('place_id'),
			'image' =>$image_data['file_name']
			);
		$insert =$this->db->insert('posts',$posts);
		return $insert;	

	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('posts');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('post_id', $id);
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

		$posts=array(
			'post_title' =>$this->input->post('title'),
			'category_id' =>$this->input->post('category_id'),
			'description' =>$this->input->post('desc'),
			'place_id' =>$this->input->post('place_id'),
			'image' =>$image_data['file_name']
			);
	  $this->db->where('post_id', $id);
	  $result = $this->db->update('posts', $posts);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($post_id){
	  $this->db->where('post_id',$post_id);
	  $this->db->delete('posts');
	  // Return
	} 
	function getall() {
		$this->db->order_by("date_added", "desc");
		$query=$this->db->get('posts');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getpost($post_id) {
		$data=array();
		$this->db->where('post_id','post_id');
		$query=$this->db->get('posts');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getpos() {
		$this->db->where('parent_id',0);
		$query=$this->db->get('posts');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getPlaces() {
		$query=$this->db->get('places');
			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$places[]= $row;	
			}
				
		}
		return $places;
	}

	
}