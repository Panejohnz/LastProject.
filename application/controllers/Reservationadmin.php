<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reservationadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('ReservationsModel');
    }

    public function index()
    {
        $config = array();
        $config['base_url'] = base_url('Reservationadmin/index/');
        $config['total_rows'] = $this->ReservationsModel->record_count($this->input->get('keyword'));
        $config['per_page'] = $this->input->get('keyword') == null ? 14 : 999;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['results'] = $this->ReservationsModel->fetch_Room($config['per_page'], $page, $this->input->get('keyword'));
        $data['link'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('template/backheader');
        $this->load->view('reservations/mainpage', $data);
        $this->load->view('template/backfooter');

        $query = $this->db->query("SELECT * FROM `reservations`
        LEFT JOIN users
        ON reservations.user_id  = users.user_id
        LEFT JOIN reservationsroom
        ON reservations.reservations_id = reservationsroom.reservations_id  ");

        foreach ($query->result_array() as $data) {
            // echo "</br>";
            // echo "วันที่ :". $data['reservationsstart']." ".$data['slip_date'];
            // echo "ชื่อ :" . $data['firstname']." ".$data['lastname'];
            // echo "TEL :" . $data['tel'];
            // echo "Email :". $data['email'];
            // echo "Room:" . $data['room_id'];

            // if ($data['Type'] == 'มีเฟอร์นิเจอร์') {
            //     $hee = $data['reservations_id'];

            //     $qq = $this->db->query("SELECT * FROM `reservationsfurniture`
            //     LEFT JOIN furniture
            //     ON furniture.furniture_id = reservationsfurniture.furniture_id
            //     WHERE reservationsfurniture.reservations_id = $hee ");

            //     foreach ($qq->result_array() as $data2) {
            //         // echo "เฟอร์นิเจอร์" . $data2['name'];
            //     }
            // }
        }
    }



    public function postdata()
    {
        $object = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'tel' => $this->input->post('tel'),
            'email' => $this->input->post('email'),
            'gender' => $this->input->post('gender')
        );
        $this->db->insert('users', $object);
        redirect('room');
    }

    public function edit($id)
    {
        $data['result'] = $this->room_model->read_room($id);
        $this->load->view('template/backheader');
        $this->load->view('reservations/edit', $data);
        $this->load->view('template/backfooter');
    }

    public function edroom($idroom)
    {
        $object = array(
            'roomnum' => $this->input->post('roomnum'),
            'roomcate' => $this->input->post('roomcate'),
            'roomprice' => $this->input->post('roomprice')

        );
        $this->db->where('room_id', $idroom);

        $this->db->update('room', $object);
        redirect('room');
    }

    public function confrm($id)
    {
        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[6]);
        $data = array(
            'backlink'  => 'Reservationadmin',
            'deletelink' => 'Reservationadmin/remove/' . $id ."/" .$idtestt
        );
        $this->load->view('template/backheader');
        $this->load->view('reservations/confrm', $data);
        $this->load->view('template/backfooter');
    }

    public function remove($reservations_id)
    {
        // $this->ReservationsModel->remove_reservations($id);

        // $this->db->query("DELETE reservations,reservationsroom,reservationsfurniture
        // FROM reservations,reservationsroom,reservationsfurniture
        // WHERE reservations.reservations_id=reservationsroom.reservations_id
        // AND reservationsroom.reservations_id = reservationsfurniture.reservations_id
        // AND reservationsroom.reservations_id = $id"); //ลบหลายตาราง
        // $this->db->where('reservations_id' ,$reservations_id);
        // $query = $this->db->get('reservations');
        // $qq = $query->row_array();

        // $this->db->where('reservations_id' ,$qq['reservations_id']);
        // $query1 = $this->db->get('reservationsroom');
        // $qq1 = $query1->row_array();

        // $this->db->where('reservations_id' ,$qq1['reservations_id']);
        // $query2 = $this->db->get('reservationsfurniture');
        // $qq2 = $query2->row_array();

        $stringrow = base_url(uri_string());
        $arraystate = (explode("/", $stringrow));
        $idtestt = ($arraystate[6]);
        // $room_id = $this->input->post('roomnum');
        $this->db->where('room_id', $idtestt);
        //$ze = $this->db->get('room');

        $data2 = array(
    'roomstatus' => '0'
  );


        $this->db->update('room', $data2);
        $this->db->where('reservations_id', $reservations_id);
        $this->db->delete('reservations');

        $this->db->where('reservations_id', $reservations_id);
        $this->db->delete('reservationsroom');

        $this->db->where('reservations_id', $reservations_id);
        $this->db->delete('reservationsfurniture');


       
        redirect('Reservationadmin');
    }
}
