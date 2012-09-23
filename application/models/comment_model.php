<?php
class Comment_model extends CI_Model {
	function add_new_comment()
	{
		$data = array(
			'user_id'=>$this->session->userdata('user_id'),
			'post_id'=>$this->input->post('post_id'),
			'category'=>$this->input->post('category'),
			'comment'=>$this->input->post('comment'),
		);
		$this->db->insert('comment',$data);
	}
	function get_post_comment($post_id)
	{
		$this->db->select('*');
		$this->db->where('post_id',$post_id);
		$this->db->where('category','post');
		$this->db->from('comment');
		$this->db->join('users', 'users.user_id = comment.user_id');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
		foreach ($query->result() as $row) {
		 $data[]= $row;
		}
		return $data;
	    }
	}
	function get_comment()
	{
	
		$query = $this->db->query("SELECT * FROM comment c LEFT JOIN users u ON (c.user_id = u.user_id)ORDER BY c.date_added DESC LIMIT 5");
			if($query->num_rows() > 0){

			foreach ($query->result() as $row) {
				# code...
				$data[]= $row;	
			}
				
		}
		return $data;
	}
	function get_event_comment($event_id)
	{
		$this->db->where('post_id',$event_id);
		$this->db->where('category','events');
		$query = $this->db->get('comment');
		return $query->result();
	}
	
	function total_post($id)
	{
		$this->db->like('post_id', $id);
		$this->db->where('category','post');
		$this->db->from('comment');
		return $this->db->count_all_results();
	}
	function total_event($id)
	{
		$this->db->like('post_id', $id);
		$this->db->where('category','events');
		$this->db->from('comment');
		return $this->db->count_all_results();
	}

}