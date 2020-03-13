<?php
class History_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
   
    public function historybill(){
        $user_id = $this->session->userdata('user_id');
       // $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->query("SELECT * FROM reservations 
        JOIN reservationsroom ON reservationsroom.reservations_id = reservations.reservations_id 
        JOIN reservationsfurniture ON reservationsfurniture.reservations_id = reservations.reservations_id
        JOIN room ON room.room_id = reservationsroom.room_id
        WHERE reservations.id_users = $user_id
        GROUP BY reservations.reservations_id");

        return $query->result_array();
        
        
        
    }
}
