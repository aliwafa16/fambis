<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Websettings extends MY_Controller
{

    public function __construct()
    {
        is_login();
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Web Settings',
            'sidebar' => 'websettings'
        ];

        $data['websettings'] = $this->db->get_where('setting_aplication', ['id' => 1])->row_array();
        $this->backend_framework->view('vw_websettings', $data);
    }
    public function update()
    {
        $submit_data = [
            'nama' => $this->input->post('nama'),
            'akronim' => $this->input->post('akronim'),
            'deskripsi' => $this->input->post('deskripsi'),
            'link_youtube' => $this->input->post('link_youtube'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'linkedin' => $this->input->post('linkedin'),
            'twitter' => $this->input->post('twitter'),
            'deskripsi_footer' => $this->input->post('deskripsi_footer'),
            'title_cta' => $this->input->post('title_cta'),
            'deskripsi_cta' => $this->input->post('deskripsi_cta'),
        ];


        // Proses logo
        $dataOld = $this->db->get_where('setting_aplication', ['id' => 1])->row_array();
        if ($_FILES['logo']['name']) {
            $uploadImages = upload_image('logo', 'web_settings/logo');
            $path = ASSETS_UPLOAD . 'websettings/logo/' . $dataOld['logo'];
            // delete_image($path);
            $logo = $uploadImages['data']['file_name'];
        } else {
            $logo = $dataOld['logo'];
        }

        if ($_FILES['banner_hero']['name']) {
            $uploadImages = upload_image('banner_hero', 'web_settings/banner');
            $path = ASSETS_UPLOAD . 'websettings/banner/' . $dataOld['banner_hero'];
            // delete_image($path);
            $banner = $uploadImages['data']['file_name'];
        } else {
            $banner = $dataOld['banner_hero'];
        }

        if ($_FILES['img_why']['name']) {
            $uploadImages = upload_image('img_why', 'web_settings/why');
            $path = ASSETS_UPLOAD . 'websettings/why/' . $dataOld['img_why'];
            // delete_image($path);
            $img_why = $uploadImages['data']['file_name'];
        } else {
            $img_why = $dataOld['img_why'];
        }

        $submit_data['logo'] = $logo;
        $submit_data['banner_hero'] = $banner;
        $submit_data['img_why'] = $img_why;



        $this->db->trans_start();
        $this->db->where(
            'id',
            1
        );
        $this->db->update('setting_aplication', $submit_data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal update data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil update data'];
        }
        echo json_encode($response);
    }
}
