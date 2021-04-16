<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Admin extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Admin_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['admin']=$this->Admin_model->select();
        $this->loadViewsAdmin("admin/DataAdmin_view/index", $this->data , NULL);
    }
    
    function addNew()
    {
        $this->load->library('form_validation');
        $data=$this->Admin_model->jumlah_user();
            
            $this->form_validation->set_rules('nama_admin','Nama Admin','trim|required');
            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('password','Password','trim|required');
            if($this->form_validation->run() == FALSE)
            {
                $this->createUser();
            }
            else
            {
                $nama = $this->input->post('nama_admin');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $userInfo = array(
                    'nama_admin'=>$nama,
                    'id_user' => $data[0]->jumlah
                );
                $dataInfo =array(
                    'username'=>$username,
                    'password'=>md5($password),
                    'status' =>'1',
                    'id_user' => $data[0]->jumlah,
                );
                
                $result = $this->Admin_model->addNewUser($userInfo);
                $result = $this->Admin_model->addNewUser2($dataInfo);
                
                /*if($result > 0)  
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }*/
                redirect('backend/admin');
            }
    }

    function edit($id)
    {
       
        $this->data['datas'] = $this->Admin_model->getDetailUser($id);
        $this->loadViewsAdmin("admin/DataAdmin_view/edit", $this->data , NULL);
    }
    
    public function editUser()
    {
        $id = $this->input->post('ids');
        $nama = $this->input->post('nama_admin');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        
        $data = array('nama_admin'=>$nama);
        $data2 = array('username'=>$user,'password'=>md5($pass));
        
        $result = $this->Admin_model->editUser($data,$id);
        $result = $this->Admin_model->editUser2($data2,$id);
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit User successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'User creation failed');
        }
        
        redirect('backend/admin');
    }

    function delete($id)
    {
        $result = $this->Admin_model->deleteUser($id);
        $result = $this->Admin_model->deleteUser2($id);
        redirect('backend/admin');            
    }

    public function createUser()
    {
        $this->data=null;
        $this->loadViewsAdmin("admin/DataAdmin_view/create", $this->data , NULL);
    }
    
}