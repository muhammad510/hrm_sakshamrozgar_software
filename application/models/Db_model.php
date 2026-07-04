<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Db_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function select($data, $table, $where = "1=1")
    {
        $this->db->select($data)->from($table)->where($where)->order_by('id', 'DESC')->limit(1);
        $result = $this->db->get()->row();

        return $result->$data;
    }

    public function select_multi($data, $table, $where = "1=1")
    {
        $this->db->select($data)->from($table)->where($where)->order_by('id', 'DESC')->limit(1);
        $result = $this->db->get()->row();

        return $result;
    }

    public function update($data, $table, $where = "1=1")
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function count_all($table, $where = "1=1")
    {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->count_all_results();
    }



    public function sum($data, $table, $where = "1=1")
    {

        $this->db->select_sum($data);
        $this->db->where($where);
        $this->db->from($table);

        $result = $this->db->get()->row();

        return $result->$data;
    }

    function select_all($table, $data)
    {
        return $this->db->select($data)->from($table)->get()->result();
    }

    function select_all_with_con($table, $data, $con)
    {
        return $this->db->select($data)->from($table)->where($con)->get()->result();
    }

    function get_data($table, $data, $con)
    {
        return $this->db->select($data)->from($table)->where($con)->get()->row();
    }

    function upload_image($path, $name)
    {
        $config['upload_path']          = './uploads/' . $path;
        $config['allowed_types']        = 'jpg|png|jpeg';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($name)) {
            $upload_data =  $this->upload->data();
            $image_path = "uploads/" . $path . '/' . $upload_data['file_name'];
            $val = array('text' => $image_path, 'icon' => 1);
        } else {
            $val = array('text' => $this->upload->display_errors(), 'icon' => 0);
        }

        return $val;
    }
}
