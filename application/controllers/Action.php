<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function contactdatasave() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[30]|valid_email|xss_clean');
        $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|max_length[14]|min_length[11]|xss_clean|numeric');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[100]|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[900]|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'website' => '0',
                'ip' => $this->input->ip_address(),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_contacts', $data) == TRUE) {
                $this->session->set_flashdata('toast', 'Message Successful');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Message Unsuccessful');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', validation_errors());
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

    public function delete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_contacts', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function moddelete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        if ($this->session->userdata('adminauth')['role'] == 'admin') {
            $this->home_model->common_delete('tb_admin', array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function modactive($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        if ($this->session->userdata('adminauth')['role'] == 'admin') {
            $this->home_model->common_update('tb_admin', array('active' => 1), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function modinactive($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        if ($this->session->userdata('adminauth')['role'] == 'admin') {
            $this->home_model->common_update('tb_admin', array('active' => 0), array('id' => $id));
        }
        redirect($this->agent->referrer());
    }

    public function userdelete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_customers', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function testidelete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_testimonials', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function faqdelete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_faqs', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function revdlte($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_reviews', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function prodlte($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_projects', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function proddlte($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_products', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function teamdlte($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_team', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function vdelete($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_delete('tb_visitors', array('id' => $id));
        redirect($this->agent->referrer());
    }

    public function view($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['message'] = $this->home_model->common_view('tb_contacts', array('id' => $id), 'DESC');
        $this->home_model->common_update('tb_contacts', array('seen' => 1), array('id' => $id));
        $data['title'] = 'Admin | Message';
        if ($data['message']->website == 0) {
            $data['cmntcls'] = array('main' => 'active', 'second' => 'active');
        } else {
            $data['msgcls'] = 'active';
        }
        $data['view'] = 'admin/single-message';
        $this->load->view('admin/starter', $data);
    }

    public function faqedit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['faq'] = $this->home_model->degree_query('tb_faqs', array('id' => $id));
        $data['title'] = 'Admin | FAQ';
        $data['catgscls'] = array('main' => 'active', 'sixth' => 'active');
        $data['view'] = 'admin/forms/edit-faq';
        $this->load->view('admin/starter', $data);
    }

    public function useredit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['user'] = $this->home_model->degree_query('tb_customers', array('id' => $id));
        $data['title'] = 'Admin | User';
        $data['usercls'] = array('main' => 'active', 'first' => 'active');
        $data['view'] = 'admin/forms/edit-user';
        $this->load->view('admin/starter', $data);
    }

    public function proedit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['project'] = $this->home_model->common_view('tb_projects', array('id' => $id), 'DESC');
        $data['title'] = 'Admin | Project';
        $data['prjctcls'] = 'active';
        $data['view'] = 'admin/forms/edit-project';
        $this->load->view('admin/starter', $data);
    }

    public function prodedit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['product'] = $this->home_model->common_view('tb_products', array('id' => $id), 'DESC');
        $data['brands'] = $this->home_model->common_query('tb_brands', array(), 'DESC', NULL);
        $data['title'] = 'Admin | Project';
        $data['prodtcls'] = array('main' => 'active', 'first' => 'active');
        $data['view'] = 'admin/forms/edit-product';
        $this->load->view('admin/starter', $data);
    }

    public function teamedit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['staff'] = $this->home_model->common_view('tb_team', array('id' => $id), 'DESC');
        $data['title'] = 'Admin | Team';
        $data['catgscls'] = array('main' => 'active', 'second' => 'active');
        $data['view'] = 'admin/forms/edit-team';
        $this->load->view('admin/starter', $data);
    }

    public function revedit($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['review'] = $this->home_model->common_view('tb_reviews', array('id' => $id), 'DESC');
        $data['title'] = 'Admin | Review';
        $data['cmntcls'] = array('main' => 'active', 'first' => 'active');
        $data['view'] = 'admin/forms/edit-comment';
        $this->load->view('admin/starter', $data);
    }

    public function viview($id) {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $data['message'] = $this->home_model->common_view('tb_visitors', array('id' => $id), 'DESC');
        $data['title'] = 'Admin | Visitors';
        $data['viscls'] = 'active';
        $data['view'] = 'admin/single-visitor';
        $this->load->view('admin/starter', $data);
    }

    public function project_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('s_description', 'Short Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('engineer', 'Engineer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('result', 'Result', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'title' => $this->input->post('title'),
                's_description' => $this->input->post('s_description'),
                'name' => $this->input->post('name'),
                'year' => $this->input->post('year'),
                'status' => $this->input->post('status'),
                'location' => $this->input->post('location'),
                'engineer' => $this->input->post('engineer'),
                'description' => $this->input->post('description'),
                'result' => $this->input->post('result'),
                'category' => $this->input->post('category'),
                'images' => $this->images_upload('projects', 'userfile'),
                'publish' => $this->input->post('publish'),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_projects', $prodata)) {
                $this->session->set_flashdata('success', 'You have inserted your project dada successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Project entry Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect('admin/projects');
    }

    public function project_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('s_description', 'Short Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('year', 'Year', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('engineer', 'Engineer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('result', 'Result', 'trim|required|xss_clean');
        $proid = $this->input->post('imgid');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'title' => $this->input->post('title'),
                's_description' => $this->input->post('s_description'),
                'name' => $this->input->post('name'),
                'year' => $this->input->post('year'),
                'status' => $this->input->post('status'),
                'location' => $this->input->post('location'),
                'engineer' => $this->input->post('engineer'),
                'description' => $this->input->post('description'),
                'result' => $this->input->post('result'),
                'category' => $this->input->post('category'),
                'publish' => $this->input->post('publish'),
                'time' => time()
            );
            if ($this->home_model->common_update('tb_projects', $prodata, array('id' => $proid)) != 0) {
                $this->session->set_flashdata('success', 'You have updated your project dada successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function category_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'category' => $this->input->post('category'),
                'operator' => $this->session->userdata('adminauth')['name'],
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_category', $prodata) == TRUE) {
                $this->session->set_flashdata('success', 'You have inserted successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Entry Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect('admin/categories');
    }

    public function brand_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'brand' => $this->input->post('category'),
                'operator' => $this->session->userdata('adminauth')['name'],
                'image' => crypt::single_image('brands', 'brand'),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_brands', $prodata)) {
                $this->session->set_flashdata('success', 'You have inserted successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Entry Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect('admin/categories');
    }

    public function comment_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
        $proid = $this->input->post('commentid');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'comment' => $this->input->post('comment'),
                'publish' => $this->input->post('approval'),
                'rating' => $this->input->post('rating'),
                'seen' => '1'
            );
            if ($this->home_model->common_update('tb_reviews', $prodata, array('id' => $proid)) != 0) {
                $this->session->set_flashdata('success', 'You have updated successfully');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function product_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('prod_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prod_buyprice', 'Buying Price', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('prod_price', 'Price', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('prod_category', 'Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prod_color', 'Color', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_size', 'Size', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_unite', 'Unite', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_coupon', 'Coupon', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_short_desc', 'Short Description', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_desc', 'Description', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_spec', 'Specification', 'trim|xss_clean|required');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'name' => $this->input->post('prod_name'),
                'buying_price' => $this->input->post('prod_buyprice'),
                'price' => $this->input->post('prod_price'),
                'pre_price' => $this->input->post('prod_preprice'),
                'total_product' => $this->input->post('prod_quantity'),
                'stock' => $this->input->post('prod_avail'),
                'category' => $this->input->post('prod_category'),
                'color' => $this->input->post('prod_color'),
                'size' => $this->input->post('prod_size'),
                'unite' => $this->input->post('prod_unite'),
                'brand' => $this->input->post('brand'),
                'coupon' => $this->input->post('prod_coupon'),
                'sku' => $this->input->post('prod_sku'),
                'short_desc' => $this->input->post('prod_short_desc'),
                'description' => $this->input->post('prod_desc'),
                'specification' => $this->input->post('prod_spec'),
                'hotdeal_date' => $this->input->post('hotdealdate'),
                'slider' => $this->input->post('slideryn'),
                'banner' => $this->input->post('banneryn'),
                'hotdeal' => $this->input->post('hotdealyn'),
                #Images Start
                'thumbnail' => crypt::single_image('thumbnails', 'thumbnail'),
                'slide_img' => crypt::single_image('sliders', 'slider'),
                'banner_img' => crypt::single_image('banners', 'banner'),
                'hotdeal_img' => crypt::single_image('banners', 'hotdeal'),
                'images' => crypt::multi_images('products', 'userfile'),
                #Images End
                'publish' => $this->input->post('prod_publish'),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_products', $prodata) == TRUE) {
                $this->session->set_flashdata('success', 'You have inserted product successfully');
            } else {
                $this->session->set_flashdata('errors', 'Product entry Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function product_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('prod_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prod_price', 'Price', 'trim|required|xss_clean|numeric');
        $this->form_validation->set_rules('prod_category', 'Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prod_color', 'Color', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_size', 'Size', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_unite', 'Unite', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_coupon', 'Coupon', 'trim|xss_clean');
        $this->form_validation->set_rules('prod_short_desc', 'Short Description', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_desc', 'Description', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_spec', 'Specification', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_avail', 'Stock', 'trim|xss_clean|required');
        $this->form_validation->set_rules('prod_publish', 'Publish', 'trim|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'name' => $this->input->post('prod_name'),
                'price' => $this->input->post('prod_price'),
                'pre_price' => $this->input->post('prod_preprice'),
                'category' => $this->input->post('prod_category'),
                'stock' => $this->input->post('prod_avail'),
                'total_product' => $this->input->post('prod_quantity'),
                'sku' => $this->input->post('prod_sku'),
                'brand' => $this->input->post('brand'),
                'color' => $this->input->post('prod_color'),
                'size' => $this->input->post('prod_size'),
                'unite' => $this->input->post('prod_unite'),
                'coupon' => $this->input->post('prod_coupon'),
                'short_desc' => $this->input->post('prod_short_desc'),
                'description' => $this->input->post('prod_desc'),
                'specification' => $this->input->post('prod_spec'),
                'stock' => $this->input->post('prod_avail'),
                'publish' => $this->input->post('prod_publish'),
                'time' => time()
            );
            if ($_FILES['userfile']['name'][0] != NULL) {
                $prodata['images'] = crypt::multi_images('products', 'userfile');
            }
            if ($_FILES['thumbnail']['name'] != NULL) {
                $prodata['thumbnail'] = crypt::single_image('thumbnails', 'thumbnail');
            }
            if ($this->home_model->common_update('tb_products', $prodata, array('id' => $this->input->post('prod_id'))) != 0) {
                $this->session->set_flashdata('success', 'You have updated product successfully');
            } else {
                $this->session->set_flashdata('errors', 'Something went wrong!');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function getprobyajax() {
        $proid = $this->input->post('product_id');
        $data['sproduct'] = $this->cart_model->single_product('tb_products', array('tb_products.id' => $proid));
        $this->load->view('ecommerce/others-single', $data);
    }

    public function team_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
        $this->form_validation->set_rules('linkdin', 'Linkdin', 'trim|xss_clean');
        $this->form_validation->set_rules('instagram', 'Instagram', 'trim|xss_clean');
        $this->form_validation->set_rules('speech', 'Speech', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'facebook' => $this->input->post('facebook'),
                'linkedin' => $this->input->post('linkedin'),
                'instagram' => $this->input->post('instagram'),
                'speech' => $this->input->post('speech'),
                'active' => $this->input->post('active'),
                'type' => $this->input->post('type'),
                'photo' => crypt::single_image('team', 'photo'),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_team', $prodata)) {
                $this->session->set_flashdata('success', 'You have inserted team dada successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Team entry Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function addadmin() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email|min_length[9]|max_length[30]|is_unique[tb_admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('passwordtwo', 'Confirm Password', 'trim|xss_clean|required|min_length[6]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'photo' => crypt::single_image('admin', 'photo'),
                'time' => time()
            );
            if ($this->home_model->common_insert('tb_admin', $prodata)) {
                $this->session->set_flashdata('success', 'You have inserted successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Moderator entry unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function team_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
        $this->form_validation->set_rules('linkdin', 'Linkdin', 'trim|xss_clean');
        $this->form_validation->set_rules('instagram', 'Instagram', 'trim|xss_clean');
        $this->form_validation->set_rules('speech', 'Speech', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $prodata = array(
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'facebook' => $this->input->post('facebook'),
                'linkedin' => $this->input->post('linkedin'),
                'instagram' => $this->input->post('instagram'),
                'speech' => $this->input->post('speech'),
                'active' => $this->input->post('active'),
                'type' => $this->input->post('type'),
                'time' => time()
            );
            if ($this->home_model->common_update('tb_team', $prodata, array('id' => $this->input->post('teamid'))) != 0) {
                $this->session->set_flashdata('success', 'You have updated team dada successfully!');
            } else {
                $this->session->set_flashdata('errors', 'Team update Unsuccessful');
            }
        } else {
            $this->session->set_flashdata('errors', validation_errors());
        }
        redirect($this->agent->referrer());
    }

    public function policy_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'name' => $this->input->post('policyname'),
            'visibility' => $this->input->post('policypub'),
            'body' => $this->input->post('policybody'),
            'time' => time()
        );
        if ($this->home_model->common_update('tb_policies', $poldata, array('name' => $this->input->post('policyname'))) != 0) {
            $this->session->set_flashdata('success', 'You have updated policy successfully!');
        } else {
            $this->session->set_flashdata('errors', 'Policy update Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function update_about() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'first' => $this->input->post('service'),
            'second' => $this->input->post('selection'),
            'third' => $this->input->post('satisfaction'),
            'forth' => $this->input->post('delivery'),
            'visibility' => $this->input->post('visibility'),
            'time' => time()
        );
        if ($_FILES['photos']['name'] != NULL) {
            $poldata['photos'] = crypt::multi_images('others', 'photos');
        }
        if ($this->home_model->common_update('tb_others', $poldata, array('name' => $this->input->post('where'))) != 0) {
            $this->session->set_flashdata('success', 'You have updated successfully!');
        } else {
            $this->session->set_flashdata('errors', 'Updatinh Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function faqs_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'name' => $this->input->post('category'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'publish' => $this->input->post('publish'),
            'time' => time()
        );
        if ($this->home_model->common_insert('tb_faqs', $poldata)) {
            $this->session->set_flashdata('success', 'Insertion Successful');
        } else {
            $this->session->set_flashdata('errors', 'Insertion Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function testimonial_entry() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'name' => $this->input->post('name'),
            'photo' => Crypt::single_image('testimonial', 'photo'),
            'speech' => $this->input->post('speech'),
            'date' => $this->input->post('date'),
            'publish' => $this->input->post('publish'),
            'time' => time()
        );
        if ($this->home_model->common_insert('tb_testimonials', $poldata)) {
            $this->session->set_flashdata('success', 'Insertion Successful');
        } else {
            $this->session->set_flashdata('errors', 'Insertion Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function faqs_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'name' => $this->input->post('category'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'publish' => $this->input->post('publish'),
            'time' => time()
        );
        if ($this->home_model->common_update('tb_faqs', $poldata, array('id' => $this->input->post('faqid')))) {
            $this->session->set_flashdata('success', 'Update Successful');
        } else {
            $this->session->set_flashdata('errors', 'Update Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function user_update() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $poldata = array(
            'active' => $this->input->post('active'),
            'time' => time()
        );
        if ($this->home_model->common_update('tb_customers', $poldata, array('id' => $this->input->post('userid')))) {
            $this->session->set_flashdata('success', 'Update Successful');
        } else {
            $this->session->set_flashdata('errors', 'Update Unsuccessful');
        }
        redirect($this->agent->referrer());
    }

    public function refreshupdate() {
        $data = array('duration' => $this->input->post('duration'));
        $where = array('user' => $this->session->userdata('adminauth')['user']);
        if ($this->home_model->common_update('tb_settings', $data, $where) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function maponoff() {
        $data = array('maps' => $this->input->post('maps'));
        $where = array('user' => $this->session->userdata('adminauth')['user']);
        if ($this->home_model->common_update('tb_settings', $data, $where) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function policychange() {
        $this->home_model->common_update('tb_policies', array('status' => 0), array());
        if ($this->home_model->common_update('tb_policies', array('status' => 1), array('name' => $this->input->post('name'))) != 0) {
            echo 'Done';
        } else {
            echo 'Failed';
        }
    }

    public function ordersearch() {
        if (is_numeric($this->input->post('nameorid'))) {
            $ajdata = array('id' => $this->input->post('nameorid'));
        } else {
            $ajdata = array('order_name' => $this->input->post('nameorid'));
        }
        $data['orders'] = $this->home_model->ordersearch('tb_ordersummary', $ajdata);
        $this->load->view('admin/ajax/order', $data);
    }

    public function searchproduct() {
        if (is_numeric($this->input->post('nameorid'))) {
            $ajdata = array('id' => $this->input->post('nameorid'));
        } else {
            $ajdata = array('name' => $this->input->post('nameorid'));
        }
        $data['products'] = $this->home_model->ordersearch('tb_products', $ajdata);
        $this->load->view('admin/ajax/products', $data);
    }

    public function searchuser() {
        if (is_numeric($this->input->post('nameorid'))) {
            $ajdata = array('id' => $this->input->post('nameorid'));
        } else {
            $ajdata = array('email' => $this->input->post('nameorid'));
        }
        $data['users'] = $this->home_model->ordersearch('tb_customers', $ajdata);
        $this->load->view('admin/ajax/users', $data);
    }

    public function markseen() {
        if (!$this->session->userdata('adminauth')) {
            redirect('admin');
        }
        $this->home_model->common_update('tb_visitors', array('seen' => 1), array());
        redirect($this->agent->referrer());
    }

}
