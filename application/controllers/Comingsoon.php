<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {

    public function __construct() {
        parent::__construct();
        #$this->output->cache(43800);
    }

    public function index() {
        crypt::online_counter();
        $data['title'] = 'SALVIA | EMPORIUM';
        $data['date'] = '1st July 2020';
        $this->load->view('comingsoon/index', $data);
    }

}
