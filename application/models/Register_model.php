<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
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
        $res = $this->db->insert('tbl_jadwals',$data);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }
    public function jumlah_user(){
          $q="SELECT Max(id_user)+1 as jumlah FROM user";
            return $this->db->query($q)->result();

    }
    public function add_member($data_member){
            //query insert into
            $this->db->insert('member', $data_member);
        }

    public function add_user($data_user){
            //query insert into
            $this->db->insert('user', $data_user);
        }
        public function check_username($username){
            $q="SELECT Count(id_user) as jumlah FROM user where username = '$username'";
              return $this->db->query($q)->result();
      }
}