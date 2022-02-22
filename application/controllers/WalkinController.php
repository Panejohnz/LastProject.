<?php
defined('BASEPATH') or exit('No direct script access allowed');
class WalkinController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('room_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        // echo $this->uri->segment(3);die();

      
        $config = array();
        $config['base_url'] = base_url('room/index');
        $config['total_rows'] = $this->room_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 1000 : 1;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['results'] = $this->room_model->fetch_Room($config['per_page'], $page,$this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        //$data['files'] = $this->complain_model->getRows();
        $this->load->view('template/backheader');
        $this->load->view('walkin/mainpage', $data);
        $this->load->view('template/backfooter');

       
    }

    
    public function reser(){
        
        $this->load->view('template/backheader');
        $this->load->view('walkin/reser');
        $this->load->view('template/backfooter');
    }
}