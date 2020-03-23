<?php



defined('BASEPATH') OR exit('No direct script access allowed');
class watercontroller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('water_modal');
		// if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
        //     redirect('LoginController');
        // }
	}

	public function index()
	{
		$config = array();
		$config['base_url'] = base_url('water/index');
		$config['total_rows'] = $this->water_modal->record_count($this->input->get('keyword'));
		$config['per_page'] = $this->input->get('keyword') == NULL ? 14 : 999;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = round($choice);

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] = $this->water_modal->fetch_Member($config['per_page'], $page, $this->input->get('keyword'));
		$data['link'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
		$this->load->view('template/backheader');
		$this->load->view('water/mainpage', $data);
		$this->load->view('template/backfooter');
	}

	public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('water/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'typebill' => $this->input->post('typebill'),
			'pricemeter' => $this->input->post('pricemeter')
			
		);
$this->db->insert('pricebill', $object);
redirect('watercontroller');
		}
	
	public function edit($pricebill_id)
	{
		$data['result'] = $this->water_modal->read_member($pricebill_id);
		$this->load->view('template/backheader');
		$this->load->view('water/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edad($idad){
		$object = array(
			'typebill' => $this->input->post('typebill'),
			'pricemeter' => $this->input->post('pricemeter')
		);
		$this->db->where('pricebill_id', $idad);
		
		$this->db->update('pricebill', $object);
		redirect('watercontroller');
	}

	public function confrm($pricebill_id)
	{
		$data = array
		(
			'backlink'  => 'watercontroller',
			'deletelink'=> 'watercontroller/remove/' . $pricebill_id
		);
		$this->load->view('template/backheader');
		$this->load->view('water/confrm',$data);
		$this->load->view('template/backfooter');
	}

	public function remove($pricebill_id)
	{
		$this->water_modal->remove_member($pricebill_id);
		redirect('watercontroller');
	}


}