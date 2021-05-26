<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataMember_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Username', 'required|alpha_numeric');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('alert', 'Login gagal ! Username atau Password salah');
            $this->load->view('login');
        } else {
            $this->load->model('DataMember_model');
            $valid_user = $this->DataMember_model->check_credential();
            //print_r($valid_user);die();
            if ($valid_user == false) {
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('Login');
            } else {
                $this->session->set_userdata('username', $valid_user->username);
                $this->session->set_userdata('password', $valid_user->password);
                $this->session->set_userdata('id_user', $valid_user->id_user);
                // $this->session->set_userdata('status', '1');
                $this->session->set_userdata('status', $valid_user->status);
                // access login for admin
                if ($valid_user->status === '1') {
                    redirect('backend/dashboard');

                    // access login for staff
                } elseif ($valid_user->status === '3') {
                    redirect('backend/dashboard');

                    // access login for author
                } else {
                    redirect('Member');
                }
                // print_r($valid_user);die();
                // if ($valid_user->status == 1) {
                // redirect('backend/dashboard');
                // } else {
                //     redirect('Member');
                // }
            }
            // else {
            //     $this->session->set_userdata('username', $valid_user->username);
            //     $this->session->set_userdata('password', $valid_user->password);
            //     $this->session->set_userdata('id_user', $valid_user->id_user);
            //     $this->session->set_userdata('status', $valid_user->status);
            //     // print_r($valid_user);die();
            //     if ($valid_user->status == 1) {
            //         redirect('backend/dashboard');
            //     } else {
            //         redirect('Member');
            //     }
            // }
        }
    }

    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->load->view('login');
        } else {
            redirect('backend/dashboard');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
