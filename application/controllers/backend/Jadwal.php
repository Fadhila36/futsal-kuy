<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Jadwal extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataJadwal_model','DataLapangan_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['jadwal']=$this->DataJadwal_model->select();
        $this->loadViewsAdmin("admin/DataJadwal_view/index", $this->data , NULL);
    }
    public function createLapangan()
    {
        $this->data['kategori']=$this->DataKategori_model->select();
        $this->loadViewsAdmin("admin/DataLapangan_view/create", $this->data , NULL);
    }
    function addNew()
    {
        
    }

    function edit($id)
    {
       
        $this->data['datas'] = $this->DataJadwal_model->getDetailJadwal($id);
        $this->loadViewsAdmin("admin/DataJadwal_view/edit", $this->data , NULL);
    }
    
    public function editJadwal()
    {
        $id = $this->input->post('ids');
        $waktu = $this->input->post('jam_selesai');
        
        $userInfo = array('jam_selesai'=>$waktu);
        
        $result = $this->DataJadwal_model->editJadwal($userInfo,$id);
        
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit Jadwal successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Jadwal creation failed');
        }
        
        redirect('backend/jadwal');
    }

    function delete($id)
    {
            $result = $this->DataJadwal_model->deleteJadwal($id);
            redirect('backend/jadwal');            
    }
    
}