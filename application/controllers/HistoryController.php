<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('History_model');
       
    }
    public function index()
    {
        $result['his'] = $this->History_model->historybill();
      
        // print_r($result);
        $this->load->view('History', $result);
    }
   
}