<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BillController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Bill_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('bill/index');
        $config['total_rows'] = $this->Bill_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 40 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Bill_model->fetch_room($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('bill/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function cal()
    {
        $room_id = $this->input->post('room_id');
        // $this->input->post('waternew');
        $this->db->where('room_id', $room_id);
        $query = $this->db->get('room');
        $imf = $query->row_array();
        
        $roomnum = $imf['roomnum'];

        $this->db->where('room_id', $imf['room_id']);
        $cc = $this->db->get('contract');
        $cc1 = $cc->row_array();

        $this->db->where('roomcategory_id', $imf['roomcate_id']);
        $queryy = $this->db->get('roomcategory');
        $imff = $queryy->row_array();

        $this->db->where('pricebill_id', 1);
        $query1 = $this->db->get('pricebill');
        $imf2 = $query1->row_array();

        $this->db->where('pricebill_id', 2);
        $query2 = $this->db->get('pricebill');
        $imf3 = $query2->row_array();

        $this->db->where('room_id',$imf['room_id']);
        $this->db->order_by('electricbill_id', 'DESC');
      $oop = $this->db->get('electricbill',1);
        $rr = $oop->row_array();
        
        $this->db->where('room_id',$imf['room_id']);
        $this->db->order_by('water_id', 'DESC');
      $oop1 = $this->db->get('waterbill',1);
        $rr1 = $oop1->row_array();
        // print_r($room_id);
        // $water = 15 * $postData['waternew'];
        // echo $water;
        // echo $this->input->post('electricnew');
        // echo '<br>';
        // echo $this->input->post('waternew');
        // echo '<br>';
        // echo $imf2['pricemeter'] * $this->input->post('electricnew');
        // echo '<br>';
        // echo $imf3['pricemeter']  * $this->input->post('waternew');

        $arr=array(
        'room_id' => $room_id,
        'unit'=> $imf3['pricemeter'],
        'pricebill_id'=> $imf3['pricebill_id'],
       // 'waterbill' => $this->input->post('waternew'),
       // 'electric_price	' => $imf2['pricemeter'] * $this->input->post('electricnew'),
        //'water_price' => $imf3['pricemeter'] * $this->input->post('waternew'),
        'meternumber'=> $this->input->post('electricnew'),
        'price' => ($this->input->post('electricnew') - $rr['meternumber'] ) * $imf3['pricemeter'],
        'date_create' => date('Y-m-d')
    );
        

        $arrr=array(
            'room_id' => $room_id,
            'unitw'=> $imf2['pricemeter'],
            'pricebill_id'=> $imf2['pricebill_id'],
           // 'waterbill' => $this->input->post('waternew'),
           // 'electric_price	' => $imf2['pricemeter'] * $this->input->post('electricnew'),
            //'water_price' => $imf3['pricemeter'] * $this->input->post('waternew'),
            'meternumberw'=> $this->input->post('waternew'),
            'pricew' => ($this->input->post('waternew') - $rr1['meternumberw'] ) * $imf2['pricemeter'],
            'date_createw' => date('Y-m-d')
        );
        if ($this->input->post('waternew') <= $rr1['meternumberw']) {
            echo "<script>";
            echo "alert('กรอกเลขมิเตอร์ไม่ถูกต้อง');";
            echo "window.location.href = '". base_url()."BillController';";
            echo "</script>";
        }
        elseif($this->input->post('electricnew') <= $rr['meternumber']){
            echo "<script>";
            echo "alert('กรอกเลขมิเตอร์ไม่ถูกต้อง');";
            echo "window.location.href = '". base_url()."BillController';";
            echo "</script>";
            
        }else{
            
            echo "<script>";
            echo "alert('บันทึกข้อมูลห้อง $roomnum แล้ว');";
            echo "window.location.href = '". base_url()."BillController';";
            echo "</script>";
            $this->db->insert('electricbill', $arr);
            $this->db->insert('waterbill', $arrr);
        }
           
           
      //  redirect('BillController');
        //$this->db->where('');
        // POST data
    }
    public function edit($room_id)
    {
        // $this->db->where('room_id', $room_id);
        //  $data = $this->db->get('electricbill');
        $this->load->view('template/argon');
        $this->load->view('bill/edit');
        //$this->load->view('template/backfooter');
    }

    public function cal1(){
       

            $points = $this->input->post('electricnew');
            $passes = $this->input->post('waternew'); 
            for($i=0;$i<sizeof($points);$i++)
            {
              $dataSet[$i] = array ('electricnew' => $points[$i], 'waternew' => $passes[$i]);
            }
            // $dataSet is an array of array
            $this->Bill_model->insert_stat($dataSet);
          
    }
}
