<?php

class User_Model extends CI_Model {
    //put your code here
    public function select_user($email_address, $password){
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $this->db->where('blogger_email_address', $email_address);
        $this->db->where('blogger_password', $password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function save_user_info($data){
        $this->db->insert('tbl_blogger',$data);
    }
    
}

?>