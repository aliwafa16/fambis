<?php if (!defined('BASEPATH')) exit('No direct script access allowed');




class Frontend_framework
{
    protected $ci_;

    function __construct()
    {
        $this->ci_ = &get_instance();
    }

    function view($content, $data = null, $hero=false)
    {
        $data['header'] = $this->ci_->load->view('template_frontend/header', $data, TRUE);
        $data['navbar'] = $this->ci_->load->view('template_frontend/navbar', $data, TRUE);
        $data['hero'] = ($hero) ? $this->ci_->load->view('template_frontend/hero', $data, TRUE) : $this->ci_->load->view('template_frontend/breadcumb', $data, TRUE);
        $data['content'] = $this->ci_->load->view($content, $data, TRUE);
        $data['footer'] = $this->ci_->load->view('template_frontend/footer', $data, TRUE);
        $this->ci_->load->view('template_frontend/app', $data);
    }
}
