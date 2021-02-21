<?php

class Barang_model extends CI_Model
{
    public function getCount()
    {
        $this->db->select('id_barang');
        $query = $this->db->get('tb_barang')->result_array();
        return count($query);
    }
}
