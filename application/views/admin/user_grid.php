<?php
$message = $this->session->userdata('message');
if ($message) {
    ?>
    <h4 class="alert_success"><?php echo $message; ?></h4>
    <?php
    $this->session->unset_userdata('message');
}
?>
<article class="module width_3_quarter">

    <header>
        <h3 class="tabs_involved">User/Blogger Manager</h3>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr>
                        <th>Name</th>
                        <th>Email</th> 
                        <th>Password</th> 
                        <th>Action</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    foreach ($all_user as $v_user) {
                        ?>
                        <tr>
                            <td><?php echo $v_user->blogger_name; ?></td>
                            <td><?php echo $v_user->blogger_email_address; ?></td> 
                            <td><?php echo $v_user->blogger_password; ?></td> 
                            <td>
                                <a href="<?php echo base_url(); ?>super_admin/edit_user/<?php echo $v_user->blogger_id; ?>"><input type="image" src="<?php echo base_url(); ?>img/icn_edit.png" title="Edit"></a>
                                <a href="<?php echo base_url(); ?>super_admin/delete_user/<?php echo $v_user->blogger_id; ?>" onclick="return checkdelete();"><input type="image" src="<?php echo base_url(); ?>img/icn_trash.png" title="Trash"></a>
                            </td>
                        </tr>
                            <?php } ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->