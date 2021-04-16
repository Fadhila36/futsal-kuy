<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Pembayaran extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataPembayaran_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['pembayaran']=$this->DataPembayaran_model->select();
        $this->loadViewsAdmin("admin/DataPembayaran_view/index", $this->data , NULL);
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
       
        $this->data['datas'] = $this->DataPembayaran_model->getDetailbayar($id);
        $this->loadViewsAdmin("admin/DataPembayaran_view/edit", $this->data , NULL);
    }
    public function editBayar($id)
    {
        $where = array('id_bayar' => $id);
        //$bayar = $this->input->post('status_bayar');
        
        $userInfo = array('status_bayar'=>'Terkonfirmasi');
        
        $result = $this->DataPembayaran_model->update_data($where,$userInfo,'pembayaran');
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit Sewa successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Sewa creation failed');
        }
        
        redirect('backend/pembayaran');
    }
    function delete($id)
    {
            $result = $this->DataPembayaran_model->deleteBayar($id);
            redirect('backend/pembayaran');            
    }
    
}