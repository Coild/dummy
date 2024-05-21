<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mdoc extends CI_Model
{
    function getSuratData()
    {
        $query = $this->db->query("SELECT * FROM tbl_jenis_dokumen ORDER BY name ASC");

        return $query->result();
    }
    function getTriwulan()
    {
        $query = $this->db->query("SELECT * FROM tbl_triwulan ORDER BY name ASC");

        return $query->result();
    }
}
