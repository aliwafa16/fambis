<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends MY_Controller
{

    public function __construct()
    {
        is_login();
        parent::__construct();     
    }
    public function index()
    {
        $data = [
            'title' => 'Blog',
            'sidebar' => 'blogs'
        ];
        $this->backend_framework->view('vw_blogs', $data);
    }

    public function load()
    {
        $this->db->select('posts.*, category_posts.category, authors.name');
        $this->db->from('posts');
        $this->db->join('category_posts','posts.category_id=category_posts.id');
        $this->db->join('authors', 'posts.author_id=authors.id');
        $data = $this->db->get()->result_array();
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
        $category_blogs = $this->db->get_where('category_posts',['is_active'=>1])->result_array();
        $authors = $this->db->get_where('authors', ['is_active' => 1])->result_array();
        $tags = $this->db->get_where('tags', ['is_active' => 1])->result_array();
        $this->session->set_userdata('upload_image_file_manager', true);
        $data = [
            'title' => 'Tambah Blog',
            'sidebar' => 'blogs',
            'category' => $category_blogs,
            'authors' => $authors,
            'tags'=>$tags
        ];
        $this->backend_framework->view('vw_tambah', $data);
    }

    public function submit_add()
    {
        $response = [];
        $title = htmlspecialchars($this->input->post('title'));
        $slug = strtolower(str_replace(" ", "-", $title));

        $uploadImages = upload_image('images', 'banner_blogs');
        if ($this->input->post('default_images')) {
            $uploadImages = ['data' => ['file_name' => 'defaults.png']];
        }

        $data = [
            'uuid' => sha1(md5($title)),
            'category_id' => $this->input->post('category_id'),
            'author_id' => $this->input->post('author_id'),
            'body' => $this->input->post('description'),
            'post_date' => date('Y-m-d H:i:s'),
            'title' => $title,
            'banner' =>  $uploadImages['data']['file_name'],
            'is_active' => $this->input->post('is_active'),
            'slug' => $slug,
            'created_by' => $this->session->userdata('uuid'),
            'tags'=> json_encode($this->input->post('tags'))
        ];

        $this->db->trans_start();
        $this->db->insert('posts', $data);
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
        $category_blogs = $this->db->get_where('category_posts', ['is_active' => 1])->result_array();
        $authors = $this->db->get_where('authors', ['is_active' => 1])->result_array();
        $tags = $this->db->get_where('tags', ['is_active' => 1])->result_array();
        $data = [
            'title' => 'Edit Blog',
            'sidebar' => 'blogs',
            'data'   => $this->db->get_where('posts', ['uuid' => $uuid])->row_array(),
            'category' => $category_blogs,
            'authors' => $authors,
            'tags' => $tags
        ];
        $this->backend_framework->view('vw_edit', $data);
    }

    public function submit_edit()
    {
        $response = [];
        $title = htmlspecialchars($this->input->post('title'));
        $slug = strtolower(str_replace(" ", "-", $title));
        $uuid = $this->input->post('uuid');

        // get Data
        $dataOld = $this->db->get_where('posts', ['uuid' => $uuid])->row_array();

        if ($_FILES['images']['name']) {
            $uploadImages = upload_image('images', 'banner_blogs');
            $path = ASSETS_UPLOAD . 'banner_blogs/' . $dataOld['banner'];
            delete_image($path);
            $img = $uploadImages['data']['file_name'];
        } else {
            $img = $dataOld['banner'];
        }

        $data = [
            'uuid' => sha1(md5($title)),
            'category_id' => $this->input->post('category_id'),
            'author_id' => $this->input->post('author_id'),
            'body' => $this->input->post('description'),
            'post_date' => date('Y-m-d H:i:s'),
            'title' => $title,
            'banner' =>  $img,
            'is_active' => $this->input->post('is_active'),
            'slug' => $slug,
            'created_by' => $this->session->userdata('uuid'),
            'tags' => json_encode($this->input->post('tags')),
            'updated_at' =>date('Y-m-d H:i:s'),
        ];

        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->update('posts', $data);
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
        $data = $this->db->get_where('posts', ['uuid' => $uuid])->row_array();
        $this->db->trans_start();
        $this->db->where('uuid', $uuid);
        $this->db->delete('posts');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
        } else {
            $path = ASSETS_UPLOAD . 'banner_blogs/' . $data['banner'];
            delete_image($path);
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }

        echo json_encode($response);
    }

    public function upload_blogs(){
        $config['upload_path'] = './assets/uploads/blogs'; // Lokasi penyimpanan gambar
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Jenis file yang diizinkan
        $config['max_size'] = 5000; // Ukuran maksimal file (dalam KB)
        $config['file_name'] = date('ymdhis');

        $this->load->library('upload', $config);

       

        if (!$this->upload->do_upload('upload')) {
            $data = [
                "uploaded"=>false,
                "error" =>[
                    "message"=> ""
                ]
            ];
        } else {
            $upload_data = $this->upload->data(); // Mengambil informasi tentang file yang diunggah
            $file_name = $upload_data['file_name'];
            $data = [
                'uploaded'=>true,
                'url' => base_url('assets/uploads/blogs/').$file_name
            ];
        }

        echo json_encode($data);
    }

    public function updated_drafted($uuid){
        $this->db->where('uuid', $uuid);
        $this->db->update('posts',['is_active'=>1]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Berhasil edit data'];
        echo json_encode($response);
    }

    public function updated_published($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('posts', ['is_active' => 0]);
        $response = ['code' => 200, 'status' => true, 'data' => "", 'message' => 'Berhasil edit data'];
        echo json_encode($response);
    }
}
