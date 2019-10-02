<?php


class Auth_model  extends CI_Model {

	public function insert_user($data)
	{
		$this->db->insert('students', $data);
		$id = $this->db->insert_id();
		return $id;
	}


}

