<?php
class Contact extends MY_Controller
{


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
            'title' => 'Contact',
            'whychooseus' => $whychooseus,
            'websettings' => $websettings,
        ];
        $this->frontend_framework->view('vw_contact', $data, false);
    }

    public function send_contact()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'subject' => htmlspecialchars($this->input->post('subject')),
            'message' => htmlspecialchars($this->input->post('message')),
            'reply' => 0,
            'date' => date('Y-m-d H:i:s')
        ];

        $this->db->trans_begin();
        $this->db->insert('form_contact', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status()) {
            redirect('contact?status=true');
        } else {
            redirect('contact?false=true');
        }
    }
}
