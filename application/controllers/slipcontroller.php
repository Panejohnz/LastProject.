<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slipcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
    }
    public function paylate()
    {
        $this->load->view('Slip');
    }
    public function paylatelate()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';

        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $this->load->library('upload', $config);
        
      
      
        
        if (! $this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(
                                'slip_date' => date('Y-m-d'),
                                'slip_file'=>$filename,
                               
                                
                            );
            $this->db->where('reservations_id', $idtestt);
            $this->db->update('reservations', $arr);
            redirect('Page/Staff');
        }
    }
    public function delete($idtestt1 = null,$idtestt2 = null)
    {
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt2 = ($arraystate[6]);

        $this->db->where('room_id', $idtestt2);
        $one1 = array(
            'roomstatus' => 1
        );
        $this->db->update('room', $one1);

        $this->db->where('reservations_id', $idtestt1);
        $one = array(
            'reservations_status' => 2
        );
        $this->db->update('reservations', $one);

       
        redirect('Page/Staff');
        // $this->db->delete('reservations');

        // $this->db->where('reservations_id', $idtestt);
        // $this->db->delete('reservationsroom');

        // $this->db->where('reservationsroom_id', $idtestt);
        // $this->db->delete('reservationsfurniture');


    }
}