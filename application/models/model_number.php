<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_number extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function add()
    {
        $number_data = array(
            'number'    => $this->input->post('number'),
            'huafei'    => $this->input->post('huafei'),
            'kafei'    => $this->input->post('kafei'),
            'operator'  => $this->input->post('operator'),
            'taocan'    => $this->input->post('taocan'),
            'offer'     => $this->input->post('offer'),
            'pubtime'   => time(),
            'uid'       => $this->input->cookie('uid')
        );
        if ($this->db->insert('number', $number_data)) {
            $nid = $this->db->insert_id();
            if ($this->input->post('category')) {
                $this->load->model('Model_catemap', 'catemap', TRUE);
                return $this->catemap->add($nid, $this->input->post('category'));
            }
            if ($nid) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function index($status = 0, $offset = 0, $limit = 20)
    {
        $result = array();
        
        $query = $this->db->get_where('number', array('status' => $status), $limit, $offset);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $result[] = $row;
            }
        }
        
        return $result;
    }
    
    /**
	 * 读取单条数据
	 */
    public function fetch_one($id)
    {
        $query = $this->db->get_where('number', array('nid' => $id), 1);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row;
        } else {
            return array();
        }
    }
    
    public function update()
    {
        $data = array(
            'number'   => $this->input->post('number'),
            'huafei'   => $this->input->post('huafei'),
            'kafei'    => $this->input->post('kafei'),
            'operator' => $this->input->post('operator'),
            'taocan'   => $this->input->post('taocan'),
            'offer'    => $this->input->post('offer')
        );
        if ($this->db->update('number', $data, array('nid' => $this->input->post('id')))) {
            $this->load->model('Model_catemap', 'catemap', TRUE);
            return $this->catemap->add($this->input->post('id'), $this->input->post('category'));
        } else {
            return false;
        }
    }
    
    public function update_status($array, $status)
    {
         foreach ($array as $key => $value) {
            $data = array('status' => $status);
            $this->db->update('number', $data, array('nid' => $key));
        }
        
        return true;
    }
    
    public function fetch_all_by_nids($array, $field = array())
    {
        $this->db->where_in('nid', $array);
        if ($field) {
            $field_str = implode(',', $field);
            $this->db->select($field_str);
        }
        $query = $this->db->get('number');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $result[$row['nid']] = $row;
            }
        }
        return $result;
    }
}

/* End of file model_number.php */
/* Location: ./application/models/model_number.php */