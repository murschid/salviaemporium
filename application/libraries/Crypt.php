<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Description of Crypt
 * @author Murshid
 */

class Crypt {

    public static function settings($user) {
        $ci = & get_instance();
        $query = $ci->db->get_where('tb_settings', array('user' => $user));
        return $query->row();
    }

    public static function multi_images($folder, $name) {
        $ci = & get_instance();
        $filesCount = count($_FILES[$name]['name']);
        for ($imgi = 0; $imgi < $filesCount; $imgi++) {
            $_FILES['file']['name'] = $_FILES[$name]['name'][$imgi];
            $_FILES['file']['type'] = $_FILES[$name]['type'][$imgi];
            $_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'][$imgi];
            $_FILES['file']['error'] = $_FILES[$name]['error'][$imgi];
            $_FILES['file']['size'] = $_FILES[$name]['size'][$imgi];

            $config['upload_path'] = 'assets/images/' . $folder . '/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|txt|jpeg';
            $config['max_size'] = '1024';
            $config['max_width'] = '2400';
            $config['max_height'] = '1800';

            $ci->upload->initialize($config);
            $ci->upload->do_upload('file');
            $imgdata = $ci->upload->data();
            $name_array[] = $imgdata['file_name'];
        }
        return implode(',', $name_array);
    }

    public static function single_image($folder, $name) {
        $ci = & get_instance();
        $config['upload_path'] = 'assets/images/' . $folder . '/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|txt|jpeg';
        $config['max_size'] = '1024';
        $config['max_width'] = '2400';
        $config['max_height'] = '1800';
        $ci->upload->initialize($config);
        $ci->upload->do_upload($name);
        $data = $ci->upload->data();
        return $data['file_name'];
    }

    public static function randompass() {
        $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ0123456789@#$&';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    public static function online_counter() {
        $ci = & get_instance();
        $ci->load->dbforge();
        $fields = array(
            'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => TRUE),
            'session' => array('type' => 'VARCHAR', 'constraint' => 64),
            'time' => array('type' => 'VARCHAR', 'constraint' => 20)
        );
        $ci->dbforge->add_field($fields);
        $ci->dbforge->add_key('id', TRUE);
        $ci->dbforge->create_table('tb_online', TRUE);
        $data = array(
            'session' => $ci->session->session_id,
            'time' => time()
        );
        $query = $ci->db->get_where('tb_online', array('session' => $data['session']));
        if ($query->num_rows() == 0) {
            $ci->db->insert('tb_online', $data);
        } else {
            $ci->db->update('tb_online', $data, array('session' => $data['session']));
        }
        $ci->db->delete('tb_online', array('time <=' => time() - 60));
        #$ci->home_model->online_counter('tb_online', $data);
    }

    public static function user_info($ip) {
        $ci = & get_instance();
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
            'web' => 1,
            'agent' => $ci->agent->agent_string(),
            'time' => time()
        );
        $ci->home_model->visitors('tb_visitors', $data);
    }

}
