<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->lang->load('ecommerce', $this->session->userdata('language'));
    }

    public function mycart() {
        $data['title'] = 'Salvia | Emporium';
        $data['cartcls'] = 'active';
        $data['view'] = 'ecommerce/shopping-cart';
        $this->load->view('ecommerce/index', $data);
    }

    public function addtocart() {
        $data['title'] = 'Salvia | Emporium';
        $data['cartcls'] = 'active';
        $proid = $this->input->post('pro_id');
        if (!empty($proid)) {
            $sproduct = $this->cart_model->single_product('tb_products', array('tb_products.id' => $proid));
            $cartproduct = array(
                'id' => $sproduct->id,
                'name' => $sproduct->name,
                'price' => $sproduct->price,
                'qty' => $this->input->post('quantity'),
                'image' => $sproduct->thumbnail,
                'size' => $this->input->post('size'),
                'color' => $this->input->post('color'),
            );
            if ($this->cart->insert($cartproduct) == TRUE) {
                $this->session->set_flashdata('toast', 'Added Successfully');
                $this->session->set_flashdata('toastclr', '#27ae60');
            } else {
                $this->session->set_flashdata('toast', 'Error! Unsuccessful');
                $this->session->set_flashdata('toastclr', '#e74c3c');
            }
        } else {
            $this->session->set_flashdata('toast', 'Select Product First');
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        #redirect($this->agent->referrer());
        redirect('cart/mycart');
    }

    public function cart_update() {
        if ($this->input->post('row_id') != NULL) {
            $data = array(
                'rowid' => $this->input->post('row_id'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('quantity')
            );
            $this->cart->update($data);
            echo $data['qty'];
        }
    }

    public function checkout() {
        if (count($this->cart->contents()) >= 1) {
            $data['title'] = 'Salvia | Emporium';
            $data['cartcls'] = 'current';
            $data['customer'] = $this->home_model->login_query('tb_customers', array('email' => $this->session->userdata('customer_auth')['cus_user']));
            $data['view'] = 'ecommerce/checkout';
            $this->load->view('ecommerce/index', $data);
        } else {
            $this->session->set_flashdata('toast', 'Choose Product First');
            $this->session->set_flashdata('toastclr', '#e74c3c');
            redirect($this->agent->referrer());
        }
    }

    public function remove($rowid) {
        if ($rowid != NULL) {
            $this->cart->remove($rowid);
        } else {
            $this->session->set_flashdata('toast', 'Choose Product First');
            $this->session->set_flashdata('toastclr', '#e74c3c');
        }
        redirect($this->agent->referrer());
    }

    public function payment() {
        if (!$this->session->userdata('customer_auth')) {
            $this->form_validation->set_rules('data_name', 'Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
            $this->form_validation->set_rules('data_email', 'Email', 'trim|max_length[30]|valid_email|xss_clean|is_unique[tb_customers.email]');
            $this->form_validation->set_rules('data_phone', 'Mobile', 'trim|required|max_length[14]|min_length[11]|xss_clean|numeric');
            $this->form_validation->set_rules('data_address', 'Address', 'trim|required|max_length[150]|min_length[10]|xss_clean');
            $this->form_validation->set_rules('data_city', 'City', 'trim|max_length[20]|xss_clean');
            $this->form_validation->set_rules('data_zip', 'ZIP', 'trim|max_length[5]|xss_clean');
            $this->form_validation->set_rules('data_country', 'Country', 'trim|max_length[30]|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $number = sha1(uniqid());
                $password = crypt::randompass();
                $createdata = array(
                    'name' => $this->input->post('data_name'),
                    'email' => $this->input->post('data_email'),
                    'token' => $number,
                    'mobile' => $this->input->post('data_phone'),
                    'password' => md5($password),
                    'address' => $this->input->post('data_address'),
                    'city' => $this->input->post('data_city'),
                    'zip' => $this->input->post('data_zip'),
                    'country' => $this->input->post('data_country'),
                    'ip' => $this->input->ip_address(),
                    'time' => time()
                );
                if ($this->home_model->common_insert('tb_customers', $createdata) == TRUE && $this->input->post('data_email') != NULL) {
                    $edata['link'] = base_url('customer/activatecustomeracc/' . $number);
                    $edata['name'] = $this->input->post('data_name');
                    $edata['password'] = $password;
                    
                    $config['smtp_host'] = 'salviaemporium.com';
                    $config['smtp_user'] = 'noreply@salviaemporium.com';
                    $config['smtp_pass'] = 'pB4&R]bbRd7w';
                    $this->email->initialize($config);
                    $message = $this->load->view('ecommerce/email/confirm-email', $edata, TRUE);
                    $this->email->from('noreply@salviaemporium.com', 'Salvia Emporium');
                    $this->email->to($this->input->post('data_email'));
                    $this->email->subject('Registration - SalviaEmporium');
                    $this->email->message($message);
                    $this->email->send();
                }
            } else {
                $this->session->set_flashdata('errors', validation_errors());
                redirect($this->agent->referrer());
            }
        }
        $sumdata = array(
            'customer_id' => $this->input->post('data_email'),
            'order_name' => $this->input->post('data_name'),
            'total_amount' => ($this->cart->total()),
            'payment_type' => $this->input->post('paymentmethod'),
            'transaction_id' => $this->input->post('mobilecon'),
            'status' => 'pending',
            'time' => time()
        );
        $rtnid = $this->home_model->common_insert_return('tb_ordersummary', $sumdata);
        $this->session->set_userdata('rtnid', $rtnid);
        $this->session->set_userdata('customer_mail', $this->input->post('data_email'));
        if ($rtnid != 0) {
            foreach ($this->cart->contents() as $cartdata) {
                $inddata = array(
                    'product_id' => $cartdata['id'],
                    'customer_id' => $this->input->post('data_email'),
                    'summary_id' => $rtnid,
                    'color' => $cartdata['color'],
                    'size' => $cartdata['size'],
                    'price' => $cartdata['price'],
                    'quantity' => $cartdata['qty'],
                    'time' => time()
                );
                if ($this->home_model->common_insert('tb_orders', $inddata)) {
                    $this->home_model->stock_update($cartdata['id'], $cartdata['qty']);
                } else {
                    $this->session->set_flashdata('errors', 'Something went wrong!');
                    redirect($this->agent->referrer());
                }
            }
            if ($this->input->post('paymentmethod') == 'Card') {
                #SSLCMZ API START
                $post_data = array();
                $post_data['store_id'] = "salvi5e54ba875e6fa";
                $post_data['store_passwd'] = "salvi5e54ba875e6fa@ssl";
                $post_data['total_amount'] = ($this->cart->total() + 50);
                $post_data['currency'] = "BDT";
                $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();
                $post_data['success_url'] = base_url('cart/success.html');
                $post_data['fail_url'] = base_url('cart/unsuccess.html');
                $post_data['cancel_url'] = base_url('cart/cancleorder.html');
                #$post_data['multi_card_name'] = "mastercard,visacard,amexcard";  #DISABLE TO DISPLAY ALL AVAILABLE
                #EMI INFO
                $post_data['emi_option'] = "1";
                $post_data['emi_max_inst_option'] = "9";
                $post_data['emi_selected_inst'] = "9";
                #CUSTOMER INFORMATION
                $post_data['cus_name'] = $this->input->post('data_name');
                $post_data['cus_email'] = $this->input->post('data_email');
                $post_data['cus_add1'] = $this->input->post('data_address');
                $post_data['cus_add2'] = "NA";
                $post_data['cus_city'] = $this->input->post('data_city');
                $post_data['cus_state'] = "BD";
                $post_data['cus_postcode'] = $this->input->post('data_zip');
                $post_data['cus_country'] = $this->input->post('data_country');
                $post_data['cus_phone'] = $this->input->post('data_phone');
                $post_data['cus_fax'] = "";
                #SHIPMENT INFORMATION
                $post_data['ship_name'] = "testsalvil9qp";
                $post_data['ship_add1 '] = "Uttara-12, Dhaka";
                $post_data['ship_add2'] = "NA";
                $post_data['ship_city'] = "Dhaka";
                $post_data['ship_state'] = "BD";
                $post_data['ship_postcode'] = "1230";
                $post_data['ship_country'] = "Bangladesh";
                #OPTIONAL PARAMETERS
                $post_data['value_a'] = "ref001";
                $post_data['value_b '] = "ref002";
                $post_data['value_c'] = "ref003";
                $post_data['value_d'] = "ref004";
                #CART PARAMETERS
                $post_data['cart'] = json_encode(array(
                    array("product" => "DHK TO BRS AC A1", "amount" => "200.00"),
                    array("product" => "DHK TO BRS AC A2", "amount" => "200.00"),
                    array("product" => "DHK TO BRS AC A3", "amount" => "200.00"),
                    array("product" => "DHK TO BRS AC A4", "amount" => "200.00")
                ));
                $post_data['product_amount'] = "100";
                $post_data['vat'] = "5";
                $post_data['discount_amount'] = "5";
                $post_data['convenience_fee'] = "3";

                #REQUEST SEND TO SSLCOMMERZ
                $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
                $handle = curl_init();
                curl_setopt($handle, CURLOPT_URL, $direct_api_url);
                curl_setopt($handle, CURLOPT_TIMEOUT, 30);
                curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($handle, CURLOPT_POST, 1);
                curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); #KEEP IT FALSE IF YOU RUN FROM LOCAL PC
                $content = curl_exec($handle);
                $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                if ($code == 200 && !( curl_errno($handle))) {
                    curl_close($handle);
                    $sslcommerzResponse = $content;
                } else {
                    curl_close($handle);
                    echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
                    exit;
                }
                #PARSE THE JSON RESPONSE
                $sslcz = json_decode($sslcommerzResponse, true);
                if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {
                    #THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
                    #echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
                    echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
                    #header("Location: ". $sslcz['GatewayPageURL']);
                    exit;
                } else {
                    echo "JSON Data Parsing Error!";
                }
                #SSLCMZ API END
            } elseif ($this->input->post('paymentmethod') == 'Mobile') {
                #echo 'Will be developed soon!';
                redirect('cart/hosuccess');
            } else {
                redirect('cart/hosuccess');
            }
        } else {
            $this->session->set_flashdata('errors', 'Something went wrong!');
            redirect($this->agent->referrer());
        }
    }

    public function success() {
        $val_id = urlencode($_POST['val_id']);
        $store_id = urlencode("salvi5e54ba875e6fa");
        $store_passwd = urlencode("salvi5e54ba875e6fa@ssl");
        $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $requested_url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); #IF YOU RUN FROM LOCAL PC
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); #IF YOU RUN FROM LOCAL PC
        $result = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        if ($code == 200 && !( curl_errno($handle))) {
            #TO CONVERT AS ARRAY
            #$result = json_decode($result, true);
            #$status = $result['status'];
            #TO CONVERT AS OBJECT
            $result = json_decode($result);
            #TRANSACTION INFO
            $status = $result->status;
            $tran_date = $result->tran_date;
            $tran_id = $result->tran_id;
            $val_id = $result->val_id;
            $amount = $result->amount;
            $store_amount = $result->store_amount;
            $bank_tran_id = $result->bank_tran_id;
            $card_type = $result->card_type;
            #EMI INFO
            $emi_instalment = $result->emi_instalment;
            $emi_amount = $result->emi_amount;
            $emi_description = $result->emi_description;
            $emi_issuer = $result->emi_issuer;
            #ISSUER INFO
            $card_no = $result->card_no;
            $card_issuer = $result->card_issuer;
            $card_brand = $result->card_brand;
            $card_issuer_country = $result->card_issuer_country;
            $card_issuer_country_code = $result->card_issuer_country_code;
            #API AUTHENTICATION
            $APIConnect = $result->APIConnect;
            $validated_on = $result->validated_on;
            $gw_version = $result->gw_version;
            #OWN CODE
            $this->home_model->common_update('tb_ordersummary', array('payment_status' => 1), array('id' => $this->session->userdata('rtnid')));
            $ordata = array(
                'status' => $status,
                'tran_date' => $tran_date,
                'tran_id' => $tran_id,
                'amount' => $amount,
                'card_type' => $card_type,
                'product_info' => $this->home_model->invoice_query('tb_orders', $this->session->userdata('rtnid')),
                'usr_addr' => $this->home_model->degree_query('tb_customers', array('email' => $this->session->userdata('customer_mail')))
            );
            #Email Start
            if ($this->session->userdata('customer_mail') != NULL) {
                $config['smtp_host'] = 'salviaemporium.com';
                $config['smtp_user'] = 'info@salviaemporium.com';
                $config['smtp_pass'] = 'pB4&R]bbRd7w';
                $this->email->initialize($config);
                $message = $this->load->view('ecommerce/email/confirm-order', $ordata, TRUE);
                $this->email->from('info@salviaemporium.com', 'Salvia Emporium');
                $this->email->to($this->session->userdata('customer_mail'));
                $this->email->subject('Order Confirmation - SalviaEmporium');
                $this->email->message($message);
                if ($this->email->send()) {
                    $this->session->unset_userdata('customer_mail');
                    $this->session->unset_userdata('rtnid');
                    $this->cart->destroy();
                }
            }
            #Email End
            $data['title'] = 'Salvia | Emporium';
            $data['message'] = 'Your order & payment is successful';
            $data['view'] = 'ecommerce/order-success';
            $this->load->view('ecommerce/index', $data);
        } else {
            echo "Failed To Connect With SSLCOMMERZ";
        }
    }

    public function hosuccess() {
        #$this->home_model->common_update('tb_ordersummary', array('payment_status' => 1), array('id' => $this->session->userdata('rtnid')));
        $ordata = array(
            'status' => '',
            'tran_date' => '',
            'tran_id' => '',
            'amount' => ($this->cart->total() + 50),
            'card_type' => 'Cash on',
            'product_info' => $this->home_model->invoice_query('tb_orders', $this->session->userdata('rtnid')),
            'usr_addr' => $this->home_model->degree_query('tb_customers', array('email' => $this->session->userdata('customer_mail')))
        );
        #Email Start
        $config['smtp_host'] = 'salviaemporium.com';
        $config['smtp_user'] = 'info@salviaemporium.com';
        $config['smtp_pass'] = 'pB4&R]bbRd7w';
        $this->email->initialize($config);
        $message = $this->load->view('ecommerce/email/confirm-order', $ordata, TRUE);
        $this->email->from('info@salviaemporium.com', 'Salvia Emporium');
        $this->email->to($this->session->userdata('customer_mail'));
        $this->email->subject('Order Confirmation - SalviaEmporium');
        $this->email->message($message);
        if ($this->email->send()) {
            $this->session->unset_userdata('customer_mail');
            $this->session->unset_userdata('rtnid');
            $this->cart->destroy();
        }
        #Email End
        $data['title'] = 'Salvia | Emporium';
        $data['message'] = 'Your order is successful';
        $data['view'] = 'ecommerce/order-success';
        $this->load->view('ecommerce/index', $data);
    }

    public function unsuccess() {
        $data['title'] = 'Salvia | Emporium';
        $data['message'] = 'Your order is unsuccessful';
        $data['view'] = 'ecommerce/order-unsuccess';
        $this->load->view('ecommerce/index', $data);
    }

    public function cancleorder() {
        $data['title'] = 'Salvia | Emporium';
        $data['message'] = 'Your order has been canceled';
        $data['view'] = 'ecommerce/order-cancel';
        $this->load->view('ecommerce/index', $data);
    }

}
