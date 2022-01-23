<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function single_product($table, $where){
        $this->db->select('tb_products.*, tb_brands.brand');
        $this->db->from($table);
        $this->db->join('tb_brands', 'tb_brands.brand = tb_products.brand', 'inner');
        $this->db->where($where);
        $dada = $this->db->get();
        return $dada->row();
    }

    public function common_insert($table, $data) {
        $query = $this->db->insert($table, $data);
        return $query ? 'TRUE' : 'FALSE';
    }

    public function common_update($table, $data, $where) {
        $this->db->update($table, $data, $where);
        $query = $this->db->affected_rows();
        return $query;
    }

    public function common_query($table, $where, $order) {
        $this->db->order_by('id', $order);
        $dada = $this->db->get_where($table, $where);
        return $dada->result();
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

    public function total_rows($table, $where = array()) {
        $query = $this->db->get_where($table, $where);
        return $query->num_rows();
    }

}
