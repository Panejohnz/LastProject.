<?php
defined('BASEPATH') or exit('No direct script access allowed');

class contractcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view('contract/contract');
        $this->load->model('Contract_model');
    }
}