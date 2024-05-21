<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mupload extends CI_Model
{

    function input_data($data)
    {

        $this->db->insert('perencanaan_kinerja_admin', $data);

        return true;
    }

    function tambahPengukuran($data)
    {

        $this->db->insert('tbl_pengukuran', $data);

        return true;
    }

    function tambahLaporan($data)
    {
        $this->db->insert('tbl_pelaporan', $data);

        return true;

        // $this->db->trans_start();
        // $this->db->insert('tbl_pelaporan', $tabelLaporan);

        // $insert_id = $this->db->insert_id();

        // $this->db->trans_complete();

        // return $insert_id;
    }
}
