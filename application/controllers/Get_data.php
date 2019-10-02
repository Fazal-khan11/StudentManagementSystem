<?php


class Get_data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Get_Data_Model', 'getdata');
		$this->load->model('Delete_Data_Model', 'deletedata');
		$this->load->model('Edit_Data_Model', 'editrecord');
	}

	public function index()
	{
		$this->data['students'] = $this->getdata->getStudents();
		$this->load->view('student_list', $this->data);
	}

	public function del()
	{
		$rem = $this->uri->segment(3);
		$this->deletedata->del($rem);
		redirect("student_list", "refresh");
	}

	/*public function edit()
	{
		print_r($_POST);
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[students.email]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('phone', 'phone' ,'required|min_length[11]');
		$this->form_validation->set_rules('country', 'Country' ,'required');
		$this->form_validation->set_rules('province', 'Province' ,'required');
		$this->form_validation->set_rules('city', 'City' ,'required');
		$this->form_validation->set_rules('courses', 'Courses', 'required');

		if($this->form_validation->run() === TRUE){
			$data = array(
				'name' => $this->input->post('name'),
				'dob' => $this->input->post('dob'),
				'gender'=> $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'country_id' => $this->input->post('country'),
				'province_id' => $this->input->post('province'),
				'city_id' => $this->input->post('city'),
				//'courses_name' =>  $mul_val_string,
				//'image' => $image
			);

			if( $this->editrecord->updatepost($data))
			{
				$this->session->set_flashdata("success", "Data updated successfully");
				redirect("student_list", "refresh");
			}
			else
			{
				$this->session->set_flashdata("error","Error While Creating Account");
				redirect("get_data/edit", "refresh");

			}
		}


	}*/
	public function update($id)
	{
		$post= $this->editrecord->getsingleposts($id);
		$this->load->view('edit', $post);
	}

}
