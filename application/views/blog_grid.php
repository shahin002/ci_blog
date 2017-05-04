<?php $message = $this->session->userdata('message');
if ($message) {
    ?>
    <h4 class="alert_success"><?php echo $message; ?></h4>
    <?php
    $this->session->unset_userdata('message');
}
?>
<article class="module width_full">

    <header>
        <h3 class="tabs_involved">Blog Manager</h3>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr>
                        <th>CID</th>
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    foreach ($all_blog_by_blogger_id as $v_blog) {
                        ?>
                        <tr>
                            <td><?php echo $v_blog->category_id; ?></td>
                            <td><?php echo $v_blog->blog_title; ?></td>
                            <!--<td><img src="<?php $v_blog->blog_image;?>" width="200px" alt="Image"/></td>-->
                            <td><?php echo $v_blog->blog_short_description;?></td>
                            <td><img src="<?php echo base_url().$v_blog->blog_image;?>" width="50px;"></td>
                            <td>
                                <a href="<?php echo base_url(); ?>manage_user_blog/edit_blog/<?php echo $v_blog->blog_id; ?>"><input type="image" src="<?php echo base_url(); ?>img/icn_edit.png" title="Edit"></a>
                                <a href="<?php echo base_url(); ?>manage_user_blog/delete_blog/<?php echo $v_blog->blog_id; ?>" onclick="return checkdelete();"><input type="image" src="<?php echo base_url(); ?>img/icn_trash.png" title="Trash"></a>
                                <?php
                                if ($v_blog->publication_status == 0) {
                                ?>
                                <a href="<?php echo base_url();?>manage_user_blog/publish_blog/<?php echo $v_blog->blog_id?>"><input type="image" src="<?php echo base_url(); ?>img/icn_published.png" title="Publish"></a>
                                    <?php
                                } else {
                                    ?>
                                <a href="<?php echo base_url();?>manage_user_blog/unpublish_blog/<?php echo $v_blog->blog_id?>"><input type="image" src="<?php echo base_url(); ?>img/icn_unpublished.png" title="Unpublish"></a> 
                                <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->