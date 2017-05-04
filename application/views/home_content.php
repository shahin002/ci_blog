<?php
    foreach ($all_blog as $v_blog)
    {
?>
<li class="blog-post">
    <section class="post-info-container">
        
        <img src="<?php echo base_url(). $v_blog->blog_image;?>" width="350px" alt="blog" />
<!-- <?php
//        $url =$v_blog->blog_image;
//        $deli = base_url();
//        $image_path = explode($deli,$url,2);
//               
//        echo $image_path[1];
//        ?>     -->   

        <ul class="post-info">
            <li class="date">
                <p>
                    <?php echo $v_blog->created_date_time;?>
                </p>
            </li>
        </ul>
    </section>

    <section class="post-body">
        <a href="<?php echo base_url();?>welcome/details/<?php echo $v_blog->blog_id?>">
            <h3><?php echo $v_blog->blog_title;?></h3>
        </a>

        <ul class="meta">
            <li>
                Posted by:
            </li>
            <li class="author">
                <a href="#"><?php echo $v_blog->blogger_name;?></a>
            </li>
<!--            <li class="comments-numb">
                <a href="#">0 comments</a>
            </li>-->
        </ul>

        <p>
            <?php echo $v_blog->blog_short_description;?>
        </p>

        <a href="<?php echo base_url();?>welcome/details/<?php echo $v_blog->blog_id?>" class="continue-reading">
            Read more &#187;
        </a>

    </section>
</li>
    <?php }?>

<?php echo $this->pagination->create_links();?>