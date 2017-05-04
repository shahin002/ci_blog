<?php
$blogger_id = $this->session->userdata('blogger_id');
$blogger_name = $this->session->userdata('blogger_name');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title?></title>
        <meta name="description" content="Multipurpose Responsive Site Theme">
        <meta name="author" content="pixel-industry">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>img/favicon.png" />
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>img/favicon.png" />

        <!-- stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/userstyle.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/basic.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/prettyPhoto.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/login_style.css">

        <!-- navigation icons using "font awesome" -->
        <link rel="stylesheet" href="<?php echo base_url();?>Font-Awesome/css/font-awesome.css" />

        <!-- google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

        <!-- js files -->
        <script  src="<?php echo base_url();?>js/jquery-1.7.2.js"></script> <!-- jQuery 1.7.2 -->
        <script  src="<?php echo base_url();?>js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers -->
        <!--<script  src="<?php echo base_url();?>js/socialstream.jquery.js"></script>  Social Networks Feeds -->
        <script  src="<?php echo base_url();?>js/jquery.prettyPhoto.js"></script><!-- prettyPhoto -->
        <script  src="<?php echo base_url();?>js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
        <script  src="<?php echo base_url();?>js/portfolio.js"></script> <!-- portfolio custom options -->
        <script  src="<?php echo base_url();?>js/jquery.carouFredSel-6.0.0-packed.js"></script><!-- CarouFredSel carousel plugin -->
        <script  src="<?php echo base_url();?>js/include.js"></script> <!-- jQuery custom options -->
        <script src="<?php echo base_url();?>js/country.js"></script> <!-- Country list -->
        <script type="text/javascript">
            function checkdelete()
            {
                var chk = confirm("Are you sure to delete this record?");
                if(chk)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        </script>
        <!--[if (gte IE 6)&(lte IE 8)]>
            <script type="text/javascript" src="js/selectivizr.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- header start -->
        <header id="header" class="clearfix">

            <!-- logo start -->
            <section id="logo">
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>img/logo.png" alt="logo"/>
                </a>
            </section><!-- #logo end -->

            <!-- nav container start -->
            <section id="nav-container">

                <!-- main navigation start  -->
                <nav id="nav">
                    <ul class="nav nav-list">
                        <li>
                            <a href="<?php echo base_url();?>">
                                <i class="icon-nav icon-home"></i>
                                Home +
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>welcome/about">
                                <i class="icon-nav icon-star"></i>
                                About Us +</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>welcome/contact">
                                <i class="icon-nav icon-map-marker"></i>
                                Contact Us +</a>
                        </li>
                    </ul> 
                </nav><!-- main navigation end -->

            </section><!-- nav container end -->

            <!-- search start -->
<!--            <section id="search">
                <form action="#" method="get">
                    <input id="search-submit" type="submit" />
                    <input id="search-bkg" type="text" placeholder="Type and press enter.." />                   
                </form>
            </section> search end -->

        </header><!-- header end -->

        <!-- page-title start-->
        <section class="page-title-container">

            <!-- top shadow on container -->
            <div class="shadow-top"></div>

            <section class="page-title">
                <div class="title">
                    <h1><?php echo $title?></h1>
                </div>

                <ul class="breadcrumbs">
                    <li>
                        Welcome, <?php echo $blogger_name;?>
                    </li>
                        <?php if ($blogger_id != NULL)
                            {
                            ?>
                                <li>(<a href="<?php echo base_url(); ?>welcome/logout">Logout</a>)</li> &rtrif;&rtrif;
                                <li>
                                    <a href="<?php echo base_url();?>manage_user_blog/add_blog">Add new blog</a> | 
                                    <a href="<?php echo base_url();?>manage_user_blog/view_blogs_by_blogger_id">View blogs</a>
                                </li>
                        <?php }
                           else
                            {
                            ?>
                     <li>
                        <a href="<?php echo base_url();?>user/login">Login</a>/ 
                        <a href="<?php echo base_url();?>user/register">Register</a>
                     </li>
                         <?php } ?>
                </ul>                        
            </section>

            <div class="shadow-bottom"></div>
        </section>

        <!-- content start -->
        <div id="content-wrapper">

            <div class="container_12">

                <ul class="grid_9 content-sidebar-right">

                    <?php echo $maincontent;?>
                    
                </ul><!-- .content-sidebar-right end -->
                
                <?php if(isset($sidebar))
                {
                ?>
                <aside class="grid_3 aside">

                    <ul class="aside-widgets">

                        <li class="categories">
                            <h5>Categories</h5>
                            <ul class="arrow-list">
                                <?php
                                foreach ($all_category as $v_category){
                                ?>
                                <li><a href="<?php echo base_url();?>welcome/blog_by_category/<?php echo $v_category->category_id;?>"><?php echo $v_category->category_name;?></a></li>
                                <?php }?>
                            </ul>
                        </li><!-- categories widget end -->
                        
                        <!-- popular posts widget start -->
                        <li class="posts">
                            <h5>Popular blog</h5>
                            <ul>
                                <?php
                                foreach ($popular_blogs as $v_popular_blogs){
                                ?>
                                <li><a href="#"><?php echo $v_popular_blogs->blog_title;?></a></li>
                                <?php }?>
                            </ul>
                        </li><!-- popular posts widget end -->
                        
                        <!-- Recent posts widget start -->
                        <li class="posts">
                            <h5>Recent blog</h5>
                            <ul>
                                <?php
                                foreach ($recent_blogs as $v_recent_blogs){
                                ?>
                                <li><a href="#"><?php echo $v_recent_blogs->blog_title;?></a></li>
                                <?php }?>
                            </ul>
                        </li><!-- Recent posts widget end -->
                        
                        <li class="categories">
                            <h5>Blogger</h5>
                            <ul class="arrow-list">
                                <?php
                                foreach ($all_blogger as $v_blogger){
                                ?>
                                <li><a href="#"><?php echo $v_blogger->blogger_name;?></a></li>
                                <?php }?>
                            </ul>
                        </li><!-- categories widget end -->

                        <li class="tweets-feed">
                            <h5>Twitter widget</h5>
                            <div class="tweets-list-container aside">
                            </div>
                        </li>
                    </ul><!-- sidebar widgets end -->
                </aside><!-- sidebar end -->
                <?php } ?>
                
            </div><!-- container_12 end -->
        </div><!-- content wrapper end -->


        <!-- footer wrapper start -->
        <div id="footer-wrapper">

            <div class="shadow-top"></div>

            <footer id="footer" class="container_12">

                <!-- sliding text article start -->
                <article class="grid_3 jcarousellite carousel-article">
                    <h4>Sliding text article</h4>

                    <ul id="foo3" class="carousel-li">
                        <li>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error 
                                sit voluptatem accusantium doloremque laudantium, 
                                totam rem aperiam, eaque ipsa quae ab illo 
                                inventore veritatis et quasi.  
                            </p>
                        </li>

                        <li>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error 
                                sit voluptatem accusantium doloremque laudantium, 
                                totam rem aperiam, eaque ipsa quae ab illo 
                                inventore veritatis et quasi. 
                            </p>
                        </li>

                        <li>
                            <p>
                                Sed ut perspiciatis unde omnis iste natus error 
                                sit voluptatem accusantium doloremque laudantium, 
                                totam rem aperiam, eaque ipsa quae ab illo 
                                inventore veritatis et quasi. 
                            </p>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                    <div class="carousel-pagination" id="foo3_pag"></div>

                </article><!-- sliding text article end -->

                <!-- latest blog entries start -->
                <article class="grid_3">
                    <h4>Latest blog entries</h4>

                    <ul class="footer-blog">
                        <li>
                            <div class="meta">
                                <p>
                                    21 <br />
                                    <span class="date">JAN</span>
                                </p>
                            </div>
                            <div class="post">
                                <a href="blog.html">
                                    Sed ut perspiciatis unde omnis iste  |  
                                    <span class="light">Web design</span>
                                </a>
                            </div> 
                        </li> 

                        <li>
                            <div class="meta">
                                <p>
                                    22 <br />
                                    <span class="date">SEP</span>
                                </p>
                            </div>
                            <div class="post">
                                <a href="blog.html">
                                    Sed ut perspiciatis unde omnis iste  |  
                                    <span class="light">Photography</span>
                                </a>
                            </div> 
                        </li> 
                    </ul>
                </article><!-- latest blog entries end -->

                <!-- instagram feed start -->
                <article class="grid_3 social-feed instagram-feed">
                    <h4>Instagram photo stream</h4>
                </article><!-- instagram feed end -->


                <!-- contact start -->
                <article class="grid_3">
                    <h4>Contact us</h4>
                    <p>
                        You can reach us on social networks, or send us a message 
                        through our contact form <a href="contact.html" class="text-red">here.</a>
                    </p>

                    <ul class="social">
                        <li class="dribbble">
                            <a href="#">dribbble</a>
                        </li>

                        <li class="facebook">
                            <a href="#">facebook</a>
                        </li>

                        <li class="pinterest">
                            <a href="#">pinterest</a>
                        </li>

                        <li class="twitter">
                            <a href="#">twitter</a>
                        </li>
                    </ul>
                </article><!-- contact end -->
            </footer><!-- footer end -->

            <!-- copyright container start -->
            <section class="copyright-container">

                <div class="copyright container_12">
                    <p>
                        Copyright CloudBlog 2013. All rights reserved. Developed by 
                        <span class="text-red"><a href="http://www.facebook.com/1Piash" target="_blank">Towfiq Piash</a></span>
                    </p>
                </div>
            </section><!-- copyright container end -->
        </div><!-- footer wrapper end -->

        <script>
            $('.tweets-list-container').tweetscroll({
                username: 'pixel_industry',
                time: true,
                limit: 11,
                replies: true,
                position: 'append',
                date_format: 'style2',
                animation: 'slide_up',
                visible_tweets: 2
            });

            $("#foo3").carouFredSel({
                items: 1,
                auto: true,
                scroll: 1,
                pagination: "#foo3_pag"
            });

            //placeholder fix
            $('input[placeholder], textarea[placeholder]').placeholder();
        </script>
    </body>
</html>