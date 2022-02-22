<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CheckoutController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Checkout_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        
        $config = array();
        $config['base_url'] = base_url('bill/index');
        $config['total_rows'] = $this->Checkout_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 40 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Checkout_model->fetch_room($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('checkout/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function savecheckhout(){
        $contract_id = $this->input->post('contract_id');
        $this->db->where('contract_id', $contract_id);
        $query = $this->db->get('contract');
        $qq = $query->row_array();

        // echo $qq['insurance'];
        // echo $this->input->post('electricnew');die();
        
        if($this->input->post('electricnew') > $qq['insurance']){
            echo "<script>
        alert('จำนวนเงินไม่ถูกต้อง');
        window.history.back();'';
        </script>";
        // redirect('CheckoutController');
        }else{
            $tt = $qq['insurance'] - $this->input->post('electricnew');
            $this->db->where('contract_id', $contract_id);

          
            
            $this->db->set('insurance', 'insurance-' . $this->input->post('electricnew'), false);
            $this->db->update('contract');

            $r = array(
                'is_checkout' => 3,
                
            );
            $this->db->where('contract_id', $contract_id);
            $this->db->update('contract',$r);

            $A = array(
                'roomstatus' => 1,
                
            );
            $this->db->where('room_id', $qq['room_id']);
            $this->db->update('room',$A);

    
            echo "<script>
            alert('เสร็จสิ้น');
            window.history.back();'';
            </script>";
        }
    }
}