<?php


class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_Model', 'admin');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function submit_register(){

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email','E-mail','required|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules('password','Password','required|min_length[5]');
		$this->form_validation->set_rules('password2','Conform Password','required|min_length[5]|matches[password]');
		$this->form_validation->set_rules('phone', 'phone' ,'required|min_length[11]');
		if($this->form_validation->run() ==TRUE){
			echo "Form  validated";

			//connect with db for inserting data
			$data = array(
				'username'=> $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' =>  md5($this->input->post('password')),
				'phone' => $this->input->post('phone')
			);


			$insert_id = $this->admin->insert_user($data);

			if($insert_id)
			{

				$this->session->set_flashdata("success", "Your Account has been registerd");
				redirect("login", "refresh");
			}
			else
			{
				$this->session->set_flashdata("error","Error While Creating Account");
				redirect("register", "refresh");

			}

		}
		else
		{

			$array = $this->form_validation->error_array();



			$this->load->view('register',array(
				'data' => $array
			));

		}


	}



	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		if($this->form_validation->run()==TRUE){

			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$user = $this->admin->login($username, $password);

			if($user->email)
			{
				$this->session->set_flashdata("success","You are logged in");

				$this->session->user_logged = TRUE;
				$this->session->username = $user->username;

				redirect("dashboard", "refresh");
			}
			else
			{
				$this->session->set_flashdata("error","Error While login");
				redirect("login", "refresh");
			}
		}
		else
		{

			$array = $this->form_validation->error_array();



			$this->load->view('login',array(
				'data' => $array
			));

		}
		//$this->load->view('login');
	}

	public function logout()
	{
		unset($_SESSION);
		$this->session->sess_destroy();
		redirect("login", "refresh");
	}



}
