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
        <h3 class="tabs_involved">Comments Manager</h3>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr>
                        <th>Comments</th>
                        <th>Status</th> 
                        <th>Actions</th> 
                        <th>Change Status</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    foreach ($all_comments as $v_comments) {
                        ?>
                        <tr>
                            <td><?php echo $v_comments->comments; ?></td>
                            <td>
                        <?php
                        if ($v_comments->publication_status != 0) {
                            echo 'Published';
                        } else {
                            echo 'Unpublished';
                        }
                        ?>
                            </td> 
                            <td>
                                <a href="<?php echo base_url(); ?>super_admin/delete_comment/<?php echo $v_comments->comments_id; ?>" onclick="return checkdelete();"><input type="image" src="<?php echo base_url(); ?>img/icn_trash.png" title="Trash"></a>
                                
                            </td> 
                            <td>
                                <?php
                                if ($v_comments->publication_status == 0) {
                                ?>
                                <a href="<?php echo base_url();?>super_admin/publish_comment/<?php echo $v_comments->comments_id?>"><input type="image" src="<?php echo base_url(); ?>img/icn_published.png" title="Publish"></a>
                                    <?php
                                } else {
                                    ?>
                                <a href="<?php echo base_url();?>super_admin/unpublish_comment/<?php echo $v_comments->comments_id?>"><input type="image" src="<?php echo base_url(); ?>img/icn_unpublished.png" title="Unpublish"></a> 
                                <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->