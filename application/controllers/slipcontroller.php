<?php
defined('BASEPATH') or exit('No direct script access allowed');

class slipcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('slip');
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
        
    }
    
}