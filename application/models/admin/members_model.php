<?php
class Members_model extends CI_Model {

	function insert_members($members){
		$insert =$this->db->insert('users',$members);
		return $insert;
	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('users');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('user_id', $id);
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
	  $this->db->where('user_id', $id);
	  $result = $this->db->update('users', $data);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($members_id){
	  $this->db->where('user_id',$members_id);
	  $this->db->delete('users');
	  // Return
	} 
	function getall() {
		$data =array();
		$query=$this->db->get('users');


			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function getmembers($members_id) {
		$data=array();
		$this->db->where('user_id','user_id');
		$query=$this->db->get('users');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getusername() {
		$this->db->where('user_id',0);
		$query=$this->db->get('users');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}

	

}