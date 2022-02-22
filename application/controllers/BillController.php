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
        //     $natthi1 = $this->db->query("SELECT SUM(utilitypricetotal)
        //    AS aa  FROM billutility
        //     WHERE billutility.bill_id = 34");
        //       $peach1 = $natthi1->row_array();

        //     // $peach1 = $natthi1->row_array();

        //      echo $peach1['aa'];
        //     die();

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
        // $this->db->select('furniture_id')->from('reservationsfurniture')->where('reservationsroom_id', 1);
        // $query1 = $this->db->get();

        // foreach ($query1->result() as $row) {
        //     $tt = $row->furniture_id;
        //     echo $tt . ' ';
        // }die();

        $room_id = $this->input->post('room_id');
       
        // $this->input->post('waternew');
        $this->db->where('room_id', $room_id);
        $query = $this->db->get('room');
        $imf = $query->row_array();
        
        $roomnum = $imf['roomnum'];

        $this->db->where('room_id', $room_id);
        $cc = $this->db->get('contract');
        $cc1 = $cc->row_array();

        // echo $room_id;
        // echo $cc1['contract_id'];die();

        $this->db->where('roomcategory_id', $imf['roomcategory_id']);
        $queryy = $this->db->get('roomcategory');
        $imff = $queryy->row_array();

        $this->db->where('room_id', $room_id);
        $nanzy =  $this->db->get('contract');
        $nanzyy = $nanzy->row_array();
        $rrrr =  $nanzyy['reservationsroom_id'];
      
       
        if (isset($_POST['submit'])) {
            $this->db->where('utility_id', 2);
            $this->db->order_by('utility_id', 'DESC');
            $f = $this->db->get('publicutility');
            $f1 = $f->row_array();

            $this->db->where('utility_id', 1);
            $this->db->order_by('utility_id', 'DESC');
            $n = $this->db->get('publicutility');
            $n1 = $n->row_array();

           
        
            $query = $this->db->query("SELECT * FROM billutility 
            JOIN bill ON bill.bill_id = billutility.bill_id 
            JOIN contract ON contract.contract_id = bill.contract_id  
            JOIN publicutility ON publicutility.utility_id = billutility.utility_id 
            WHERE contract.room_id = $room_id ORDER BY billutility.bill_id DESC LIMIT 2");
            $qq = $query->row_array();

            $ps = $this->db->query("SELECT * FROM billutility 
            JOIN bill ON bill.bill_id = billutility.bill_id 
            JOIN contract ON contract.contract_id = bill.contract_id  
            JOIN publicutility ON publicutility.utility_id = billutility.utility_id
            WHERE contract.room_id = $room_id AND billutility.utility_id = 1 ORDER BY billutility.bill_id DESC LIMIT 1");
            $ps1 = $ps->row_array();

            $pss = $this->db->query("SELECT * FROM billutility 
            JOIN bill ON bill.bill_id = billutility.bill_id 
            JOIN contract ON contract.contract_id = bill.contract_id  
            JOIN publicutility ON publicutility.utility_id = billutility.utility_id
            WHERE contract.room_id = $room_id AND billutility.utility_id = 2 ORDER BY billutility.bill_id DESC LIMIT 1");
            $pss1 = $pss->row_array();            
        
           
            $this->db->where('reservationsroom_id', $nanzyy['reservationsroom_id']);
            $nanzy1 =  $this->db->get('reservationsfurniture');
            $nanzyy1 = $nanzy1->row_array();
            $yyy = $nanzyy['reservationsroom_id'];
  $query1 =  $this->db->query("SELECT * FROM reservationsfurniture JOIN furniture ON furniture.furniture_id = reservationsfurniture.furniture_id
    WHERE reservationsfurniture.reservationsroom_id = $yyy");
            // $this->db->select('furniture_id')->from('reservationsfurniture')->where('reservationsroom_id', $nanzyy['reservationsroom_id']);
            // $query1 = $this->db->get();
            
            if ($query1->num_rows() > 0) {
                $arrr=array(
                    'contract_id' => $cc1['contract_id'],
                    'bill_date' => date('Y-m-d'),
                    'bill_month' => date('m'),
                    'bill_year' => date('Y'),
                    'employee_id' => $this->session->userdata('employee_id'),
                    'bill_status' => 1,
                    );
                $ord_id = $this->Bill_model->insert_order($arrr);

                foreach ($query1->result_array() as $row) { 
      
                    // print_r($nanzyy1);
                    
                    //  echo $tt

                    // for ($i=0;$i<count($row);$i++) {
                        $this->db->where('furniture_id', $row['furniture_id']);
                        $tp =  $this->db->get('furniture');
                        $tp1 = $tp->row_array();

                        

                        $anunya=array(
                            'biil_id' => $ord_id,
                            'furniture_id' => $row['furniture_id'],
                            'furnitureprice' => $row['furnitureprice'],
                            'furniture_amount' => 1
            
                       );
                        $this->db->insert('billfurniture', $anunya);
                    }

                    $curmonth = date("Y-m");
                    $billmonth = $qq['datecontract_start'];
                    $start_eletrict = $qq['start_eletrict'];
                    $start_water = $qq['start_water'];
                    $billmonth1 = substr($billmonth, 0, 7);
                    // echo $curmonth;
            // echo '<br>';
            // echo $billmonth1;
            if ($curmonth == $billmonth1) {//เอาเลขมิเตอร์ไปหักลบกับตารางสัญญาถ้าเป็นเดือนแรก

                if ($this->input->post('electricnew') < $qq['start_eletrict']) {
                    echo "<script>
                    alert('จำเลขไม่ถูกต้อง');
                    window.history.back();'';
                    </script>";
                } else {
                    $fi=array(
                    'bill_id' => $ord_id,
                    'utility_id' => 1,
                    'unit' => $this->input->post('electricnew'),
                    'utilitypricetotal' => ($this->input->post('electricnew') - $qq['start_eletrict']) * $n1['utilityprice'],
                );
    
                    $na=array(
                    'bill_id' => $ord_id,
                    'utility_id' => 2,
                    'unit' => $this->input->post('waternew'),
                    'utilitypricetotal' => ($this->input->post('waternew') - $qq['start_water']) * $f1['utilityprice'],
                );
    
            
                    $this->db->insert('billutility', $fi);
                    $this->db->insert('billutility', $na);
                }
            } else {
                if ($this->input->post('electricnew') < $qq['unit']) {
                    echo "<script>
                    alert('จำนวนเลขไม่ถูกต้อง');
                    window.history.back();'';
                    </script>";
                } else {
                    $fi1=array(
                'bill_id' => $ord_id,
                'utility_id' => 1,
                'unit' => $this->input->post('electricnew'),
                'utilitypricetotal' => ($this->input->post('electricnew') - $ps1['unit']) * $n1['utilityprice'],
            );

                    $na1=array(
                'bill_id' => $ord_id,
                'utility_id' => 2,
                'unit' => $this->input->post('waternew'),
                'utilitypricetotal' => ($this->input->post('waternew') - $pss1['unit']) * $f1['utilityprice'],
            );
                
        
                    $this->db->insert('billutility', $fi1);
                    $this->db->insert('billutility', $na1);
                }
            }
                
          
                     

                    // echo "<script>
                    // alert('บันทึกข้อมูลห้อง ' . $roomnum . ' แล้ว');
                    // window.history.back();'';
                    // </script>";
                    $natthi1 = $this->db->query("SELECT SUM(utilitypricetotal)
                         AS aa  FROM billutility 
                         WHERE billutility.bill_id = $ord_id");
                    $peach1 = $natthi1->row_array();
    
                    // $peach1 = $natthi1->row_array();
    
                    //  echo $peach1['aa'];
                    // die();


                    $natthi = $this->db->query("SELECT * FROM bill JOIN billutility ON billutility.bill_id = bill.bill_id JOIN billfurniture ON billfurniture.biil_id = billutility.bill_id JOIN contract ON contract.contract_id = bill.contract_id WHERE bill.bill_id = $ord_id");
                    $peach = $natthi->row_array();

                    $aild = $this->db->query("SELECT SUM(furnitureprice) AS gg FROM billfurniture WHERE billfurniture.biil_id = $ord_id");
                    $thitiporn = $aild->row_array();

                    $sum = $thitiporn['gg'] + $peach1['aa'] + $peach['roomprice'];
                    // echo $sum;

                   

                     
                   
                   
                    // die();
                
            }
        }
        $this->db->where('bill_id', $ord_id);
        $data99 = array(
'bill_totalprice' => $sum,
            'roompricebill' => $peach['roomprice']
            
);
// echo $this->input->post('waternew'); echo ',';
// echo $this->input->post('electricnew'); echo ',';
// echo $pss1['unit'];echo ',';
// echo $ps1['unit'];echo ',';
// echo $n1['utilityprice'];echo ',';
// echo $f1['utilityprice'];echo ',';

// die();
        $this->db->update('bill', $data99);
        echo "<script>
        alert('บันทึกข้อมูลห้อง $roomnum แล้ว');
        window.history.back();'';
        </script>";
        
    }
    //  redirect('BillController');
    //$this->db->where('');
    // POST data

    public function edit($room_id)
    {
        // $this->db->where('room_id', $room_id);
        //  $data = $this->db->get('electricbill');
        $this->load->view('template/argon');
        // $this->load->view('bill/edit');
        //$this->load->view('template/backfooter');
    }

    public function cal1()
    {
        $points = $this->input->post('electricnew');
        $passes = $this->input->post('waternew');
        for ($i=0;$i<sizeof($points);$i++) {
            $dataSet[$i] = array('electricnew' => $points[$i], 'waternew' => $passes[$i]);
        }
        // $dataSet is an array of array
        $this->Bill_model->insert_stat($dataSet);
    }
}
