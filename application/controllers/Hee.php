<?php

use Mpdf\Tag\P;

defined('BASEPATH') OR exit('No direct script access allowed');

class Hee extends CI_Controller {

    public function index()
    {
        $query = $this->db->query("SELECT * FROM `reservations`
        LEFT JOIN users
        ON reservations.id_users = users.user_id
        LEFT JOIN reservationsroom
        ON reservations.reservations_id = reservationsroom.reservations_id  ");

        foreach($query->result_array() as $data)
        {
            echo "</br>";
            echo "วันที่ :". $data['reservationsstart']." ".$data['slip_date'];
            echo "ชื่อ :" . $data['firstname']." ".$data['lastname'];
            echo "TEL :" . $data['tel'];
            echo "Email :". $data['email'];  
            echo "Room:" . $data['room_id'];

            if($data['Type'] == 'มีเฟอร์นิเจอร์')
            {

                $hee = $data['reservations_id'];

                $qq = $this->db->query("SELECT * FROM `reservationsfurniture`
                LEFT JOIN furniture
                ON furniture.furniture_id = reservationsfurniture.furniture_id
                WHERE reservationsfurniture.reservations_id = $hee ");

                foreach($qq->result_array() as $data2)
                {
                    echo "เฟอร์นิเจอร์" . $data2['name']; 
                }
                
            }
        }
        
    }

}

/* End of file Hee.php */
