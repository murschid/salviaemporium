<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emails extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function reset() {
        $number = sha1(time());
        $data['link'] = base_url('customer/cupasswordrecovery/' . $number . '.html');
        $data['about'] = base_url('ecommerce/about.html');
        $data['name'] = 'Murshid Alam';
        $data['bgimage'] = base_url('assets/images/password.png');
        $this->load->view('ecommerce/email/reset-password', $data);
    }

    public function confirm() {
        $number = sha1(time());
        $data['link'] = base_url('customer/activatecustomeracc/' . $number . '.html');
        $data['about'] = base_url('ecommerce/about.html');
        $data['password'] = crypt::randompass();
        $data['name'] = 'Murshid Alam';
        $data['bgimage'] = base_url('assets/images/password.png');
        $this->load->view('ecommerce/email/confirm-email', $data);
    }

    public function order() {
        $data = array(
            'status' => 'Paid',
            'tran_date' => date('d-m-Y'),
            'tran_id' => '999000888',
            'amount' => '50.00',
            'card_type' => 'Credit card',
            'product_info' => $this->home_model->invoice_query('tb_orders', 1),
            'usr_addr' => $this->home_model->degree_query('tb_customers', array('email' => 'rajcsediu@gmail.com'))
        );
        $this->load->view('ecommerce/email/confirm-order', $data);
    }

    public function message() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['name'] = 'Customer';
        $data['emailcls'] = array('main' => 'active', 'first' => 'active');
        $data['subscribers'] = $this->home_model->common_query('tb_subscribers', array(), 'ASC', NULL);
        foreach ($data['subscribers'] as $subscriber) {
            $config['smtp_host'] = 'salviaemporium.com';
            $config['smtp_user'] = 'noreply@salviaemporium.com';
            $config['smtp_pass'] = 'pB4&R]bbRd7w';
            $this->email->initialize($config);
            $message = $this->load->view('ecommerce/email/message', $data, TRUE);
            $this->email->from('noreply@salviaemporium.com', 'Salvia Emporium');
            $this->email->to($subscriber->email);
            $this->email->subject('Announcement - SalviaEmporium');
            $this->email->message($message);
            if ($this->email->send()) {
                echo 'Sent ';
            }
        }
    }

    public function msg() {
        $data['subscribers'] = $this->home_model->common_query('tb_subscribers', array(), 'ASC', NULL);
        foreach ($data['subscribers'] as $subsc) {
            echo $subsc->email.'<br>';
        }
        //$data['name'] = 'Customer';
        //$this->load->view('ecommerce/email/message', $data);
    }

}
