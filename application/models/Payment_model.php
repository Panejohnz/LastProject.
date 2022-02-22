<?php

class Payment_model extends CI_Model
{
    public $imgtype_name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('payment_id', $keyword);
        $this->db->from('payment');
        return $this->db->count_all_results();
    }

    public function fetch_imgtype($limit, $start, $keryword)
    {
        $this->db->like('payment_id', $keryword);
        $this->db->limit($limit, $start);
       
        $this->db->select('*')
        ->from('repair')
        ->from('contract')
        ->from('users')
        ->from('room')
        ->from('reservationsroom')
        ->from('emmployee')
        ->from('payment')
        ->where('contract.contract_id  = repair.contract_id')
        ->where('contract.room_id = room.room_id')
        ->where('users.user_id = contract.user_id')
        ->where('emmployee.employee_id = repair.employee_id')
        ->where('contract.reservationsroom_id = reservationsroom.reservationsroom_id');
        // ->from('repair')
		// ->join('contract', 'contract.contract_id  = repair.contract_id','left')
		// ->join('emmployee','emmployee.employee_id = repair.employee_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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



    public function read_roomcategory($id)
    {
        $this->db->where('payment_id', $id);
        $query = $this->db->get('payment');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    public function remove_roomcategory($id)
    {
        $this->db->delete('payment', array('payment_id'=>$id));
    }
    public function read_imgtype($imgtype_id)
    {
        $this->db->where('payment_id', $imgtype_id);
        $query = $this->db->get('payment');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }


    public function update_repair()
    {
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['svalo'];
        if ($saval == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $data = array(
                'statusrepair' => $status
            );
        $this->db->where('payment_id', $id);
        return $this->db->update('payment', $data);
    }
}
