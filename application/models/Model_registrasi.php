<?php
class Model_registrasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function regisModel()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
        Congratulations your account has been created. Please login !
        </div>');

        redirect('auth');
    }

    public function deleteData($id)
    {
        // Lakukan penghapusan data berdasarkan ID
        $this->db->where('id', $id);
        $this->db->delete('user_menu'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

        return $this->db->affected_rows() > 0;
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
        Your menu is delete
        </div>');

        redirect('menu');
    }
    public function deleteDataSubMenu($id)
    {
        // Lakukan penghapusan data berdasarkan ID
        $this->db->where('sub_id', $id);
        $this->db->delete('user_sub_menu'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

        return $this->db->affected_rows() > 0;
        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">
        Your menu is delete
        </div>');

        redirect('menu/submenu');
    }

    public function editDataMenu($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);

        return $this->db->affected_rows() > 0;

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
        Your menu is updtae
        </div>');

        redirect('menu');
    }
    public function editDataSubMenu($id, $data)
    {
        $this->db->where('sub_id', $id);
        $this->db->update('user_sub_menu', $data);

        return $this->db->affected_rows() > 0;

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">
        Your menu is updtae
        </div>');

        redirect('menu/submenu');
    }

    public function getSubMenu()
    {
        $query = "SELECT *, `user_menu`.`menu`
                   FROM `user_sub_menu` JOIN `user_menu` ON 
                   `user_sub_menu`.`menu_id` =  `user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
