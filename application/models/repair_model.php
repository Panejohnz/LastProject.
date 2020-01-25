<?php

class repair_model  extends CI_Model
{

	public $imgtype_name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('roomnum',$keyword);
		$this->db->from('Repair');
		return $this->db->count_all_results();
	}

	public function fetch_imgtype($limit, $start,$keryword)
	{
		$this->db->like('roomnum',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('Repair');
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
		$this->db->where('id',$id);
		$query = $this->db->get('Repair');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}
	public function remove_roomcategory($id){
		$this->db->delete('Repair',array('id'=>$id));
	}
	public function read_imgtype($imgtype_id){
		$this->db->where('id',$imgtype_id);
		$query = $this->db->get('Repair');
		if($query->num_rows() > 0){
			$data = $query->row();
			return $data;
		}
		return FALSE;
	}


	public function update_repair(){
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['svalo'];
        if($saval == 1)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $data = array(
                'statusrepair' => $status
            );
        $this->db->where('id',$id);
        return $this->db->update('Repair',$data);
        }
}
