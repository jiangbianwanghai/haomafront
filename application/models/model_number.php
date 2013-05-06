<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_number extends CI_Model {

    function __construct()
    {
        parent::__construct();
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
}

/* End of file model_number.php */
/* Location: ./application/models/model_number.php */