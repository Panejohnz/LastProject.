<?php
defined('BASEPATH') or exit('No direct script access allowed');
class imgtype extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('imgtype_model');
        if (!$this->session->userdata('firstname_emp')) { //ดัก user บังคับล็อกอิน
            redirect('LoginController');
        }
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('imgtype/index');
        $config['total_rows'] = $this->imgtype_model->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->imgtype_model->fetch_imgtype($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('imgtype/mainpage', $data);
        $this->load->view('template/backfooter');
    }

    public function newdata()
    {
        $this->load->view('template/backheader');
        $this->load->view('imgtype/newdata');
        $this->load->view('template/backfooter');
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

        

            //print_r($data);
            //$this->load->view('upload_success', $data);

            
            //$imgtype_name = $data['imgtype_name'];

            $arr=array(
                                'roomname'=> $this->input->post('roomname'),
                                // 'detail'=> $this->input->post('detail'),
                                'roomprice'=> $this->input->post('roomprice')
                               
                            );
            $this->db->insert('roomcategory', $arr);

            $this->session->set_flashdata(
                            array(
                        'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
                    )
                        );

            redirect('imgtype');
        
    }


    // public function update($value='')
    // {
    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['max_size']     = '2000';
    //     $config['max_width'] = '2000';
    //     $config['max_height'] = '2000';
        
    //     $this->load->library('upload', $config);


    //     //print_r($_POST);

    //     //exit();

    //     if (! $this->upload->do_upload('typeimg')) {
    //         //$error = array('error' => $this->upload->display_errors());
    //         //echo $this->upload->display_errors();
    //         //$this->load->view('upload_form', $error);

               
    //         $arr1=array(
    //                             'id'=> $this->input->post('id'),
    //                             'roomname'=> $this->input->post('roomname'),
    //                             'detail'=> $this->input->post('detail'),
                                
    //                         );
    //         $this->db->where('id', $this->input->post('id'));
    //         $this->db->update('roomcategory', $arr1);


    //         $this->session->set_flashdata(
    //                    array(
    //                     'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-success"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ [ไม่เปลี่ยนภาพ]</div></div>'
    //                 )
    //                );

    //         redirect('imgtype', 'refresh');
    //     } else {
    //         $data = $this->upload->data();

    //         //print_r($data);
    //         //$this->load->view('upload_success', $data);

    //         $filename = $data['file_name'];
    //         //$imgtype_name = $data['imgtype_name'];

    //         if ($filename!='') {
    //             echo "has";
    //         } else {
    //             echo "no";
    //         }

    //         //exit();

    //         $arr=array(
    //                             'id'=> $this->input->post('id'),
    //                             'roomname'=> $this->input->post('roomname'),
    //                             //'typeimg2'=> $this->input->post('typeimg2'),
    //                             "typeimg"=>$filename
    //                         );
    //         $this->db->where('id', $this->input->post('id'));
    //         $this->db->update('imgtype', $arr);

    //         $this->session->set_flashdata(
    //                         array(
    //                     'msginfo'=>'<div class="pad margin no-print"><div style="margin-bottom: 0!important;" class="callout callout-info"><h4><i class="fa fa-info"></i> ข้อความจากระบบ</h4>ทำรายการสำเร็จ</div></div>'
    //                 )
    //                     );

    //         redirect('imgtype', 'refresh');
    //     }
    // }

    public function edittype($idtype){
        $object = array(
            'roomcategory_id'=> $this->input->post('id'),
            'roomname'=> $this->input->post('roomname'),
                                // 'detail'=> $this->input->post('detail'),
                                'roomprice'=> $this->input->post('roomprice')
		);
		$this->db->where('roomcategory_id', $idtype);
		
		$this->db->update('roomcategory', $object);
		redirect('imgtype');
    }


    public function edit($id)
    {
        $data['result'] = $this->imgtype_model->read_imgtype($id);
        $this->load->view('template/backheader');
        $this->load->view('imgtype/edit', $data);
        $this->load->view('template/backfooter');
    }

    public function confrm($id)
    {
        $data = array(
            'backlink'  => 'imgtype',
            'deletelink'=> 'imgtype/remove/' . $id
        );
        $this->load->view('template/backheader');
        $this->load->view('imgtype/confrm', $data);
        $this->load->view('template/backfooter');
    }

    public function remove($id)
    {
        $this->imgtype_model->remove_roomcategory($id);
        redirect('imgtype', 'refresh');
    }
}
