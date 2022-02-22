<?php

class Moveroom_model extends CI_Model
{
    public $contract_name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('moveroomdetail', $keyword);
        $this->db->from('moveroom');
        return $this->db->count_all_results();
    }

    public function fetch_contract($limit, $start, $keryword)
    {
        $this->db->like('moveroomdetail', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')
        ->from('moveroom')
        ->join('contract', 'contract.contract_id = moveroom.contract_id ', 'left')
        ->join('emmployee', 'emmployee.employee_id = moveroom.employee_id', 'left')
        ->join('users', 'users.user_id = contract.user_id', 'left');
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