<?php


class Edit_Data_Model extends CI_Model {

	public function getsingleposts($id)
	{
		$query= $this->db->get_where('students', array('id'=>$id));
		if($query->num_rows() > 0){
			return $query->row();
		}
	}
	function updatepost($data, $id)
	{
		return $this->db->where('id', $id)
			->update('students', $data);
	}

}
