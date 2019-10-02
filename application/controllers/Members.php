<?php


class Members extends CI_Controller {

    function  __construct(){
        parent::__construct();
        $this->load->model('Member_Model', 'mem');
    }
    
    function index(){
      
        $this->load->view('student_list');
    }
    function getLists(){
        $data = array();

        $memData = $this->mem->getRows($_POST);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $data[] = array($i,'<img src="'.base_url().$member->image.'" class="img-circle" width="40" height="35">',$member->name,$member->dob,$member->gender,$member->phone,$member->email,$member->country_name,$member->province_name, 
            $member->city_name,$member=unserialize($member->courses_name));
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mem->countAll(),
            "recordsFiltered" => $this->mem->countFiltered($_POST),
            "data" => $data,
        );
        
      
        echo json_encode($output);
    }
}