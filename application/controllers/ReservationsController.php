<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReservationsController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
        $this->load->model('ReservationsModel');
	}
    public function index()
    {
        $this->load->view('ReservationsView');
    }

    public function keyword()
    {
        $key =  $this->input->post('roomcate');
        $data['results'] = $this->ReservationsModel->search_room($key);
        $this->load->view('airroom', $data);
    }
}
