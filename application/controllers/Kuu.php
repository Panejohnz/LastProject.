<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kuu extends CI_Controller {

    public function index()
    {
        
        $this->load->view('template/backheader');
        $this->load->view('kuu');
		$this->load->view('template/backfooter');
    }

}

/* End of file Controllername.php */

?>