<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BillController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('bill_model');
        if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
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

    public function cal($id)
    {
        $this->db->where('bill_id', $id);
        $query = $this->db->get('bill');
        $imf = $query->row_array();

        $this->db->where('bill_id', $imf['pricebill_id']);
        $query1 = $this->db->get('pricebill');
        $imf2 = $query1->row_array();

        // POST data
        $postData = $this->input->post();
       
        // Read POST data
        echo $postData['waternew'];
           
       
       
        echo $imf['electricbill']*7;
    }
}
