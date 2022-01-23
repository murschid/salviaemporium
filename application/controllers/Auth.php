<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function logregis() {
        if (!$this->session->userdata('customer_auth')) {
            if ($this->input->get('link') == 'ckout') {
                $this->session->set_flashdata('checkout', 'checkout');
            }
            $data['title'] = 'Salvia | Emporium';
            $data['shopcls'] = 'active';
            $data['view'] = 'ecommerce/my-account';
            $this->load->view('ecommerce/index', $data);
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function customer_regist() {
        $this->form_validation->set_rules('cus_name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|xss_clean|min_length[6]|valid_email|max_length[30]|is_unique[tb_customers.email]');
        $this->form_validation->set_rules('cus_mobile', 'Mobile', 'trim|required|xss_clean|min_length[11]|max_length[14]|numeric');
        $this->form_validation->set_rules('cus_passone', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('cus_passtwo', 'Confirm Password', 'trim|required|xss_clean|min_length[6]|max_length[20]|matches[cus_passone]');
        $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|xss_clean|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('cus_city', 'City', 'trim|required|xss_clean|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('cus_zip', 'ZIP Code', 'trim|xss_clean|min_length[4]|max_length[10]|numeric');
        $this->form_validation->set_rules('cus_country', 'Country', 'trim|xss_clean|min_length[4]|max_length[30]');
        if ($this->form_validation->run() == TRUE) {
            $number = sha1(uniqid());
            $data = array(
                'name' => $this->input->post('cus_name'),
                'email' => $this->input->post('cus_email'),
                'token' => $number,
                'mobile' => $this->input->post('cus_mobile'),
                'password' => md5($this->input->post('cus_passone')),
                'address' => $this->input->post('cus_address'),
                'city' => $this->input->post('cus_city'),
                'zip' => $this->input->post('cus_zip'),
                'country' => $this->input->post('cus_country'),
                'time' => time(),
                'ip' => $this->input->ip_address()
            );
            #Email Start
            $edata['link'] = base_url('customer/activatecustomeracc/' . $number);
            $edata['name'] = $this->input->post('cus_name');

            $config['smtp_host'] = 'salviaemporium.com';
            $config['smtp_user'] = 'noreply@salviaemporium.com';
            $config['smtp_pass'] = 'pB4&R]bbRd7w';
            $this->email->initialize($config);
            $message = $this->load->view('ecommerce/email/confirm-email', $edata, TRUE);
            $this->email->from('noreply@salviaemporium.com', 'Salvia Emporium');
            $this->email->to($this->input->post('cus_email'));
            $this->email->subject('Registration - SalviaEmporium');
            $this->email->message($message);

            if ($this->email->send()) {
                $this->home_model->common_insert('tb_customers', $data);
                $this->session->set_flashdata('toast', 'Success! Please Check Email');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Errors! Please Try Again.');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', validation_errors());
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

    public function customer_login() {
        $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|xss_clean|min_length[9]|max_length[30]|valid_email');
        $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'email' => $this->input->post('cus_email'),
                'password' => md5($this->input->post('cus_password')),
                'active' => 1
            );
            $customer = $this->home_model->login_query('tb_customers', $data);
            if ($customer != FALSE) {
                $authdata = array('id' => $customer->id, 'cus_user' => $customer->email, 'cus_name' => $customer->name);
                $this->session->set_userdata('customer_auth', $authdata);
                $this->session->set_flashdata('toast', 'Login Successful');
                $this->session->set_flashdata('toastclr', '#27ae60');
                if ($this->session->flashdata('checkout')) {
                    redirect('customer/checkout');
                } else {
                    redirect('customer/myaccount');
                }
            } else {
                $this->session->set_flashdata('toast', 'Something Wrong!');
                $this->session->set_flashdata('toastclr', '#e74c3c');
                redirect($this->agent->referrer());
            }
        }
    }

    public function logout() {
        if ($this->session->userdata('customer_auth')) {
            $this->session->unset_userdata('customer_auth');
            #$this->session->sess_destroy();
        }
        redirect($this->agent->referrer());
    }

    public function signin() {
        $this->form_validation->set_rules('user', 'Username', 'trim|required|xss_clean|min_length[6]|max_length[30]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|max_length[20]|min_length[6]');
        if ($this->form_validation->run() == TRUE) {
            $adata = array(
                'email' => $this->input->post('user'),
                'password' => md5($this->input->post('password')),
                'active' => 1,
            );
            $admin = $this->home_model->login_query('tb_admin', $adata);
            if ($admin != FALSE) {
                $authdata = array('id' => $admin->id, 'user' => $admin->email, 'name' => $admin->name, 'role' => $admin->role);
                $this->session->set_userdata('adminauth', $authdata);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('errors', 'Invalid Username and or Password!');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        }
    }

    public function signout() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        #$this->session->unset_userdata('adminauth');
        $this->session->sess_destroy();
        redirect('admin');
    }

}
