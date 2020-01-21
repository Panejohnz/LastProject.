<?php

class complain_model extends CI_Model
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
        $query = $this->db->get('complain');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}