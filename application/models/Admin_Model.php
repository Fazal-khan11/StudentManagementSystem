<?php


class Admin_Model extends CI_Model {


	public function insert_user($data)
	{
		$this->db->insert('users',$data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username' => $username , 'password' => $password));
		$query = $this->db->get();
		$user = $query->row();

		return $user;
	}

}
