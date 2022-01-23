<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function index() {
        $data['title'] = 'Sobujpata Group | Home';
        $data['homecls'] = 'active';
        $data['projects'] = $this->home_model->common_query('tb_projects', array('publish' => 1), 'DESC', 4);
        $data['view'] = 'external/index';
        $this->load->view('external/container', $data);
        crypt::online_counter();
        if (!in_array($_SERVER['HTTP_HOST'], array('127.0.0.1', 'localhost'))) {
            $this->user_info();
        }
    }

    public function about() {
        $data['title'] = 'Sobujpata Group | About';
        $data['aboutcls'] = 'active';
        $data['view'] = 'external/about';
        $this->load->view('external/container', $data);
    }

    public function services() {
        $data['title'] = 'Sobujpata Group | Service';
        $data['servicecls'] = 'active';
        $data['view'] = 'external/services';
        $this->load->view('external/container', $data);
    }

    public function projects() {
        $data['title'] = 'Sobujpata Group | Projects';
        $data['portfcls'] = 'active';
        $data['projects'] = $this->home_model->common_query('tb_projects', array('publish' => '1'), 'DESC', 15);
        $data['view'] = 'external/portfolio';
        $this->load->view('external/container', $data);
    }

    public function project_detail($id) {
        $data['title'] = 'Sobujpata Group | Project';
        $data['portfcls'] = 'active';
        $data['project'] = $this->home_model->degree_query('tb_projects', array('id' => $id));
        $data['view'] = 'external/project-detail';
        $this->load->view('external/container', $data);
    }

    public function contact() {
        $data['title'] = 'Sobujpata Group | Contact';
        $data['contactcls'] = 'active';
        $data['view'] = 'external/contact';
        $this->load->view('external/container', $data);
    }

    protected function user_info() {
        #$ip = '115.127.83.2';
        $ip = $this->input->ip_address();
        $key = '286489efb38854f5235462e4e4249ed8';
        $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $api_result = json_decode($json, true);
        $data = array(
            'ip' => $ip,
            'country' => $api_result['country_name'],
            'region' => $api_result['region_name'],
            'city' => $api_result['city'],
            'agent' => $this->agent->agent_string(),
            'time' => time()
        );
        $this->home_model->visitors('tb_visitors', $data);
    }

    protected function online_counter() {
        $session = $this->session->session_id;
        $data = array(
            'session' => $session,
            'time' => time()
        );
        $this->home_model->online_counter('tb_online', $data);
    }

    public function contact_save() {
        $this->form_validation->set_rules('fname', 'Name', 'trim|required|min_length[3]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[9]|max_length[100]|valid_email|xss_clean');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[11]|max_length[14]|xss_clean|numeric');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[3]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[10]|max_length[1000]|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('fname'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'ip' => $this->input->ip_address(),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_contacts', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Sending Successful');
            } else {
                $this->session->set_flashdata('errors', 'Senging Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

}
