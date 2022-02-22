<?php

class Complain_model extends CI_Model
{
    public $contract_name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('complaindetail', $keyword);
        $this->db->from('complain');
        return $this->db->count_all_results();
    }

    public function fetch_contract($limit, $start, $keryword)
    {
        $this->db->like('complaindetail', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')
        ->from('complain')
        ->join('contract', 'contract.contract_id = complain.contract_id ', 'left')
        ->join('emmployee', 'emmployee.employee_id = complain.employee_id', 'left')
        ->join('room','room.room_id = contract.room_id','left');
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