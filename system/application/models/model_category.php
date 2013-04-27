<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 自定义分类模型——号码管理系统
 *
 * 为开发出最好用的代码管理系统而努力，Fighting!
 *
 * @author  江边望海 <jiangbianwanghai.com>
 * @link    http://jiangbianwanghai.com
 */
class Model_category extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
	 * 入库
	 */
    public function add()
    {
        // 准备入库数据
        $data = array(
            'catename' => $this->input->post('catename'),
            'uid' => $this->input->cookie('uid')
        );
        
        return $this->db->insert('category', $data);
    }
    
    /**
	 * 单条记录更新
	 */
    public function update()
    {
        // 准备更新数据
        $data = array(
            'catename' => $this->input->post('catename'),
            'rank' => $this->input->post('rank')
        );
        
        return $this->db->update('category', $data, array('cateid' => $this->input->post('id')));
    }
    
    /**
	 * 删除
	 */
    public function del($id)
    {
        return $this->db->delete('category', array('cateid' => $id));
    }
    
    /**
	 * 列表
	 */
    public function index()
    {
        $rows = array();
        
        // 读取表中的记录
        $this->db->order_by("rank", "desc"); 
        $query = $this->db->get('category');
        
        // 循环组合二维数组
        foreach ($query->result_array() as $row)
        {
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    /**
	 * 刷新缓存文件
	 */
    public function refresh_cache_file()
    {
        $data = array();
        
        // 读取表中的记录
        $this->db->order_by("rank", "desc"); 
        $query = $this->db->get('category');
        
        // 删除不需要缓存的字段，尽量减小文件大小
        foreach ($query->result_array() as $row)
        {
            unset($row['rank']);
            unset($row['uid']);
            $data[] = $row;
        }
        
        // 写缓存文件
        $this->load->helper('file');
        $data = "<?php\n//分类配置文件\n\$category = ".var_export($data, true).";";
        
        return write_file('./cache/'.$this->input->cookie('uid').'/category.php', $data);
    }
    
    /**
	 * 刷新缓存文件
	 */
    public function update_rank($array)
    {
        foreach ($array as $key => $value) {
            $data = array('rank' => $value);
            $this->db->update('category', $data, array('cateid' => $key));
        }
        
        return true;
    }
    
    /**
	 * 读取单条数据
	 */
    public function fetch_one($id)
    {
        $query = $this->db->get_where('category', array('cateid' => $id), 1);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else {
            return array();
        }
    }
}

/* End of file model_category.php */
/* Location: ./application/models/model_category.php */