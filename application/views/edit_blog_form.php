<form name="edit_blog" action="<?php echo base_url(); ?>manage_user_blog/update_blog" method="post">
    <?php
    $message = $this->session->userdata('message');
    if($message)
    {
    ?>
    <h4 class="alert_success"><?php echo $message;?></h4>
    <?php
        $this->session->unset_userdata('message');
    }
    ?>
    <article class="module width_full">
        <header><h3>Edit Blog</h3></header>
        <div class="module_content">
            <fieldset>
                <label>Blog Title</label>
                <input type="hidden" name="blog_id" value="<?php echo $blog_info->blog_id;?>">
                <input type="text" name="blog_title" value="<?php echo $blog_info->blog_title;?>">
            </fieldset>
            <fieldset>
                <label>Category</label>
                <select name="category_id" id="category_id">
                    
                    <?php
                        foreach ($all_category as $v_category)
                        {
                    ?>
                    <option value="<?php echo $v_category->category_id?>"><?php echo $v_category->category_name?></option>
                    <?php
                        }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Short Description</label>
                <textarea rows="4" name="blog_short_description"><?php echo $blog_info->blog_short_description;?></textarea>
            </fieldset>
            <fieldset>
                <label>Blog Description</label>
                <textarea rows="12" name="blog_description"><?php echo $blog_info->blog_description;?></textarea>
            </fieldset>
            <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Status</label>
                <?php
                if($blog_info->publication_status==1)
                {
                ?>
                <input type="radio" name="publication_status" checked="checked" value="1">Published
                <input type="radio" name="publication_status" value="0">Unpublished
                <?php }
                else {
                ?>
                <input type="radio" name="publication_status" value="1">Published
                <input type="radio" name="publication_status" checked="checked" value="0">Unpublished
                <?php }?>
                
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">

                <input type="submit" value="Update" class="alt_btn">
                <input type="reset" value="Reset">
            </div>
        </footer>
    </article><!-- end of post new article -->
</form>
<script type="text/javascript">
    document.getElementById('category_id').value='<?php echo $blog_info->category_id;?>';
</script>