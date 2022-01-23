<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (!$this->session->userdata('adminauth')) {
            $this->output->cache(1440);
            $this->load->view('admin/login');
        } else {
            redirect('admin/dashboard');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Dashboard';
        $data['dascls'] = 'active';
        $data['products'] = $this->home_model->common_query('tb_products', array(), 'DESC', 6);
        $data['orders'] = $this->home_model->common_query('tb_ordersummary', array('status !=' => 'cancel'), 'DESC', 10);
        $data['admin'] = $this->home_model->degree_query('tb_admin', array('email' => $this->session->userdata('adminauth')['user']));
        $data['maptext'] = 'Category wise total orders';
        $data['maptexttwo'] = 'Month wise total orders';
        $data['grpvstr'] = $this->home_model->total_orders_group('tb_orders');
        $data['members'] = $this->home_model->total_rows('tb_customers', array());
        $data['ttlorders'] = $this->home_model->total_rows('tb_orders', array('cancle' => 0));
        $data['ttlproducts'] = $this->home_model->total_rows('tb_products', array('stock >=' => 1));
        $data['setting'] = crypt::settings($this->session->userdata('adminauth')['user']);
        $data['view'] = 'admin/dashboard';
        $this->load->view('admin/starter', $data);
        if ($data['setting']->refresh == 1 && $data['setting']->duration >= 60) {
            header('refresh:' . $data['setting']->duration);
        }
    }

    public function emessages() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Message';
        $data['cmntcls'] = array('main' => 'active', 'second' => 'active');
        $data['messages'] = $this->home_model->common_query('tb_contacts', array('hidden' => '0', 'website' => '0'), 'DESC', NULL);
        $data['view'] = 'admin/message';
        $this->load->view('admin/starter', $data);
    }

    public function messages() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Message';
        $data['offccls'] = array('main' => 'active', 'second' => 'active');
        $data['messages'] = $this->home_model->common_query('tb_contacts', array('hidden' => '0', 'website' => '1'), 'DESC', NULL);
        $data['view'] = 'admin/message';
        $this->load->view('admin/starter', $data);
    }

    public function comments() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Comments';
        $data['cmntcls'] = array('main' => 'active', 'first' => 'active');
        $data['messages'] = $this->home_model->common_query('tb_reviews', array(), 'DESC', NULL);
        $data['view'] = 'admin/comments';
        $this->load->view('admin/starter', $data);
    }

    public function visitors() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Visitors';
        $data['viscls'] = 'active';
        #Pagination Start
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url('admin/visitors');
        $config['total_rows'] = $this->db->count_all('tb_visitors');
        $config['per_page'] = 50;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination End
        $data['messages'] = $this->home_model->get_pagination('tb_visitors', $offset, $config['per_page'], 'DESC', array('country !=' => NULL));
        $data['view'] = 'admin/visitors';
        $this->load->view('admin/starter', $data);
    }

    public function users() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Users';
        $data['usercls'] = array('main' => 'active');
        #Pagination Start
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $config['base_url'] = base_url('admin/users');
        $config['total_rows'] = $this->db->count_all('tb_customers');
        $config['per_page'] = 50;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        #Pagination End
        $data['users'] = $this->home_model->get_pagination('tb_customers', $offset, $config['per_page'], 'DESC', array('seen' => 1));
        $data['view'] = 'admin/users';
        $this->load->view('admin/starter', $data);
    }

    public function moderators() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Moderators';
        $data['modcls'] = array('main' => 'active');
        $data['moderstors'] = $this->home_model->common_query('tb_admin', array('role' => 'mod'), 'DESC', NULL);
        $data['view'] = 'admin/admins';
        $this->load->view('admin/starter', $data);
    }

    public function projects() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Projects';
        $data['offccls'] = array('main' => 'active', 'first' => 'active');
        $data['projects'] = $this->home_model->common_query('tb_projects', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/projects';
        $this->load->view('admin/starter', $data);
    }

    public function categories() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Projects';
        $data['catgscls'] = array('main' => 'active', 'first' => 'active');
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/categories';
        $this->load->view('admin/starter', $data);
    }

    public function addproduct() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Product';
        $data['prodtcls'] = array('main' => 'active', 'first' => 'active');
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/add-product';
        $this->load->view('admin/starter', $data);
    }

    public function addslider() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Product';
        $data['prodtcls'] = array('main' => 'active', 'second' => 'active');
        $data['products'] = $this->home_model->common_query('tb_products', array('slider' => '1'), 'DESC', NULL);
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/add-slider';
        $this->load->view('admin/starter', $data);
    }

    public function addbanner() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Product';
        $data['prodtcls'] = array('main' => 'active', 'third' => 'active');
        $data['products'] = $this->home_model->common_query('tb_products', array('banner' => '1'), 'DESC', NULL);
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/add-banner';
        $this->load->view('admin/starter', $data);
    }

    public function addhotdeal() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Product';
        $data['prodtcls'] = array('main' => 'active', 'fifth' => 'active');
        $data['products'] = $this->home_model->common_query('tb_products', array('hotdeal' => '1'), 'DESC', NULL);
        $data['categories'] = $this->home_model->common_query('tb_category', array(), 'DESC', NULL);
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/add-hotdeal';
        $this->load->view('admin/starter', $data);
    }

    public function allproducts() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Products';
        $data['prodtcls'] = array('main' => 'active', 'forth' => 'active');
        $data['products'] = $this->home_model->common_query('tb_products', array(), 'DESC', NULL);
        $data['view'] = 'admin/products';
        $this->load->view('admin/starter', $data);
    }

    public function addteam() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Invoices';
        $data['catgscls'] = array('main' => 'active', 'second' => 'active');
        $data['staffs'] = $this->home_model->common_query('tb_team', array(), 'DESC', NULL);
        $data['view'] = 'admin/forms/add-team';
        $this->load->view('admin/starter', $data);
    }

    public function testimonials() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Testimonials';
        $data['othercls'] = array('main' => 'active', 'first' => 'active');
        $data['testimonials'] = $this->home_model->common_query('tb_testimonials', array(), 'DESC', 5);
        $data['view'] = 'admin/forms/testimonials';
        $this->load->view('admin/starter', $data);
    }

    public function orders() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Orders';
        $data['ordercls'] = array('main' => 'active', 'fourth' => 'active');
        $data['orders'] = $this->home_model->common_query('tb_ordersummary', array('status !=' => 'cancel'), 'DESC', NULL);
        $data['view'] = 'admin/orders';
        $this->load->view('admin/starter', $data);
    }

    public function torders() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Orders';
        $data['ordercls'] = array('main' => 'active', 'first' => 'active');
        $data['orders'] = $this->home_model->interval_query('tb_ordersummary', array('status !=' => 'cancel'), 1, 'DESC');
        $data['view'] = 'admin/orders';
        $this->load->view('admin/starter', $data);
    }

    public function worders() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Orders';
        $data['ordercls'] = array('main' => 'active', 'second' => 'active');
        $data['orders'] = $this->home_model->interval_query('tb_ordersummary', array('status !=' => 'cancel'), 7, 'DESC');
        $data['view'] = 'admin/orders';
        $this->load->view('admin/starter', $data);
    }

    public function morders() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Orders';
        $data['ordercls'] = array('main' => 'active', 'third' => 'active');
        $data['orders'] = $this->home_model->interval_query('tb_ordersummary', array('status !=' => 'cancel'), 30, 'DESC');
        $data['view'] = 'admin/orders';
        $this->load->view('admin/starter', $data);
    }

    public function porders() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Orders';
        $data['ordercls'] = array('main' => 'active', 'fifth' => 'active');
        $data['orders'] = $this->home_model->common_query('tb_ordersummary', array('status' => 'pending'), 'DESC', NULL);
        $data['view'] = 'admin/orders';
        $this->load->view('admin/starter', $data);
    }

    public function policies() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Policies';
        $data['catgscls'] = array('main' => 'active', 'third' => 'active');
        $data['policies'] = $this->home_model->degree_query('tb_policies', array('status' => 1));
        $data['view'] = 'admin/forms/policies';
        $this->load->view('admin/starter', $data);
    }

    public function calculation() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Finance';
        $data['invoccls'] = array('main' => 'active', 'first' => 'active');
        $data['products'] = $this->home_model->common_query('tb_products', array(), 'DESC', 10);
        $data['orders'] = $this->home_model->common_query('tb_ordersummary', array('payment_status' => 1, 'status !=' => 'pending'), 'DESC', 10);
        $data['productsum'] = $this->home_model->common_sum('tb_products');
        foreach ($this->home_model->common_sum('tb_products') as $profitloss) {
            $data['productsum'] = $profitloss->proamount;
            $data['inhouse'] = $profitloss->inhouse;
        }
        $data['ordersum'] = $this->home_model->common_single_sum('tb_ordersummary', 'total_amount', array('payment_status' => 1));
        $data['pendordersum'] = $this->home_model->common_single_sum('tb_ordersummary', 'total_amount', array('payment_status' => 0));
        $data['view'] = 'admin/calculation';
        $this->load->view('admin/starter', $data);
    }

    public function about() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | About';
        $data['catgscls'] = array('main' => 'active', 'fourth' => 'active');
        $data['other'] = $this->home_model->degree_query('tb_others', array('name' => 'About'));
        $data['view'] = 'admin/forms/edit-about';
        $this->load->view('admin/starter', $data);
    }

    public function contactus() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Contact';
        $data['catgscls'] = array('main' => 'active', 'fifth' => 'active');
        $data['other'] = $this->home_model->degree_query('tb_others', array('name' => 'Contact'));
        $data['view'] = 'admin/forms/edit-contact-us';
        $this->load->view('admin/starter', $data);
    }

    public function faqs() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | FAQs';
        $data['catgscls'] = array('main' => 'active', 'sixth' => 'active');
        $data['faqs'] = $this->home_model->common_query('tb_faqs', array(), 'ASC', NULL);
        $data['view'] = 'admin/faqs';
        $this->load->view('admin/starter', $data);
    }

    public function addfaq() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | FAQs';
        $data['catgscls'] = array('main' => 'active', 'sixth' => 'active');
        $data['view'] = 'admin/forms/add-faqs';
        $this->load->view('admin/starter', $data);
    }

    public function deletecache() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->output->delete_cache('home');
        $this->output->delete_cache('ecommerce');
        $this->output->delete_cache('admin/index');
        $this->output->delete_cache('comingsoon');
        redirect($this->agent->referrer());
    }

    public function seemail() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['title'] = 'Admin | Email';
        $data['emailcls'] = array('main' => 'active', 'first' => 'active');
        $data['view'] = 'admin/forms/email';
        $this->load->view('admin/starter', $data);
    }

}
