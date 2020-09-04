<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Join_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Zan - Shop | Dashboard';
        $data['kode'] = $this->Admin_model->kodeBarang();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function data_barang()
    {
        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }

        $data['judul'] = 'Zan - Shop | Data barang';
        $data['barang'] = $this->Admin_model->getAllBarang();
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah_barang()
    {
        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }

        $data['judul'] = 'Zan - Shop | Tambah barang';
        $data['kode'] = $this->Admin_model->kodeBarang();
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_brg', 'Nama barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('admin/tambah_barang', $data);
            $this->load->view('templates/footer_admin');
        } else {

            $gambar = $_FILES['gambar']['name'];
            if ($gambar = '') { } else {
                $config['upload_path'] = './assets/img/uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Gagal mengupload gambar";
                } else {
                    $gambar = $this->upload->data('file_name');
                }

                $this->Admin_model->tambahBarang($gambar);
                $this->session->set_flashdata('flash', 'Di tambah');
                redirect('admin/data_barang');
            }
        }
    }

    public function hapus_barang($kd_brg)
    {
        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }

        $this->Admin_model->hapusBarang($kd_brg);
        $this->session->set_flashdata('hapus', 'Di hapus');
        redirect('admin/data_barang');
    }

    public function ubah_barang($kd_brg)
    {
        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }

        $data['judul'] = 'Zan - Shop | ubah barang';
        $data['barang'] = $this->Join_model->getBarangById($kd_brg);
        $data['admin'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_brg', 'Nama barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('admin/ubah_barang', $data);
            $this->load->view('templates/footer_admin');
        } else {

            // $gambar = $_FILES['gambar']['name'];
            // if ($gambar = '') { } else {
            //     $config['upload_path'] = './assets/img/uploads';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';

            //     $this->load->library('upload', $config);
            //     if (!$this->upload->do_upload('gambar')) {
            //         echo "Gagal mengupload gambar";
            //     } else {
            //         $gambar = $this->upload->data('file_name');
            //     }

            $this->Admin_model->ubahBarang();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('admin/data_barang');
            // }
        }
    }

    public function kirim_barang()
    {
        if (!$this->session->userdata('role_id') == 1) {
            redirect('home');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('home');
        }

        $this->Admin_model->kirimBarang();

        $id = $this->input->post('id');
        redirect('invoices/detail/' . $id);
    }
}
