<?php

class Lelang_model extends CI_Model
{
    public function getCount()
    {
        $this->db->select('id_lelang');
        $query = $this->db->get('tb_lelang')->result_array();
        return count($query);
    }
    public function  getLelang()
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        $this->db->join('tb_petugas', 'tb_petugas.id_petugas = tb_lelang.id_petugas');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.id_user = tb_lelang.id_user');
        $query = $this->db->get();
        return $query->result();
    }
    public function  getLelangByIdLanding($id)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        $this->db->where('tb_lelang.id_lelang', $id);

        $query = $this->db->get();
        return $query->row();
    }
    public function  getByUser($id_user)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        $this->db->where('tb_lelang.id_user', $id_user);
        $query = $this->db->get();
        return $query->result();
    }
    public function  getLelangByStatus($status, $id_petugas = 0)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        if ($id_petugas > 0) {
        } else {
            $this->db->join('tb_petugas', 'tb_petugas.id_petugas = tb_lelang.id_petugas');
        }

        $this->db->join('tb_masyarakat', 'tb_masyarakat.id_user = tb_lelang.id_user');
        $this->db->where('tb_lelang.status', $status);
        $this->db->order_by('tgl_lelang', "ASC");
        $query = $this->db->get();
        return $query->result();
    }
    public function  getLelangById($id)
    {
        $this->db->select('*');
        $this->db->from('tb_lelang');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_lelang.id_barang');
        $this->db->join('tb_petugas', 'tb_petugas.id_petugas = tb_lelang.id_petugas');
        $this->db->join('tb_masyarakat', 'tb_masyarakat.id_user = tb_lelang.id_user');
        $this->db->where('tb_lelang.id_lelang', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function delete($id)
    {
        $this->db->where('id_lelang', $id);
        $this->db->delete('tb_lelang');
    }
    public function update($id, $data)
    {
        $this->db->where('id_lelang', $id);
        $this->db->update('tb_lelang', $data);
    }
    public function insert($data)
    {
        $this->db->insert('tb_lelang', $data);
    }
}
