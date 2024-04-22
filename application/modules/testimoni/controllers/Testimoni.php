<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends MY_Controller
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
        $data = [
            'title' => 'Testimoni',
            'sidebar' => 'testimoni'
        ];
        $this->backend_framework->view('vw_testimoni', $data);
    }

    public function load()
    {
        $data = $this->db->get_where('testimoni')->result_array();
        $results = [
            'draw' => 1,
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data
        ];
        echo json_encode($results);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Testimoni',
            'sidebar' => 'testimoni'
        ];
        $this->backend_framework->view('vw_tambah', $data);
    }

    public function submit_add()
    {
        $uploadImages = upload_image('images', 'testimoni');
        if ($this->input->post('default_images')) {
            $uploadImages = ['data' => ['file_name' => 'defaults.png']];
        }


        $data = [
            'uuid' => sha1(md5($this->input->post('name'))),
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'images' => $uploadImages['data']['file_name'],
            'is_active' => true,
            'created_by' => $this->session->userdata('uuid'),
            'rating' => $this->input->post('rating')
        ];
        $this->db->trans_start();
        $this->db->insert('testimoni', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => $data, 'message' => 'Berhasil tambah data'];
        }

        echo json_encode($response);
    }

    public function edit($uuid = NULL)
    {

        $data = [
            'title' => 'Edit Testimoni',
            'sidebar' => 'testimoni',
            'data'   => $this->db->get_where('testimoni', ['uuid' => $uuid])->row_array()
        ];
        $this->backend_framework->view('vw_edit', $data);
    }

    public function submit_edit()
    {
        $response = [];
        $category = htmlspecialchars($this->input->post('category'));
        $slug = str_replace(" ", "-", $category);
        $uuid = $this->input->post('uuid');


        // get Data
        $dataOld = $this->db->get_where('testimoni', ['uuid' => $uuid])->row_array();

        if ($_FILES['images']['name']) {
            $uploadImages = upload_image('images', 'authors');
            $path = ASSETS_UPLOAD . 'authors/' . $dataOld['images'];
            delete_image($path);
            $img = $uploadImages['data']['file_name'];
        } else {
            $img = $dataOld['images'];
        }

        $data = [
            'uuid' => sha1(md5($this->input->post('name'))),
            'name' => $this->input->post('name'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'images' => $img,
            'is_active' => true,
            'created_by' => $this->session->userdata('uuid'),
            'rating' => $this->input->post('rating')
        ];

        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->update('testimoni', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal edit data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => $data, 'message' => 'Berhasil edit data'];
        }

        echo json_encode($response);
    }

    public function hapus()
    {
        $uuid = $this->input->post('uuid');
        $data = $this->db->get_where('testimoni', ['uuid' => $uuid])->row_array();
        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->delete('testimoni');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $path = ASSETS_UPLOAD . 'testimoni/' . $data['images'];
            delete_image($path);
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }

        echo json_encode($response);
    }
}
