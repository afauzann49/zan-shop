<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('User_model');
        $this->load->model('Join_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $data['barang'] = $this->Home_model->getAllBarang();

        $data['judul'] = 'Zan - Shop | Home';
        $data['barang'] = $this->Home_model->getAllBarang();
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->User_model->cariDataBarang();
        }
        $data['kategori'] = $this->Home_model->getAllKategori();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($kd_brg)
    {
        $data = [
            'judul' => 'Zan - Shop | Detail',
            'barang' => $this->Join_model->getBarangById($kd_brg)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('home/detail', $data);
        $this->load->view('templates/footer');
    }

    public function kategori($kd_kat)
    {
        $data = [
            'judul' => 'Zan - Shop | Kategori ',
            'barang' => $this->User_model->getBarangByKategori($kd_kat),
            'kategori' => $this->Home_model->getAllKategori()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('home/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $data = [
            'judul' => 'Zan - Shop | Register',
            'kode_kon' => $this->Home_model->kodeKonsumen(),
            "provinsi" => $this->Home_model->getAllProvinsi(),
            "kota" => $this->Home_model->getAllKota(),
            "provinsi_selected" => '',
            "kota_selected" => ''
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[konsumen.email]', [
            "is_unique" => "email tersebut telah terdaftar"
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kd_pos', 'Kode pos', 'required|numeric|trim');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('home/register', $data);
        } else {
            $this->Home_model->registrasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda berhasil melakukan registrasi
          </div>');
            redirect('home/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Zan - Shop | Login';
            $this->load->view('home/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('konsumen', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    "email" => $user['email'],
                    "role_id" => $user['role_id']
                ];

                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                </div>');
                redirect('home/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!
          </div>');
            redirect('home/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kamu berhasil logout!
          </div>');
        redirect('home');
    }

    public function keranjang_belanja($kd_brg)
    {
        $barang = $this->Home_model->find($kd_brg);

        $data = array(
            'id'      => $barang->kd_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg,
        );

        $this->cart->insert($data);
        redirect('home');
    }


    public function ambil_data()
    {
        $modul = $this->input->post('modul');
        $kd_prov = $this->input->post('kd_prov');

        if ($modul == "kota") {
            echo $this->Home_model->getAllKota($kd_prov);
        }
    }

    public function keranjang()
    {
        $data['judul'] = 'Zan - Shop | Keranjang';
        $data['keranjang'] = $this->Home_model->find();


        $this->load->view('home/keranjang', $data);
    }
}
