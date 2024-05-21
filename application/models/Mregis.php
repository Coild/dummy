<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mregis extends CI_Model
{

    function get_jenis_u()
    {
        $query = $this->db->query("SELECT * FROM tbl_jenis_user ORDER BY name ASC");

        return $query->result();
    }
}
