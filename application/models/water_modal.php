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
		$this->db->like('typebill',$keyword);
		$this->db->from('pricebill');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('typebill',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('pricebill');
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

	public function entry_member($pricebill_id)
	{
		$this->typebill = $this->input->post('typebill');
		$this->pricemeter = $this->input->post('pricemeter');
		
		
		
		//$this->description = $this->input->post('description');
		if($pricebill_id == NULL)
		{
			$this->db->insert('pricebill', $this);
		}
		else
		{
			$this->db->update('pricebill', $this, array('pricebill_id'=> $pricebill_id));
		}
	}
	public function read_member($pricebill_id){
		$this->db->where('pricebill_id',$pricebill_id);
		$query = $this->db->get('pricebill');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($pricebill_id){
		$this->db->delete('pricebill',array('pricebill_id'=>$pricebill_id));
	}

}
