<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bookaroom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('ReservationsModel');
    }
    public function index()
    {
    }
    public function dd($id = null)
    {
        $this->db->where('room_id', $id);
        $query = $this->db->get('room');
        $qq = $query->row_array();
        //print_r($qq);
        
        $this->load->view('Reservations', $qq);
    }

    // public function keyword($cateid = null)
    // {
    //     $this->db->where('id', $cateid);
    //     $query = $this->db->get('roomcategory');
    //     $qq = $query->row_array();
    //     //    $qq = array(
    //     //     'reservationsstart' => $this->input->post('datepicker'),
    //     //     'reservationsprice' => '2000');
    //     //     $this->db->insert('reservations', $qq);
    //     $search_room = $this->ReservationsModel->search_room($cateid);
    //     $data  = $search_room->row_array();
    //     $level = $data['id'];
    //     $sesdata = array(
    //             'id'     => $level,
    //         );
    //     $this->session->set_userdata($sesdata);
            
    //     if ($level === '1') {
    //         redirect('ReservationsController/airroom');
    //     }
    // }


    public function postdata($user_id)
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']  = '1000000000';
        $config['max_width']  = '1000000000';
        $config['max_height']  = '1000000000';
        
        $this->load->library('upload', $config);
        
        $cust_id = $this->session->userdata('user_id');
      
        
        if (! $this->upload->do_upload('file')) {
            echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();

            $filename = $data['file_name'];
            //$imgtype_name = $data['imgtype_name'];
            $arr=array(         'reservationsstart' => $this->input->post('reservationsstart'),
                                'slip_date' => date('Y-m-d'),
                                'slip_file'=>$filename,
                                'id_users' => $cust_id,
                                'deposit' => $this->input->post('deposit'),
                                
                            );
            $ord_id = $this->ReservationsModel->insert_order($arr);
           
                         
            $order_detail = array(
                                'room_id' => $this->input->post('roomnum'),
                              'reservations_id' => $ord_id
                            );
                        

            
                    
            // Insert product imformation with order detail, store in cart also store in database.
                    
            $f_id = $this->ReservationsModel->insert_order_detail($order_detail);
            
            if (isset($_POST['submit'])) {
                $user_id=$ord_id;//Pass the userid here
                
                $checkbox = $_POST['customCheck1']; //บัคไลน์นี้
              
                // print_r($checkbox);
                for ($i=0;$i<count($checkbox);$i++) {
                    $sss=array(
                        'reservations_id' => $user_id,
                        'furniture_id' => $checkbox[$i]
                    );
                    $ds = array('Type' => "มีเฟอร์นิเจอร์");
                    $this->db->where('reservations_id', $user_id);
                    $ff = $this->db->update('reservations', $ds);
                    
                    $cust_id = $this->ReservationsModel->insert_order_detail1($sss);//Call the modal
                    $nan = $sss['furniture_id'];
             

                    if ($checkbox == '') {
                        $sss=array(
                    'reservations_id' => $user_id,
                    'furniture_id' => $checkbox[$i]
                );
                        $dss = array('Type' => "ไม่มีเฟอร์นิเจอร์");
                        $this->db->where('reservations_id', $user_id);
                        $ff = $this->db->update('reservations', $dss);


                       

            

                        // $this->db->where('furniture_id', $nan);
                        // $chompoo = $this->db->get('furniture');
                        // $plamy = $chompoo->row_array();

                        // $this->db->where('furniture_id', $nan);
                        // $chompoo = $this->db->get('furniture');
                        // $plamy = $chompoo->row_array();
                    
                        // echo $plamy['price'];
                    }
                    $this->db->set('stock', 'stock-' . 1, false);
                    $this->db->where('furniture_id',$checkbox[$i]);
                    $this->db->update('furniture');
                }
                $queryy=$this->db->query("SELECT SUM(furniture.price) as pp FROM reservationsfurniture JOIN furniture ON furniture.furniture_id = reservationsfurniture.furniture_id WHERE reservationsfurniture.reservations_id = $user_id ");
                $yy = $queryy->row_array();
               // echo $yy['pp']. "บาท";
               $this->load->library('session');
                $stringrow = base_url(uri_string());
                $arraystate = (explode("/", $stringrow));
                $idtestt = ($arraystate[5]);

                $this->db->where('room_id', $idtestt);
                $mana = $this->db->get('room');
                $hh = $mana->row_array();

                $this->db->where('roomcategory_id', $hh['roomcate_id']);
                $mana1 = $this->db->get('roomcategory');
                $hh1 = $mana1->row_array();

                $sum = $yy['pp'] + $hh1['roomprice'];
               // echo "ราคารวม " . $sum;
              
               $this->db->where('reservations_id', $ord_id);
               $oo = array(
              'totalprice' => $sum
            );
            $this->db->update('reservationsroom', $oo);
            
               
               
                
                
                //     $this->db->insert('reservations', $arr);

            //     $rr = $this->db->get('reservations');
            //     $rrr = $rr->row_array();
            //     $ss=array(
            //         'room_id' => $this->input->post('roomnum'),
            //         'reservations_id' => $rrr['reservations_id'],
            //     );
            //     $this->db->insert('reservationsroom', $ss);
            $id = $this->input->post('roomnum');
            $this->db->where('room_id', $id);
            // //     // $query = $this->db->get('room');
            // //     // $imf = $query->row_array();

            $data2 = array(
                'roomstatus' => '1'
              );
   
            
            $this->db->update('room', $data2);

            // // if (isset($_POST['submit'])) {
            // //     $user_id=$rrr['reservations_id'];//Pass the userid here
            // //     $checkbox = $_POST['customCheck1'];
            // //     print_r($checkbox);
            // //     for ($i=0;$i<count($checkbox);$i++) {
            // //         $sss=array(
            // //             'reservations_id' => $user_id,
            // //             'furniture_id' => $checkbox[$i]
            // //         );
            // //         $this->db->insert('reservationsfurniture', $sss);//Call the modal
            // //     }
            // // }
            //echo $this->input->post($_POST['customCheck1']);
        
                $this->data0['his'] = $this->ReservationsModel->historybill($id);
               $this->load->view('Hee', $this->data0, $sum,false);
            echo "<script>";
            echo "alert('จองห้องพักเรียบร้อย  $sum');";
            echo "window.location.href = '". base_url()."Page/staff';";
            echo "</script>";

            
        
           // redirect('ReservationsController');
            }
        }
      
    }
    

    public function up($id)
    {
        $data2 = array(
            'roomstatus' => '1'
          );
            
        $this->db->where('room_id', $id);
        $this->db->update('room', $data2);
        redirect('Room');
    }

    // public function selectfur($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('furniture');
    //     $query = $this->db->get();
    //     $qa = $query->result_array();
        
    //     $fa = $qa[0]['price'];
        
    //     // $total = $fa + 
    //     $dd = 500;
    //     echo $fa;

    // }
    // public function selectfur2($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('furniture');
    //     $query = $this->db->get();
    //     $qa = $query->result_array();
      
    //     $fa1 = $qa[1]['price'];
      
    //     // $total = $fa + 
    //     $dd = 500;
    //     echo $fa1;

        
        
        
        

    // }
    // public function selectfur3($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('furniture');
    //     $query = $this->db->get();
    //     $qa = $query->result_array();
      
    //     $fa = $qa[2]['price'];
      
    //     // $total = $fa + 
    //     $dd = 500;
    //     echo $fa;

        
        
        
        

    // }
    // public function selectfur4($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('furniture');
    //     $query = $this->db->get();
    //     $qa = $query->result_array();
      
    //     $fa = $qa[3]['price'];
      
    //     // $total = $fa + 
    //     $dd = 500;
    //     echo $fa;

        
        
        
        

    // }
}
