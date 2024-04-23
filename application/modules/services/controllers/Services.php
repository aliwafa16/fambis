<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
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

    public function __construct()
    {
        is_login();
        parent::__construct();
    }
    public function index()
    {
        $data = [
            'title' => 'Services',
            'sidebar' => 'services'
        ];
        $this->backend_framework->view('vw_services', $data);
    }

    public function load()
    {
        $data = $this->db->get_where('services', ['is_active', 1])->result_array();
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
            'title' => 'Tambah Services',
            'sidebar' => 'services'
        ];
        $this->backend_framework->view('vw_tambah', $data);
    }

    public function submit_add()
    {
        $response = [];
        $services = htmlspecialchars($this->input->post('services'));
        $slug = strtolower(str_replace(" ", "-", $services));
        $uploadImages = upload_image('images', 'services_images');
        if ($this->input->post('default_images')) {
            $uploadImages = ['data' => ['file_name' => 'defaults.png']];
        }
        $data = [
            'uuid' => sha1(md5($services)),
            'services' => $services,
            'is_active' => true,
            'img' =>  $uploadImages['data']['file_name'],
            'slug' => $slug,
            'created_by' => $this->session->userdata('uuid'),
            'description' => $this->input->post('description')
        ];

        $this->db->trans_start();
        $this->db->insert('services', $data);
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
            'title' => 'Edit Services',
            'sidebar' => 'category_blogs',
            'data'   => $this->db->get_where('services', ['uuid' => $uuid])->row_array()
        ];
        $this->backend_framework->view('vw_edit', $data);
    }

    public function submit_edit()
    {
        $response = [];
        $services = htmlspecialchars($this->input->post('services'));
        $slug = str_replace(" ", "-", $services);
        $uuid = $this->input->post('uuid');

        // get Data
        $dataOld = $this->db->get_where('services', ['uuid' => $uuid])->row_array();

        if ($_FILES['images']['name']) {
            $uploadImages = upload_image('images', 'services_images');
            $path = ASSETS_UPLOAD . 'services_images/' . $dataOld['img'];
            delete_image($path);
            $img = $uploadImages['data']['file_name'];
        } else {
            $img = $dataOld['img'];
        }
        $data = [
            'services' => $services,
            'is_active' => true,
            'slug' => $slug,
            'img' => $img,
            'created_by' => $this->session->userdata('uuid'),
            'updated_at' => date('Y-m-d H:i:s'),
            'description' => $this->input->post('description')
        ];

        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->update('services', $data);
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
        $data = $this->db->get_where('services', ['uuid' => $uuid])->row_array();
        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->delete('services');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $path = ASSETS_UPLOAD . 'services_images/' . $data['img'];
            delete_image($path);
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }

        echo json_encode($response);
    }



    public function updated_drafted($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('services', ['is_active' => 1]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Berhasil edit data'];
        echo json_encode($response);
    }

    public function updated_published($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('services', ['is_active' => 0]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Berhasil edit data'];
        echo json_encode($response);
    }
}
