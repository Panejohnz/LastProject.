<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ReservationsModel');
    }
    public function index($id=null)
    {   
       $this->data['his'] = $this->ReservationsModel->historybill($id);
       
       $this->load->view('newhome',$this->data,false);

    //    $this->load->view('testdate');
    }

    

    public function keyword($cateid = null)
    {
        $this->db->where('roomcategory_id', $cateid);
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
