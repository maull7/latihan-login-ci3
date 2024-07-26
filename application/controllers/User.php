<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logeged_in();
    }
    public function index()
    {
        $data['tittle'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['tittle'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];



            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['user']['image'];

                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {

                    $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
            Your not is updated!
            </div>');
                    redirect('user/edit');
                    echo $this->upload->display_errors();
                }
            } else {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
                Your is not updated!
                </div>');
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
            Your profile has been updated!
            </div>');
            redirect('user');
        }
    }


    public function change()
    {
        $data['tittle'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentPassword', 'password', 'required|trim');
        $this->form_validation->set_rules(
            'newPassword1',
            'Newpassword1',
            'required|trim|matches[newPassword2]|min_length[3]',
            [
                'matches' => 'Your new password wrong!',
                'min_length' => 'minimum new password character 3 '
            ]
        );
        $this->form_validation->set_rules('newPassword2', 'Newpassword2', 'required|trim|matches[newPassword1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change', $data);
            $this->load->view('templates/footer');
        } else {
            $currentPw = $this->input->post('currentPassword', true);
            $oldPassword = $data['user']['password'];
            if (!password_verify($currentPw, $oldPassword)) {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
                Password yang anda masukan salah
                </div>');
                redirect('user/change');
            } else {
                $newPassword = $this->input->post('newPassword1', true);
                if ($newPassword == $currentPw) {
                    $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
                    password anda sama dengan sebelumnya
                    </div>');
                    redirect('user/change');
                } else {
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
                    password anda berhasil diubah
                    </div>');
                    redirect('user/change');
                }
            }
        }
    }
}
