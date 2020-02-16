<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BillController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('bill_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('bill/index');
        $config['total_rows'] = $this->bill_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 40 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->bill_model->fetch_room($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('bill/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function cal()
    {
        $room_id = $this->input->post('room_id');
        // $this->input->post('waternew');
        $this->db->where('room_id', $room_id);
        $query = $this->db->get('room');
        $imf = $query->row_array();

        $this->db->where('pricebill_id', 1);
        $query1 = $this->db->get('pricebill');
        $imf2 = $query1->row_array();

        $this->db->where('pricebill_id', 2);
        $query2 = $this->db->get('pricebill');
        $imf3 = $query2->row_array();
        // print_r($room_id);
        //$water = 15 * $postData['waternew'];
        // echo $water;
        // echo $this->input->post('electricnew');
        // echo '<br>';
        // echo $this->input->post('waternew');
        // echo '<br>';
        // echo $imf2['pricemeter'] * $this->input->post('electricnew');
        // echo '<br>';
        // echo $imf3['pricemeter']  * $this->input->post('waternew');

        $arr=array(
        'room_id' => $room_id,
        'electricbill'=>$this->input->post('electricnew'),
        'waterbill' => $this->input->post('waternew'),
        'electric_price	' => $imf2['pricemeter'] * $this->input->post('electricnew'),
        'water_price' => $imf3['pricemeter'] * $this->input->post('waternew'),
        'roomprice' => $imf['roomprice'],
        'date' => date('Y-m-d')
    );
        $this->db->insert('bill', $arr);

        redirect('Billcontroller');
        //$this->db->where('');
        // POST data
    }
    public function edit($room_id)
    {
    //     $this->db->where('room_id', $room_id);
    //   $data = $this->db->get('bill');
       // $this->load->view('template/backheader');
        $this->load->view('bill/edit');
        //$this->load->view('template/backfooter');
    }
}
