<?php
class Login extends CI_Controller {
	
	public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
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
		$data['main_content']='users/login';
		$this->load->view('common/template',$data);
    }
    function successfull(){
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
    $data['main_content']='users/successfull';
    $this->load->view('common/template',$data); 
    }
 
    function validate_credentials(){
        // Load the model
        $this->load->model('members_model');
        // Validate the user can login
        $result = $this->members_model->validate();
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            // If user did validate,
            // Send them to members area
            redirect('home');
        }
    }
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('home');
    }

}