<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function checkuser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->db->get_where('users', array('username' => $username), 1);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if ($row->password == $password) {
                return $row->uid;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

/* End of file model_users.php */
/* Location: ./application/models/model_users.php */