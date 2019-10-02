<?php


class Get_Data_Model extends CI_Model {

	public function getStudents()
	{
		$this->db->select("*");
		$this->db->from('students');
		$this->db->join('country', 'students.country_id = country.country_id');
		$this->db->join('province', 'students.province_id = province.province_id');
		$this->db->join('city', 'students.city_id = city.city_id');
		//$this->db->join('courses','students.courses_name = courses.course_id');
		$query = $this->db->get();
		return $query -> result();
	}

	/*public function unserilized($results)
	{
		foreach ($results as $result) {

			$key = unserialize($result['data']);

			$data['students'][] = array(
				'courses' => anchor('courses/courses_name/' . $key['courses_id'], $key['courses_name']) .' '. $this->lang->line('text_' . $result['key'])
			);
		}
	}*/
}
