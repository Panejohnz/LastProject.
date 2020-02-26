<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class electriccontroller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('electric_modal');
		// if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
        //     redirect('LoginController');
        // }
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('electric/index');
		$config['total_rows'] = $this->electric_modal->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 14 : 999;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->electric_modal->fetch_Member($config['per_page'], $page, $this->input->get('keyword'));
		$data['link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$this->load->view('template/backheader');
		$this->load->view('electric/mainpage', $data);
		$this->load->view('template/backfooter');
	}

	public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('electric/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'typebill' => $this->input->post('typebill'),
			'pricemeter' => $this->input->post('pricemeter')
			
		);
$this->db->insert('pricebillelec', $object);
redirect('electriccontroller');
		}
	
	public function edit($pricebillelec_id)
	{
		$data['result'] = $this->electric_modal->read_member($pricebillelec_id);
		$this->load->view('template/backheader');
		$this->load->view('electric/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edel($idel){
		$object = array(
			'typebill' => $this->input->post('typebill'),
			'pricemeter' => $this->input->post('pricemeter')
		);
		$this->db->where('pricebillelec_id', $idel);
		
		$this->db->update('pricebillelec', $object);
		redirect('electriccontroller');
	}

	public function confrm($pricebillelec_id)
	{
		$data = array
		(
			'backlink'  => 'electriccontroller',
			'deletelink'=> 'electriccontroller/remove/' . $pricebillelec_id
		);
		$this->load->view('template/backheader');
		$this->load->view('electric/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($pricebillelec_id)
	{
		$this->electric_modal->remove_member($pricebillelec_id);
		redirect('electriccontroller');
	}


}
