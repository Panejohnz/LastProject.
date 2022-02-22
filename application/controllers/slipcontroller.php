<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slipcontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
    }
    public function paylate()
    {
        $this->load->view('Slip');
    }
    public function paylatelate()
    {
        

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';

        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
      
      
        
        if (! $this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(
                                'slip_date' => date('Y-m-d'),
                                'slip_file'=>$filename,
                               
                                
                            );
            $this->db->where('reservations_id', $idtestt);
            $this->db->update('reservations', $arr);



            $this->db->where('reservations_id', $idtestt);
            $heeee = $this->db->get('reservations');
            $heeee1 = $heeee->row_array();
           $date = $heeee1['start_date'];

            echo "<script>";
        echo "alert('มาทำสัญญาก่อนวันที่ $date');";
        echo "window.location.href = '". base_url(). "Page/Staff ';";
        echo "</script>";
            // echo "<script>";
            // echo "alert('มาจ่ายทำสัญญาก่อนวันที่');";
            // echo "window.location.href= '" . base_url().  "Page/Staff ';";
            // echo "</script>";
            // redirect('Page/Staff');
        }
    }
    public function delete($idtestt1 = null,$idtestt2 = null)
    {
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[5]);
        $idtestt2 = ($arraystate[6]);
        

        $this->db->where('room_id', $idtestt2);
        $one1 = array(
            'roomstatus' => 1
        );
        $this->db->update('room', $one1);

        $this->db->where('reservations_id', $idtestt1);
        $one = array(
            'reservations_status' => 2,
            'end_date' => date('Y-m-d')
        );
        $this->db->update('reservations', $one);

        $this->db->where('reservationsroom_id',$idtestt);
        $query = $this->db->get('reservationsfurniture');
        $query1 = $query->row_array();

        $this->db->where('furniture_id',$idtestt);
        $query1 = $this->db->get('furniture');
        $query11 = $query1->row_array();

        $ff = $query11['stock'] + 1;

        $data = array(
            'img_stock' => $ff
          );
  
          
              // $this->db->delete('order_detail', array('orderid' => $orderid));
         $this->db->where('furniture_id',$idtestt);
         $this->db->update('furniture', $data);

       
        redirect('Page/Staff');
        // $this->db->delete('reservations');

        // $this->db->where('reservations_id', $idtestt);
        // $this->db->delete('reservationsroom');

        // $this->db->where('reservationsroom_id', $idtestt);
        // $this->db->delete('reservationsfurniture');


    }
}