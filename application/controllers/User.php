<?php

class User extends CI_Controller {

	public function __construct()
	{

        parent::__construct();
  		$this->load->helper('url');
  	 	$this->load->model('user_model');
        $this->load->library('session');

	}
	public function index()
	{
		$this->load->view('users/login_view');
	}
	public function register_view()
	{
		$this->load->view('users/register');
	}
	public function dashboard_view()
	{
		$this->load->view('elements/header');	
		$this->load->view('users/dashboard_view');
		$this->load->view('elements/footer');	
	}
	public function register_user()
	{


		$user=array(
		'user_name'=>$this->input->post('user_name'),
		'user_email'=>$this->input->post('user_email'),
		'user_password'=>md5($this->input->post('user_password')),
		'role_id'=>'2'
		);
    	
		$email_check=$this->user_model->email_check($user['user_email']);
		
		if($email_check)
		{
		  	$this->user_model->register_user($user);
		  	$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
		  	redirect('user/index');
		}
		else
		{
		  	$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		  	redirect('user');
		}

	}


	function auth()
	{
		$email    = $this->input->post('email',TRUE);
		$password = md5($this->input->post('password',TRUE));

		$validate = $this->user_model->validate($email,$password);
	
		
		if($validate->num_rows() > 0)
		{
			$data  = $validate->row_array();
			$name  = $data['user_name'];
			$email = $data['user_email'];
			$level = $data['role_id'];
			$sesdata = array(
			'username'  => $name,
			'email'     => $email,
			'role_id'     => $level,
			'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			// access login for admin
			//$this->load->view('user/dashboard_view');
			redirect('user/dashboard_view');
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'invalid username and password');
		  	redirect('user');
		}
	}


	function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }
}