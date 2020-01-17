<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('room_model');
    }


    public function index()
    {
        
        $room = $this->room_model->room_detail();
        $this->load->view('room',['room'=>$room]);
        
        
    }
  
    public function get_room()
{
    $id = $this->input->get('id');
    $get_room = $this->room_model->get_room($id);
    echo json_encode($get_room); 
    exit();
}

    public function update_room(){
             $this->load->model('Room_model', 'room');
             $res = $this->room->update_status();
             if ($res > 0) {
                $this->session->set_flashdata('msg', "data updated success");
                $this->session->set_flashdata('msg_class', "alert-success");
           } else {
                $this->session->set_flashdata('msg', "data not updated success");
                $this->session->set_flashdata('msg_class', "alert-danger");
            }
            return redirect('Roomcontroller');
        }
        public function update_status()
        {
            if(isset($_REQUEST['sval']))
            {
                $this->load->model('Room_model', 'room');
                $up_status = $this->room->update_status();

                if($up_status > 0)
                {
                    $this->session->set_flashdata('msg', "updated status success");
                    $this->session->set_flashdata('msg_class', "alert-success");
                }
                else
                {
                    $this->session->set_flashdata('msg', "status not updated success");
                    $this->session->set_flashdata('msg_class', "alert-danger");
                }
                return redirect('Roomcontroller');
            }
        }
    }
