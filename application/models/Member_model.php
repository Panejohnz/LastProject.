<?php

class Member_model extends CI_Model
{

	

	public $name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('username',$keyword);
		$this->db->from('users');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('username',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return FALSE;
	}

	public function entry_member($user_id)
	{
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');
		$this->firstname = $this->input->post('firstname');
		$this->lastname = $this->input->post('lastname');
		
		$this->email = $this->input->post('email');
		
		
		$this->gender = $this->input->post('gender');
		//$this->description = $this->input->post('description');
		if($user_id == NULL)
		{
			$this->db->insert('users', $this);
		}
		else
		{
			$this->db->update('users', $this, array('user_id'=> $user_id));
		}
	}
	public function read_member($user_id){
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($user_id){
		$this->db->delete('users',array('user_id'=>$user_id));
	}

}
