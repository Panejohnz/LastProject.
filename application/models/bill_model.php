<?php

class Bill_model extends CI_Model
{
    public $name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('utility_id', $keyword);
        $this->db->from('publicutility');
        return $this->db->count_all_results();
    }
    public function record_his($room_id)
    {
        $this->db->where('utility_id', $room_id);
        $this->db->get('publicutility');
        return $this->db->count_all_results();
    }

    public function fetch_room($limit, $start, $keryword)
    {
        $this->db->like('roomnum', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')
                       ->from('room');
          //              $this->db->where('roomstatus', 3);
                        $this->db->query("SELECT * FROM billutility 
                        JOIN bill ON bill.bill_id = billutility.bill_id 
                        JOIN contract ON contract.contract_id = bill.contract_id  
                        JOIN publicutility ON publicutility.utility_id = billutility.utility_id 
                        JOIN room ON room.room_id = contract.room_id
                        WHERE contract.room_id AND room.roomstatus = 3 ORDER BY billutility.bill_id DESC LIMIT 2");
                    // ->join('bill', 'bill.bill_id = room.room_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function entry_member($id)
    {
        $this->username = $this->input->post('username');
        $this->password = $this->input->post('password');
        $this->firstname = $this->input->post('firstname');
        $this->lastname = $this->input->post('lastname');
        $this->tel = $this->input->post('tel');
        $this->email = $this->input->post('email');
        
        
        $this->gender = $this->input->post('gender');
        //$this->description = $this->input->post('description');
        if ($id == null) {
            $this->db->insert('room', $this);
        } else {
            $this->db->update('room', $this, array('room_id'=> $id));
        }
    }
    public function read_room($id)
    {
        $this->db->where('room_id', $id);
        $query = $this->db->get('room');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    public function remove_room($id)
    {
        $this->db->delete('room', array('room_id'=>$id));
    }
    function insert_stat($dataSet)
{
    $this->db->insert_batch('waterbill', $dataSet);
    return $this->db->insert_id(); // this will return the id of last item inserted.
}
public function insert_order($data)
{
    $this->db->insert('bill', $data);
    $id = $this->db->insert_id();
    return (isset($id)) ? $id : FALSE;
}
}
