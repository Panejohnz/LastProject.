<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kidmaiook extends CI_Controller {

    public function HeeEGrace()
    {
        $total = $this->input->post('hee');
        $usertotal = $this->input->post('customCheck1');
        if($usertotal != null)
        {
            foreach($usertotal as $index => $usertotal)
            {
                $this->db->where('furniture_id', $usertotal);
                $query = $this->db->get('furniture', 1);
                $data =  $query->row_array();
                
                $total = $data['price']+$total;
            }
        }else{
            
        }
    
        echo $total;

    }

}

/* End of file kidmaiook.php */
