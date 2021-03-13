<?php
class User_model extends CI_Model
{
    public function getUserByUsername($data)
    {

        $this->db->select('*');
        $this->db->from('tb_masyarakat');
        $this->db->join('tb_level', 'tb_level.id_level = tb_masyarakat.id_level');
        $this->db->where('tb_masyarakat.username', $data);
        $query = $this->db->get();
        return $query->row();
    }
    public function register($data)
    {
        $this->db->insert('tb_masyarakat', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_masyarakat', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_masyarakat');
    }
    public function getCount()
    {
        $this->db->select('id_user');
        $query = $this->db->get('tb_masyarakat')->num_rows();
        return $query;
    }
}
