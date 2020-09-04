<?php

class Home_model extends CI_model
{
    public function kodeKonsumen()
    {
        $this->db->select('RIGHT(konsumen.kd_konsumen,2) as kd_konsumen', FALSE);
        $this->db->order_by('kd_konsumen', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('konsumen');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_konsumen) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "KS" . $batas; //format kode
        return $kodetampil;
    }

    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getAllBarang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function getBarangById($kd_brg)
    {
        return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }

    public function getAllProvinsi()
    {
        $this->db->order_by('nama_prov', 'asc');
        return $this->db->get('provinsi')->result_array();
    }

    public function getAllKota()
    {
        $this->db->order_by('nama_kota', 'asc');
        $this->db->join('provinsi', 'kota.kd_prov = provinsi.kd_prov');
        return $this->db->get('kota')->result_array();
    }

    public function registrasi()
    {
        $data = [
            "kd_konsumen" => $this->input->post('kd_konsumen', true),
            "email" => $this->input->post('email', true),
            "password" => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
            "nama" => $this->input->post('nama', true),
            "kd_prov" => $this->input->post('provinsi', true),
            "kd_kota" => $this->input->post('kota', true),
            "alamat" => $this->input->post('alamat', true),
            "kd_pos" => $this->input->post('kd_pos', true),
            "telp" => $this->input->post('telp', true),
            "image" => 'default.png',
            "role_id" => 2,
            "date_created" => time()
        ];

        $this->db->insert('konsumen', $data);
    }

    public function find($kd_brg)
    {
        $result = $this->db->where('kd_brg', $kd_brg)->limit(1)->get('barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
