<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
        $category = $this->db->get_where('category_posts',['is_active'=>1])->result_array();
        $this->db->select('posts.*,authors.name as authors_name');
        $this->db->from('posts');
        $this->db->join('authors','posts.author_id=authors.id');
        $this->db->where('posts.is_active',1);
        $this->db->limit(4);
        $blogs= $this->db->get()->result_array();


        // Web settings
        $websettings =  $this->db->get_where('setting_aplication', ['id' => 1])->row_array();

        // why_chooseus
        $why_chooseus =  $this->db->get('why_choose_us')->result_array();
        $data = [
            'category'=> $category,
            'blogs' => $blogs,
            'websettings' => $websettings,
            'why_chooseus' => $why_chooseus
        ];
        $this->frontend_framework->view('vw_home', $data, true);
    }

    public function blogs($slug = NULL){
        $data = [];
        // $this->db->select('posts.*,authors.name as authors_name, authors.description as authors_desc, category_posts.category');
        // $this->db->from('posts');
        // $this->db->join('authors', 'posts.author_id=authors.id');
        // $this->db->join('category_posts', 'posts.category_id=category_posts.id');
        // $this->db->where('posts.is_active', 1);
        // $this->db->where('posts.slug', $slug);
        // $blogs = $this->db->get()->row_array();


        $data['category'] = $this->db->get_where('category_posts', ['is_active' => 1])->result_array();

        // Web settings
        $data['websettings'] =  $this->db->get_where('setting_aplication', ['id' => 1])->row_array();

        // recents
        $data['recent_blogs'] = $this->db->limit(4)->get_where('posts', ['is_active' => 1])->result_array();




        // tags
        $this->db->where('is_active', 1);
        $this->db->order_by('RAND()');
        $this->db->limit(10);
        $tags = $this->db->get('tags')->result_array();

        $data['all_tags'] = $tags;

        if (!$slug) {
            $this->db->select('posts.*,authors.name as authors_name, authors.description as authors_desc, category_posts.category');
            $this->db->from('posts');
            $this->db->join('authors', 'posts.author_id=authors.id');
            $this->db->join('category_posts', 'posts.category_id=category_posts.id');
            $this->db->where('posts.is_active', 1);
            // $this->db->where('posts.slug', $slug);
            $blogs = $this->db->get()->result_array();
            $data['title'] = 'Blogs';
            $data['blogs'] = $blogs;
            $this->frontend_framework->view('vw_blogs', $data, false);
        } else {
            $this->db->select('posts.*,authors.name as authors_name, authors.description as authors_desc, authors.images as pic_profile,  category_posts.category, authors.instagram,authors.linked_in,authors.twitter,authors.facebook,authors.website');
            $this->db->from('posts');
            $this->db->join('authors', 'posts.author_id=authors.id');
            $this->db->join('category_posts', 'posts.category_id=category_posts.id');
            $this->db->where('posts.is_active', 1);
            $this->db->where('posts.slug', $slug);
            $blogs = $this->db->get()->row_array();
            $data['blogs'] = $blogs;
            $data['title'] = 'Blogs Details';
            $this->frontend_framework->view('vw_blog_details', $data, false);
        }
    }

    public function search()
    {
        $keyword = $this->input->get('keywords');
        $data = [];

        $data['category'] = $this->db->get_where('category_posts', ['is_active' => 1])->result_array();

        // Web settings
        $data['websettings'] =  $this->db->get_where('setting_aplication', ['id' => 1])->row_array();

        // recents
        $data['recent_blogs'] = $this->db->limit(4)->get_where('posts', ['is_active' => 1])->result_array();



        // tags
        $this->db->where('is_active', 1);
        $this->db->order_by('RAND()');
        $this->db->limit(10);
        $tags = $this->db->get('tags')->result_array();

        $data['all_tags'] = $tags;

        $this->db->select('posts.*,authors.name as authors_name, authors.description as authors_desc, category_posts.category');
        $this->db->from('posts');
        $this->db->join('authors', 'posts.author_id=authors.id');
        $this->db->join('category_posts', 'posts.category_id=category_posts.id');
        $this->db->where('posts.is_active', 1);
        $this->db->like('posts.title', $keyword);
        $this->db->or_like('authors.name', $keyword);
        $this->db->or_like('category_posts.category', $keyword);
        // $this->db->where('posts.slug', $slug);
        $blogs = $this->db->get()->result_array();
        $data['title'] = 'Hasil pencarian : ' . $keyword;
        $data['blogs'] = $blogs;
        $this->frontend_framework->view('vw_blogs', $data, false);

    }
}
