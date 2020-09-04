<?php
class Invoices_model extends CI_Model
{
    public function pesan($kd_konsumen)
    {
        date_default_timezone_set('Asia/Jakarta');

        $invoice = [
            'kd_konsumen' => $kd_konsumen,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'tgl_pesan' => date('Y-m-d H-i-s'),
            'batas_byr' => date('Y-m-d H-i-s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
            'kd_status' => 1
        ];

        $this->db->insert('invoices', $invoice);
        $id_invoices = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $pesanan = [
                'id_invoices' => $id_invoices,
                'kd_konsumen' => $kd_konsumen,
                'kd_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price'],
            ];
            $this->db->insert('pesanan', $pesanan);
        }
        return TRUE;
    }

    public function getAllInvoices()
    {
        $result = $this->db->get('invoices');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function getInvoicesById($id_invoices)
    {
        $result = $this->db->where('id', $id_invoices)->limit(1)->get('invoices');
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function getPesananById($id_invoices)
    {
        $result = $this->db->where('id_invoices', $id_invoices)->get('pesanan');
        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
}
