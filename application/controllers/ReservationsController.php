<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
         $this->load->view('newhome');
         
       
    }

    

    public function keyword($cateid = null)
    {
        $this->db->where('id', $cateid);
        $query = $this->db->get('roomcategory');
        $qq = $query->row_array();
        //    $qq = array(
        //     'reservationsstart' => $this->input->post('datepicker'),
        //     'reservationsprice' => '2000');
        //     $this->db->insert('reservations', $qq);
        $search_room = $this->ReservationsModel->search_room($cateid);  
        $data  = $search_room->row_array();
        $level = $data['id'];
        $sesdata = array(
                'id'     => $level,
            );
        $this->session->set_userdata($sesdata);
            
        if ($level === '1') {
            redirect('ReservationsController/airroom');
        }
    }
    
}
