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
        $this->db->like('contract_id', $keyword);
        $this->db->from('contract');
        return $this->db->count_all_results();
    }

    public function fetch_contract()
    {
        // $this->db->like('contract_id', $keryword);
        // $this->db->limit($limit, $start);
        $this->db->select('*')
         ->from('contract')
         ->from('users')
         ->from('room')
         ->from('reservationsroom')
         ->where('contract.room_id = room.room_id')
         ->where('users.user_id = contract.user_id')
         ->where('contract.reservationsroom_id = reservationsroom.reservationsroom_id');
        //  ->from('emmployee')
        //  ->where('emmployee.employee_id = contract.employee_id');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return true;
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



    public function read_contract($id)
    {
        $this->db->where('contract_id', $id);
        $query = $this->db->get('contract');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    
    public function remove_contract($id)
    {
        $this->db->delete('contract', array('contract_id'=>$id));
    }
    public function read_imgtype($id)
    {
        $this->db->where('contract_id', $id);
        $query = $this->db->get('contract');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    // function getRows($params = array()){
    //     $this->db->select('*');
    //     $this->db->from('contract');
    //     $this->db->order_by('date_create','desc');
    //     if(array_key_exists('contract_id',$params) && !empty($params['contract_id'])){
    //         $this->db->where('contract_id',$params['contract_id']);
    //         //get records
    //         $query = $this->db->get();
    //         $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
    //     }else{
    //         //set start and limit
    //         if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
    //             $this->db->limit($params['limit'],$params['start']);
    //         }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
    //             $this->db->limit($params['limit']);
    //         }
    //         //get records
    //         $query = $this->db->get();
    //         $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
    //     }
    //     //return fetched data
    //     return $result;
    // }
    public function insert_order($data)
{
    $this->db->insert('contract', $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
}
}
