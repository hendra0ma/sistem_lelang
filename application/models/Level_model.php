<?php
class Level_model extends CI_Model
{
    public function getLevel()
    {

        return $this->db->get('tb_level')->result();
    }
}
