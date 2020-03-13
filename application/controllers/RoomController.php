<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('room_model');
        if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
            echo "<script>";
            echo "alert('กรุณาเข้าสู่ระบบ');";
            echo "window.location.href = '". base_url()."ReservationsController';";
            echo "</script>";
            //redirect('ReservationsController');
        }
    }


    public function index()
    {
    }
  
    public function ss()
    {
        $id = $this->input->post('Hee');
        $this->db->where('roomcategory_name', $id);
        $this->db->select('*')
                            ->from('room')
                            ->from('roomcategory')
                         ->where('roomcategory.roomcategory_id = room.roomcategory_id');
                         
                         
        $query = $this->db->get();
        $hee = $query->row_array();
        // $qq = array(
        //     'reservationsstart' => $this->input->post('datepicker'),
        //     'reservationsprice' => '2000');
        // $this->db->insert('reservations', $qq);
        $this->data['roomcategory_id'] = $hee['roomcategory_id'];
        $this->load->view('Room', $this->data, false);
    }
    public function get_room()
    {
        $id = $this->input->get('room_id');
       
        $get_room = $this->room_model->get_room($id);
       
        echo json_encode($get_room);
        exit();
    }

    public function update_room()
    {
        $this->load->model('Room_model', 'room');
        $res = $this->room->update_status();
        if ($res > 0) {
            $this->session->set_flashdata('msg', "updated success");
            $this->session->set_flashdata('msg_class', "alert-success");
        } else {
            $this->session->set_flashdata('msg', ";not updated success");
            $this->session->set_flashdata('msg_class', "alert-danger");
        }
        return redirect('Roomcontroller');
    }
    public function update_status($id)
    {
        // if (isset($_REQUEST['sval'])) {
        //     $this->load->model('Room_model', 'RoomController');
        //     $up_status = $this->RoomController->update_status();

        //     if ($up_status > 0) {
        //         $this->session->set_flashdata('msg', "updated success");
        //         $this->session->set_flashdata('msg_class', "alert-success");
        //     } else {
        //         $this->session->set_flashdata('msg', ";not updated success");
        //         $this->session->set_flashdata('msg_class', "alert-danger");
        //     }
        //     return redirect('RoomController');
        // }

        $this->db->where('room_id', $id);


        $data2 = array(
            'roomstatus' => '1'
          );
   
           
        $this->db->update('room', $data2);
        redirect('RoomController');
    }

    public function getnumroom()
    {
        $getcode= $this->input->post('reportCode');
        $data['showdetail'] = $this->model_expreport->showdetail($getcode);
        $ret = $this->load->view('detail_template', $data, true); //return as data
        print_r($ret);
    }
}
