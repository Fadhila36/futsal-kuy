<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    public function select()
    {
        $data = $this->db->select('*')
            ->from('petugas as p')
            ->join('user as u', 'a.id_user=u.id_user')
            ->get()->result();
        return $data;
    }

    public function addNewUser($data)
    {
        $res = $this->db->insert('petugas', $data);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function addNewUser2($data)
    {
        $res = $this->db->insert('user', $data);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function jumlah_user()
    {
        $q = "SELECT Max(id_user)+1 as jumlah FROM user";
        return $this->db->query($q)->result();
    }

    public function getDetailUser($id)
    {
        $data = $this->db->select('*')
            ->from('petugas as p')
            ->join('user as u', 'a.id_user=u.id_user')
            ->where('p.id_user', $id)
            ->get()->row();
        return $data;
    }

    public function getDetailUser2($id)
    {
        $data = $this->db->select('*')
            ->from('user')
            ->where('id_user', $id)
            ->get()->row();
        return $data;
    }

    public function editUser($data, $id)
    {
        $res = $this->db->update('petugas', $data, array('id_user' => $id));
        return $res;
    }
    public function editUser2($data2, $id)
    {
        $res = $this->db->update('user', $data2, array('id_user' => $id));
        return $res;
    }
    public function deleteUser($id)
    {
        $res = $this->db->delete('petugas', array('id_user' => $id));
        return $res;
    }
    public function deleteUser2($id)
    {
        $res = $this->db->delete('user', array('id_user' => $id));
        return $res;
    }
}
