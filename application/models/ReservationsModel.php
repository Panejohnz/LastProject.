<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function record_count($keyword)
    {
        $this->db->like('reservationsstart', $keyword);
        $this->db->from('reservations');
        return $this->db->count_all_results();
    }

    public function fetch_room($limit, $start, $keryword)
    {
        $this->db->like('reservationsstart', $keryword);
        $this->db->limit($limit, $start);
        $this->db->select('*')  //join
            ->from('reservations')
            ->from('users')
            ->where('users.user_id = reservations.id_users');
        $query = $this->db->get(); //join

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function read_reservations($id)
    {
        $this->db->where('reservations_id', $id);
        $query = $this->db->get('reservations');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }

    public function remove_reservations($id)
    {
        $this->db->delete('reservations', array('reservations_id' => $id));
    }

    // public function search_room($cateid)
    // {
    //     $this->db->where('id', $cateid);
    //     $result = $this->db->get('roomcategory');
    //     return $result;
    // }
    // public function cate1()
    // {
    //     $this->db->where('id');
    //     $query = $this->db->get('room');
    //     return $query;
    // }

    public function historybill($id)
    {
        $this->db->where('roomcategory_id', $id);
        $query = $this->db->get('roomcategory');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            return $data;
        }
        return false;
    }
    public function multisave($user_id, $category)
    {
        $query = "INSERT INTO reservationsfurniture VALUE($user_id, $category)";
        $this->db->query($query);
    }
    public function insert_order($data)
    {
        $this->db->insert('reservations', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    // Insert ordered product detail in "order_detail" table in database.
    public function insert_order_detail($data)
    {
        $this->db->insert('reservationsroom', $data);
    }
    public function insert_order_detail1($data)
    {
        $this->db->insert('reservationsfurniture', $data);
    }
}
