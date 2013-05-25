<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Form Validation Configuration
|--------------------------------------------------------------------------
|
| All form validation configuration inside.
|
*/
$config = array(
    'shouye/offer' => array(
        array(
            'field'   => 'username', 
            'label'   => '姓名', 
            'rules'   => 'trim|required|min_length[2]|max_length[12]|xss_clean'
        )
    )
);

/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */