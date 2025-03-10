<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
    }
    public function index()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('dashboard/index');
        $this->load->view('admin_template/footer');
    }

    public function logout()
    {
        $this->checkLogin();
        $this->session->unset_userdata('LoggedIn');
        $this->session->set_flashdata('success', 'You have been logged out');
        redirect(base_url('/login'));
    }
}