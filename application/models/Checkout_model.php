<?php

class Checkout_model extends CI_Model
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
        $this->db->like('contract_id', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')
                        ->from('contract');
        $this->db->where('is_checkout', 2);
                        
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
}