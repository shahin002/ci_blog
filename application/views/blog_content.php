<?php
    $blogger_id = $this->session->userdata('blogger_id');
?>

<div class="container_12">

    <div class="grid_9 content-sidebar-right">

        <article class="blog-post single">
            <section class="post-info-container">
                <img src="<?php echo base_url().$single_blog->blog_image;?>" width="640px" alt="blog" />
            </section>

            <section class="post-body">
                <a href="#">
                    <h3><?php echo $single_blog->blog_title;?></h3>
                </a>
                <ul class="meta">
                    <li>
                        Posted by:
                    </li>
                    <li class="author">
                        <a href="#"><?php echo $single_blog->blogger_name;?></a>
                    </li>
<!--                    <li class="comments-numb">
                        <a href="blog-single.html">2 comments</a>
                    </li>-->
                    <li class="comments-numb">
                        <p>Posted at: <?php echo $single_blog->created_date_time;?></p>
                    </li>
                </ul>
                <p>
                    <br/><br/>
                    <?php echo $single_blog->blog_description;?> 
                </p>
            </section>
            
            
            <!-- post comments start -->
            <article class="post-comments">
                <h3>comments</h3>
                
                <?php
                foreach ($comments_by_blog_id as $comments)
                {
                ?>
                <!-- post comments list items start -->
                <ul class="comments-li">
                    <li>
                        <article class="comment">
                            
                            <div class="comment-meta">
                                <a href="#"><?php echo $comments->blogger_name;?></a>
                            </div>

                            <div class="comment-body">
                                <p><?php echo $comments->comments;?></p>
                            </div>
                        </article>
                    </li><!-- post comments list item end -->

                </ul><!-- post comments list items end -->
                <?php }?>
            </article><!-- post comments end -->
            
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
            <br/>
            <?php
            if($blogger_id)
            {
            ?>
             <!--comment form start--> 
            <section id="respond">
                <h3 id="reply-title">post a comment</h3>

                <form action="<?php echo base_url();?>welcome/post_comments" method="post">
                    <input type="hidden" name="blog_id" value="<?php echo $single_blog->blog_id;?>">
                    <input type="hidden" name="publication_status" value="0">
                    <input type="hidden" name="blogger_id" value="<?php echo $blogger_id;?>">
                    <fieldset class="message">
                        <label><span class="text-red">*</span> Comment:</label>
                        <textarea id="comment-message" name="comments" rows="8"></textarea>
                    </fieldset>
                    <input id="comment-reply" type="submit" value="Post your comment">

                </form>
                <div id="comment-response"></div>
            </section> 
             <!--comment form end--> 
            <?php }
            else {
            ?>
<p>Please <a href="<?php echo base_url();?>user/login">Login</a> to post your comment.</p>
            <?php }?>
        </article>
    </div><!-- .content-sidebar-right end -->
</div><!-- container_12 end -->