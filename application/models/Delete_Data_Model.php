<?php


class Delete_Data_Model extends CI_Model {


	public function del($id)
	{
		$this->db->delete('students', array('id' => $id));
		return;
	}
}
