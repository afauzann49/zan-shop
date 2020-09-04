<?php

class Join_model extends CI_model
{
    public function getBarangById($kd_brg)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('det_barang', 'det_barang.kd_brg=barang.kd_brg');
        $this->db->where('det_barang.kd_brg', $kd_brg);
        return $this->db->get()->row_array();
    }

    public function getPesananByKdKonsumen($kd_konsumen)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('invoices', 'invoices.id=pesanan.id_invoices');
        $this->db->where('pesanan.kd_konsumen', $kd_konsumen);
        return $this->db->get()->result_array();
    }


    public function getInvoice()
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('invoices', 'invoices.id=pesanan.id_invoices');
        return $this->db->get()->result_array();
    }
}
