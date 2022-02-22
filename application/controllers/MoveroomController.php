<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MoveroomController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Moveroom_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('Moveroom_model/index');
        $config['total_rows'] = $this->Moveroom_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Moveroom_model->fetch_Contract($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        //$data['files'] = $this->complain_model->getRows();
        $this->load->view('template/backheader');
        $this->load->view('moveroom/mainpage', $data);
        $this->load->view('template/backfooter');
    }



    public function newdata()
	{
		$this->load->view('template/backheader');
		$this->load->view('moveroom/newdata');
		$this->load->view('template/backfooter');
	}

	public function postdata()
	{
		$object = array(
			'moveroomdetail' => $this->input->post('moveroomdetail'),
			'user_id' => $this->input->post('user_id'),
			'date' => $this->input->post('date')
			
		);
$this->db->insert('moveroom', $object);
redirect('MoveroomController');
		}
	
	public function edit($complain_id)
	{
		$data['result'] = $this->Member_model->read_member($complain_id);
		$this->load->view('template/backheader');
		$this->load->view('moveroom/edit', $data);
		$this->load->view('template/backfooter');
	}

	public function edcom($idcom){
		$object = array(
			'moveroomdetail' => $this->input->post('moveroomdetail'),
			'user_id' => $this->input->post('user_id'),
			
			
		);
		$this->db->where('moveroom_id', $idcom);
		
		$this->db->update('moveroom', $object);
		redirect('MoveroomController');
	}

	public function confrm($complain_id)
	{
		$data = array
		(
			'backlink'  => 'MoveroomController',
			'deletelink'=> 'MoveroomController/remove/' . $complain_id
		);
		$this->load->view('moveroom/backheader');
		$this->load->view('moveroom/confrm',$data);
		$this->load->view('moveroom/backfooter');
	}

	public function remove($complain_id)
	{
		$this->member_model->remove_member($complain_id);
		redirect('MoveroomController');
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
        $this->db->where('moveroom_id', $id);
        $rr = $this->db->get('moveroom');
        $rr1 = $rr->row_array();

        $this->db->where('contract_id', $rr1['contract_id']);
        $rrr = $this->db->get('contract');
        $rrr1 = $rrr->row_array();
            

        $this->db->where('moveroom_id', $id);


        $data2 = array(
            'moveroom_status' => '4',
            'comment' => $this->input->post('send')
          );
   
           
        $this->db->update('moveroom', $data2);

        $data3 = array(
            'is_checkout' => '2'
        );
        $this->db->where('contract_id', $rrr1['contract_id']);
        $this->db->update('contract', $data3);
        
        redirect('MoveroomController');
	}
	public function update_moveroom($id)
    {
        $data2 = array(
            'moveroom_status' => '2',
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('moveroom_id', $id);
        $this->db->update('moveroom', $data2);
        redirect('MoveroomController');
    }
    public function update_moveroom2($id)
    {
        $data2 = array(
            'moveroom_status' => '3',
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('moveroom_id', $id);
        $this->db->update('moveroom', $data2);
        redirect('MoveroomController');
    }
    public function update_statusno($id){
        $data2 = array(
            'comment' => $this->input->post('send1'),
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('moveroom_id', $id);
        $this->db->update('moveroom', $data2);
        redirect('MoveroomController');
    }

}