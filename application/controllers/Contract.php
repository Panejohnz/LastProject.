<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contract extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('contract_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('contract');
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
        $this->load->view('template/contract');
        $this->load->view('contract/newdata');
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
    public function adding($reservations_id)
    {
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
        $idtestt = ($arraystate[6]);
        $idtest = ($arraystate[7]);
         $idtest1 = ($arraystate[8]);
        // $idtest2 = ($arraystate[9]);totalprice

        $arr=array(
                             "user_id" => $idtestt,
                             "identity_card"=>$this->input->post('card'),
                             "datecontract_start" => $this->input->post('datestart'),
                             "datecontract_end" => $this->input->post('dateend'),
                             "room_id" => $idtest,
                             "address" => $this->input->post('address'),
                             "employee_id" => $emp_id,
                             "totalprice" => $this->input->post('totalprice')
                            );
        $this->db->insert('contract', $arr);

        $this->session->set_flashdata(
                array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
            );
            $this->db->where('reservations_id', $idtest1);
        $this->db->delete('reservations');

        $this->db->where('reservations_id', $idtest1);
        $this->db->delete('reservationsroom');

        $this->db->where('reservations_id', $idtest1);
        $this->db->delete('reservationsfurniture');
        redirect('contract');
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
            //echo $this->upload->display_errors();
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
