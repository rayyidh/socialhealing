<?php
class Category_model extends CI_Model {

	function insert_category($category){
		$insert =$this->db->insert('category',$category);
		return $insert;
	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('category');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('category_id', $id);
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

	function edit($id, $data){
	  $this->db->where('category_id', $id);
	  $result = $this->db->update('category', $data);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($category_id){
	  $this->db->where('category_id',$category_id);
	  $this->db->delete('category');
	  // Return
	} 
	function getall() {
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getparentname($category_id) {
		$data=array();
		$this->db->where('category_id','category_id');
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}

	function getcategory($category_id) {
		$data=array();
		$this->db->where('category_id','category_id');
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getparent() {
		$this->db->where('parent_id',0);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}

	function getcrime() {
		$this->db->where('parent_id',1);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getpolitic() {
		$this->db->where('parent_id',3);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getreligion() {
		$data=array();
		$this->db->where('parent_id',4);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getresdis() {
		$data=array();
		$this->db->where('parent_id',5);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function gettricon() {
		$data=array();
		$this->db->where('parent_id',11);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getnatharz() {
		$data=array();
		$this->db->where('parent_id',12);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getwars() {
		$data=array();
		$this->db->where('parent_id',13);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getothers() {
		$data=array();
		$this->db->where('parent_id',30);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getchildcat() {
		$this->db->where('parent_id >',0);
		$query=$this->db->get('category');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}

}