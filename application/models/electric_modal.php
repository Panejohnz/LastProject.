<?php

class electric_modal extends CI_Model
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
		$this->db->from('pricebillelec');
		return $this->db->count_all_results();
	}

	public function fetch_member($limit, $start,$keryword)
	{
		$this->db->like('typebill',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('pricebillelec');
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

	public function entry_member($pricebillelec_id)
	{
		$this->typebill = $this->input->post('typebill');
		$this->pricemeter = $this->input->post('pricemeter');
		
		
		
		//$this->description = $this->input->post('description');
		if($pricebillelec_id == NULL)
		{
			$this->db->insert('pricebillelec', $this);
		}
		else
		{
			$this->db->update('pricebillelec', $this, array('pricebillelec_id'=> $pricebillelec_id));
		}
	}
	public function read_member($pricebillelec_id){
		$this->db->where('pricebillelec_id',$pricebillelec_id);
		$query = $this->db->get('pricebillelec');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_member($pricebillelec_id){
		$this->db->delete('pricebillelec',array('pricebillelec_id'=>$pricebillelec_id));
	}

}
