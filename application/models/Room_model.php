<?php

class Room_model extends CI_Model
{
    public $name;
    //public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('roomnum', $keyword);
        $this->db->from('room');
        return $this->db->count_all_results();
    }

    public function fetch_room($limit, $start, $keryword)
    {
        $this->db->like('roomnum', $keryword);
        $this->db->limit($limit, $start);
        $query = $this->db->get('room');
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
            $this->db->update('room', $this, array('id'=> $id));
        }
    }
    public function read_room($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('room');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    public function remove_room($id)
    {
        $this->db->delete('room', array('id'=>$id));
    }
    public function room_detail()
    {
        return $this->db->select('*')
        ->from('room')
        ->get()
        ->result();
    }
    public function get_room($id)
    {
        return $this->db->select('*')
                    ->from('room')
                    ->where(['id'=>$id])
                    ->get()
                    ->row();
    }

    public function update_status(){
        $id = $_REQUEST['sid'];
        $saval = $_REQUEST['sval'];
        if($saval == 1)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }
        $data = array(
                'roomstatus' => $status
            );
        $this->db->where('id',$id);
        return $this->db->update('room',$data);
        }
}
