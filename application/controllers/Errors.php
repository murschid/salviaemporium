<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function index() {
        $data['title'] = '404 | Error';
        $this->load->view('errors/html/error-404', $data);
    }

    public function testid() {
        return 'mynameismurshidandiamnotaterrorist';
    }

}
