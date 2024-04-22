<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_about extends MY_Controller
{

    public function __construct()
    {
        is_login();
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Management About',
            'sidebar' => 'management about',
            'data' => $this->db->get_where('about', ['id' => 1])->row_array()
        ];
        $this->backend_framework->view('vw_management_about', $data);
    }

    public function submit_add()
    {

        $response = [];
        // cek banner
        $dataOld = $this->db->get_where('about', ['id' => 1])->row_array();
        if ($_FILES['images']['name']) {
            $uploadImages = upload_image('images', 'images');
            $path = ASSETS_UPLOAD . 'images/' . $dataOld['images'];
            delete_image($path);
            $images = $uploadImages['data']['file_name'];
        } else {
            $images = $dataOld['banner_hero'];
        }



        $data_update = [
            'images' => $images,
            'body' => $this->input->post('body'),
        ];

        $this->db->trans_start();
        $this->db->where(
            'id',
            1
        );
        $this->db->update('about', $data_update);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal update data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil update data'];
        }
        echo json_encode($response);
    }

    public function upload_about()
    {
        $config['upload_path'] = './assets/uploads/images'; // Lokasi penyimpanan gambar
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Jenis file yang diizinkan
        $config['max_size'] = 5000; // Ukuran maksimal file (dalam KB)
        $config['file_name'] = date('ymdhis');

        $this->load->library('upload', $config);



        if (!$this->upload->do_upload('upload')) {
            $data = [
                "uploaded" => false,
                "error" => [
                    "message" => ""
                ]
            ];
        } else {
            $upload_data = $this->upload->data(); // Mengambil informasi tentang file yang diunggah
            $file_name = $upload_data['file_name'];
            $data = [
                'uploaded' => true,
                'url' => base_url('assets/uploads/images/') . $file_name
            ];
        }

        echo json_encode($data);
    }
}
