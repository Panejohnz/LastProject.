<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('member_model');
		if (!$this->session->userdata('firstname')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('member/index');
		$config['total_rows'] = $this->member_model->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 14 : 999;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->member_model->fetch_Member($config['per_page'], $page, $this->input->get('keyword'));
		$data['link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$this->load->view('template/backheader');
		$this->load->view('member/mainpage', $data);
		$this->load->view('template/backfooter');
	}

	public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('member/newdata');
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
redirect('member');
		}
	
	public function edit($user_id)
	{
		$data['result'] = $this->member_model->read_member($user_id);
		$this->load->view('template/backheader');
		$this->load->view('member/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edmem($idmem){
		$object = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'tel' => $this->input->post('tel'),
			'email' => $this->input->post('email'),
			
		);
		$this->db->where('user_id', $idmem);
		
		$this->db->update('users', $object);
		redirect('member');
	}

	public function confrm($user_id)
	{
		$data = array
		(
			'backlink'  => 'member',
			'deletelink'=> 'member/remove/' . $user_id
		);
		$this->load->view('template/backheader');
		$this->load->view('member/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($user_id)
	{
		$this->member_model->remove_member($user_id);
		redirect('member');
	}


}
