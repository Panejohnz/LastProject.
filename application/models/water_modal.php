<?php

class water_modal extends CI_Model
{

	

	public $name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('utility_name',$keyword);
		$this->db->from('publicutility');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('utility_name',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('publicutility');
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

	public function entry_member($utility_id)
	{
		$this->typebill = $this->input->post('typebill');
		$this->pricemeter = $this->input->post('pricemeter');
		
		
		
		//$this->description = $this->input->post('description');
		if($utility_id == NULL)
		{
			$this->db->insert('publicutility', $this);
		}
		else
		{
			$this->db->update('publicutility', $this, array('publicutility_id'=> $utility_id));
		}
	}
	public function read_member($utility_id){
		$this->db->where('utility_id',$utility_id);
		$query = $this->db->get('publicutility');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($utility_id){
		$this->db->delete('publicutility',array('publicutility_id'=>$utility_id));
	}
	
	public function is_email_available($name)
    {
        $this->db->where('utility_name', $name);
        $query = $this->db->get("publicutility");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
