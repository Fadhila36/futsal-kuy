<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Lapangan extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('DataLapangan_model','DataKategori_model'));
        if($this->session->userdata('status')==false){
            redirect('Login');
        }  
    }
    public function index()
    {
        
        $this->data['lapangan']=$this->DataLapangan_model->select();
        $this->loadViewsAdmin("admin/DataLapangan_view/index", $this->data , NULL);
    }
    public function createLapangan()
    {
        $this->data['kategori']=$this->DataKategori_model->select();
        $this->loadViewsAdmin("admin/DataLapangan_view/create", $this->data , NULL);
    }
    function addNew()
    {
        $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama','Nama Lapangan','trim|required|max_length[20]');
            $this->form_validation->set_rules('id_kategori','Nama Kategori','required');
            $this->form_validation->set_rules('lokasi','Lokasi Lapangan','trim|required|min_length[4]');
            $this->form_validation->set_rules('tarif','Tarif Sewa','trim|required|min_length[5]|numeric');
            if($this->form_validation->run() == FALSE)
            {
                $this->createLapangan();
            }
            else
            {
                $config['upload_path'] = './assets/upload/';
                $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG';
                $config['max_size'] = '4096'; //kb
                $config['max_width'] = '10024';
                $config['max_height'] = '7680';
                            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload())
                {
                    //file gaggal  upload
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else { 
                    //file berhasil -> lnjut insert
                    //eksekusi query insert
                $gambar = $this->upload->data();
                $nama = $this->input->post('nama');
                $kategori = $this->input->post('id_kategori');
                $lokasi = $this->input->post('lokasi');
                $tarif = $this->input->post('tarif');
                
                $userInfo = array(
                    'nama_lap'=>$nama,
                    'id_kategori'=>$kategori,
                    'lokasi'=>$lokasi,
                    'tarif'=>$tarif,
                    'gambar'=>$gambar['file_name']
                );
                
                $result = $this->DataLapangan_model->addNewLapangan($userInfo);
                
                if($result > 0)
                {
                     $this->session->set_flashdata('success', 'New Lapangan created successfully');
                } else {
                     $this->session->set_flashdata('error', 'Lapangan creation failed');
                }
                
                redirect('backend/lapangan');
              }
            }
    }

    function edit($id)
    {
       
        $this->data['datas'] = $this->DataLapangan_model->getDetailLapangan($id);
        $this->data['kategori']=$this->DataKategori_model->select();
        $this->loadViewsAdmin("admin/DataLapangan_view/edit", $this->data , NULL);
    }
    
    public function editLapangan()
    {
        $id = $this->input->post('idl');
        $nama = $this->input->post('nama');
        $id_kategori = $this->input->post('id_kategori');
        $lokasi = $this->input->post('lokasi');
        $tarif = $this->input->post('tarif');

    if($_FILES['userfile']['name']!=''){
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG';
        $config['max_size'] = '4096'; //kb
        $config['max_width'] = '10024';
        $config['max_height'] = '7680';
                            
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload())
        {
            //file gaggal  upload
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {

            

            $gambar = $this->upload->data();
        
            $userInfo =array(
                'nama_lap'=>$nama,
                'id_kategori'=>$id_kategori,
                'lokasi' =>$lokasi,
                'tarif' =>$tarif,
                'gambar'=>$gambar['file_name']
            );
        
            $result = $this->DataLapangan_model->editLapangan($userInfo,$id);
        
            /*if($result > 0)
            {
                $this->session->set_flashdata('success', 'Edit User successfully');
            } else {
                $this->session->set_flashdata('error', 'User creation failed');
            }*/
        redirect('backend/lapangan');
       }
     } else {
        $userInfo =array(
            'nama_lap'=>$nama,
            'id_kategori'=>$id_kategori,
            'lokasi' =>$lokasi,
            'tarif' =>$tarif
        );
    
        $result = $this->DataLapangan_model->editLapangan($userInfo,$id);
    
        if($result > 0)
        {
            $this->session->set_flashdata('success', 'Edit User successfully');
        } else {
            $this->session->set_flashdata('error', 'User creation failed');
        }
    
    redirect('backend/lapangan');

     }
    }

    function delete($id)
    {
            $result = $this->DataLapangan_model->deleteLapangan($id);
            redirect('backend/lapangan');            
    }
    
}