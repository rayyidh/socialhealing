<?php
	class Map_model extends CI_Model {
	function __construct()
	{
	parent::__construct();
	}
	function get_places()
	{
		$query = $this->db->get('places');
		if ($query->num_rows()>0) {
		foreach ($query->result() as $row) {
		 $data[]= $row;
		}
	return $data;
    }
	}
    function get_coord()
	{
		$query = $this->db->query("SELECT * FROM posts c LEFT JOIN places u ON (c.place_id = u.place_id) ORDER BY c.date_added DESC LIMIT 5");
		if ($query->num_rows()>0) {
		foreach ($query->result() as $row) {
		 $data[]= $row;
		}
	return $data;
    }
	}
}