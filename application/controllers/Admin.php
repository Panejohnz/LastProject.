<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Admin_model');
		if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('admin/index');
		$config['total_rows'] = $this->Admin_model->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 14 : 999;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->Admin_model->fetch_Member($config['per_page'], $page, $this->input->get('keyword'));
		$data['link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$this->load->view('template/backheader');
		$this->load->view('admin/mainpage', $data);
		$this->load->view('template/backfooter');
	}

	public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('admin/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			
			'email' => $this->input->post('email'),
			'statusem' => $this->input->post('statusem')
		);
$this->db->insert('emmployee', $object);
redirect('admin');
		}
	
	public function edit($employee_id)
	{
		$data['result'] = $this->Admin_model->read_member($employee_id);
		$this->load->view('template/backheader');
		$this->load->view('admin/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edad($idad){
		$object = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			
			'email' => $this->input->post('email'),
			'statusem' => $this->input->post('statusem')
		);
		$this->db->where('employee_id', $idad);
		
		$this->db->update('emmployee', $object);
		redirect('admin');
	}

	public function confrm($employee_id)
	{
		$data = array
		(
			'backlink'  => 'admin',
			'deletelink'=> 'admin/remove/' . $employee_id
		);
		$this->load->view('template/backheader');
		$this->load->view('admin/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($employee_id)
	{
		$this->Admin_model->remove_member($employee_id);
		redirect('admin');
	}


}
