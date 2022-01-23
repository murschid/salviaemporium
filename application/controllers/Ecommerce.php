<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
        crypt::online_counter();
    }

    public function index() {
        $this->session->set_flashdata('preloader', 'Done');
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['products'] = $this->home_model->common_query('tb_products', array('publish' => 1), 'DESC', 40);
        $data['sales'] = $this->home_model->common_query('tb_products', array('publish' => 1), 'ASC', 5);
        $data['hotdeals'] = $this->home_model->common_query('tb_products', array('publish' => 1, 'hotdeal' => '1'), 'DESC', 1);
        $data['wishlists'] = $this->home_model->wishlist_query('tb_products', array('user_id' => $this->session->userdata('customer_auth')['id']), NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'ASC', NULL);
        $this->load->view('ecommerce/home', $data);
    }

    public function category($cat) {
        if ($cat == NULL) {
            redirect($this->agent->referrer());
        }
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['products'] = $this->home_model->common_query('tb_products', array('publish' => 1, 'category' => $cat), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'ASC', NULL);
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'ASC', NULL);
        $data['view'] = 'ecommerce/products-list';
        $this->load->view('ecommerce/index', $data);
    }

    public function brand($id) {
        if ($id == NULL) {
            redirect($this->agent->referrer());
        }
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['products'] = $this->home_model->common_query('tb_products', array('publish' => 1, 'brand' => $id), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'ASC', NULL);
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'ASC', NULL);
        $data['view'] = 'ecommerce/products-list';
        $this->load->view('ecommerce/index', $data);
    }

    public function about() {
        $data['title'] = 'SalviaEmporium | About';
        $data['shopcls'] = 'active';
        $data['other'] = $this->home_model->degree_query('tb_others', array('name' => 'About'));
        $data['staffs'] = $this->home_model->common_query('tb_team', array('active' => 1, 'type' => 1), 'ASC', 4);
        $data['view'] = 'ecommerce/about-us';
        $this->load->view('ecommerce/index', $data);
    }

    public function contact() {
        $data['title'] = 'SalviaEmporium | Contact';
        $data['shopcls'] = 'active';
        $data['other'] = $this->home_model->degree_query('tb_others', array('name' => 'Contact'));
        $data['view'] = 'ecommerce/contact-us';
        $this->load->view('ecommerce/index', $data);
    }

    public function faq() {
        $data['title'] = 'SalviaEmporium | FAQ';
        $data['shopcls'] = 'active';
        $data['shippings'] = $this->home_model->common_query('tb_faqs', array('name' => 1, 'publish' => 1), 'ASC', NULL);
        $data['payments'] = $this->home_model->common_query('tb_faqs', array('name' => 2, 'publish' => 1), 'ASC', NULL);
        $data['orders'] = $this->home_model->common_query('tb_faqs', array('name' => 3, 'publish' => 1), 'ASC', NULL);
        $data['view'] = 'ecommerce/faq';
        $this->load->view('ecommerce/index', $data);
    }

    public function brands() {
        $data['title'] = 'SalviaEmporium | Brands';
        $data['brndcls'] = 'active';
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'ASC', 12);
        $data['view'] = 'ecommerce/brands-list';
        $this->load->view('ecommerce/index', $data);
    }

    public function testimonial() {
        $data['title'] = 'SalviaEmporium | Testimonial';
        $data['brndcls'] = 'active';
        $data['testimonials'] = $this->home_model->common_query('tb_testimonials', array('publish' => 1), 'DESC', 5);
        $data['view'] = 'ecommerce/testimonial';
        $this->load->view('ecommerce/index', $data);
    }

    public function detail($id) {
        if ($id == NULL) {
            redirect(404);
        }
        $data['shopcls'] = 'active';
        $data['sproduct'] = $this->cart_model->single_product('tb_products', array('tb_products.id' => $id));
        $data['products'] = $this->home_model->common_query('tb_products', array('publish' => 1, 'category' => $data['sproduct']->category), 'DESC', 12);
        $data['reviews'] = $this->home_model->common_query('tb_reviews', array('product_id' => $id, 'publish' => 1), 'ASC', 10);
        $data['title'] = lang('salvia').' - '. $data['sproduct']->name;
        $data['description'] = $data['sproduct']->short_desc;
        if ($data['sproduct'] != NULL) {
            $data['view'] = 'ecommerce/product-detail';
            $this->load->view('ecommerce/index', $data);
        } else {
            redirect(404);
        }
    }

    public function privacy() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['privacy'] = $this->home_model->degree_query('tb_policies', array('name' => 'privacy', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/privacy-policy';
        $this->load->view('ecommerce/index', $data);
    }

    public function terms() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['privacy'] = $this->home_model->degree_query('tb_policies', array('name' => 'terms', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/terms-condition';
        $this->load->view('ecommerce/index', $data);
    }

    public function returns() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['privacy'] = $this->home_model->degree_query('tb_policies', array('name' => 'return', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/return-policy';
        $this->load->view('ecommerce/index', $data);
    }

    public function warranty() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['privacy'] = $this->home_model->degree_query('tb_policies', array('name' => 'warranty', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/warranty-policy';
        $this->load->view('ecommerce/index', $data);
    }

    public function shipping() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['privacy'] = $this->home_model->degree_query('tb_policies', array('name' => 'shipping', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/shipping-policy';
        $this->load->view('ecommerce/index', $data);
    }

    public function howorder() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'How To Order';
        $data['howorder'] = $this->home_model->degree_query('tb_policies', array('name' => 'howorder', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/how-order';
        $this->load->view('ecommerce/index', $data);
    }

    public function measuring() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $data['subtitle'] = 'Measuring Advice';
        $data['howorder'] = $this->home_model->degree_query('tb_policies', array('name' => 'measuring', 'visibility' => 1));
        $data['view'] = 'ecommerce/policies/how-order';
        $this->load->view('ecommerce/index', $data);
    }

    public function search() {
        $data['title'] = lang('salvia');
        $data['shopcls'] = 'active';
        $this->form_validation->set_rules('searching', 'Searched Item', 'trim|required|min_length[3]|max_length[50]|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $sdata = array('name' => $this->input->post('searching'));
            $data['products'] = $this->home_model->common_search('tb_products', $sdata);
            if ($data['products'] != NULL) {
                $data['view'] = 'ecommerce/searched-products';
                $this->load->view('ecommerce/index', $data);
            }
        }
        $data['error'] = validation_errors();
        $data['view'] = 'ecommerce/empty-search';
        $this->load->view('ecommerce/index', $data);
    }

    public function ctable() {
        $this->load->dbforge();
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'session' => array('type' => 'VARCHAR', 'constraint' => 64),
            'time' => array('type' => 'VARCHAR', 'constraint' => 20)
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tb_online', TRUE);
    }

}
