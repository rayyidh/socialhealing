<?php
class Users extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    function index(){
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
	$data['main_content']='users/register';
	$this->load->view('common/template',$data);
	
	}
    
    function another_page() // just for sample
    {
        echo 'good. you\'re logged in.';
    }
    function signup(){
		$data['main_content']='users/register';
		$this->load->view('common/template',$data);
	}
    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
	function validate_credentials(){
		$this->load->model('members_model');
		$query=$this->members_model->validate();
		if($query) //if the user's credential validated
		{
			$data=array(
				'email' => $this->input->post('email'),
				'is_logged_in' =>true
				);
			$this->session->set_userdata($data);
			$this->index();
		}
		else
		{
			$this->index();
		}
	}
	function create_member(){
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
		if($this->input->post('submit')){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname','First Name','trim|required');
		$this->form_validation->set_rules('lastname','Last Name','trim|required');
		$this->form_validation->set_rules('username','User Name','trim|required|callback_username_exist');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confirm','Password Confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('phone_no','Phone Number','trim|required');
		$this->form_validation->set_rules('county_id','Place','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|callback_email_exist');
		$this->form_validation->set_rules('gender','Gender','trim|required');

		if($this->form_validation->run() == false){
		$data['main_content']='users/register';
		$this->load->view('common/template',$data);	
		}
		else
		{
			
		$name =$this->input->post('firstname');
		$email =$this->input->post('email');

		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->from('rayyidh@gmail.com', 'Social Healing');
		$this->email->to($email);
		$this->email->subject('Successful Registration' );
		$this->email->message('Your Account has been created');

		$this->load->model('members_model');

		if($query=$this->members_model->create_member()){
			$this->email->send();
		redirect('login/successfull');		

		}
		else{

		$data['main_content']='users/register';
		$this->load->view('common/template',$data);
		}

		if($this->email->send())
		{
			//echo ' Your email was sent , Rayyidh';
			redirect('login/successfull');
		}
		else
		{
			show_error($this->email->print_debugger());
		}
	  }
	 }
	}

	function username_exist($username)
	{	
		$this->load->model('members_model');
		$this->form_validation->set_message('username_exist', 'The Username %s already exists try using another Username');
		if($this->members_model->check_username($username))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function email_exist($email)
	{
		$this->load->model('members_model');
		$this->form_validation->set_message('email_exist', 'Already registered %s try using another email');
		if($this->members_model->check_email($this->input->post('email')))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

}