<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kidmaiook extends CI_Controller {

    public function HeeEGrace()
    {
        $total = $this->input->post('hee');
        $usertotal = $this->input->post('customCheck1');
        if($usertotal != null)
        {
            foreach($usertotal as $index => $usertotal)
            {
                $total = $usertotal+$total;
            }
        }else{
            
        }

        echo $total;

    }

}

/* End of file kidmaiook.php */
