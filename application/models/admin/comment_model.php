<?php
class Comment_model extends CI_Model {

	function insert_comment($comment){
		$insert =$this->db->insert('comment',$comment);
		return $insert;
	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('comment');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('comment_id', $id);
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
	  $this->db->where('comment_id', $id);
	  $result = $this->db->update('comment', $data);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($comment_id){
	  $this->db->where('comment_id',$comment_id);
	  $this->db->delete('comment');
	  // Return
	} 
	function getall() {
		$query=$this->db->get('comment');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	function getcomment($comment_id) {
		$data=array();
		$this->db->where('comment_id','comment_id');
		$query=$this->db->get('comment');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
}

