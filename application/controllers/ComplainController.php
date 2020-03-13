<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ComplainController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Complain_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('Complain_model/index');
        $config['total_rows'] = $this->Complain_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Complain_model->fetch_Contract($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        //$data['files'] = $this->complain_model->getRows();
        $this->load->view('template/backheader');
        $this->load->view('complain/mainpage', $data);
        $this->load->view('template/backfooter');
    }



    public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('complain/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'complaindetail' => $this->input->post('complaindetail'),
			'user_id' => $this->input->post('user_id'),
			'date' => $this->input->post('date')
			
		);
$this->db->insert('complain', $object);
redirect('complain');
		}
	
	public function edit($complain_id)
	{
		$data['result'] = $this->Member_model->read_member($complain_id);
		$this->load->view('template/backheader');
		$this->load->view('complain/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edcom($idcom){
		$object = array(
			'complaindetail' => $this->input->post('complaindetail'),
			'user_id' => $this->input->post('user_id'),
			
			
		);
		$this->db->where('complain_id', $idcom);
		
		$this->db->update('complain', $object);
		redirect('Complain');
	}

	public function confrm($complain_id)
	{
		$data = array
		(
			'backlink'  => 'Complain',
			'deletelink'=> 'Complain/remove/' . $complain_id
		);
		$this->load->view('complain/backheader');
		$this->load->view('complain/confrm',$data);
		$this->load->view('complain/backfooter');
	}

	public function remove($complain_id)
	{
		$this->member_model->remove_member($complain_id);
		redirect('Complain');
	}


	public function update_status($id)
    {
        // if (isset($_REQUEST['sval'])) {
        //     $this->load->model('Room_model', 'RoomController');
        //     $up_status = $this->RoomController->update_status();

        //     if ($up_status > 0) {
        //         $this->session->set_flashdata('msg', "updated success");
        //         $this->session->set_flashdata('msg_class', "alert-success");
        //     } else {
        //         $this->session->set_flashdata('msg', ";not updated success");
        //         $this->session->set_flashdata('msg_class', "alert-danger");
        //     }
        //     return redirect('RoomController');
        // }

        $this->db->where('complain_id', $id);


        $data2 = array(
            'statuscomplain' => '2'
          );
   
           
        $this->db->update('complain', $data2);
        redirect('ComplainController');
	}
	public function update_complain($id)
    {
        $data2 = array(
            'statuscomplain' => '1',
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('complain_id', $id);
        $this->db->update('complain', $data2);
        redirect('ComplainController');
    }

}