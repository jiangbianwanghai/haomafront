<?php defined('BASEPATH') OR exit('No direct script access allowed');

class model_catemap extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function add($nid, $array = array())
    {
        $data = array();
        $row = $this->fetch_all_by_nid($nid);
        if ($row) {
            if (count($row) > count($array) || empty($array)) {
                $array = array_flip($array);
                foreach ($row as $key => $value) {
                    if (!isset($array[$key])) {
                        $this->db->delete('catemap', array('nid' => $nid, 'cateid' => $key)); 
                    }
                }
                return true;
            } else {
                foreach ($array as $value) {
                    if (!isset($row[$value])) {
                        $data[] = array('nid' => $nid, 'cateid' => $value);
                    }
                }
            }
        } else {
            foreach ($array as $value) {
                $data[] = array('nid' => $nid, 'cateid' => $value);
            }
        }
        if ($data) {
            return $this->db->insert_batch('catemap', $data);
        } else {
            return true;
        }
    }
    
    public function fetch_all_by_nid($id)
    {
        $result = $array = array();
        $query = $this->db->get_where('catemap', array('nid' => $id));
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $result[] = $row;
            }
        }
        
        if ($result) {
            foreach ($result as $value) {
                $array[$value['cateid']] = $value['nid'];
            }
        }
        
        return $array;
    }
    
    public function fetch_all_by_cateid($id)
    {
        $result = array();
        $query = $this->db->get_where('catemap', array('cateid' => $id), 100000);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $result[] = $row['nid'];
            }
        }
        return $result;
    }
}

/* End of file model_catemap.php */
/* Location: ./application/models/model_catemap.php */