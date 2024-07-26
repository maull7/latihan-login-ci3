<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        is_logeged_in();
        // Load model yang diperlukan
        $this->load->model('Model_registrasi');
    }

    public function index()
    {
        $data['tittle'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        // Panggil method deleteData dari model
        $delete = $this->Model_registrasi->deleteData($id);

        if ($delete) {
            // Jika penghapusan berhasil, redirect atau berikan respons sesuai kebutuhan
            redirect('menu'); // Ganti 'data/list' dengan halaman yang sesuai
        } else {
            // Jika penghapusan gagal, berikan pesan error atau respons lainnya
            echo "Gagal menghapus data";
        }
    }
    public function hapussubmenu($id)
    {
        // Panggil method deleteData dari model
        $delete = $this->Model_registrasi->deleteDataSubMenu($id);

        if ($delete) {
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
            Congratulations your new menu success
            </div>');
            // Jika penghapusan berhasil, redirect atau berikan respons sesuai kebutuhan
            redirect('menu/submenu'); // Ganti 'data/list' dengan halaman yang sesuai
        } else {
            // Jika penghapusan gagal, berikan pesan error atau respons lainnya
            echo "Gagal menghapus data";
        }
    }

    public function subedit($id)
    {
        $data['tittle'] = 'edit data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['edit'] = $this->db->get_where('user_sub_menu', ['sub_id' => $id])->row_array();


        if ($data) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            echo "data tidak ada";
        }
    }

    public function subeditData()
    {
        $id = $this->input->post('sub_id');
        $data = array(
            'menu_id' => $this->input->post('menu_id', true),
            'tittle' => $this->input->post('tittle', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true)
        );

        $update = $this->Model_registrasi->editDataSubMenu($id, $data);


        if ($update) {
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
            Congratulations your edit success
            </div>');
            redirect('menu/submenu');
        } else {
            redirect('menu/editsubmenu');
        }
    }
    public function edit($id)
    {
        $data['edit'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();


        if ($data) {
            $this->load->view('templates/header', $data);

            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            echo "data tidak ada";
        }
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $data = array(
            'menu' => $this->input->post('menu'),
        );

        $update = $this->Model_registrasi->editDataMenu($id, $data);


        if ($update) {
            redirect('menu');
        } else {
            redirect('menu/edit');
        }
    }

    public function insert()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Menu Management';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu', true)
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
            Congratulations your new menu success
            </div>');

            redirect('menu');
        }
    }
    public function active()
    {
        $this->form_validation->set_rules('role_id', 'Role_id');
        $this->form_validation->set_rules('menu_id', 'Menu_id');

        if ($this->form_validation->run() == false) {
            $data = [
                'role_id' => $this->input->post('role_id', true),
                'menu_id' => $this->input->post('menu_id', true)
            ];
            $this->db->insert('user_access_menu', $data);

            // Periksa apakah insert berhasil
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
                    Congratulations your new menu active
                </div>');
                redirect('menu/index');
            } else {
                // Insert gagal
                echo "Insert gagal";
            }
        } else {
            $data['tittle'] = 'Menu Management';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function submenu()
    {
        $data['tittle'] = 'Sub Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Model_registrasi->getSubMenu();
        $data['subeditmenu'] = $this->db->get('user_sub_menu')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function addSubMenu()
    {
        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required');
        $this->form_validation->set_rules('tittle', 'Tittle', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Is_active');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Sub Management';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['submenu'] = $this->Model_registrasi->getSubMenu();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id', true),
                'tittle' => $this->input->post('tittle', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true)

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
            Congratulations your new menu success
            </div>');

            redirect('menu/submenu');
        }
    }
}
