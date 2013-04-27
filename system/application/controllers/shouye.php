<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shouye extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Model_number', 'number', TRUE);
        $this->load->view('shouye_index');
    }
}