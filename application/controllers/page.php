<?php

if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->library('ia_auth', NULL, 'auth');

        if ( ! $this->auth->logged_in())
        {
            if ($this->router->fetch_method() != 'register')
            {
                redirect('page/register');
            }
        }
    }

    function _remap($method, $params = array())
    {
        if ($method == 'index')
        {
            $this->load->helper('url');
            redirect('page/home');
        }
        
        switch ($method)
        {
            case 'register':
                $data['groups'] = $this->page_model->get_groups();
                $data['stores'] = $this->page_model->get_stores(1, true);
                break;
        }

        $data['page'] = $method;
        $this->load->view('public_main', $data);
    }

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */