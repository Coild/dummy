<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{


    function get_all_opd()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_akses', '2');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //fungsi tambah user opd/instansi & tambah nama user ke table status dokumen
    function tambah_user($data)
    {
        //utk table user
        $this->db->insert('tbl_user', $data);

        //utk table status dokumen dan tbl pengukuran triwulan
        $users = ['opd' => $data['user_name']];
        $user = ['opd' => $data['user_name'], 'year' => date('Y')];
        $this->db->insert('tbl_status_dokumen', $user);
        $this->db->insert('tbl_pengukuran_triwulan', $users);

        return true;
    }

    function get_table_user($model, $limit = null, $start = null)
    {
        $this->load->database($model);
        $this->db->where('user_akses', '2');
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result_array();
        return $query;
    }
    function total_data_user($model)
    {
        $this->load->database($model);
        $this->db->where('user_akses', '2');
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    // utk menampilkan status dokumen user di dashboard
    function get_table($model, $limit = null, $start = null, $keyword = null, $select_year = null)
    {
        $this->load->database($model);
        $this->db->order_by('year', 'DESC');
        if ($keyword && $select_year == null) {
            $this->db->like('opd', $keyword);
        } else if ($select_year) {
            $this->db->where('year', $select_year);
            if ($keyword) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            }
        }
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result_array();
        return $query;
    }

    function total_data($model, $keyword, $select_year)
    {
        $this->load->database($model);
        if ($keyword && $select_year == null) {
            $this->db->like('opd', $keyword);
        } else if ($select_year) {
            $this->db->where('year', $select_year);
            if ($keyword) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            }
        }
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    // utk menampilkan data perencanaan kinerja user
    function get_table_perencanaan($model, $limit = null, $start = null, $keyword = null)
    {
        $this->load->database($model);
        if ($keyword) {
            $this->db->like('opd', $keyword);
            $this->db->where('perencanaan', true);
            $this->db->or_like('jenis_dok', $keyword);
            $this->db->where('perencanaan', true);
            $this->db->or_like('nama_dok', $keyword);
            $this->db->where('perencanaan', true);
            $this->db->or_like('date', $keyword);
            $this->db->where('perencanaan', true);
        }
        $this->db->where('perencanaan', true);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result_array();
        return $query;
    }

    function total_data_perencanaan($model, $keyword)
    {
        // $this->load->database($model);
        // $this->db->like('opd', $keyword);
        // $this->db->where('perencanaan', true);
        // $this->db->or_like('jenis_dok', $keyword);
        // $this->db->where('perencanaan', true);
        // $this->db->or_like('nama_dok', $keyword);
        // $this->db->where('perencanaan', true);
        // $this->db->or_like('date', $keyword);
        // $this->db->where('perencanaan', true);
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    // utk menampilkan data pengukuran kinerja triwulan 1
    function get_table_pengukuran($model, $limit = null, $start = null, $select_year = null, $select_triwulan = null, $keyword = null)
    {
        $this->load->database($model);
        $this->db->where('triwulan', true);
        $this->db->order_by('year', 'DESC');
        if ($keyword) {
            $this->db->like('opd', $keyword);
            $this->db->where('triwulan', true);
            if ($select_triwulan) {
                $this->db->like('opd', $keyword);
                $this->db->where('jenis_dok', $select_triwulan);
            } else if ($select_year) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            } else if ($select_year && $select_triwulan) {
                $this->db->like('opd', $keyword);
                $this->db->where('jenis_dok', $select_triwulan);
                $this->db->where('year', $select_year);
            }
        } else if ($select_triwulan) {
            $this->db->where('jenis_dok', $select_triwulan);
            if ($select_year) {
                $this->db->where('jenis_dok', $select_triwulan);
                $this->db->where('year', $select_year);
            }
        } else if ($select_year) {
            $this->db->where('year', $select_year);
        }
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result();
        return $query;
    }

    function total_data_pengukuran($model, $select_year, $select_triwulan, $keyword)
    {
        $this->load->database($model);
        $this->db->or_where_in('triwulan', true);
        if ($keyword) {
            $this->db->like('opd', $keyword);
            $this->db->where('triwulan', true);
            if ($select_triwulan) {
                $this->db->like('opd', $keyword);
                $this->db->where('jenis_dok', $select_triwulan);
            } else if ($select_year) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            } else if ($select_year && $select_triwulan) {
                $this->db->like('opd', $keyword);
                $this->db->where('jenis_dok', $select_triwulan);
                $this->db->where('year', $select_year);
            }
        } else if ($select_triwulan) {
            $this->db->where('jenis_dok', $select_triwulan);
            if ($select_year) {
                $this->db->where('jenis_dok', $select_triwulan);
                $this->db->where('year', $select_year);
            }
        } else if ($select_year) {
            $this->db->where('year', $select_year);
        }
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    //utk tambah triwulan 1
    function tambah_triwulan($data, $triwulan)
    {
        // mengabil year yg ada di db tbl pengukuran triwulan
        $this->db->select('year');
        $this->db->where('opd', $data['opd']);
        $this->db->from('tbl_status_dokumen');
        $db_year = $this->db->get()->result_array();

        $years = '';

        foreach ($db_year as $db) {
            $years = $db['year'];
        }

        if ($years == $data['year']) {
            $this->db->where('opd', $data['opd']);
            $this->db->where('year', $data['year']);
            $this->db->update('tbl_pengukuran_triwulan', $data);
        } else {
            $this->db->where('opd', $data['opd']);
            $this->db->update('tbl_pengukuran_triwulan', $data);
        }

        //update status nilai triwulan
        $nilai = ['nilai_triwulan' => true];
        $this->db->where('opd', $data['opd']);
        $this->db->where('jenis_dok', $triwulan);
        $this->db->where('year', $data['year']);
        $this->db->update('tbl_dokumen_user', $nilai);

        return true;
    }

    // utk menampilkan data pelaporan tahunan kinerja user
    function get_table_pelaporan($model, $limit = null, $start = null, $keyword = null)
    {
        $this->load->database($model);
        $this->db->order_by('jenis_dok', 'DESC');
        $this->db->where('jenis_dok', 'lakip');
        if ($keyword) {
            $this->db->like('opd', $keyword);
            $this->db->where('jenis_dok', 'lakip');
        }
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result_array();
        return $query;
    }

    function total_data_pelaporan($model, $keyword)
    {
        $this->load->database($model);
        $this->db->where('jenis_dok', 'lakip');
        if ($keyword) {
            $this->db->like('opd', $keyword);
            $this->db->where('jenis_dok', 'lakip');
        }
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    //utk menampilkan setiap user pada page evaluasi
    function get_table_evaluasi($model, $limit = null, $start = null, $select_year = null, $keyword = null)
    {
        $this->load->database($model);
        if ($keyword) {
            $this->db->like('opd', $keyword);
            if ($select_year) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            }
        } else if ($select_year) {
            $this->db->where('year', $select_year);
        }
        $query = $this->db->get($model, $limit, $start);
        $query = $query->result_array();
        return $query;
    }

    function total_data_evaluasi($select_year, $model, $keyword)
    {
        $this->load->database($model);
        if ($keyword) {
            $this->db->like('opd', $keyword);
            if ($select_year) {
                $this->db->like('opd', $keyword);
                $this->db->where('year', $select_year);
            }
        } else if ($select_year) {
            $this->db->where('year', $select_year);
        }
        $query = $this->db->get($model);
        $query = $query->result_array();
        $total_data = count($query);
        return $total_data;
    }

    //utk inpurt evaluasi user dari admin
    function tambah_evaluasi($data)
    {
        $this->db->where('opd', $data['opd']);
        $this->db->where('year', $data['year']);
        $this->db->update('tbl_evaluasi', $data);

        return true;
    }

    //ut inpurt informasi dari admin
    function input_evaluasi($data)
    {
        $this->db->insert('tbl_informasi', $data);

        return true;
    }

    // utk page informasi pesan dari admin
    function get_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_informasi');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //utk ambil tahun
    function get_year()
    {
        $this->db->select('year');
        $this->db->from('tbl_year');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    //utk ambil tahun
    function get_user()
    {
        $this->db->where('user_akses', '2');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
