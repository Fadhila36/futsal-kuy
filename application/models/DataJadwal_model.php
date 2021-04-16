<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataJadwal_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('jadwal as j')
                         ->join('lapangan as l','j.id_lap=l.id_lap')
                         ->get()->result();
                         return $data;
    }

    public function select2($id){
        $q = "Select * from jadwal as j join lapangan as l on j.id_lap = l.id_lap where j.id_lap='$id' and tgl_main >= CURDATE()";
        return $this->db->query($q)->result();
    }

    public function addNewUser($data)
    {
        $res = $this->db->insert('jadwal',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getDetailJadwal($id)
    {
        $data = $this->db->select('*')
                         ->from('jadwal')
                         ->where('id_jadwal',$id)
                         ->get()->row();
                         return $data;
    }

    public function editJadwal($data,$id)
    {        
        $res = $this->db->update('jadwal', $data, array('id_jadwal' => $id));
        return $res;
    }

    public function deleteJadwal($id)
    {        
        $res = $this->db->delete('jadwal', array('id_jadwal' => $id));
        return $res;
    }
    public function deleteJadwal2($id)
    {        
        $res = $this->db->delete('jadwal', array('id_sewa' => $id));
        return $res;
    }
    
    public function find($where, $table){
		$hasil= $this->db->where('id_lap',$where)
				->limit(1)
				->get($table);
		if($hasil->num_rows()>0){
			return $hasil->row();
		}else{
			return array();
		}
    }
    public function lihatIDJadwal(){
        $q = "Select MAX(SUBSTRING(id_jadwal,3))+1 as jumlah from jadwal";
        return $this->db->query($q)->result();
    }

}