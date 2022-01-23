<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emails extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function message() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['message'] = $this->input->post('message');
        $data['title'] = $this->input->post('subject');
        $data['body'] = $this->input->post('body');
        $indata = array(
            'title' => $this->input->post('subject'),
            'group' => $this->input->post('table'),
            'message' => $this->input->post('message'),
            'mod' => $this->session->userdata('adminauth')['name'],
            'time' => time()
        );
        if ($data['message'] != '' && $data['title'] != '') {
            $subscribers = $this->home_model->common_query($this->input->post('table'), array(), 'ASC', NULL);
            $config['smtp_host'] = 'salviaemporium.com';
            $config['smtp_user'] = 'noreply@salviaemporium.com';
            $config['smtp_pass'] = 'pB4&R]bbRd7w';
            $this->email->initialize($config);
            foreach ($subscribers as $subscriber) {
                $this->email->clear();
                $message = $this->load->view('ecommerce/email/message', $data, TRUE);
                $this->email->to($subscriber->email);
                $this->email->from('noreply@salviaemporium.com', 'Salvia Emporium');
                $this->email->subject($this->input->post('subject'));
                $this->email->message($message);
                $this->email->send();
            }
            $this->home_model->common_insert('tb_emails', $indata);
        }
        redirect($this->agent->referrer());
    }

    public function reset() {
        $number = sha1(uniqid());
        $data['link'] = base_url('customer/cupasswordrecovery/' . $number . '.html');
        $data['about'] = base_url('ecommerce/about.html');
        $data['name'] = 'Murshid Alam';
        $data['bgimage'] = base_url('assets/images/password.png');
        $this->load->view('ecommerce/email/reset-password', $data);
    }

    public function confirm() {
        $number = sha1(uniqid());
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

    public function msg() {
        $data['subscribers'] = $this->home_model->common_query('tb_subscribers', array(), 'ASC', NULL);
        $data['message'] = "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>";
        $data['body'] = 'Body';
        $this->load->view('ecommerce/email/message', $data);
    }

}
