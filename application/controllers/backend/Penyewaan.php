<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Penyewaan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataPenyewaan_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['penyewaan']=$this->DataPenyewaan_model->select();
        $this->loadViewsAdmin("admin/DataPenyewaan_view/index", $this->data , NULL);
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
       
        $this->data['datas'] = $this->DataPenyewaan_model->getDetailSewa($id);
        $this->loadViewsAdmin("admin/DataPenyewaan_view/edit", $this->data , NULL);
    }
    public function editSewa($id)
    {
        $where = array('id_sewa' => $id);
        //$sewa = $this->input->post('status_sewa');
        
        $userInfo = array('status_sewa'=>'Selesai');
        
        $result = $this->DataPenyewaan_model->update_data($where,$userInfo,'penyewaan');
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit Sewa successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Sewa creation failed');
        }
        
        redirect('backend/penyewaan');
    }
    function batal($id)
    {
        $where = array('id_sewa' => $id);
        //$sewa = $this->input->post('status_sewa');
        
        $userInfo = array('status_sewa'=>'Batal');
        
        $result = $this->DataPenyewaan_model->update_data($where,$userInfo,'penyewaan');
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit Sewa successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Sewa creation failed');
        }
        
        redirect('backend/penyewaan');
    }
}