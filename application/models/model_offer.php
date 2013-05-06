<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_offer extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function fetch_all_by_status($status = 0, $field = array(), $offset = 0, $limit = 20)
    {
        $result = array();
        if ($field) {
            $field_str = implode(',', $field);
            $this->db->select($field_str);
        }
        $query = $this->db->get_where('offer', array('status' => $status), $limit, $offset);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $result[] = $row;
            }
        }
        return $result;
    }
    
    public function insert()
    {
        $data = array(
            'nid' => $this->input->post('nid'),
            'username' => $this->input->post('username'),
            'sex' => $this->input->post('sex'),
            'mobile' => $this->input->post('mobile'),
            'qq' => $this->input->post('qq'),
            'note' => $this->input->post('note'),
            'addtime' => time()
        );
        return $this->db->insert('offer', $data);
    }
}

/* End of file model_offer.php */
/* Location: ./application/models/model_offer.php */