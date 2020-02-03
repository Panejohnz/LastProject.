<?php



defined('BASEPATH') or exit('No direct script access allowed');
class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('room_model');
        if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('room/index');
        $config['total_rows'] = $this->room_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 40 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->room_model->fetch_Room($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('room/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function newdata()
    {
        $this->load->view('template/backheader');
        $this->load->view('room/newdata');
        $this->load->view('template/backfooter');
    }

    public function postdata()
    {
        $object = array(
            'roomnum' => $this->input->post('roomnum'),
            'roomcate_id' => $this->input->post('roomcate'),
            'roomprice' => $this->input->post('roomprice'),
            'roomstatus' => $this->input->post('roomstatus')
        );
        $this->db->insert('room', $object);
        redirect('room');
    }
    
    public function edit($id)
    {
        $data['result'] = $this->room_model->read_room($id);
        $this->load->view('template/backheader');
        $this->load->view('room/edit', $data);
        $this->load->view('template/backfooter');
    }

    public function edroom($idroom)
    {
        $object = array(
            'roomnum' => $this->input->post('roomnum'),
            'roomcate' => $this->input->post('roomcate'),
            'roomprice' => $this->input->post('roomprice')
            
        );
        $this->db->where('room_id', $idroom);
        
        $this->db->update('room', $object);
        redirect('room');
    }

    public function confrm($id)
    {
        $data = array(
            'backlink'  => 'room',
            'deletelink'=> 'room/remove/' . $id
        );
        $this->load->view('template/backheader');
        $this->load->view('room/confrm', $data);
        $this->load->view('template/backfooter');
    }

    public function remove($id)
    {
        $this->room_model->remove_room($id);
        redirect('room');
    }

    public function status1()
    {
        $this->db->select('*')
        ->from('room')
        ->from('roomcategory')
     ->where('roomcategory.roomcategory_id = room.roomcate_id');
     
     
        $query = $this->db->get();

        $this->load->view('template/backheader');
        $this->load->view('room/status1', $query);
        $this->load->view('template/backfooter');
    }
    public function status2()
    {
        $this->db->select('*')
        ->from('room')
        ->from('roomcategory')
     ->where('roomcategory.roomcategory_id = room.roomcate_id');
     
     
        $query = $this->db->get();
        $this->load->view('template/backheader');
        $this->load->view('room/status2', $query);
        $this->load->view('template/backfooter');
    }
}
