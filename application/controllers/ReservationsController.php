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

    public function keyword($cateid = null)
    {
		
        $this->db->where('id', $cateid);
        $query = $this->db->get('roomcategory');
       $qq = $query->row_array();
		
		//$search_room = $this->ReservationsModel->search_room($cateid);
      
			//$data  = $search_room->row_array();
            $level = $qq['id'];
            
		if($level === '1'){
            $room['results'] = $this->ReservationsModel->cate1();
            $this->load->view('airroom', $room);
        }
    }
}
