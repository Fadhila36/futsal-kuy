<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Kategori extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataKategori_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['kategori']=$this->DataKategori_model->select();
        $this->loadViewsAdmin("admin/DataKategori_view/index", $this->data , NULL);
    }
    public function createKategori()
    {
        $this->data=null;
        $this->loadViewsAdmin("admin/DataKategori_view/create", $this->data , NULL);
    }
    function addNew()
    {
        $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama_kategori','Nama Kategori','trim|required|min_length[4]|max_length[18]');
            if($this->form_validation->run() == FALSE)
            {
                $this->createKategori();
            }
            else
            {
                $nama = $this->input->post('nama_kategori');
                
                $userInfo = array('nama_kategori'=>$nama);
                
                $result = $this->DataKategori_model->addNewKategori($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Kategori created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Kategori creation failed');
                }
                
                redirect('backend/kategori');
            }
    }
    function edit($id)
    {
       
        $this->data['datas'] = $this->DataKategori_model->getDetailKategori($id);
        $this->loadViewsAdmin("admin/DataKategori_view/edit", $this->data , NULL);
    }
    public function editKategori()
    {
        $id = $this->input->post('ids');
        $nama = $this->input->post('nama_kategori');
        
        $userInfo = array('nama_kategori'=>$nama);
        
        $result = $this->DataKategori_model->editKategori($userInfo,$id);
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit Kategori successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Kategori creation failed');
        }
        
        redirect('backend/kategori');
    }
    function delete($id)
    {
            $result = $this->DataKategori_model->deleteKategori($id);
            redirect('backend/kategori');            
    }
    
}