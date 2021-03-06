<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        if ($this->session->userdata('status') == NULL) {
            redirect('Login');
        }
    }
    public function index()
    {

        // $this->load->view('admin/dashboard');
        $this->data = '';
        $this->loadViewsAdmin("admin/dashboard", $this->data, NULL);
    }

    function petugas()
    {
        $this->data = '';
        $this->loadViewsPetugas("admin/dashboard", $this->data, NULL);
        //Allowing akses to staff only
        if ($this->session->userdata('status') === '3') {
            $this->loadViewsPetugas("admin/dashboard", $this->data, NULL);
        } else {
            echo "Access Denied";
        }
    }
}
