<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




class Backend_framework


{
    protected $ci_;

    function __construct()
    {
        $this->ci_ = &get_instance();
    }

    function view($content, $data = null)
    {
        $data['header'] = $this->ci_->load->view('template_backend/header', $data, TRUE);
        $data['sidebar'] = $this->ci_->load->view('template_backend/sidebar', $data, TRUE);
        $data['navbar'] = $this->ci_->load->view('template_backend/navbar', $data, TRUE);
        // $data['hero'] = $this->ci_->load->view('template_backend/hero', $data, TRUE);
        $data['content'] = $this->ci_->load->view($content, $data, TRUE);
        $data['footer'] = $this->ci_->load->view('template_backend/footer', $data, TRUE);
        $this->ci_->load->view('template_backend/app', $data);
    }
}
