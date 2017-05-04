<form action="<?php echo base_url(); ?>super_admin/save_category" method="post">
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
        <header><h3>Add Category</h3></header>
        <div class="module_content">
            <fieldset>
                <label>Category Name</label>
                <input type="text" name="category_name">
            </fieldset>
            <fieldset>
                <label>Category Description</label>
                <textarea rows="12" name="category_description"></textarea>
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