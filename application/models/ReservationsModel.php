<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsModel extends CI_Model
{
    public function search_room($key){
        $this->db->like('roomcate',$key);
        $query = $this->db->get('room');
        return $query->result();
        
        
    }
}