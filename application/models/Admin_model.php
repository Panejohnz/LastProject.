<?php

class Admin_model extends CI_Model
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
		$this->db->from('emmployee');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('username',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('emmployee');
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

	public function entry_member($employee_id)
	{
		$this->username = $this->input->post('username');
		$this->password = $this->input->post('password');
		$this->firstname = $this->input->post('firstname');
		$this->lastname = $this->input->post('lastname');
		$this->tel = $this->input->post('email');
		$this->email = $this->input->post('statusem');
		
		
		
		//$this->description = $this->input->post('description');
		if($employee_id == NULL)
		{
			$this->db->insert('emmployee', $this);
		}
		else
		{
			$this->db->update('emmployee', $this, array('employee_id'=> $employee_id));
		}
	}
	public function read_member($employee_id){
		$this->db->where('employee_id',$employee_id);
		$query = $this->db->get('emmployee');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($employee_id){
		$this->db->delete('emmployee',array('employee_id'=>$employee_id));
	}

	function is_email_available($email)  
    {  
         $this->db->where('email', $email);  
         $query = $this->db->get("emmployee");  
         if($query->num_rows() > 0)  
         {  
              return true;  
         }  
         else  
         {  
              return false;  
         }  
    }  
    function is_username_available($username)  
    {  
         $this->db->where('username', $username);  
         $query = $this->db->get("emmployee");  
         if($query->num_rows() > 0)  
         {  
              return true;  
         }  
         else  
         {  
              return false;  
         }  
    }  

}
