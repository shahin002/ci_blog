<?php
$blogger_id = $this->session->userdata('blogger_id');
$message = $this->session->userdata('message');
if ($message) {
    ?>
    <h4 class="alert_success"><?php echo $message; ?></h4>
    <?php
    $this->session->unset_userdata('message');
}
?>
    <form action="<?php echo base_url(); ?>manage_user_blog/save_blog" enctype="multipart/form-data" method="post">

    <article class="module width_full">
        <div class="module_content">
            <fieldset>
                <label>Title</label>
                <input type="text" name="blog_title" required=''>
            </fieldset>
            <fieldset>
                <label>Category</label>
                <select name="category_id">
                    <?php
                    foreach ($all_category as $v_category) {
                        ?>
                        <option value="<?php echo $v_category->category_id ?>"><?php echo $v_category->category_name ?></option>
                        <?php
                    }
                    ?>
                </select>
            </fieldset>
            <!--<input type="hidden" name="blogger_id" value="<?php echo $blogger_id; ?>">-->
            <fieldset>
                <label>Short Description</label>
                <textarea rows="4" name="blog_short_description" required=''></textarea>
            </fieldset>
            <fieldset>
                <label>Blog Description</label>
                <textarea rows="12" name="blog_description" required=''></textarea>
            </fieldset>
            <fieldset>
                <label>Upload Image</label>
                <input type="file" name="blog_image" required=''>
            </fieldset>


            <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Status</label>
                <input type="radio" name="publication_status" value="1" select>Published
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