<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class FurnitureController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('furniture_model');
		// if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
        //     redirect('LoginController');
        // }
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('furniture/index');
		$config['total_rows'] = $this->furniture_model->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 14 : 999;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->furniture_model->fetch_Member($config['per_page'], $page, $this->input->get('keyword'));
		$data['link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$this->load->view('template/backheader');
		$this->load->view('furniture/mainpage', $data);
		$this->load->view('template/backfooter');
	}

	public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('furniture/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price')
			
		);
$this->db->insert('furniture', $object);
redirect('FurnitureController');
		}
	
	public function edit($furniture_id)
	{
		$data['result'] = $this->furniture_model->read_member($furniture_id);
		$this->load->view('template/backheader');
		$this->load->view('furniture/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edfur($idfur){
		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price')
		
		);
		$this->db->where('furniture_id', $idfur);
		
		$this->db->update('furniture', $object);
		redirect('FurnitureController');
	}

	public function confrm($furniture_id)
	{
		$data = array
		(
			'backlink'  => 'FurnitureController',
			'deletelink'=> 'FurnitureController/remove/' . $furniture_id
		);
		$this->load->view('template/backheader');
		$this->load->view('furniture/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($furniture_id)
	{
		$this->furniture_model->remove_member($furniture_id);
		redirect('FurnitureController');
	}


}
