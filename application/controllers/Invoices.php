<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoices extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoices_model');
        $this->load->model('Join_model');
    }

    public function index()
    {
        $data['invoices'] = $this->Invoices_model->getAllInvoices();
        $data['judul'] = 'Zan - Shop | Invoices';
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('admin/invoices', $data);
        $this->load->view('templates/footer_admin');
    }

    public function detail($id_invoices)
    {
        $data['judul'] = 'Zan - Shop | Detail Invoices';
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoices'] = $this->Invoices_model->getInvoicesById($id_invoices);
        $data['pesanan'] = $this->Invoices_model->getPesananById($id_invoices);
        // $data['pesanan'] = $this->Join_model->getInvoice();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('admin/detail_invoices', $data);
        $this->load->view('templates/footer_admin');
    }
}
