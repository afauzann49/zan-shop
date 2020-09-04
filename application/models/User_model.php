<?php

class User_model extends CI_model
{
    public function getbarang($table)
    {
        return $this->db->get($table);
    }

    public function getBarangById($kd_brg)
    {
        return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }

    public function tambahKeranjang($user, $brg, $nama, $harga)
    {
        $data = [
            "kd_konsumen" => $user,
            "kd_brg" => $brg,
            "nama_brg" => rawurldecode($nama),
            "jumlah" => 1,
            "harga" => $harga
        ];

        $this->db->insert('cart', $data);

        // $data = [
        //     'id'      => $barang->$kd_konsumen,
        //     'qty'     => 1,
        //     'price'   => 39.95,
        //     'name'    => 'T-Shirt'
        // ];

        // $this->cart->insert($data);
    }

    public function cariDataBarang()
    {
        $keyword = $this->input->post('keyword');

        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('harga', $keyword);

        return $this->db->get('barang')->result_array();
    }

    public function find($kd_brg)
    {
        return $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
    }

    public function getKeranjangByKd($user)
    {
        return $this->db->get_where('cart', ['kd_konsumen' => $user])->result_array();
    }

    public function getBarangByKategori($kd_kat)
    {
        return $this->db->get_where('barang', ['kd_kategori' => $kd_kat])->result_array();
    }

    public function getPesananByKdKonsumen($kd_konsumen)
    {
        return $this->db->get_where('pesanan', ['kd_konsumen' => $kd_konsumen])->result_array();
    }

    public function getPesananByIdInvoices($id_invoices)
    {
        return $this->db->get_where('pesanan', ['id_invoices' => $id_invoices])->result_array();
    }

    public function getInvoicesByIdInvoices($id_invoices)
    {
        return $this->db->get_where('invoices', ['id' => $id_invoices])->row_array();
    }

    public function getInvoicesByKdKonsumen($kd_konsumen)
    {
        return $this->db->get_where('invoices', ['kd_konsumen' => $kd_konsumen])->row_array();
    }

    public function getInvoicesByKdUser($kd_konsumen)
    {
        return $this->db->get_where('invoices', ['kd_konsumen' => $kd_konsumen])->result_array();
    }

    public function terimaBarang()
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
            'kd_status' => 3
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('invoices', $data);
    }
}
