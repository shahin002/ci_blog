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
<form action="<?php echo base_url(); ?>super_admin/save_blog" method="post">
    <article class="module width_full">
        <header><h3>Add Blog</h3></header>
        <div class="module_content">
            <fieldset>
                <label>Title</label>
                <input type="text" name="blog_title">
            </fieldset>
            <fieldset>
                <label>Category</label>
                <select name="category_id">
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
                <textarea rows="4" name="blog_short_description"></textarea>
            </fieldset>
            <fieldset>
                <label>Blog Description</label>
                <textarea rows="12" name="blog_description" id="ck_editor"></textarea>
            </fieldset>
            <fieldset>
                <label>Blogger Name</label>
                <input type="text" name="blogger_name">
            </fieldset>
            <fieldset>
                <label>Blogger Email</label>
                <input type="text" name="blogger_email_address">
            </fieldset>
            <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Status</label>
                <input type="radio" name="publication_status" value="1">Published
                <input type="radio" name="publication_status" value="0">Unpublished
            </fieldset>
        </div>
        <footer>
            <div class="submit_link">

                <input type="submit" value="Save" class="alt_btn">
                <input type="reset" value="Reset">
            </div>
        </footer>
    </article><!-- end of post new article -->
</form>