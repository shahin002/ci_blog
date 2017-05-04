<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//session_start();

class User extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model','u_model',TRUE);
        $this->load->model('welcome_model','w_model',TRUE);
        
        $blogger_id = $this->session->userdata('blogger_id');
        if($blogger_id!=NULL)
        {
            redirect('welcome');
        }
    }
    
//    public function index(){
//        $data = array();
//        $data['title'] = "User Login";
//        $data['maincontent'] = $this->load->view('login_form','',TRUE);
//        $this->load->view('master',$data);
//    }
    
    public function login()
    {
        $data = array();
        $data['title'] = "Login";
        $data['maincontent'] = $this->load->view('login_form', '', true);
        $this->load->view('master', $data);
    }
    
    public function check_login() {
        $email_address = $this->input->post('blogger_email_address', true);
        $password = $this->input->post('blogger_password', true);


        $result = $this->u_model->select_user($email_address, $password);

        if ($result) {
            $data = array();
            $data['blogger_id'] = $result->blogger_id;
            
            $data['blogger_name'] = $result->blogger_name;
            
            $this->session->set_userdata($data);
            redirect("welcome");
        } else {
            $sdata = array();
            $sdata['exception'] = "User ID or Password invalid.";
            $this->session->set_userdata($sdata);
            redirect("user/login");
        }
    }

    public function register()
	{
            $data = array();
            $data['title'] = "User Registration";
            $data['maincontent'] = $this->load->view('registration_form','',TRUE);
            $this->load->view('master',$data);
	}
    
    public function save_user()
    {
        $data = array();
        $data['blogger_name'] = $this->input->post('blogger_name',TRUE);
        $data['blogger_email_address'] = $this->input->post('blogger_email_address',TRUE);
        $data['blogger_password'] = $this->input->post('blogger_password',TRUE);
        $data['address'] = $this->input->post('address',TRUE);
        $data['country'] = $this->input->post('country',TRUE);
        $this->u_model->save_user_info($data);
        $sdata['message'] = "User registration successfull! Please log in";
        $this->session->set_userdata($sdata);
        redirect('user/login');
    }
	
	public function add_blog($blogger_id) {
        $data = array();
        $data['title'] = "Add Blog";
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['blogger_info'] = $this->w_model->select_blogger_by_blogger_id($blogger_id);
        $data['maincontent'] = $this->load->view('add_blog_form', $data, TRUE);
        $this->load->view('master', $data);
    }
    
}

?>