<?php
class Quotes_model extends CI_Model {

	function insert_quote($quotes){
		$insert =$this->db->insert('quotes',$quotes);
		return $insert;
	}

	function Get($id){
	  $this->db->select('*');
	  $this->db->from('quotes');
	  // Check if we're getting one row or all records
	  if($id != NULL){
	    // Getting only ONE row
	    $this->db->where('quote_id', $id);
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
	  $this->db->where('quote_id', $id);
	  $result = $this->db->update('quotes', $data);
	  // Return
	  if($result){
	    return $id;
	  } else {
	    return false;
	  }
	} 
	function delete($quote_id){
	  $this->db->where('quote_id',$quote_id);
	  $this->db->delete('quotes');
	  // Return
	} 
	

	function getall() {
		$data=array();
		$query=$this->db->get('quotes');

			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;

	}
	

}