<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contract extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Contract_model');
        $this->load->model('Bill_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('contract');
        $config['total_rows'] = $this->Contract_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->Contract_model->fetch_Contract($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('template/backheader');
        $this->load->view('contract/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function newdata($reservations_id)
    {
        // $this->db->where('id', $id);
        // $this->db->get('Table', limit, offset);
        // $this->db->where('reservations_id',$reservations_id);
        // $qq = $this->db->get('reservations');
        // $data = $qq->result_array();
        // $data['results'] = $this->contract_model->fetch_Contract($reservations_id);
        //print_r($data);
        $data['id'] = $reservations_id;
        $this->load->view('template/contract');
        $this->load->view('contract/newdata', $data);
        $this->load->view('template/backfooter');
    }
    // public function download($contract_id)
    // {
    //     if (!empty($contract_id)) {
    //         //load download helper
    //         $this->load->helper('download');
            
    //         //get file info from database
    //         $fileInfo = $this->contract_model->getRows(array('contract_id' => $contract_id));
            
    //         //file path
    //         $file = 'uploads/'.$fileInfo['insurance'];
            
    //         //download file from directory
    //         force_download($file, null);
    //     }
    
    /*
        public function postdata()

        {
            print_r($_FILES);
            exit;
            if($this->input->server('REQUEST_METHOD') == TRUE){
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);


                //$this->upload->initialize($config);
                //$config['overwrite'] = TRUE;
                $config['typeimg'] = ($this->input->post('datafile')=='') ? uniqid() : $this->input->post('datafile');
                //$this->load->library('upload',$config);

                $no_file_error = "<p>You did not select a file to upload.</p>";
                if(!$this->upload->do_upload('typeimg') && $this->upload->display_errors() != $no_file_error){
                    $checkfile = FALSE;

                }
                else
                {
                    $checkfile = TRUE;
                }
                if($this->form_validation->run() == TRUE && $checkfile == TRUE)
                {
                    $this->session->set_flashdata(
                        array(
                            'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                        )
                    );

                    $data     = $this->upload->data();
                    $datafile = ($this->input->post('datafile')=='') ? $data['typeimg'] : $this->input->post('datafile');
                    $this->imgtype_model->entry_imgtype($this->input->post('imgtype_id'),$datafile);
                    redirect('imgtype', 'refresh');
                }
                else
                {
                    $data = array(
                        'error_imgtype_name' 	=> form_error('imgtype_name'),
                        'err_typeimg'     		=> $this->upload->display_errors(),
                        'imgtype_name'       	=> set_value('imgtype_name'),
                        'typeimg'       		=> set_value('typeimg')

                    );
                    $this->session->set_flashdata($data);

                    //print_r($data);

                    //exit();

                }
                if($this->input->post('imgtype_id') == NULL){
                    //redirect('imgtype/newdata');
                }
                else
                {
                    //redirect('imgtype/edit/'.$this->input->post('imgtype_id'));
                }
            }
        }

    */
    public function adding()
    {
                   
        
        // $a_date1 = date('Y-m-d',strtotime("+0 month")); 
       
        // $mdate = date("Y/m/t", strtotime($a_date1));
 
        // echo $mdate;
        // echo $a_date1; die();
        $emp_id = $this->session->userdata('employee_id');
        // $Date = $this->input->post("datepickerstart");
        //     $dat = date("Y-m-d", strtotime($Date));
        //     $Date2 = $this->input->post("datepickerend");
        //     $dat2 = date("Y-m-d", strtotime($Date2));


        // $config['upload_path'] = './uploads/';
        // $config['allowed_types'] = 'gif|jpg|png|doc|docx|pptx|xlsx|pdf';
        // $config['max_size']     = '10000000';
        // $config['max_width'] = '2000';
        // $config['max_height'] = '2000';


        // $this->load->library('upload', $config);

        // if (! $this->upload->do_upload('typeimg')) {
        //     //$error = array('error' => $this->upload->display_errors());
        //     echo $this->upload->display_errors();
        //$this->load->view('upload_form', $error);
        // } else {
        // $data = $this->upload->data();

        //print_r($data);
        //$this->load->view('upload_success', $data);

        /// $filename = $data['file_name'];
        //$imgtype_name = $data['imgtype_name'];
        //$cust_id = $this->session->userdata('user_id');
        // $this->db->where('user_id',$user_id);
        // $qq = $this->db->get('users');
        // $hee = $qq->row_array();
    
            
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $idtest = ($arraystate[6]);
        $idtest1 = ($arraystate[7]);
        // $idtest2 = ($arraystate[9]);totalprice

       

        // if ($curmonth == $billmonth1) {
            
            $this->db->where('room_id', $idtest);
            $mild = $this->db->get('room');
            $mildpith = $mild->row_array();

            $this->db->where('roomcategory_id', $mildpith['roomcategory_id']);
            $pit = $this->db->get('roomcategory');
            $pit1 = $pit->row_array(); 
            
            
            

        // } else {//ค่าห้องเฉลี่ย

            $arr=array(
                             "user_id" => $idtestt,
                             "identity_card"=>$this->input->post('cards'),
                             "datecontract_start" => $this->input->post('datestart'),
                             "datecontract_end" => $this->input->post('dateend'),
                             "room_id" => $idtest,
                             //"address" => $this->input->post('address'),
                             "employee_id" => $emp_id,
                             "roomprice" => $this->input->post('totalprice'),
                             'reservationsroom_id' => $this->input->post('kuykwai'),
                             'start_eletrict' => $this->input->post('fire'),
                             'start_water' => $this->input->post('nam'),
                             'contract_date' => date('Y-m-d'),
                             'insurance' => $pit1['roomprice'] + ($pit1['roomprice'] * 2)
                            );
        //     // $this->db->insert('contract', $arr);
            $ord_id = $this->Contract_model->insert_order($arr);

        $this->db->where('contract_id', $ord_id);
        $con1 =  $this->db->get('contract');
        $con11 = $con1->row_array();
    
        $curmonth = date("Y-m-d");
        $billmonth = $con11['datecontract_start'];
        $start_eletrict = $con11['start_eletrict'];
        $start_water = $con11['start_water'];
        $billmonth1 = substr($billmonth, 8, 10);

        // $curmonth = date("Y-m-d");
        $a_date1 = date('Y-m-d',strtotime("+0 month")); 
       
        $mdate = date("Y/m/t", strtotime($a_date1));
        $mdate1 = substr($mdate, 8, 10);  

        // $mdatee = date("Y/m/t", strtotime($a_date1));
        $mdatee1 = substr($curmonth, 8, 10);  
        // echo $mdatee1;        
// die();
    //    echo $mdate1; echo ',';
    //     echo $billmonth1;echo ',';
    //     echo $curmonth;echo ',';
    //   die();
                        
        $roomprice = (($mdate1 - $billmonth1) + 1) * 100;

        // echo $roomprice;
        // die();
        if($mdate1 >= 15){
            $arrr=array(
                'contract_id' => $ord_id,
                'bill_date' => date('Y-m-d'),
                'bill_month' => date('m'),
                'bill_year' => date('Y'),
                'employee_id' => $this->session->userdata('employee_id'),
                'bill_status' => 1,
                'roompricebill' => $roomprice
                );
            $ord_id1 = $this->Bill_model->insert_order($arrr);
        }else{
            $arrr=array(
            'contract_id' => $ord_id,
            'bill_date' => date('Y-m-d'),
            'bill_month' => date('m'),
            'bill_year' => date('Y'),
            'employee_id' => $this->session->userdata('employee_id'),
            'bill_status' => 1,
            'roompricebill' => $pit1['roomprice']
            );
            $ord_id1 = $this->Bill_model->insert_order($arrr);
        }
        $fi=array(
                'bill_id' => $ord_id1,
                'utility_id' => 1,
                'unit' => $this->input->post('fire'),
                'utilitypricetotal' => 0,
            );

        $na=array(
                'bill_id' => $ord_id1,
                'utility_id' => 2,
                'unit' => $this->input->post('nam'),
                'utilitypricetotal' => 0,
            );

        
        $this->db->insert('billutility', $fi);
        $this->db->insert('billutility', $na);

        $this->db->where('reservationsroom_id', $idtest1);
        $furni = $this->db->get('reservationsfurniture');
        $ferniture = $furni->result_array();
        foreach ($ferniture as $hee):
        $fur=array(
                'contract_id' => $ord_id,
                'furniture_id' => $hee['furniture_id'],
              'furniture_amount' => $hee['furniture_amount'],
              'furnitureprice' => $hee['furnitureprice']
        );
        $this->db->insert('contractfurniture', $fur);
        endforeach;

     

        

        $this->session->set_flashdata(
            array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
        );
        //     $this->db->where('reservations_id', $idtest1);
        // $this->db->delete('reservations');

        // $this->db->where('reservations_id', $idtest1);
        // $this->db->delete('reservationsroom');

        // $this->db->where('reservations_id', $idtest1);
        // $this->db->delete('reservationsfurniture');
      
        $this->db->where('room_id', $idtest);
        // //     // $query = $this->db->get('room');
        // //     // $imf = $query->row_array();

        $data2 = array(
            'roomstatus' => '3'
          );

        
        $this->db->update('room', $data2);
      
        $this->db->where('reservations_id', $idtest1);
        $data58 = array(
            'reservations_status' => 3,
            'deposit' => 0
        );

        $this->db->update('reservations', $data58);
        echo "<script>
       alert('เสร็จเรียบร้อย');
       </script>";
        redirect('contract');
        // }
    }

    public function update($value='')
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '10000000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        
        $this->load->library('upload', $config);


        //print_r($_POST);

        //exit();

        if (! $this->upload->do_upload('Insurance')) {
            //$error = array('error' => $this->upload->display_errors());
            //echo $this->upload->display_errors()
            //$this->load->view('upload_form', $error);

               
            $arr1=array(
                                'contract_id'=> $this->input->post('id'),
                                // 'roomname'=> $this->input->post('roomname'),
                                'Insurance'=> $this->input->post('Insurance'),
                            );
            $this->db->where('contract_id', $this->input->post('id'));
            $this->db->update('contract', $arr1);


            $this->session->set_flashdata(
                array(
                           'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-success"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ [ไม่เปลี่ยนภาพ]</div></div>'
                    )
            );

            redirect('contract', 'refresh');
        } else {
            $data = $this->upload->data();

            //print_r($data);
            //$this->load->view('upload_success', $data);

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];

            if ($filename!='') {
                echo "has";
            } else {
                echo "no";
            }

            //exit();

            $arr=array(
                                'contract_id'=> $this->input->post('id'),
                                // 'roomname'=> $this->input->post('roomname'),
                                //'typeimg2'=> $this->input->post('typeimg2'),
                                "insurance"=>$filename,
                                'startrcontract' => $this->input->post('startdate'),
                'endrcontractct' => $this->input->post('enddate'),
                'numroom' => $this->input->post('numroom'),
                'idcustomer' => $this->input->post('idcustomer')
                            );
            $this->db->where('contract_id', $this->input->post('id'));
            $this->db->update('contract', $arr);

            $this->session->set_flashdata(
                array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
            );

            redirect('contract', 'refresh');


            $object = array(
             
                'insurance' => $this->input->post('typeimg'),
                'startrcontract' => $this->input->post('startdate'),
                'endrcontractct' => $this->input->post('enddate'),
                'numroom' => $this->input->post('numroom'),
                'idcustomer' => $this->input->post('IdCustomer')
            
            );
            $this->db->insert('contract', $object);
            redirect('contract');
        }
    }
    


    public function edit($id)
    {
        $data['result'] = $this->contract_model->read_contract($id);
        $this->load->view('template/backheader');
        $this->load->view('contract/edit', $data);
        $this->load->view('template/backfooter');
    }

    public function edcon($idmem)
    {
       
            //$imgtype_name = $data['imgtype_name'];

        $Date = $this->input->post("datepickerstart");
        $dat = date("Y-m-d", strtotime($Date));
        $Date2 = $this->input->post("datepickerend");
        $dat2 = date("Y-m-d", strtotime($Date2));
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|doc|docx|pptx|xlsx';
        $config['max_size']     = '10000000';
        $config['max_width'] = '200000';
        $config['max_height'] = '200000';
            
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('typeimg')) {
            //$error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
        //$this->load->view('upload_form', $error);
        } else {
            $data = $this->upload->data();
    
            //print_r($data);
            //$this->load->view('upload_success', $data);
    
            $filename = $data['file_name'];

            $object = array(
            "insurance"=>$filename,
            'startrcontract' => $dat,
            'endrcontractct' => $dat2,
            'numroom' => $this->input->post('numroom'),
            'idcustomer' => $this->input->post('IdCustomer')
        );
            $this->db->where('contract_id', $idmem);
        
            $this->db->update('contract', $object);
            redirect('contract');
        }
    }

    public function confrm($id)
    {
        $data = array(
            'backlink'  => 'contract',
            'deletelink'=> 'contract/remove/' . $id
        );
        $this->load->view('template/backheader');
        $this->load->view('contract/confrm', $data);
        $this->load->view('template/backfooter');
    }

    public function remove($id)
    {
        $this->contract_model->remove_contract($id);
        redirect('contract', 'refresh');
    }
    public function ee()
    {
        $config = array();
        $config['base_url'] = base_url('contract/index');
        $config['total_rows'] = $this->contract_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->contract_model->fetch_Contract($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['files'] = $this->contract_model->getRows();
        $this->load->view('template/backheader');
        $this->load->view('contract/contract');
        $this->load->view('template/backfooter');
    }
}
