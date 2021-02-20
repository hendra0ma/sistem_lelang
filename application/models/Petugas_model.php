<?php
class Petugas_model extends CI_Model
{
    public function getUserByUsername($data)
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->join('tb_level', 'tb_level.id_level = tb_petugas.id_level');
        $this->db->where('tb_petugas.username', $data);
        $query = $this->db->get();
        return $query->row();
    }
}
