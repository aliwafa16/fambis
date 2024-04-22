<?php
class About extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->select('category_posts.*, COUNT(posts.id) as total_posts');
        $this->db->from('category_posts');
        $this->db->join('posts', 'posts.category_id = category_posts.id', 'left');
        $this->db->where('category_posts.is_active', 1);
        $this->db->where('posts.is_active', 1);
        $this->db->group_by('category_posts.id');
        $category = $this->db->get()->result_array();

        // why choose us
        $whychooseus = $this->db->get('why_choose_us')->result_array();
        $websettings = $this->db->get_where('setting_aplication', ['id' => 1])->row_array();

        $about = $this->db->get_where('about', ['id' => 1])->row_array();
        $services = $this->db->get_where('services', ['is_active' => 1])->result_array();
        $our_teams = $this->db->get_where('teams', ['is_active' => 1])->result_array();
        $testimoni = $this->db->get_where('testimoni', ['is_active' => 1])->result_array();



        $data = [
            'category' => $category,
            // 'blogs' => $blogs,
            'title' => 'About Us',
            'whychooseus' => $whychooseus,
            'websettings' => $websettings,
            'about' => $about,
            'services' => $services,
            'teams' => $our_teams,
            'testimoni' => $testimoni
        ];
        $this->frontend_framework->view('vw_about', $data, false);
    }
}
