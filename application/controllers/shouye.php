<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shouye extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Model_number', 'number', TRUE);
        $data['rows'] = $this->number->index(1);
        $this->load->view('shouye_index', $data);
    }
    
    public function offer()
    {
        $this->load->helper(array('form', 'url'));
        if ($this->input->post('button')) {
            $this->load->library(array('form_validation', 'session'));
            if ($this->session->flashdata('captcha_word') != $this->input->post('captcha')) {
                exit('验证码错误');
            }
            //if ($this->form_validation->run()) {
                $this->load->model('Model_offer', 'offer', TRUE);
                if ($this->offer->insert()) {
                    redirect('/', 'location', 301);
                }
            /* } else {
                $this->load->model('Model_number', 'number', TRUE);
                $data['row'] = $this->number->fetch_one($this->input->post('nid'), array('number', 'kafei', 'huafei', 'newprice'));
                $this->load->view('shouye_offer');
            } */
        } else {
            $this->load->model('Model_number', 'number', TRUE);
            $data['row'] = $this->number->fetch_one($this->uri->segment(3, 0), array('nid', 'number', 'kafei', 'huafei', 'newprice'));
            $this->load->view('shouye_offer', $data);
        }
    }
    
    public function captcha()
    {
        $this->load->helper(array('custom_captcha'));
        $this->load->library('session');
        $vals = array(
            'word' => rand(1000, 10000),
            'img_width' => 70,
            'img_height' => 30,
            'font_path' => './font/Duality.ttf'
        );
        $cap = create_custom_captcha($vals);
        $this->session->set_flashdata('captcha_word', $cap);
    }
}