<article class="module width_3_quarter">

    <header>
        <h3 class="tabs_involved">Comment Manager</h3>
    </header>

    <div class="tab_container">
        <div id="tab1" class="tab_content">
            <table class="tablesorter" cellspacing="0"> 
                <thead> 
                    <tr>
                        <th>UID</th> 
                        <th>Comments</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr> 
                </thead> 
                <tbody>
                    <?php
                    foreach ($all_comments as $v_comments) {
                        ?>
                        <tr>
                            <td><?php echo $v_comments->blogger_id; ?></td>
                            <td><?php echo $v_comments->comments;?></td>
                            <td>
                                <?php
                                    if($v_comments->publication_status==1)
                                    {
                                        echo "Published";
                                    }
                                    else{
                                        echo "Unpublished";
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="" onclick="return checkdelete();"><input type="image" src="<?php echo base_url(); ?>img/icn_trash.png" title="Trash"></a>
                                <?php
                                if ($v_comments->publication_status == 0) {
                                ?>
                                <a href=""><input type="image" src="<?php echo base_url(); ?>img/icn_published.png" title="Publish"></a>
                                    <?php
                                } else {
                                    ?>
                                <a href=""><input type="image" src="<?php echo base_url(); ?>img/icn_unpublished.png" title="Unpublish"></a> 
                                <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>
                </tbody> 
            </table>
        </div><!-- end of #tab1 -->

    </div><!-- end of .tab_container -->

</article><!-- end of content manager article -->