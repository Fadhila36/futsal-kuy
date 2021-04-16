<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class DataMember_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
                         ->from('member')
                         ->get()->result();
                         return $data;
    }
    
    public function addNewUser($data)
    {
        $res = $this->db->insert('member',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    public function getDetailUser($id)
    {
        $data = $this->db->select('*')
                         ->from('member')
                         ->where('id_member',$id)
                         ->get()->row();
                         return $data;
    }

    public function editUser($data,$id)
    {        
        $res = $this->db->update('member', $data, array('id_member' => $id));
        return $res;
    }

    public function editUser2($data,$id)
    {        
        $res = $this->db->update('user', $data, array('id_user' => $id));
        return $res;
    }

    public function deleteUser($id)
    {        
        $res = $this->db->delete('member', array('id_user' => $id));
        return $res;
    }
    public function deleteUser2($id)
    {        
        $res = $this->db->delete('user', array('id_user' => $id));
        return $res;
    }

    public function check_credential(){
        $username = set_value('username');
        $password = set_value('password');

        $hasil = $this->db->where('username',$username)
                          ->where('password',md5($password))
                          ->limit(1)
                          ->get('user');
                if($hasil->num_rows()>0){
                    return $hasil->row();
                }else{
                    return array();
                }
    }

    public function kode_otomatis()
	{
		$this->db->select('right(id_order,3) as kode', false);
		$this->db->order_by('id_order','desc');
		$this->db->limit(1);
		$query=$this->db->get('orderan');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}
		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='ID'.$kodemax;
		return $kodejadi;
    }
    public function cariId($id_user){
        $q = "Select id_member from member where id_user = $id_user";
        return $this->db->query($q)->result();
    }

    public function select2($id){
        $q = "SELECT * from member as m join user as u on m.id_user=u.id_user where m.id_member='$id'";
        return $this->db->query($q)->result();
    }

}