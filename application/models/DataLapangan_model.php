<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataLapangan_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('lapangan as l')
                         ->join('kategori as k','l.id_kategori=k.id_kategori')
                         ->get()->result();
                         return $data;
    }

    public function select2($id)
    {
        $data = $this->db->select('*')
                         ->from('lapangan')
                         ->where('id_lap',$id)
                         ->get()->result();
                         return $data;
    }

    public function addNewLapangan($data)
    {
        $lap = $this->db->insert('lapangan',$data);
        
        if($lap){
            return true;
        }
        else{
            return false;
        }
    }
    public function getDetailLapangan($id)
    {
        $data = $this->db->select('*')
                         ->from('lapangan')
                         ->where('id_lap',$id)
                         ->get()->row();
                         return $data;
    }
    public function editLapangan($data,$id)
    {        
        $lap = $this->db->update('lapangan', $data, array('id_lap' => $id));
        return $lap;
    }
    public function deleteLapangan($id)
    {        
        $res = $this->db->delete('lapangan', array('id_lap' => $id));
        return $res;
    }
}