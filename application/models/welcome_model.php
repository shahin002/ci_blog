<?php

class Welcome_Model extends CI_Model {
    //put your code here
    public function select_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_published_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_published_blog_with_pagination($per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get('', $per_page, $offset);
        $result = $query_result->result();
        return $result;
    }

        public function select_blog_by_category_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('category_id',$category_id);
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function display_blog_by_category_pg($category_id, $per_page, $offset) {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('category_id', $category_id);
        $this->db->where('publication_status', 1);
        $this->db->order_by('blog_id', 'desc');
        $query_result = $this->db->get('', $per_page, $offset);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_blogger()
    {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_blogger_by_blogger_id($blogger_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $this->db->where('blogger_id',$blogger_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

        public function select_blog_by_blog_id($blog_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id',$blog_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_blog_by_blogger_id()
    {
        $blogger_id = $this->session->userdata('blogger_id');
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blogger_id',$blogger_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_blog_by_blogger_id($blogger_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blogger_id',$blogger_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_blog_by_blogger_id_pg($blogger_id, $per_page, $offset)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blogger_id',$blogger_id);
        $this->db->where('publication_status', 1);
        $query_result = $this->db->get('',$per_page,$offset);
        $result = $query_result->result();
        return $result;
    }

        //Limit Blog entries
    public function record_count() {
        return $this->db->count_all("tbl_blog");
      }
   
      public function fetch_blog_entries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_blog");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    //Limit Blog entries
    
    public function select_image_by_blog_id($blog_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('blog_id', $blog_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result; 
    }
    
    public function delete_blog_info_by_blog_id($blog_id)
    {
        $this->db->where('blog_id',$blog_id);
        $this->db->delete('tbl_blog');
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

    public function display_recent_blogs()
    {
        $sql = "SELECT * FROM tbl_blog WHERE publication_status=1 ORDER BY blog_id DESC LIMIT 0, 3";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function display_popular_blogs()
    {
        $sql = "SELECT * FROM tbl_blog WHERE publication_status=1 AND created_date_time > DATE_SUB(curdate(), INTERVAL 1 WEEK) ORDER BY counter DESC LIMIT 5";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function update_counter($blog_id)
    {
        $sql = "UPDATE tbl_blog SET counter = counter + 1, created_date_time = NOW() WHERE blog_id = ".$blog_id;
        $this->db->query($sql);
    }
    
    public function save_comments($data) {
        $this->db->insert('tbl_comments', $data);
    }
    
    public function display_comments_by_blog_id($blog_id)
    {
        $sql="SELECT b.blogger_name,c.comments FROM tbl_blogger as b,tbl_comments as c
          WHERE c.publication_status=1 AND c.blogger_id=b.blogger_id AND c.blog_id='$blog_id'";  
        
      $query_result = $this->db->query($sql);
      $result = $query_result->result();
      return $result;
    }
}

?>