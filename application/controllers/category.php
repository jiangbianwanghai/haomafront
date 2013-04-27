<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 自定义分类控制器——号码管理系统
 *
 * 为开发出最好用的代码管理系统而努力，Fighting!
 *
 * @author  江边望海 <jiangbianwanghai.com>
 * @link    http://jiangbianwanghai.com
 */
class category extends CI_Controller {

    /**
	 * 列表
	 *
	 * ...
	 */
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Model_category', 'category', TRUE);
        $this->load->view('category_index');
    }

    /**
	 * 添加/编辑
	 *
	 * ...
	 */
    public function add()
    {
        // 载入URL、表单辅助函数
        $this->load->helper(array('form', 'url'));
        
        // 载入模型
        $this->load->model('Model_category', 'category', TRUE);
        
        // 处理提交信息
        if ($this->input->post('button')) {
        
            // 表单数据验证
            $this->load->library('form_validation');
            
            // 表单验证通过后处理过程...
            if ($this->form_validation->run()) {
                
                if ($this->input->post('id')) {
                    $flag = $this->category->update();
                    $jump_url = '/category';
                } else {
                    $flag = $this->category->add();
                    $jump_url = '/category/add';
                }
                
                // 写缓存文件
                if ($flag) {
                    if ($this->category->refresh_cache_file()) {
                        redirect($jump_url, 'location', 301); //301跳转到添加页面
                    }
                }
            } else {
                $this->load->view('category_add');
            }
        } else {
            $this->load->view('category_add');
        }
    }
    
    /**
	 * 删除
	 *
	 * ...
	 */
    public function del($field, $id)
    {
        if ($id && is_numeric($id)) {
        
            // 载入URL、表单辅助函数
            $this->load->helper('url');
        
            // 载入模型
            $this->load->model('Model_category', 'category', TRUE);
            
            // 删除库中的记录
            if ($this->category->del($id)) {
                
                // 刷新缓存文件
                if ($this->category->refresh_cache_file()) {
                    redirect('/category', 'location', 301); //301跳转到添加页面
                }
            }
        }
    }
    
    /**
	 * 排序
	 *
	 * ...
	 */
    public function rank()
    {
        // 处理提交信息
        if ($this->input->post('button')) {
            if ($this->input->post('rank') && is_array($this->input->post('rank'))) {
            
                // 载入URL、表单辅助函数
                $this->load->helper('url');
                
                // 载入模型
                $this->load->model('Model_category', 'category', TRUE);
                
                // 更新库中字段
                if ($this->category->update_rank($this->input->post('rank'))) {
                    
                    // 刷新缓存文件
                    if ($this->category->refresh_cache_file()) {
                        redirect('/category', 'location', 301); //301跳转到添加页面
                    }
                }
            }
        }
    }
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */