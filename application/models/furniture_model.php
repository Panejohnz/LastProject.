<?php

class furniture_model extends CI_Model
{

	

	public $name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('name',$keyword);
		$this->db->from('furniture');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('name',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('furniture');
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

	public function entry_member($furniture_id)
	{
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');
		$this->firstname = $this->input->post('firstname');
		$this->lastname = $this->input->post('lastname');
		$this->tel = $this->input->post('tel');
		$this->email = $this->input->post('email');
		
		
		$this->gender = $this->input->post('gender');
		//$this->description = $this->input->post('description');
		if($furniture_id == NULL)
		{
			$this->db->insert('furniture', $this);
		}
		else
		{
			$this->db->update('furniture', $this, array('furniture_id'=> $furniture_id));
		}
	}
	public function read_member($furniture_id){
		$this->db->where('furniture_id',$furniture_id);
		$query = $this->db->get('furniture');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($furniture_id){
		$this->db->delete('furniture',array('furniture_id'=>$furniture_id));
	}

}
