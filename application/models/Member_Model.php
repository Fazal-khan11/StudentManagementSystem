<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_Model extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'students';
        // Set orderable column fields
        $this->column_order = array(null,'name','dob','gender','phone','email','country_name','province_name','city_name','courses_name','image');
        // Set searchable column fields
        $this->column_search = array('name','dob','gender','phone','email');
        // Set default order
        $this->order = array('name' => 'asc');
    }
    
    public function getRows($postData){
        $this->_get_datatables_query($postData);
        $this->db->join('country', 'students.country_id = country.country_id');
		$this->db->join('province', 'students.province_id = province.province_id');
        $this->db->join('city', 'students.city_id = city.city_id');
        //$this->db->join('courses', 'students.courses_name = courses.course_id');
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    public function countAll(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    public function countFiltered($postData){
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    private function _get_datatables_query($postData){
         
        $this->db->from($this->table);
 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                }else{
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

   
}
