<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('welcome_model', 'w_model', TRUE);
        $this->load->model('super_admin_model', 'sa_model', TRUE);
    }

    public function index() {        
        $data = array();
        $data['title'] = "Home";
        $data['sidebar'] = 1;
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blogger'] = $this->w_model->select_all_blogger();
        
        //Pagination starts
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'welcome/index/';
            $config['total_rows'] = count($this->w_model->select_all_published_blog());
            $config['per_page'] = '4';
            $config['full_tag_open'] = "<div class='templatemo_paging'>";
            $config['full_tag_close'] = "</div>";
            $this->pagination->initialize($config);
        //Pagination ends
        $data['all_blog'] = $this->w_model->select_all_published_blog_with_pagination($config['per_page'], $this->uri->segment(3));
        $data['recent_blogs'] = $this->w_model->display_recent_blogs();
        $data['popular_blogs'] = $this->w_model->display_popular_blogs();
        $data['maincontent'] = $this->load->view('home_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function blog_by_category($category_id) {
        $data = array();
        $data['title'] = "Blog by Category";
        $data['sidebar'] = 1;
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blogger'] = $this->w_model->select_all_blogger();
        
        //Pagination starts
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'welcome/blog_by_category/' . $category_id . '/';
            $config['total_rows'] = count($this->w_model->select_blog_by_category_id($category_id));
            $config['uri_segment'] = 4;
            $config['per_page'] = '4';
            $config['full_tag_open'] = "<div class='templatemo_paging'>";
            $config['full_tag_close'] = "</div>";
            $this->pagination->initialize($config);
        //Pagination ends
        $data['all_blog'] = $this->w_model->display_blog_by_category_pg($category_id, $config['per_page'], $this->uri->segment(4));
        $data['recent_blogs'] = $this->w_model->display_recent_blogs();
        $data['popular_blogs'] = $this->w_model->display_popular_blogs();
        $data['maincontent'] = $this->load->view('home_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function details($blog_id) {
        $data = array();
        $data['title'] = "Single Blog";
        $data['sidebar'] = 1;
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blogger'] = $this->w_model->select_all_blogger();
        $data['recent_blogs'] = $this->w_model->display_recent_blogs();
        $this->w_model->update_counter($blog_id);
        $data['popular_blogs'] = $this->w_model->display_popular_blogs();
        $data['single_blog'] = $this->w_model->select_blog_by_blog_id($blog_id);
        $data['comments_by_blog_id'] = $this->w_model->display_comments_by_blog_id($blog_id);
        $data['maincontent'] = $this->load->view('blog_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function post_comments() {
        $data = array();
        $data['blog_id'] = $this->input->post('blog_id', true);
        $data['blogger_id'] = $this->input->post('blogger_id', true);
        $data['comments'] = $this->input->post('comments', true);
        $data['publication_status'] = $this->input->post('publication_status', true);
        $this->w_model->save_comments($data);
        $sdata = array();
        $sdata['message'] = ' ........... Your comment is waiting for approval  ...........';
        $this->session->set_userdata($sdata);
        redirect('welcome/details/' . $data['blog_id']);
    }
    
    public function all_comments($blog_id)
    {
        $data=array();
        $data['blog_id']=$blog_id;
        $data['all_comments']=$this->w_model->display_comments_by_blog_id($blog_id);
        $data['adminmaincontent']=$this->load->view('admin/all_comments',$data,true);
        $this->load->view('admin/admin_master',$data);
    }

    
    
    
    public function display_blog_by_blogger_id($blogger_id)
    {
        $data = array();
        $data['title'] = "Blog by Blogger";
        $data['sidebar'] = 1;
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blogger'] = $this->w_model->select_all_blogger();
        
        //Pagination starts
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'welcome/display_blog_by_blogger_id/';
            $config['total_rows'] = count($this->w_model->select_all_published_blog());
            $config['per_page'] = '4';
            $config['full_tag_open'] = "<div class='templatemo_paging'>";
            $config['full_tag_close'] = "</div>";
            $this->pagination->initialize($config);
        //Pagination ends
        $data['all_blog'] = $this->w_model->select_blog_by_blogger_id_pg($blogger_id,$config['per_page'], $this->uri->segment(3));
        
        $data['recent_blogs'] = $this->w_model->display_recent_blogs();
        $data['popular_blogs'] = $this->w_model->display_popular_blogs();
        $data['maincontent'] = $this->load->view('home_content', $data, TRUE);
        $this->load->view('master', $data);
    }
    
    
    public function contact() {
        $data = array();
        $data['title'] = "Contact Us";
        $data['maincontent'] = $this->load->view('contact_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function about() {
        $data = array();
        $data['title'] = "About Us";
        $data['maincontent'] = $this->load->view('about_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('blogger_id');
        $this->session->unset_userdata('blogger_name');
        $ldata = array();
        $ldata['loggedout'] = "You are successfully logged out! Please Log in";
        $this->session->set_userdata($ldata);
        redirect("user/login");
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */