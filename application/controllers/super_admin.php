<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

class Super_Admin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model','sa_model',TRUE);
        $this->load->model('welcome_model','w_model',TRUE);
        $admin_id = $this->session->userdata('admin_id');
        if($admin_id==NULL)
        {
            redirect('admin_login','refresh');
        }
    }
    
    public function index()
    {
        $data = array();
        $data['adminmaincontent'] = $this->load->view('admin/admin_home_content','',TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function category_form()
    {
        $data = array();
        $data['adminmaincontent'] = $this->load->view('admin/add_category_form','',TRUE);
        $this->load->view('admin/admin_master',$data); 
    }
    
    public function save_category()
    {
        $data = array();
        $data['category_name'] = $this->input->post('category_name',TRUE);
        $data['category_description'] = $this->input->post('category_description',TRUE);
        $data['publication_status'] = $this->input->post('publication_status',TRUE);
        $this->sa_model->save_category_info($data);
        $sdata = array();
        $sdata['message'] = 'Category saved successfully!';
        $this->session->set_userdata($sdata);
        
        redirect('super_admin/category_form');
    }
    
    public function all_category()
    {
        $data = array();
        $data['all_category'] = $this->sa_model->select_all_category_info();
        $data['adminmaincontent'] = $this->load->view('admin/category_grid',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function delete_category($category_id)
    {
        $this->sa_model->delete_category_info_by_category_id($category_id);
        $sdata = array();
        $sdata['message'] = 'Category deleted successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/all_category');
    }
    
    public function edit_category($category_id)
    {
        $data = array();
        $data['category_info'] = $this->sa_model->select_category_info_by_category_id($category_id);
        $data['adminmaincontent'] = $this->load->view('admin/edit_category_form',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function update_category()
    {
        $data = array();
        $category_id = $this->input->post('category_id',TRUE);
        $data['category_name'] = $this->input->post('category_name',TRUE);
        $data['category_description'] = $this->input->post('category_description',TRUE);
        $data['publication_status'] = $this->input->post('publication_status',TRUE);
        $this->sa_model->update_category_info($data,$category_id);
        $sdata = array();
        $sdata['message'] = 'Category updated successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_category/'.$category_id);
    }
    
    public function publish_category($category_id)
    {
        $this->sa_model->publish_category_info($category_id);
        redirect("super_admin/all_category");
    }
    
    public function unpublish_category($category_id)
    {
        $this->sa_model->unpublish_category_info($category_id);
        redirect("super_admin/all_category");
    }
    
    public function add_blog()
    {
        $data = array();
        $data['all_category'] = $this->w_model->select_all_published_category();
        //$data['editor'] = $this->data;
        $data['adminmaincontent'] = $this->load->view('admin/add_blog_form',$data,TRUE);
        $this->load->view('admin/admin_master',$data); 
    }
    
    public function save_blog()
    {
        $data = array();
        $data['blog_title'] = $this->input->post('blog_title',TRUE);
        $data['category_id'] = $this->input->post('category_id',TRUE);
        $data['blog_short_description'] = $this->input->post('blog_short_description',TRUE);
        $data['blog_description'] = $this->input->post('blog_description',TRUE);
        $data['blogger_name'] = $this->input->post('blogger_name',TRUE);
        $data['blogger_email_address'] = $this->input->post('blogger_email_address',TRUE);
        $data['publication_status'] = $this->input->post('publication_status',TRUE);
        $this->sa_model->save_blog_info($data);
        $sdata = array();
        $sdata['message'] = 'Blog saved successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_blog');
    }
    
    public function all_blog()
    {
        $data = array();
        $data['all_blog'] = $this->sa_model->select_all_blog_info();
        $data['adminmaincontent'] = $this->load->view('admin/blog_grid',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function delete_blog($blog_id)
    {
        $this->sa_model->delete_blog_info_by_blog_id($blog_id);
        $sdata = array();
        $sdata['message'] = 'Blog deleted successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/all_blog');
    }
    
    public function edit_blog($blog_id)
    {
        $data = array();
        //$data['editor'] = $this->data;
        $data['blog_info'] = $this->sa_model->select_blog_info_by_blog_id($blog_id);
        $data['all_category'] = $this->sa_model->select_all_category_info();
        $data['adminmaincontent'] = $this->load->view('admin/edit_blog_form',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function update_blog()
    {
        $data = array();
        $blog_id = $this->input->post('blog_id',TRUE);
        $data['category_id'] = $this->input->post('category_id',TRUE);
        $data['blog_title'] = $this->input->post('blog_title',TRUE);
        $data['blog_short_description'] = $this->input->post('blog_short_description',TRUE);
        $data['blog_description'] = $this->input->post('blog_description',TRUE);
        $data['blogger_name'] = $this->input->post('blogger_name',TRUE);
        $data['blogger_email_address'] = $this->input->post('blogger_email_address',TRUE);
        $data['publication_status'] = $this->input->post('publication_status',TRUE);
        $this->sa_model->update_blog_info($data,$blog_id);
        $sdata = array();
        $sdata['message'] = 'Blog updated successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_blog/'.$blog_id);
    }
    
    public function publish_blog($blog_id)
    {
        $this->sa_model->publish_blog_info($blog_id);
        redirect("super_admin/all_blog");
    }
    
    public function unpublish_blog($blog_id)
    {
        $this->sa_model->unpublish_blog_info($blog_id);
        redirect("super_admin/all_blog");
    }
    
    public function all_comments()
    {
        $data=array();
        $data['all_comments']=$this->sa_model->select_all_comments_info();
        $data['adminmaincontent']=$this->load->view('admin/comments_grid',$data,true);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function unpublish_comment($comments_id)
    {
       $this->sa_model->unpublish_comment_info($comments_id);
        redirect("super_admin/all_comments");
    }
    
    public function publish_comment($comments_id)
    {
       $this->sa_model->publish_comment_info($comments_id);
        redirect("super_admin/all_comments");
    }
    
     public function delete_comment($comment_id)
    {
        $this->sa_model->delete_comment_info($comment_id);
        $sdata = array();
        $sdata['message'] = 'Comment deleted successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/all_comments');
    }
    
    public function all_user()
    {
        $data = array();
        $data['all_user'] = $this->sa_model->select_all_user_info();
        $data['adminmaincontent'] = $this->load->view('admin/user_grid',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function delete_user($blogger_id)
    {
        $this->sa_model->delete_user_info($blogger_id);
        $sdata = array();
        $sdata['message'] = 'User deleted successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/all_user');
    }
    
    public function edit_user($blogger_id)
    {        
        $data = array();
        $data['user_info'] = $this->sa_model->select_user_info_by_blogger_id($blogger_id);
        $data['adminmaincontent'] = $this->load->view('admin/edit_user_form',$data,TRUE);
        $this->load->view('admin/admin_master',$data);
    }
    
    public function update_user()
    {
        $data = array();
        $blogger_id = $this->input->post('blogger_id',TRUE);
        $data['blogger_name'] = $this->input->post('blogger_name',TRUE);
        $data['blogger_email_address'] = $this->input->post('blogger_email_address',TRUE);
        $data['blogger_password'] = $this->input->post('blogger_password',TRUE);
        $this->sa_model->update_user_info($data,$blogger_id);
        $sdata = array();
        $sdata['message'] = 'User updated successfully!';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_user/'.$blogger_id);
    }

    public function logout()
    {
        session_destroy();
        $this->session->unset_userdata('admin_id');
        $data = array();
        $data['message']="You're successfully log out!";
        $this->session->set_userdata($data);
        redirect('admin_login');
    }
}

?>