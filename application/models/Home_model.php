<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function common_insert($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function common_insert_return($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function common_update($table, $data, $where) {
        $this->db->update($table, $data, $where);
        $query = $this->db->affected_rows();
        return $query;
    }

    public function common_sum($table) {
        $this->db->select('sum(`buying_price`*`total_product`) as `proamount`, sum(`buying_price`*`stock`) as `inhouse`');
        $query = $this->db->get($table);
        return $query->result();
    }

    public function common_single_sum($table, $sum, $where) {
        $this->db->select_sum($sum);
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function common_query($table, $where, $order, $limit) {
        $this->db->limit($limit);
        $this->db->order_by('id', $order);
        $dada = $this->db->get_where($table, $where);
        return $dada->result();
    }

    public function wishlist_query($table, $where, $limt) {
        $this->db->limit($limt);
        $this->db->join('tb_wishlist', 'tb_wishlist.product_id = tb_products.id');
        $this->db->order_by('tb_wishlist.id', 'DESC');
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function orders_query($table, $where) {
        $this->db->select('tb_orders.*, tb_ordersummary.status, tb_products.name, tb_products.price');
        $this->db->from($table);
        $this->db->join('tb_products', 'tb_products.id = tb_orders.product_id', 'inner');
        $this->db->join('tb_ordersummary', 'tb_ordersummary.id = tb_orders.summary_id', 'inner');
        $this->db->where('tb_orders.customer_id', $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function invoice_query($table, $where) {
        $this->db->select('tb_orders.*, tb_ordersummary.id as orid, tb_products.thumbnail, tb_products.name as proname, tb_products.price');
        $this->db->from($table);
        $this->db->join('tb_products', 'tb_products.id = tb_orders.product_id', 'inner');
        $this->db->join('tb_ordersummary', 'tb_ordersummary.id = tb_orders.summary_id', 'inner');
        $this->db->join('tb_customers', 'tb_customers.email = tb_orders.customer_id', 'inner');
        $this->db->where('tb_orders.summary_id', $where);
        $query = $this->db->get();
        return $query->result();
    }

    public function invocusto_query($table, $where) {
        $this->db->select('tb_customers.*, tb_ordersummary.*, tb_ordersummary.id as orderid');
        $this->db->from($table);
        $this->db->join('tb_customers', 'tb_customers.email = tb_ordersummary.customer_id', 'inner');
        $this->db->where('tb_ordersummary.id', $where);
        $query = $this->db->get();
        return $query->row();
    }

    public function degree_query($table, $where) {
        $dada = $this->db->get_where($table, $where);
        return $dada->row();
    }

    public function login_query($table, $where) {
        $dada = $this->db->get_where($table, $where);
        if ($dada->num_rows() == 1) {
            return $dada->row();
        } else {
            return FALSE;
        }
    }

    public function common_delete($table, $where) {
        $this->db->delete($table, $where);
        $query = $this->db->affected_rows();
        return $query;
    }

    public function common_view($table, $where, $order = '') {
        $this->db->update($table, array('seen' => '1'), $where);
        $this->db->order_by('id', $order);
        $dada = $this->db->get_where($table, $where);
        return $dada->row();
    }

    public function total_rows($table, $where) {
        $query = $this->db->get_where($table, $where);
        return $query->num_rows();
    }

    public function get_pagination($table, $offset, $limit, $order, $where) {
        $this->db->order_by('id', $order);
        $this->db->limit($limit, $offset);
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function visitors($table, $where) {
        $query = $this->db->get_where($table, array('ip' => $where['ip']));
        $sql = $query->row();
        if ($query->num_rows() >= 1) {
            $this->db->update($table, array('time' => time(), 'count' => ($sql->count) + 1, 'agent' => $this->agent->agent_string()), array('ip' => $where['ip']));
        } else {
            $query = $this->db->insert($table, $where);
        }
    }

    #public function total_visitors_group($tbl) {
    #$this->db->select('country, COUNT(country) as total');
    #$this->db->group_by('country');
    #$this->db->order_by('total', 'desc');
    #$query = $this->db->get($tbl);
    #return $query->result();
    #}

    public function total_orders_group($tbl) {
        $this->db->select('tb_products.category as country, COUNT(tb_products.category) as total');
        $this->db->from($tbl);
        $this->db->join('tb_products', 'tb_products.id = tb_orders.product_id', 'inner');
        $this->db->group_by('tb_products.category');
        $this->db->order_by('total', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function online_counter($table, $data) {
        $query = $this->db->get_where($table, array('session' => $data['session']));
        if ($query->num_rows() == 0) {
            $this->db->insert($table, $data);
        } else {
            $this->db->update($table, $data, array('session' => $data['session']));
        }
        $this->db->delete($table, array('time <=' => time() - 60));
    }

    public function common_search($table, $where) {
        $this->db->like($where);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function addwishlist($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() >= 1) {
            echo 'Alreasy Exist';
        } else {
            $this->db->insert($table, $where);
            return TRUE;
        }
    }

    public function interval_query($table, $whr, $no, $order) {
        $this->db->order_by('id', $order);
        $this->db->where('time > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL ' . $no . ' DAY))');
        $this->db->where($whr);
        $query = $this->db->get($table);
        //return $this->db->last_query();
        return $query->result();
    }

    public function stock_update($id, $qty) {
        $this->db->select('stock');
        $this->db->where(array('id' => $id));
        $query = $this->db->get('tb_products');
        $data = $query->row()->stock;
        return $this->db->update('tb_products', array('stock' => ($data - $qty)), array('id' => $id));
    }
    
    public function ordersearch($table, $data){
        $this->db->like($data);
        $query = $this->db->get($table);
        return $query->result();
    }


}
