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
}