<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('User_model');
        $this->load->model('Join_model');
        $this->load->model('Invoices_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data['judul'] = 'Zan - Shop | ';
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Home_model->getAllBarang();
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->User_model->cariDataBarang();
        }
        $data['kategori'] = $this->Home_model->getAllKategori();



        $this->load->view('templates/header_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function getbarang()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $dataBarang = $this->User_model->getbarang('barang')->result_array();
        echo json_encode($dataBarang);
    }

    public function detail($kd_brg)
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data = [
            'judul' => 'Zan - Shop | Detail ',
            'kategori' => $this->Home_model->getAllKategori(),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
            'barang' => $this->Join_model->getBarangById($kd_brg)
        ];

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function kategori($kd_kat)
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data = [
            'judul' => 'Zan - Shop | Kategori ',
            'kategori' => $this->Home_model->getAllKategori(),
            'barang' => $this->User_model->getBarangByKategori($kd_kat),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Zan - Shop | ';
        $data['kategori'] = $this->Home_model->getAllKategori();

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Zan - Shop | ';
        $data['kategori'] = $this->Home_model->getAllKategori();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $telp = $this->input->post('telp');
            $alamat = $this->input->post('alamat');

            // cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('telp', $telp);
            $this->db->set('alamat', $alamat);

            $this->db->where('email', $email);
            $this->db->update('konsumen');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda berhasil ubah profile
          </div>');
            redirect('user/profile');
        }
    }

    public function getKdBrg()
    {
        echo json_encode($this->User_model->getBarangById($_POST['id']));
    }

    public function tambah_keranjang()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }
        //     $this->User_model->tambahKeranjang($user, $brg, $nama, $harga);
        //     redirect('user');

        $kd_brg = $this->input->post('kd_brg');
        $barang = $this->User_model->find($kd_brg);

        // menghitung diskon
        $hasil  = $barang['harga'] * $barang['diskon'] / 100;
        $diskon = $barang['harga'] - $hasil;

        // jumlah pesanan
        $jumpes = $this->input->post('jumlah');

        // Jika pesanan melebihi stok
        if ($jumpes > $barang['stok']) {
            echo "
                <script>
                    alert('Stok tidak mencukupi');
                    document.location.href='" . base_url('user') . "';
                </script>
            ";
            exit;
        }

        $data = [
            'id'      => $barang['kd_brg'],
            'qty'     => $jumpes,
            'price'   => $diskon,
            'name'    => $barang['nama_brg']
        ];

        $this->cart->insert($data);

        redirect('user');
    }

    public function keranjang()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data['judul'] = 'Zan - Shop | ';
        $data['user'] = $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Home_model->getAllKategori();
        // $data['ker'] = $this->User_model->getKeranjangByKd($user);

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $this->cart->destroy();
        redirect('user/keranjang');
    }

    public function pembayaran()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $data = [
            'judul' => 'Zan - Shop | Pembayaran',
            'kategori' => $this->Home_model->getAllKategori(),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
            "provinsi" => $this->Home_model->getAllProvinsi(),
            "kota" => $this->Home_model->getAllKota(),
            "provinsi_selected" => '',
            "kota_selected" => ''
        ];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('user/pembayaran', $data);
            $this->load->view('templates/footer');
        }
    }

    public function proses_pemesanan()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data = [
            'judul' => 'Zan - Shop | Pemesanan',
            'kategori' => $this->Home_model->getAllKategori(),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        $kd_konsumen = $this->input->post('kd_konsumen');
        $if_processed = $this->Invoices_model->pesan($kd_konsumen);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('user/pembayaran', $data);
            $this->load->view('templates/footer');
        } else {
            if ($if_processed) {

                $this->cart->destroy();
                $this->load->view('templates/header_user', $data);
                $this->load->view('user/pemesanan', $data);
                $this->load->view('templates/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Maaf, pesanan anda gagal !
              </div>');
            }
        }
    }

    public function faktur($kd_konsumen)
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data = [
            'judul' => 'Zan - Shop | Faktur',
            'kategori' => $this->Home_model->getAllKategori(),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
            // 'pesanan' => $this->Join_model->getPesananByIdInvoices($kd_konsumen),
            'invoice' => $this->User_model->getInvoicesByKdUser($kd_konsumen)
        ];

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/faktur', $data);
        $this->load->view('templates/footer');
    }

    public function pesanan($id_invoices)
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $data = [
            'judul' => 'Zan - Shop | Pesanan',
            'kategori' => $this->Home_model->getAllKategori(),
            'user' => $this->db->get_where('konsumen', ['email' => $this->session->userdata('email')])->row_array(),
            'pesanan' => $this->User_model->getPesananByIdInvoices($id_invoices),
            'invoices' => $this->User_model->getInvoicesByIdInvoices($id_invoices),
        ];

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function terima_barang()
    {
        if (!$this->session->userdata('email')) {
            redirect('home');
        }

        $this->User_model->terimaBarang();

        $id = $this->input->post('id');
        redirect('user/pesanan/' . $id);
    }
}
