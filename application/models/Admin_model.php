<?php

class Admin_model extends CI_model
{
    public function getAllBarang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function kodeBarang()
    {
        $this->db->select('RIGHT(barang.kd_brg,2) as kd_brg', FALSE);
        $this->db->order_by('kd_brg', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get('barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kd_brg) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodetampil = "BR" . $batas; //format kode
        return $kodetampil;
    }

    public function tambahBarang($gambar)
    {
        $barang = [
            'kd_brg' => $this->input->post('kd_brg', true),
            'kd_kategori' => $this->input->post('kd_kategori', true),
            'nama_brg' => $this->input->post('nama_brg', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'gambar' => $gambar,
            'date_created' => time()
        ];

        $detail = [
            'kd_brg' => $this->input->post('kd_brg', true),
            'ukuran' => $this->input->post('ukuran', true),
            'berat' => $this->input->post('berat', true),
        ];

        $this->db->insert('barang', $barang);
        $this->db->insert('det_barang', $detail);
    }

    public function hapusBarang($kd_brg)
    {
        $this->db->where('kd_brg', $kd_brg);
        $this->db->delete('barang');
    }

    public function getBarangById($kd_brg)
    {
        return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }

    public function ubahBarang()
    {
        $barang = [
            'kd_brg' => $this->input->post('kd_brg', true),
            'kd_kategori' => $this->input->post('kd_kategori', true),
            'nama_brg' => $this->input->post('nama_brg', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'harga' => $this->input->post('harga', true),
            'stok' => $this->input->post('stok', true),
            'gambar' => $this->input->post('gambar', true),
            'date_created' => time()
        ];

        $detail = [
            'kd_brg' => $this->input->post('kd_brg', true),
            'ukuran' => $this->input->post('ukuran', true),
            'berat' => $this->input->post('berat', true),
        ];

        $this->db->where('kd_brg', $this->input->post('kd_brg'));
        $this->db->update('barang', $barang);
        $this->db->where('kd_brg', $this->input->post('kd_brg'));
        $this->db->update('det_barang', $detail);
    }

    public function kirimBarang()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'kd_konsumen' => $this->input->post('kd_konsumen', true),
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'provinsi' => $this->input->post('provinsi', true),
            'kota' => $this->input->post('kota', true),
            'tgl_pesan' => $this->input->post('tgl_pesan', true),
            'batas_byr' => $this->input->post('batas_byr', true),
            'kd_status' => 2
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('invoices', $data);
    }
}
