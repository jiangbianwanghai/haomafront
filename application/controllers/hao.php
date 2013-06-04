<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hao extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $data['status'] = 1;
        $data['rows']['num'] = 0;
        $data['rows']['data'] = array();
        $this->lists($data);
    }
    
    private function lists($data)
    {
        if ($this->input->get('cid')) {
            $this->load->helper(array('form', 'url'));
            $this->load->model('Model_number', 'number', TRUE);
            if (file_exists('./searchlog.php')) {
                require './searchlog.php';
                if (count($searchlog)) {
                    $searchlog = array_slice($searchlog, 0, 10);
                }
            }
            $data['searchlog'] = $searchlog;
            $this->load->model('Model_catemap', 'catemap', TRUE);
            $ids_arr = array();
            $ids_arr = $this->catemap->fetch_all_by_cateid($this->input->get('cid'));
            if ($ids_arr) {
                $data['rows']['num'] = count($ids_arr);
                $ids = array_slice($ids_arr, ($this->input->get('page')-1)*20, 20);
                $data['rows']['data'] = $this->number->fetch_all_by_nids($ids, array('nid', 'number', 'kafei', 'newprice', 'status'));
            }
        }
        $this->load->library('pagination');
        $config = array(
            'num_links' => 3,
            'full_tag_open' => '<div class="pagin">',
            'full_tag_close' => '</div>',
            'first_link' => '首页',
            'last_link' => '尾页',
            'prev_link' => '上一页',
            'next_link' => '下一页',
            'cur_tag_open' => '<span class="current">',
            'cur_tag_close' => '</span>',
            'total_rows' => $data['rows']['num'],
            'per_page' => 20,
            'base_url' => '/so?cid='.$this->input->get('cid'),
            'cur_page' => $this->input->get('page'),
            'page_query_string' => true,
            'use_page_numbers' => true,
            'query_string_segment' => 'page'
        );
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $this->load->view('hao_index', $data);
    }
}

/* End of file so.php */
/* Location: ./application/controllers/so.php */