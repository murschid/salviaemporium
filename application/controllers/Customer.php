<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function wishlist() {
        if ($this->input->post('product_id') != NULL) {
            $wishdata = array(
                'user_id' => $this->session->userdata('customer_auth')['id'],
                'product_id' => $this->input->post('product_id'),
                'size' => $this->input->post('size'),
                'color' => $this->input->post('color'),
            );
            if ($this->home_model->addwishlist('tb_wishlist', $wishdata) == TRUE) {
                $this->session->set_flashdata('toast', 'Added to List Successfully');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Product Already Exist');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function mywishlist() {
        if (!$this->session->userdata('customer_auth')) {
            $this->session->set_flashdata('toast', 'Login Account First');
            $this->session->set_flashdata('toastclr', '#e74c3c');
            redirect('auth/logregis');
        }
        $data['title'] = 'Salvia | Emporium';
        $data['shopcls'] = 'active';
        $data['products'] = $this->home_model->wishlist_query('tb_products', array('user_id' => $this->session->userdata('customer_auth')['id']), NULL);
        $data['view'] = 'ecommerce/wishlist';
        $this->load->view('ecommerce/index', $data);
    }

    public function removewish($wid) {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        if ($wid != NULL) {
            $this->home_model->common_delete('tb_wishlist', array('id' => $wid));
        }
        redirect($this->agent->referrer());
    }

    public function myaccount() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $data['title'] = 'Salvia | Emporium';
        $data['myacccls'] = 'active';
        $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
        $data['view'] = 'ecommerce/customer-panel-two';
        $data['muaccount'] = 'ecommerce/myaccount/account';
        $this->load->view('ecommerce/index', $data);
    }

    public function editaccount() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $data['title'] = 'Salvia | Emporium';
        $data['edacccls'] = 'active';
        $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
        $data['view'] = 'ecommerce/customer-panel-two';
        $data['muaccount'] = 'ecommerce/myaccount/edit-profile';
        $this->load->view('ecommerce/index', $data);
    }

    public function forgotpassword() {
        if (!$this->session->userdata('customer_auth')) {
            $data['title'] = 'Salvia | Emporium';
            $data['view'] = 'ecommerce/myaccount/forgot-password';
            $this->load->view('ecommerce/index', $data);
        } else {
            $this->session->set_flashdata('toast', 'You are logged in');
            $this->session->set_flashdata('toastclr', '#27ae60');
            redirect('auth/logregis');
        }
    }

    public function editpassword() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $data['title'] = 'Salvia | Emporium';
        $data['edpasscls'] = 'active';
        $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
        $data['view'] = 'ecommerce/customer-panel-two';
        $data['muaccount'] = 'ecommerce/myaccount/edit-password';
        $this->load->view('ecommerce/index', $data);
    }

    public function myorders() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $data['title'] = 'Salvia | Emporium';
        $data['myordcls'] = 'active';
        $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
        $data['products'] = $this->home_model->orders_query('tb_orders', $this->session->userdata('customer_auth')['cus_user']);
        $data['view'] = 'ecommerce/customer-panel-two';
        $data['muaccount'] = 'ecommerce/myaccount/orders';
        $this->load->view('ecommerce/index', $data);
    }

    public function checkout() {
        if (count($this->cart->contents()) >= 0) {
            $data['title'] = 'Salvia | Emporium';
            $data['shopcls'] = 'active';
            $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
            $data['view'] = 'ecommerce/checkout';
            $this->load->view('ecommerce/index', $data);
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function tracking() {
        $data['title'] = 'Salvia | Emporium';
        $data['shopcls'] = 'active';
        $data['products'] = $this->home_model->common_query('tb_products', array('stock' => 1, 'publish' => 1), 'DESC', NULL);
        $data['view'] = 'ecommerce/order-tracking';
        $this->load->view('ecommerce/index', $data);
    }

    public function editcusprofile() {
        $this->form_validation->set_rules('cus_name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('cus_mobile', 'Mobile', 'trim|required|xss_clean|min_length[11]|max_length[14]|numeric');
        $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|xss_clean|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('cus_city', 'City', 'trim|required|xss_clean|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('cus_zip', 'ZIP Code', 'trim|xss_clean|min_length[4]|max_length[10]|numeric');
        $this->form_validation->set_rules('cus_country', 'Country', 'trim|xss_clean|min_length[4]|max_length[30]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('cus_name'),
                'mobile' => $this->input->post('cus_mobile'),
                'address' => $this->input->post('cus_address'),
                'city' => $this->input->post('cus_city'),
                'zip' => $this->input->post('cus_zip'),
                'ip' => $this->input->ip_address()
            );
            if ($this->home_model->common_update('tb_customers', $data, array('id' => $this->input->post('cust_id'))) != 0) {
                $this->session->set_flashdata('success', 'Profile update successful');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function subscribe() {
        $this->form_validation->set_rules('subscribe', 'Email', 'trim|required|xss_clean|min_length[6]|valid_email|max_length[30]|is_unique[tb_subscribers.email]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'email' => $this->input->post('subscribe'),
                'token' => sha1(uniqid()),
                'ip' => $this->input->ip_address(),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_subscribers', $data) == TRUE) {
                $this->session->set_flashdata('toast', 'Subscription Successful');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Something went wrong!');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', validation_errors());
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

    public function reviews() {
        $this->form_validation->set_rules('rename', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('reemail', 'Email', 'trim|required|xss_clean|min_length[9]|max_length[40]|valid_email');
        $this->form_validation->set_rules('retext', 'Comment', 'trim|required|xss_clean|min_length[3]|max_length[500]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('rename'),
                'email' => $this->input->post('reemail'),
                'comment' => $this->input->post('retext'),
                'rating' => $this->input->post('rating'),
                'product_id' => $this->input->post('prodid'),
                'ip' => $this->input->ip_address(),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_reviews', $data) == TRUE) {
                $this->session->set_flashdata('toast', 'Review Successful');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Something went wrong!');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', validation_errors());
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

    public function changepass() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $this->form_validation->set_rules('choldpass', 'Old Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('chnewpass', 'New Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('chnewpasstw', 'Confirm New Password', 'trim|required|xss_clean|min_length[6]|max_length[20]|matches[chnewpass]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'password' => md5($this->input->post('chnewpass')),
                'time' => time()
            );
            $whrdata = array(
                'id' => $this->input->post('cust_id'),
                'email' => $this->input->post('cust_email'),
                'password' => md5($this->input->post('choldpass'))
            );
            if ($this->home_model->common_update('tb_customers', $data, $whrdata) != 0) {
                $this->session->set_flashdata('success', 'Password changing successful');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function passwordrecovery() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|min_length[9]|max_length[40]|valid_email');
        if ($this->form_validation->run() == TRUE) {
            $customer = $this->home_model->login_query('tb_customers', array('email' => $this->input->post('email')));
            if ($customer != FALSE) {
                #Email Start
                $number = sha1(uniqid());
                $data['link'] = base_url('customer/cupasswordrecovery/' . $number . '.html');
                $data['about'] = base_url('ecommerce/about.html');
                $data['bgimage'] = base_url('assets/images/password.png');
                $config['smtp_host'] = 'salviaemporium.com';
                $config['smtp_user'] = 'noreply@salviaemporium.com';
                $config['smtp_pass'] = 'pB4&R]bbRd7w';
                $this->email->initialize($config);
                $message = $this->load->view('ecommerce/email/forgot-password', $data, TRUE);
                $this->email->from('noreply@salviaemporium.com', 'Salvia Emporium');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Reset Password - SalviaEmporium');
                $this->email->message($message);
                if ($this->email->send()) {
                    $this->home_model->common_update('tb_customers', array('change_token' => $number), array('email' => $this->input->post('email')));
                    $this->session->set_flashdata('success', 'Please check your email for password reset link');
                } else {
                    $this->session->set_flashdata('errors', 'Error! Please try again');
                }
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('errors', 'This email is not registered!');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        }
    }

    public function cupasswordrecovery($token) {
        if ($this->home_model->login_query('tb_customers', array('change_token' => $token)) != FALSE) {
            $data['title'] = 'Salvia | Emporium';
            $data['view'] = 'ecommerce/myaccount/forgot-password-second';
            $this->load->view('ecommerce/index', $data);
        } else {
            redirect('404');
        }
    }

    public function activatecustomeracc($token) {
        if ($this->home_model->common_update('tb_customers', array('active' => 1), array('token' => $token)) != 0) {
            $data['title'] = 'Salvia | Emporium';
            $data['view'] = 'ecommerce/myaccount/success';
            $this->load->view('ecommerce/index', $data);
        } else {
            redirect('404');
        }
    }

    public function passwordrecoveryform() {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required|xss_clean|min_length[6]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'password' => md5($this->input->post('password')),
                'time' => time()
            );
            if ($this->home_model->common_update('tb_customers', $data, array('email' => $this->input->post('hisemail'))) != 0) {
                $this->session->set_flashdata('success', 'Changed Password Successfully');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('errors', validation_errors());
            redirect($this->agent->referrer());
        }
    }

    public function prophotoupdate() {
        if (!$this->session->userdata('customer_auth')) {
            redirect('auth/logregis');
        }
        $data = array(
            'photo' => crypt::single_image('customers', 'cusproimg'),
            'time' => time(),
        );
        if ($data['photo'] != NULL) {
            if ($this->home_model->common_update('tb_customers', $data, array('id' => $this->input->post('customerid'))) != 0) {
                $this->session->set_flashdata('toast', 'Uploaded Successfully');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Something Went Wrong!');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', 'No Photo Selected');
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

}
