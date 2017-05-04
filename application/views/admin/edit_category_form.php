<form action="<?php echo base_url(); ?>super_admin/update_category" method="post">
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
        <header><h3>Edit Category</h3></header>
        <div class="module_content">
            <fieldset>
                <label>Category Name</label>
                <input type="hidden" name="category_id" value="<?php echo $category_info->category_id;?>">
                <input type="text" name="category_name" value="<?php echo $category_info->category_name;?>">
            </fieldset>
            <fieldset>
                <label>Category Description</label>
                <textarea rows="12" name="category_description"><?php echo $category_info->category_description;?></textarea>
            </fieldset>
            <fieldset> <!-- to make two field float next to one another, adjust values accordingly -->
                <label>Status</label>
                <?php
                if($category_info->publication_status==1)
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