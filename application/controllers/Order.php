<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
    }

    public function orderupdate() {
        if ($this->home_model->common_update('tb_ordersummary', array('status' => $this->input->post('status')), array('id' => $this->input->post('id'))) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function paytypsttsupdt() {
        if ($this->home_model->common_update('tb_ordersummary', array('payment_status' => $this->input->post('payment_status')), array('id' => $this->input->post('id'))) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function invoices($orid) {
        if ($orid == NULL) {
            redirect($this->agent->referrer());
        }
        $data['title'] = 'Admin | Invoices';
        #$data['invoccls'] = array('main' => 'active', 'first' => 'active');
        $data['invoices'] = $this->home_model->invoice_query('tb_orders', $orid);
        $data['customer'] = $this->home_model->invocusto_query('tb_ordersummary', $orid);
        $data['view'] = 'admin/invoice';
        $this->load->view('admin/starter', $data);
    }

    public function printinvoice($orid) {
        if ($orid == NULL) {
            redirect($this->agent->referrer());
        }
        $data['title'] = 'Admin | Invoices';
        $data['invoices'] = $this->home_model->invoice_query('tb_orders', $orid);
        $data['customer'] = $this->home_model->invocusto_query('tb_ordersummary', $orid);
        $this->load->view('admin/invoice-print', $data);
    }

    public function ordnotification() {
        $table = $this->input->post('table');
        $whrfst = $this->input->post('whrfst');
        $whrlst = $this->input->post('whrlst');
        $data['orders'] = $this->home_model->common_query($table, array($whrfst => $whrlst), 'DESC', NULL);
        $this->load->view('admin/modal/nav-order', $data);
    }

    public function detail($orid) {
        if ($orid == NULL) {
            redirect($this->agent->referrer());
        }
        echo $orid;
    }

    public function orderbymod() {
        $data['invoices'] = $this->home_model->invoice_query('tb_orders', $this->input->post('orid'));
        $data['customer'] = $this->home_model->invocusto_query('tb_ordersummary', $this->input->post('orid'));
        $this->load->view('admin/modal/order-modal', $data);
    }

}
