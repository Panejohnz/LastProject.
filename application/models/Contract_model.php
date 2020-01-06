<?php

class Contract_model extends CI_Model
{

	public $contract_name;
	//public $description;

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($keyword)
	{
		$this->db->like('Insurance',$keyword);
		$this->db->from('contract');
		return $this->db->count_all_results();
	}

	public function fetch_contract($limit, $start,$keryword)
	{
		$this->db->like('Insurance',$keryword);
		$this->db->limit($limit, $start);
		$query = $this->db->get('contract');
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
	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('contract');	
        $this->db->order_by('StartRcontract','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }


}
