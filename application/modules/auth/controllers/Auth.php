<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data = [];
        // Web settings
        $data['websettings'] =  $this->db->get_where('setting_aplication', ['id' => 1])->row_array();
        $data['about'] =  $this->db->get_where('about', ['id' => 1])->row_array();
        // $this->frontend_framework->view('vw_auth', $data);
        $this->load->view('vw_auth', $data);
    }

    public function login()
    {
        $response = [];
        $password = $this->input->post('password');
        $username = $this->input->post('username');

        $this->db->select('users.*,role.role,role.uuid as uuid_role');
        $this->db->from('users');
        $this->db->join('role', 'users.role_id=role.id_role');
        $this->db->where('users.username', htmlspecialchars($this->input->post('username')));
        $cekUser =  $this->db->get()->row_array();


        if ($cekUser) {
            if (md5($password) == $cekUser['password']) {
                $data_session = [
                    'username' => $cekUser['username'],
                    'uuid' => $cekUser['uuid'],
                    'email' => $cekUser['email'],
                    'datetime_login' => date('Y-m-d H:is'),
                    'is_login' => true,
                    'role' => $cekUser['role_id'],
                    'role' => $cekUser['role'],
                    'uuid_role' => $cekUser['uuid_role']
                ];


                // update last login
                $dataLastLogin = [
                    'date_last_login' => date('Y-m-d H:i:s')
                ];

                $this->db->where('users.uuid', $cekUser['uuid']);
                $this->db->update('users', $dataLastLogin);
                $this->session->set_userdata($data_session);
                $response = ['code' => 200, 'status' => true, 'data' => $cekUser, 'message' => 'Berhasil login'];
            } else {
                $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
            }
        } else {
            $response = ['code' => 404, 'status' => false, 'data' => null, 'message' => 'user tidak ditemukan'];
        }

        echo json_encode($response);
    }

    public function logout()
    {
        session_destroy();
        redirect('auth');
    }
}
