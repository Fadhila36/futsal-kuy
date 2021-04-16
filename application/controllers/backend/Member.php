<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Member extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataMember_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['member']=$this->DataMember_model->select();
        $this->loadViewsAdmin("admin/DataMember_view/index", $this->data , NULL);
    }
    public function createUser()
    {
        $this->data=null;
        $this->loadViewsAdmin("admin/DataKategori_view/create", $this->data , NULL);
    }
    function addNew()
    {
        $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama_kategori','Nama Kategori','trim|required|max_length[18]');
            if($this->form_validation->run() == FALSE)
            {
                $this->createUser();
            }
            else
            {
                $nama = $this->input->post('nama_kategori');
                
                $userInfo = array('nama_kategori'=>$nama);
                
                $result = $this->DataKategori_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('backend/kategori');
            }
    }
    function edit($id)
    {
       
        $this->data['datas'] = $this->DataMember_model->getDetailUser($id);
        $this->loadViewsAdmin("admin/DataMember_view/edit", $this->data , NULL);
    }
    public function editUser()
    {
        $id = $this->input->post('ids');
        $nama = $this->input->post('nama_kategori');
        
        $userInfo = array('nama_kategori'=>$nama);
        
        $result = $this->DataKategori_model->editUser($userInfo,$id);
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit User successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'User creation failed');
        }
        
        redirect('backend/member');
    }
    function delete($id)
    {
            $result = $this->DataMember_model->deleteUser($id);
            $result = $this->DataMember_model->deleteUser2($id);
            redirect('backend/member');            
    }
    
}