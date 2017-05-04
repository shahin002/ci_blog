<?php

class Super_Admin_Model extends CI_Model {
    //put your code here
    public function save_category_info($data)
    {
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_category_info_by_category_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function select_category_info_by_category_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_category_info($data,$category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function publish_category_info($category_id)
    {
        $this->db->set('publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function unpublish_category_info($category_id)
    {
        $this->db->set('publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
        
    public function save_blog_info($data)
    {
        $this->db->insert('tbl_blog',$data);
    }
    
    public function select_all_blog_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_blog_info_by_blog_id($blog_id)
    {
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('tbl_blog');
    }
    
    public function select_blog_info_by_blog_id($blog_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id',$blog_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_blog_info($data,$blog_id)
    {
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog',$data);
    }
    
    public function publish_blog_info($blog_id)
    {
        $this->db->set('publication_status',1);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function unpublish_blog_info($blog_id)
    {
        $this->db->set('publication_status',0);
        $this->db->where('blog_id',$blog_id);
        $this->db->update('tbl_blog');
    }
    
    public function select_comments_by_id($blog_id)
    {
        $sql="SELECT * FROM tbl_comments WHERE blog_id='$blog_id'";
        $query_result=$this->db->query($sql);
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_comments_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_comments');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function unpublish_comment_info($comments_id)
    {
        $this->db->set('publication_status',0);
        $this->db->where('comments_id',$comments_id);
        $this->db->update('tbl_comments');
    }
    
    public function publish_comment_info($comments_id)
    {
        $this->db->set('publication_status',1);
        $this->db->where('comments_id',$comments_id);
        $this->db->update('tbl_comments');
    }
    
    public function delete_comment_info($comments_id)
    {
        $this->db->where('comments_id',$comments_id);
        $this->db->delete('tbl_comments');
    }
    
    public function select_all_user_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_user_info($blogger_id)
    {
        $this->db->where('blogger_id',$blogger_id);
        $this->db->delete('tbl_blogger');
    }
    
    public function select_user_info_by_blogger_id($blogger_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $this->db->where('blogger_id',$blogger_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function update_user_info($data,$blogger_id)
    {
        $this->db->where('blogger_id',$blogger_id);
        $this->db->update('tbl_blogger',$data);
    }

}

?>