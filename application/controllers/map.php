<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Map extends CI_Controller {
	function __construct()
	{
	parent::__construct();
	}
	function index()
	{
	// Load the library
	$this->load->library('googlemaps');
	// Load our model
	$this->load->model('map_model', '', TRUE);
	// Initialize the map, passing through any parameters
	$config['center'] = 'Kenya';
	$config['zoom'] = "auto";
	$this->googlemaps->initialize($config);


	// Get the co-ordinates from the database using our model
	$coords = $this->map_model->get_coord();
	// Loop through the coordinates we obtained above and add them to the map
	foreach ($coords as $coordinate) {
	$marker = array();
	$marker['position'] = $coordinate->lat.','.$coordinate->lon;
	$marker['title'] = $coordinate->post_title;
	$marker['infowindow_content'] = $coordinate->description;
	$this->googlemaps->add_marker($marker);
	}
	// Create the map
	$data = array();
	$data['map'] = $this->googlemaps->create_map();
	// Load our view, passing through the map data
	$this->load->model('category_model');
	$data['parent'] =$this->category_model->getparent();
	$data['crime'] =$this->category_model->getcrime();
	$data['politics'] =$this->category_model->getpolitic();
	$data['religion'] =$this->category_model->getreligion();
	$data['resdis'] =$this->category_model->getresdis();
	$data['tricon'] =$this->category_model->gettricon();
	$data['natharz'] =$this->category_model->getnatharz();
	$data['wars'] =$this->category_model->getwars();
	$data['others'] =$this->category_model->getothers();
	$this->load->model('post_model');
	$data['places'] =$this->post_model->getPlaces();
	$data['popular'] =$this->post_model->getpopposts();
	$data['main_content']='common/georss';
	$this->load->view('common/template',$data);
}
}