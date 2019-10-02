<?php


class Dynamic_dependent_model extends CI_Model {


	function fetch_courses()
	{
		$this->db->order_by('course_name', 'ACS');
		$query = $this->db->get('courses');
		return $query->result();
	}
	function fetch_country()
	{
		$this->db->order_by('country_name', 'ASC');
		$query = $this->db->get('country');
		return $query->result();
	}
	function fetch_province($country_id)
	{
		$this->db->where('country_id', $country_id);
		$this->db->order_by('province_name', 'ASC');
		$query = $this->db->get('province');
		$output ='<option selected disabled>Select Province</option>';
		foreach ($query->result() as $row)
		{
			$output .='<option value="'.$row->province_id.'">'.$row->province_name.'</option>';
		}
		return $output;
	}

	function fetch_city($province_id)
	{
		$this->db->where('province_id', $province_id);
		$this->db->order_by('city_name', 'ASC');
		$query=$this->db->get('city');
		$output = '<option value="" selected disabled>Select City</option>>';
		foreach ($query->result() as $row)
		{
			$output .='<option value="'.$row->city_id.'">'.$row->city_name.'</option>>';
		}
		return $output;
	}
}
