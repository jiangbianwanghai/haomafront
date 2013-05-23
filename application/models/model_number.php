<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_number extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function add()
    {
        $number_data = array(
            'number'   => $this->input->post('number'),
            'huafei'   => $this->input->post('huafei'),
            'kafei'    => $this->input->post('kafei'),
            'newprice' => $this->input->post('newprice'),
            'pubtime'  => time(),
            'uid'      => $this->input->cookie('uid')
        );
        if ($this->db->insert('number', $number_data)) {
            $nid = $this->db->insert_id();
            if ($this->input->post('category')) {
                $this->load->model('Model_catemap', 'catemap', TRUE);
                return $this->catemap->add($nid, $this->input->post('category'));
            }
            return $nid;
        }
    }
    
    public function index($status = 0, $offset = 0, $limit = 20)
    {
        $result = array('num' => 0, 'data' => array());
        $this->db->where('status', $status);
        $result['num'] = $this->db->count_all_results('number');
        if ($result['num'] > 0) { 
            $this->db->select('*')->from('number')->where('status', $status)->limit($limit, $offset)->order_by("nid", "desc");;
            $query = $this->db->get();
            foreach ($query->result_array() as $row)
            {
                $result['data'][] = $row;
            }
        }
        return $result;
    }
    
    public function fetch_one($id, $field = array())
    {
        if ($field) {
            $field_str = implode(',', $field);
        }
        $this->db->select($field_str)->from('number')->where('nid', $id)->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function update()
    {
        $data = array(
            'number'   => $this->input->post('number'),
            'huafei'   => $this->input->post('huafei'),
            'kafei'    => $this->input->post('kafei'),
            'newprice' => $this->input->post('newprice'),
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
        foreach ($array as $value) {
            $this->db->update('number', array('status' => $status), array('nid' => $value));
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