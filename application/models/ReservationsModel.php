<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsModel extends CI_Model
{
    public function search_room($cateid)
    {
        $this->db->where('id', $cateid);
       
        $result = $this->db->get('roomcategory', 1);
        return $result;
    }
    public function cate1($cate1)
    {
        $this->db->where('id', $cate1);
        $query = $this->db->get('room');
        return $query->result();
    }
}