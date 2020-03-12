<?php

class Repair_model extends CI_Model
{
    public $imgtype_name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('repair_id', $keyword);
        $this->db->from('repair');
        return $this->db->count_all_results();
    }

    public function fetch_imgtype($limit, $start, $keryword)
    {
        $this->db->like('repair_id', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')
        ->from('repair')
		->join('contract', 'contract.contract_id  = repair.contract_id','left')
		->join('emmployee','emmployee.employee_id = repair.employee_id','left');
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
        $this->db->where('repair_id', $id);
        $query = $this->db->get('repair');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    public function remove_roomcategory($id)
    {
        $this->db->delete('repair', array('repair_id'=>$id));
    }
    public function read_imgtype($imgtype_id)
    {
        $this->db->where('repair_id', $imgtype_id);
        $query = $this->db->get('repair');
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
        $this->db->where('repair_id', $id);
        return $this->db->update('repair', $data);
    }
}
