<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class so extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $json = file_get_contents('http://guanli.zz10086.cn/admin/getoption');
        $data['category'] = json_decode($json, true);
        $data['status'] = 1;
        $data['rows']['num'] = 0;
        $data['rows']['data'] = array();
        $this->lists($data);
    }
    
    private function lists($data)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_number', 'number', TRUE);
        if ($this->input->get('param')) {
            $data['param'] = explode(',', $this->input->get('param'));
            if ($data['param']) {
                foreach ($data['param'] as $val) {
                    $cate_prefix[] = substr($val, 0, 1);
                }
                $data['cate_prefix'] = array_unique($cate_prefix);
            }
            $this->load->model('Model_catemap', 'catemap', TRUE);
            $ids_arr = array();
            $param_num = count($data['param']);
            if ($param_num == 1) {
                $ids_arr = $this->catemap->fetch_all_by_cateid($data['param'][0]);
            } else {
                foreach ($data['param'] as $key=>$val) {
                    $ids = $this->catemap->fetch_all_by_cateid($val);
                    if (!$key) {
                        $ids_arr = $ids;
                    }
                    $ids_arr = array_unique(array_intersect($ids_arr, $ids));
                }
            }
            if ($ids_arr) {
                $data['rows']['num'] = count($ids_arr);
                $ids = array_slice($ids_arr, ($this->input->get('page')-1)*20, 20);
                $data['rows']['data'] = $this->number->fetch_all_by_nids($ids, array('nid', 'number', 'kafei', 'newprice'));
            }
        } else {
            $page = $this->input->get('page') ? $this->input->get('page') : 1;
            $data['rows'] = $this->number->index($data['status'], ($page-1)*20);
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
            'base_url' => '/so',
            'cur_page' => $this->input->get('page'),
            'page_query_string' => true,
            'use_page_numbers' => true,
            'query_string_segment' => 'page'
        );
        if ($this->input->get('param')) {
            $config['base_url'] .= '?param='.$this->input->get('param');
        }
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $this->load->view('so_index', $data);
    }
}

/* End of file so.php */
/* Location: ./application/controllers/so.php */