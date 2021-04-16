<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataKategori_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('kategori')
                         ->get()->result();
                         return $data;
    }
    public function addNewKategori($data)
    {
        $res = $this->db->insert('kategori',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function getDetailKategori($id)
    {
        $data = $this->db->select('*')
                         ->from('kategori')
                         ->where('id_kategori',$id)
                         ->get()->row();
                         return $data;
    }
    public function editKategori($data,$id)
    {        
        $res = $this->db->update('kategori', $data, array('id_kategori' => $id));
        return $res;
    }
    public function deleteKategori($id)
    {        
        $res = $this->db->delete('kategori', array('id_kategori' => $id));
        return $res;
    }
    /*public function jumlah_user(){
          $q="SELECT Max(id_user)+1 as jumlah FROM tbl_users";
            return $this->db->query($q)->result();

    }*/
}