<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
    }

	public function index()
	{
		//$data['member']=$this->Register_model->select();
		//print_r($data);die();
		$this->load->view('Registrasi');
	}

	public function createMember()
    {
        $this->load->View('Registrasi');
    }

	public function daftar()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_member','Nama Member','trim|required|max_length[25]|min_lenght[3]|alphabet');
		$this->form_validation->set_rules('username','Username','trim|required|max_length[25]');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[35]');
		$this->form_validation->set_rules('alamat','Alamat','trim|required|min_length[4]');
		$this->form_validation->set_rules('no_hp','Nomor HandPhone','trim|required|min_length[10]|max_length[13]');
		if($this->form_validation->run() != FALSE)
        {
                $this->createMember();
        }
        else
        {
			$nama = $this->input->post('nama_member');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$gender = $this->input->post('gender');
			$alamat = $this->input->post('alamat');
			$no = $this->input->post('no_hp');
			$email = $this->input->post('email');
			$data=$this->Register_model->jumlah_user();

			$valid_user = $this->Register_model->check_username($username);
			//print_r($valid_user[0]->jumlah);die();
			if($valid_user[0]->jumlah == 1){
				$this->session->set_flashdata('error','Username Sudah ada');
				redirect('Register');
			}else{
			//print_r($data[0]->jumlah);die();
				$data_member = array (
					'nama_member' => $nama,
					'gender' => $gender,
					'alamat' => $alamat,
					'no_hp' => $no,
					'email' => $email,
					'id_user' => $data[0]->jumlah //biar tau id usernya
				);

				$data_user = array (
					'id_user' => $data[0]->jumlah, //biar tau id usernya
					'username' => $username,
					'status' => '2', //identfikasi ini member
					'password' => md5($password)
				);
				$this->Register_model->add_user($data_user);
				$this->Register_model->add_member($data_member);
				$this->session->set_flashdata('success', 'New User created successfully');
				redirect(base_url('Login'));
			}
		}
	}
}
