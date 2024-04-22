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
        $data = [
            'category'=> $category,
            'blogs' => $blogs
        ];
        $this->frontend_framework->view('vw_home', $data, true);
    }

    public function blogs($slug = NULL){
        $this->db->select('posts.*,authors.name as authors_name, authors.description as authors_desc, category_posts.category');
        $this->db->from('posts');
        $this->db->join('authors', 'posts.author_id=authors.id');
        $this->db->join('category_posts', 'posts.category_id=category_posts.id');
        $this->db->where('posts.is_active', 1);
        $this->db->where('posts.slug', $slug);
        $blogs = $this->db->get()->row_array();


        $category = $this->db->get_where('category_posts', ['is_active' => 1])->result_array();

        $this->db->where('is_active', 1);
        $this->db->order_by('RAND()');
        $this->db->limit(10);
        $tags = $this->db->get('tags')->result_array();
        $data = [
            'title'=> 'Blog Details',
            'blogs' => $blogs,
            'category' => $category,
            'all_tags' => $tags

        ];

        $this->frontend_framework->view('vw_blog_details', $data, false);
    }
}
