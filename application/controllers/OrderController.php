<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

    public function checkLogin()
    {
        if(!$this->session->userdata('LoggedIn')){
            redirect(base_url('/login'));
        }
    }
	public function index()
	{		
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order'] =$this->OrderModel->selectOrder();

        $this->load->view('order/list', $data);
        $this->load->view('admin_template/footer');
	}
	
}