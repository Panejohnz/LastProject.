<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class Room extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('room_model');
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('room/index');
		$config['total_rows'] = $this->room_model->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 40 : 999;
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
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'tel' => $this->input->post('tel'),
			'email' => $this->input->post('email'),
			'gender' => $this->input->post('gender')
		);
$this->db->insert('users', $object);
redirect('room');
		}
	
	public function edit($id)
	{
		$data['result'] = $this->room_model->read_room($id);
		$this->load->view('template/backheader');
		$this->load->view('room/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edroom($idroom){
		$object = array(
			'roomnum' => $this->input->post('roomnum'),
			'roomcate' => $this->input->post('roomcate'),
			'roomprice' => $this->input->post('roomprice')
			
		);
		$this->db->where('id', $idroom);
		
		$this->db->update('room', $object);
		redirect('room');
	}

	public function confrm($id)
	{
		$data = array
		(
			'backlink'  => 'room',
			'deletelink'=> 'room/remove/' . $id
		);
		$this->load->view('template/backheader');
		$this->load->view('room/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($id)
	{
		$this->room_model->remove_room($id);
		redirect('room');
	}


}
