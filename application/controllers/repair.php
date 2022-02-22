<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Repair extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('repair_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('repair/index');
        $config['total_rows'] = $this->repair_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->repair_model->fetch_imgtype($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('repair/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function newdata()
    {
        $this->load->view('template/backheader');
        $this->load->view('repair/newdata');
        $this->load->view('template/backfooter');
    }

    public function postdata()
    {
        $object = array(
            'user_id' => $this->input->post('customer_id'),
            'roomnum' => $this->input->post('roomnum'),
            'job_description' => $this->input->post('job_description'),
            'operator_id' => $this->input->post('operator_id'),
            'statusrepair' => $this->input->post('statusrepair')
            
        );
        $this->db->insert('repair', $object);
        redirect('ReservationsController');
    }


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
    public function adding($value='')
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

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
            //$imgtype_name = $data['imgtype_name'];

            $arr=array(
                                'roomname'=> $this->input->post('roomname'),
                                "typeimg"=>$filename
                            );
            $this->db->insert('roomcategory', $arr);

            $this->session->set_flashdata(
                array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
            );

            redirect('repair');
        }
    }


    public function update($value='')
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        
        $this->load->library('upload', $config);


        //print_r($_POST);

        //exit();

        if (! $this->upload->do_upload('typeimg')) {
            //$error = array('error' => $this->upload->display_errors());
            //echo $this->upload->display_errors();
            //$this->load->view('upload_form', $error);

               
            $arr1=array(
                                'roomcategory_id'=> $this->input->post('id'),
                                'roomname'=> $this->input->post('roomname'),
                                'typeimg'=> $this->input->post('typeimg2'),
                            );
            $this->db->where('roomcategory_id', $this->input->post('id'));
            $this->db->update('roomcategory', $arr1);


            $this->session->set_flashdata(
                array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-success"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ [ไม่เปลี่ยนภาพ]</div></div>'
                    )
            );

            redirect('repair', 'refresh');
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
                                'repair_id'=> $this->input->post('id'),
                                'roomname'=> $this->input->post('roomname'),
                                //'typeimg2'=> $this->input->post('typeimg2'),
                                "typeimg"=>$filename
                            );
            $this->db->where('repair_id', $this->input->post('id'));
            $this->db->update('repair', $arr);

            $this->session->set_flashdata(
                array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
            );

            redirect('repair', 'refresh');
        }
    }


    public function edit($id)
    {
        $data['result'] = $this->repair_model->read_imgtype($id);
        $this->load->view('template/backheader');
        $this->load->view('repair/edit', $data);
        $this->load->view('template/backfooter');
    }
    public function editre($id)
    {
        $object = array(
            'roomnum' => $this->input->post('roomnum'),
            'job_description' => $this->input->post('job_description'),
            'operator_id' => $this->input->post('operator_id'),
            'statusrepair' => $this->input->post('statusrepair')
            
        );
        $this->db->where('repair_id', $id);
        
        $this->db->update('repair', $object);
        redirect('repair');
    }



    public function confrm($id)
    {
        $data = array(
            'backlink'  => 'repair',
            'deletelink'=> 'repair/remove/' . $id
        );
        $this->load->view('template/backheader');
        $this->load->view('repair/confrm', $data);
        $this->load->view('template/backfooter');
    }

    public function remove($id)
    {
        $this->repair_model->remove_roomcategory($id);
        redirect('repair', 'refresh');
    }


    public function update_repair($id)
    {
        $data2 = array(
            'repair_status' => '2',
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('repair_id', $id);
        $this->db->update('repair', $data2);
        redirect('repair');
        
        // $this->load->model('repair_model', 'Repair');
        // $res = $this->Repair->update_repair();
        // if ($res > 0) {
        //     $this->session->set_flashdata('msg', "updated success");
        //     $this->session->set_flashdata('msg_class', "alert-success");
        // } else {
        //     $this->session->set_flashdata('msg', ";not updated success");
        //     $this->session->set_flashdata('msg_class', "alert-danger");
        // }
        // return redirect('repair');
    }
    public function update_repair2($id)
    {
        $data2 = array(
            'repair_status' => '3',
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('repair_id', $id);
        $this->db->update('repair', $data2);
        redirect('repair');
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
            
        $this->db->where('repair_id', $id);


        $data2 = array(
            'repair_status' => '4',
            'comment' => $this->input->post('send')
          );
   
           
        $this->db->update('repair', $data2);
        
      
        redirect('repair');
    }
    public function hee1()
    {
        $data2 = array(
            
            'comment' => $this->input->post('detail')
          );
        $this->db->update('repair', $data2);
    }
    public function update_statusno($id){
        $data2 = array(
            'comment' => $this->input->post('send1'),
            'employee_id' => $this->session->userdata('employee_id')
          );
   
        $this->db->where('repair_id', $id);
        $this->db->update('repair', $data2);
        redirect('repair');
    }
}
