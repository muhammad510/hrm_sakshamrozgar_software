<?php
defined('BASEPATH') or exit('No direct script access allowed');

class website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/leave_model', 'leave');
        ($this->session->userdata('mim_id') == '') ? redirect(base_url(), 'refresh') : '';
        $this->logID = $this->session->userdata('mim_id');
        error_reporting(0);
    }

    public function getcareer($actn = NULL)
    {


        if ($actn == 'list') {
            $post_data = $this->input->post();
            $record = $this->leave->website_list($post_data);
            //echo $this->db->last_query();die;
            // print_r($record);exit;
            $i = $post_data['start'] + 1;
            $return['data'] = array();
            $web_url = "https://sakshamrozgar.com/";
            foreach ($record as $row) {

                if (!empty($row->resume)) {
                    $resume = '<a href="' . $web_url . $row->resume . '" class="btn btn-sm btn-primary" target="_blank"><i class="fa pe-2 fa-download"></i>Download</a>';
                } else {
                    $resume = '<span class="text-danger">No Resume</span>';
                }

                $return['data'][] = array(
                    '<div style="font-weight:900;text-align:center;">' . $i++ . '.</div>',
                    $row->name,
                    $row->email,
                    $row->phone,
                    $row->position,
                    $resume,
                    '<a href="' . $web_url . $row->c_img . '" class="btn btn-sm btn-primary" target="_blank"><i class="fa pe-2 fa-download"></i>Image</a>'
                );
            }
            $return['recordsTotal'] = $this->leave->website_count();
            $return['recordsFiltered'] = $this->leave->website_filter_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
        } else {
            $data['title'] = 'Career List';
            $data['breadcrums'] = 'Career List';
            $data['target'] = 'admin/website/getcareer/list';
            $data['layout'] = "admin/website/career_list.php";
            $this->load->view('adm_base', $data);
        }
    }

    public function enquiry_list($actn = NULL)
    {

        if ($actn == 'list') {
            $post_data = $this->input->post();
            $record = $this->leave->website_enquiry_list($post_data);
            //echo $this->db->last_query();die;
            // print_r($record);exit;
            $i = $post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {

                $message_words = explode(' ', strip_tags($row->message));
                $slide_word = implode(' ', array_slice($message_words, 0, 3));
                $view = '<div style="text-align:center">
				  <a href="view_enquiry/' . $row->id . '" title="Click to view details" class="btn ripple miView btn-sm getAction">				                    <i class="ti-eye"></i>
				  </a>&emsp;
    			  <a href="delete_enquiry/' . $row->id . '"  style="margin-left:-13px;"  title="Click to Delete Details"  onclick="return confirm(\'Are you sure you want to delete this enquiry?\');" class="btn ripple btn-secondary btn-sm getAction">
					<i class="fa fa-trash "></i>
				  </a>
					   </div>';

                $return['data'][] = array(
                    '<div style="font-weight:900;text-align:center;">' . $i++ . '.</div>',
                    $row->name,
                    $row->email,
                    $row->phone,
                    $slide_word . '...',
                    $view
                );
            }
            $return['recordsTotal'] = $this->leave->website_enquiry_count();
            $return['recordsFiltered'] = $this->leave->website_filter_enquiry_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
        } else {
            $data['title'] = 'Enquiry List';
            $data['breadcrums'] = 'Enquiry List';
            $data['target'] = 'admin/website/enquiry_list/list';
            $data['layout'] = "admin/website/enquiry_list.php";
            $this->load->view('adm_base', $data);
        }
    }


    public function delete_enquiry($id)
    {
        if (!empty($id)) {
            $deleted =  $this->db->where('id', $id)->delete('enquiry');
            if ($deleted) {
                redirect('admin/website/enquiry_list');
            }
        }
    }

    public function view_enquiry($id)
    {
        $data['title'] = 'View Enquiry';
        $data['breadcrums'] = 'View Enquiry';
        $data['enquiry_data'] = $this->db->select('*')->from('enquiry')->where('id', $id)->get()->row();
        $data['layout'] = "admin/website/view_enquiry.php";
        $this->load->view('adm_base', $data);
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


            $a = array('photo' => $image_path);
            $this->session->set_userdata($a);


            $val = array('text' => $image_path, 'icon' => 'success');
        } else {
            $val = array('text' => $this->upload->display_errors(), 'icon' => 'error');
        }

        return $val;
    }


    public function manage_gallery($actn = NULL)
    {
        if ($actn == 'list') {
            $post_data = $this->input->post();
            $record = $this->leave->gallery_list($post_data);
            //echo $this->db->last_query();die;
            // print_r($record);
            // exit;
            $i = $post_data['start'] + 1;
            $return['data'] = array();
            foreach ($record as $row) {
                $status = $row->status == 0 ? "Active" : "In-active";
                $img = '<a target="_blank" href="' . base_url($row->image) . '" >
                <img width="50" height="50" src=' . base_url($row->image) . '  />
                </a>';
                $view = ' <a href="delete_gallery/' . $row->id . '"  title="Click to Delete Details"  onclick="return confirm(\'Are you sure you want to delete this Gallery?\');" class="btn ripple btn-secondary btn-sm getAction">
					<i class="fa fa-trash "></i>
				  </a>,
                   <a href="edit_gallery/' . $row->id . '"  style=""  title="Click to Update Details"  class="btn ripple btn-secondary btn-sm getAction">
					<i class="ti-pencil-alt"></i>
				  </a>
					   </div>';

                $return['data'][] = array(
                    '<div style="font-weight:900;text-align:center;">' . $i++ . '.</div>',
                    $row->name,
                    $row->designation,
                    $img,
                    $status,
                    $view
                );
            }
            $return['recordsTotal'] = $this->leave->website_enquiry_count();
            $return['recordsFiltered'] = $this->leave->website_filter_enquiry_count($post_data);
            $return['draw'] = $post_data['draw'];
            echo json_encode($return);
        } else {
            $data['title'] = 'Gallery List';
            $data['breadcrums'] = 'Gallery List';
            $data['target'] = 'admin/website/manage_gallery/list';
            $data['layout'] = "admin/website/manage_list.php";
            $this->load->view('adm_base', $data);
        }
    }

    public function addGallery()
    {
        $data['title'] = 'Add Gallery';
        $data['breadcrums'] = 'Add Gallery';
        $data['layout'] = "admin/website/add-gallery.php";
        $this->load->view('adm_base', $data);
    }

    public function insert_gallery()
    {
        $img = $this->upload_image('Gallery', 'image');
        $data = [
            'name' => $this->input->post('name'),
            'image' => $img['text'],
            'designation' => $this->input->post('designation'),
        ];


        $added = $this->db->insert('cms_gallery', $data);
        if ($added) {
            redirect('admin/website/manage_gallery');
        }
    }


    public function delete_gallery($id)
    {

        if (!empty($id)) {
            $deleted =  $this->db->where('id', $id)->delete('cms_gallery');
            if ($deleted) {
                redirect('admin/website/manage_gallery');
            }
        }
    }

    public function edit_gallery($id)
    {

        $data['title'] = 'Edit Gallery';
        $data['breadcrums'] = 'Edit Gallery';
        $data['gallery_data'] = $this->db->select('*')->from('cms_gallery')->where('id', $id)->get()->row();
        $data['layout'] = "admin/website/edit_gallery.php";
        $this->load->view('adm_base', $data);
    }

    public function update_gallery($id)
    {

        $get_img = $this->db->select('image')->from('cms_gallery')->where('id', $id)->get()->row();
        $get_old_img = $get_img->image;

        if (!empty($_FILES['image']['name'])) {

            // Delete old image
            if (!empty($old_image) && file_exists(FCPATH . $old_image)) {
                unlink(FCPATH . $old_image);
            }

            // Upload new image
            $upload = $this->upload_image('Gallery', 'image');

            if ($upload['icon'] == 'success') {
                $data['image'] = $upload['text'];
            } else {
                // Upload failed
                echo $upload['text'];
                exit;
            }
        }


        $data['name'] = $this->input->post('name');
        $data['designation'] = $this->input->post('designation');
        $updated = $this->db->where('id', $id)->update('cms_gallery', $data);
        if ($updated) {
            redirect('admin/website/manage_gallery');
        }
    }
}
