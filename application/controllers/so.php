<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class so extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('so_index');
    }
}

/* End of file so.php */
/* Location: ./application/controllers/so.php */