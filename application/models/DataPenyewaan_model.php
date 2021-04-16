<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataPenyewaan_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('penyewaan as s')
                         ->join('lapangan as l','s.id_lap=l.id_lap')
                         ->join('member as m','s.id_member=m.id_member')
                         ->order_by('id_sewa')
                         ->get()->result();
                         return $data;
    }

    public function select2($id){
        $q = "SELECT b.id_sewa, s.*, b.*, l.*, m.* FROM penyewaan as s join pembayaran as b on s.id_sewa = b.id_sewa join lapangan l on l.id_lap = s.id_lap join member m on m.id_member = s.id_member WHERE s.id_member=$id AND s.status_sewa='Booking'";
        return $this->db->query($q)->result();
    }

    public function cariMember($id){
        $q = "SELECT id_member FROM `member` WHERE id_user='$id' ";
        return $this->db->query($q)->result();
    }
    
    public function addNewUser($data)
    {
        $res = $this->db->insert('penyewaan',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteSewa($id)
    {        
        $res = $this->db->delete('penyewaan', array('id_sewa' => $id));
        return $res;
    }

    public function getDetailSewa($id)
    {
        $data = $this->db->select('*')
                         ->from('penyewaan')
                         ->where('id_sewa',$id)
                         ->get()->row();
                         return $data;
    }

    public function editSewa($data,$id)
    {        
        $res = $this->db->update('penyewaan', $data, array('id_sewa' => $id));
        return $res;
    }

    public function editBayar($data,$id)
    {        
        $res = $this->db->update('pembayaran', $data, array('id_bayar' => $id));
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
    
    public function lihatIDPenyewaan(){
        $q = "Select MAX(SUBSTRING(id_sewa,3))+1 as jumlah from penyewaan";
        return $this->db->query($q)->result();
    }

    public function getSewa($id)
    {
        $q = "SELECT * from penyewaan as s join member as m on s.id_member=m.id_member join lapangan as l on s.id_lap=l.id_lap join pembayaran as b on s.id_sewa=b.id_sewa join jadwal as j on s.id_sewa=j.id_sewa WHERE s.id_sewa='$id'";
        return $this->db->query($q)->result();
    }

    public function getSewa2($id)
    {
        $q = "SELECT * from penyewaan as s join member as m on s.id_member=m.id_member join lapangan as l on s.id_lap=l.id_lap join pembayaran as b on s.id_sewa=b.id_sewa join jadwal as j on s.id_sewa=j.id_sewa WHERE m.id_member='$id' and status_sewa='Selesai'";
        return $this->db->query($q)->result();
    }

    public function update_data($where,$data,$table){
        $this->db->update($table,$data,$where);
    }	

}