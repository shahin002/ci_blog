<form name="edit_blog" action="<?php echo base_url(); ?>super_admin/update_user" method="post">
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
        <header><h3>Edit User Info</h3></header>
        <div class="module_content">
            <fieldset>
                <input type="hidden" name="blogger_id" value="<?php echo $user_info->blogger_id;?>">
                <label>User Name</label>
                <input type="text" name="blogger_name" value="<?php echo $user_info->blogger_name;?>">
            </fieldset>
            <fieldset>
                <label>Email</label>
                <input type="text" name="blogger_email_address" value="<?php echo $user_info->blogger_email_address;?>">
            </fieldset>
            <fieldset>
                <label>Password</label>
                <input type="text" name="blogger_password" value="<?php echo $user_info->blogger_password;?>">
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