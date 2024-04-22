<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags extends MY_Controller
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
            'title' => 'Tag',
            'sidebar' => 'tags'
        ];
        $this->backend_framework->view('vw_tags', $data);
    }

    public function load()
    {
        $data = $this->db->get_where('tags')->result_array();
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
            'title' => 'Tambah Team',
            'sidebar' => 'team'
        ];
        $this->backend_framework->view('vw_tambah', $data);
    }

    public function submit_add()
    {
        $data = [
            'uuid' => sha1(md5($this->input->post('tags'))),
            'tags' => $this->input->post('tags'),
            'is_active' => true,
            'created_by' => $this->session->userdata('uuid')
        ];
        $this->db->trans_start();
        $this->db->insert('tags', $data);
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
            'title' => 'Edit Team',
            'sidebar' => 'team',
            'data'   => $this->db->get_where('tags', ['uuid' => $uuid])->row_array()
        ];
        $this->backend_framework->view('vw_edit', $data);
    }

    public function submit_edit()
    {
        $response = [];

        $uuid = $this->input->post('uuid');

        $data = [
            'uuid' => sha1(md5($this->input->post('tags'))),
            'tags' => $this->input->post('tags'),
            'is_active' => true,
            'created_by' => $this->session->userdata('uuid')
        ];

        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->update('tags', $data);
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
        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->delete('tags');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }

        echo json_encode($response);
    }

    public function updated_drafted($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('tags', ['is_active' => 1]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Published'];
        echo json_encode($response);
    }

    public function updated_published($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('tags', ['is_active' => 0]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Drafted'];
        echo json_encode($response);
    }
}
