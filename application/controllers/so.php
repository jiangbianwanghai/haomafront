<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class offer extends CI_Controller {

    //号码列表
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_offer', 'offer', TRUE);
        $this->load->model('Model_number', 'number', TRUE);
        $this->load->view('offer_index');
    }

    //号码添加
    public function add()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_number', 'number', TRUE);
        $this->load->model('Model_catemap', 'catemap', TRUE);
        if ($this->input->post('button')) {
            $this->load->library('form_validation');
            if ($this->form_validation->run()) {
                if ($this->input->post('id')) {
                    $flag = $this->number->update();
                    $jump_url = '/number';
                } else {
                    $flag = $this->number->add();
                    $jump_url = '/number/add';
                }
                if ($flag) {
                    redirect($jump_url, 'location', 301);
                }
            } else {
                $this->load->view('number_add');
            }
        } else {
            $this->load->view('number_add');
        }
    }
    
    public function status()
    {
        // 处理提交信息
        if ($this->input->post('button')) {
            if ($this->input->post('id') && is_array($this->input->post('id'))) {
            
                // 载入URL、表单辅助函数
                $this->load->helper('url');
                
                // 载入模型
                $this->load->model('Model_number', 'number', TRUE);
                
                // 更新库中字段
                if ($this->number->update_status($this->input->post('id'), $this->input->post('status'))) {
                    if ($this->input->post('status')) {
                        redirect('/number/index/status/'.$this->input->post('status'), 'location', 301);
                    } else {
                        redirect('/number', 'location', 301);
                    }
                    
                }
            }
        }
    }
}

/* End of file offer.php */
/* Location: ./application/controllers/offer.php */