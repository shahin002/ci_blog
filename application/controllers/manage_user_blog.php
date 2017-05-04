<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();

class Manage_User_Blog extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'u_model', TRUE);
        $this->load->model('welcome_model', 'w_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);

        $blogger_id = $this->session->userdata('blogger_id');
        if ($blogger_id == NULL) {
            redirect('welcome');
        }
    }

    public function add_blog() {
        $data = array();
        $data['title'] = "Add Blog";
        $data['all_category'] = $this->w_model->select_all_published_category();
        //$data['blogger_info'] = $this->w_model->select_blogger_by_blogger_id($blogger_id);
        $data['maincontent'] = $this->load->view('add_blog_form', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function save_blog() {
        $blogger_id = $this->session->userdata('blogger_id');
        $blogger_info = $this->w_model->select_blogger_by_blogger_id($blogger_id);
        $data = array();
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['category_id'] = $this->input->post('category_id', TRUE);
        $data['blogger_id'] = $blogger_id;
        $data['blog_short_description'] = $this->input->post('blog_short_description', TRUE);
        $data['blog_description'] = $this->input->post('blog_description', TRUE);

        $config['upload_path'] = 'img/post/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '3000';
        $config['max_height'] = '2000';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('blog_image')) {
            $error = $this->upload->display_errors();
        } else {
            $fdata = $this->upload->data();
            $data['blog_image'] = $config['upload_path'] . $fdata['file_name'];
        }
//        $data['blog_image'] = $this->sa_model->save_blog_image($data['image']);

        $data['blogger_name'] = $blogger_info->blogger_name;
        $data['blogger_email_address'] = $blogger_info->blogger_email_address;
        $data['publication_status'] = $this->input->post('publication_status', TRUE);
        $this->sa_model->save_blog_info($data);
        $sdata = array();
        $sdata['message'] = 'Blog saved successfully!';
        $this->session->set_userdata($sdata);
        redirect('manage_user_blog/add_blog/' . $data['blogger_id']);
    }

    public function view_blogs_by_blogger_id() {
        $data = array();
        $data['title'] = "View Blogs";
        $data['all_blog_by_blogger_id'] = $this->w_model->select_all_blog_by_blogger_id();
        $data['maincontent'] = $this->load->view('blog_grid', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function delete_blog($blog_id) {
        $image_info = $this->w_model->select_image_by_blog_id($blog_id);
        $image_path = explode(base_url(), base_url().$image_info->blog_image, 2);
        unlink($image_path[1]);

        $this->w_model->delete_blog_info_by_blog_id($blog_id);
        $sdata = array();
        $sdata['message'] = 'Blog deleted successfully!';
        $this->session->set_userdata($sdata);
        redirect('manage_user_blog/view_blogs_by_blogger_id');
    }

    public function edit_blog($blog_id) {
        $data = array();
        $data['title'] = "Edit Blog";
        $data['blog_info'] = $this->w_model->select_blog_by_blog_id($blog_id);
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('edit_blog_form', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function update_blog() {
        $data = array();
        $blog_id = $this->input->post('blog_id', TRUE);
        $data['category_id'] = $this->input->post('category_id', TRUE);
        $data['blog_title'] = $this->input->post('blog_title', TRUE);
        $data['blog_short_description'] = $this->input->post('blog_short_description', TRUE);
        $data['blog_description'] = $this->input->post('blog_description', TRUE);
        $data['publication_status'] = $this->input->post('publication_status', TRUE);
        $this->w_model->update_blog_info($data, $blog_id);
        $sdata = array();
        $sdata['message'] = 'Blog updated successfully!';
        $this->session->set_userdata($sdata);
//        redirect('manage_user_blog/edit_blog/' . $blog_id);
        redirect("manage_user_blog/view_blogs_by_blogger_id");
    }

    public function publish_blog($blog_id) {
        $this->w_model->publish_blog_info($blog_id);
        redirect("manage_user_blog/view_blogs_by_blogger_id");
    }

    public function unpublish_blog($blog_id) {
        $this->w_model->unpublish_blog_info($blog_id);
        redirect("manage_user_blog/view_blogs_by_blogger_id");
    }

}

?>