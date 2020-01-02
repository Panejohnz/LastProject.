<?php

class bill_model extends CI_Model
{

	public $contract_name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('billroomnum',$keyword);
		$this->db->from('bill');
		return $this->db->count_all_results();
	}

	public function fetch_contract($limit, $start,$keryword)
	{
		$this->db->like('billroomnum',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('bill');
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


	
	public function FunctionName($value='')
		{
			# code...
		}	


	/*	

	public function entry_imgtype($imgtype_id, $typeimg = '')
	{
		$data = array(
			'imgtype_name'=> $this->input->post('imgtype_name'),
			'typeimg'     => $typeimg
		);
		if($imgtype_id == NULL)
		{
			$this->db->insert('imgtype', $this);
		}
		else
		{
			$this->db->update('imgtype', $data, array('imgtype_id'=> $imgtype_id));
		}
	}


*/



	public function read_contract($id){
		$this->db->where('id',$id);
		$query = $this->db->get('contract');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_contract($id){
		$this->db->delete('contract',array('id'=>$id));
	}
	public function read_imgtype($id){
		$this->db->where('id',$id);
		$query = $this->db->get('contract');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
}
