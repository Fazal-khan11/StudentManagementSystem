<?php


class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dynamic_dependent_model');
		$this->load->model('Auth_model', 'auth');
	}

	function index()
	{
		$data['courses'] = $this->dynamic_dependent_model->fetch_courses();
		$data['country'] = $this->dynamic_dependent_model->fetch_country();
		$this->load->view('addrecord', $data);
	}

	function fetch_province()
	{
		if($this->input->post('country_id'))
		{
			echo $this->dynamic_dependent_model->
			fetch_province($this->input->post('country_id'));
		}
	}

	function fetch_city()
	{
		if($this->input->post('province_id'))
		{
			echo $this->dynamic_dependent_model->
			fetch_city($this->input->post('province_id'));
		}
	}


	public function do_upload($name)
	{


		$config['upload_path'] = "./upload/";
		$config['allowed_types'] = 'gif|jpg|jpeg|png';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);


		$response = array();
		$response['code'] = 200;
		if(! $this->upload->do_upload('image')){

			$error = array('error' => $this->upload->display_errors());
			$response['code'] = 201;
			$response['error'] = $error;
		}
		else{
			$data = $this->upload->data();

			$url = 'upload/'.$data['file_name'];

			$response['url'] = $url;

		}
		return $response;

	}


	public function submit_student()
	{  
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required|callback_dob_check');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('phone', 'phone' ,'required|min_length[11]|max_length[13]');
		$this->form_validation->set_rules('country', 'Country' ,'required');
		$this->form_validation->set_rules('province', 'Province' ,'required');
		$this->form_validation->set_rules('city', 'City' ,'required');
		$this->form_validation->set_rules('courses', 'Courses', 'required');

		if($this->form_validation->run() === TRUE){

		/*if($this->input->post() )
		{*/
			if(!empty($_FILES['image']['name'])){
				$response = $this->do_upload('name');




			if($response['code'] == 200){
					$image = $response['url'];
				}
				else{

					$image = $response['$error'];
					redirect('auth');
				}
			}
		

			$mul_array = $this->input->post('courses');
			//converting array into a string
			$mul_val_string = serialize($mul_array);
			

			$data = array(
				'name' => $this->input->post('name'),
				'dob' => $this->input->post('dob'),
				'gender'=> $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'country_id' => $this->input->post('country'),
				'province_id' => $this->input->post('province'),
				'city_id' => $this->input->post('city'),
				'courses_name' =>  $mul_val_string,
				'image' => $image
			);
			
			$this->load->model('Auth_model');
			$insert_id = $this->Auth_model->insert_user($data);
			if($insert_id)
			{
				$this->session->set_flashdata("success", "Your Account has been registerd");
				redirect("student_list", "refresh");
			}
			else
			{
				$this->session->set_flashdata("error","Error While Creating Account");
				redirect("auth", "refresh");

			}
		}
		else
		{
			$this->index();
			/*echo validation_errors();*/
		}

	}


	public function dob_check($dob)
        {
			$dob = $_POST['dob'];

   			//echo $dob."<br>".date("o-m-d");

   			if (date("o-m-d") < $dob){
				$this->form_validation->set_message('dob_check', 'The date of birth not valid');
			   return FALSE;
   			} 
   			else
            {
                return TRUE;
            }
        }


}
