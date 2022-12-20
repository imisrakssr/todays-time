
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                
        <?php
                $all_posts = "SELECT * FROM posts WHERE status = '1' ORDER BY p_id DESC LIMIT 3";
                $posts_res = mysqli_query($conn,$all_posts);
                
                while ($row = mysqli_fetch_assoc($posts_res)){
                $p_id        = $row['p_id'];
                $title       = $row['title'];
                $thumbnail   = $row['thumbnail'];
                $date        = $row['date'];
                $description = $row['description'];
                $author      = $row['author'];
                $category    = $row['category'];
                $tags        = $row['tags'];
                $status      = $row['status'];
            ?>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <img src="admin/images/posts/<?php echo $thumbnail;?>" alt="" class="img-fluid float-left">
                        <h5 class="mb-1"><?php echo $title;?></h5>
                        <small><?php echo $date;?></small>
                    </div>
                </a>
            <?php
        }
                ?>
            </div>
        </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <!-- <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_01.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_02.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="upload/small_03.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
            <?php

                $cat_sel_sql = "SELECT * FROM category WHERE is_sub = '0' ORDER BY cat_name ASC";
                $cat_sel_res = mysqli_query($conn,$cat_sel_sql);

                while($row = mysqli_fetch_assoc($cat_sel_res)){
                $cat_id2     = $row['cat_id'];
                $cat_name   = $row['cat_name'];
                $cat_desc   = $row['cat_desc'];
                $is_sub     = $row['is_sub'];
                $cat_status = $row['cat_status'];

                $count = 0;

                //post count for each category
                $read_post_sql ="SELECT * FROM posts WHERE category = '$cat_id2'";
                $read_res = mysqli_query($conn,$read_post_sql);
                $count = mysqli_num_rows($read_res);

                ?> 
                <li><a href="category.php?cat_id=<?php echo $cat_id2 ;?>"><?php echo $cat_name; ?><span>(<?php echo $count; ?>)</span></a></li>

                <?php
                
                }
                ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; Israk. Design: <a href="http://html.design">Israk Blog</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

    <?php ob_end_flush(); ?>

</body>
</html>