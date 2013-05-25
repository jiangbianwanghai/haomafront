<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shouye extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Model_number', 'number', TRUE);
        // 顶级靓号
        $this->load->model('Model_catemap', 'catemap', TRUE);
        $ids_arr = $this->catemap->fetch_all_by_cateid(73);
        $data['tops'] = $this->number->fetch_all_by_nids($ids_arr, array('nid', 'number', 'kafei', 'newprice'));
        // 最新推荐
        $this->load->model('Model_catemap', 'catemap', TRUE);
        $ids_arr = $this->catemap->fetch_all_by_cateid(74);
        $data['recom'] = $this->number->fetch_all_by_nids($ids_arr, array('nid', 'number', 'kafei', 'newprice'));
        // 已售号码
        $data['trade'] = $this->number->index(-1, 0, 10);
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
            if ($this->form_validation->run()) {
                $this->load->model('Model_offer', 'offer', TRUE);
                $this->load->model('Model_number', 'number', TRUE);
                if ($this->offer->insert()) {
                    $this->number->update_status(array($this->input->post('nid')), '-2');
                    redirect('/', 'location', 301);
                }
            } else {
                $this->load->model('Model_number', 'number', TRUE);
                $data['row'] = $this->number->fetch_one($this->input->post('nid'), array('nid', 'number', 'kafei', 'huafei', 'newprice'));
                $this->load->view('shouye_offer', $data);
            }
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