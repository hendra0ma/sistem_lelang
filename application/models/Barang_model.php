<?php

class Barang_model extends CI_Model
{
    public function getCount()
    {
        $this->db->select('id_barang');
        $query = $this->db->get('tb_barang')->result_array();
        return count($query);
    }
    public function  getBarang()
    {
        return $this->db->get('tb_barang')->result();
    }
    public function  getBarangLimit($limit)
    {
        $this->db->limit($limit);
        return $this->db->get('tb_barang')->result();
    }
    public function delete($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('tb_barang');
    }
    public function update($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('tb_barang', $data);
    }
    public function insert($data)
    {
        $this->db->insert($data);
    }
    public function getBarangById($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->get('tb_barang')->row();
    }
}
