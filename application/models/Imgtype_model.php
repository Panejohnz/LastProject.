<?php

class Imgtype_model extends CI_Model
{

	public $imgtype_name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('roomname',$keyword);
		$this->db->from('roomcategory');
		return $this->db->count_all_results();
	}

	public function fetch_imgtype($limit, $start,$keryword)
	{
		$this->db->like('roomname',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('roomcategory');
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



	public function read_roomcategory($id){
		$this->db->where('roomcategory_id',$id);
		$query = $this->db->get('roomcategory');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_roomcategory($id){
		$this->db->delete('roomcategory',array('roomcategory_id'=>$id));
	}
	public function read_imgtype($imgtype_id){
		$this->db->where('roomcategory_id',$imgtype_id);
		$query = $this->db->get('roomcategory');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
}
