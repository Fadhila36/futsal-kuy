<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataPembayaran_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('pembayaran as b')
                         ->join('penyewaan as s','b.id_sewa=s.id_sewa')
                         ->get()->result();
        return $data;
    }

    public function addNewUser($data)
    {
        $res = $this->db->insert('pembayaran',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteBayar($id)
    {        
        $res = $this->db->delete('pembayaran', array('id_bayar' => $id));
        return $res;
    }

    public function deleteBayar2($id)
    {        
        $res = $this->db->delete('pembayaran', array('id_sewa' => $id));
        return $res;
    }
    public function getDetailBayar($id)
    {
        $data = $this->db->select('*')
                         ->from('pembayaran')
                         ->where('id_bayar',$id)
                         ->get()->row();
                         return $data;
    }

    public function find($where, $table)
    {
		$hasil= $this->db->where('id_sewa',$where)
				->limit(1)
				->get($table);
		if($hasil->num_rows()>0){
			return $hasil->row();
		}else{
			return array();
		}
    }

    public function lihatIDPembayaran()
    {
        $q = "Select MAX(SUBSTRING(id_bayar,3))+1 as jumlah from pembayaran";
        return $this->db->query($q)->result();
    }

    public function editBayar($data,$id)
    {        
        $bayar = $this->db->update('pembayaran', $data, array('id_bayar' => $id));
        return $bayar;
    }

    public function update_data($where,$data,$table){
        $this->db->update($table,$data,$where);
    }	

}