<?php include 'header.php'; ?>
<!--         <section id="cta" class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 align-self-center">
                <h2>A digital marketing blog</h2>
                <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus rhoncus rutrum. Integer et ornare mauris.</p>
                <a href="#" class="btn btn-primary">Try for free</a>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="newsletter-widget text-center align-self-center">
                    <h3>Subscribe Today!</h3>
                    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                    <form class="form-inline" method="post">
                        <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                        <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="section lb mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">
                        <?php
                        $all_posts = "SELECT * FROM posts WHERE status = '1' ORDER BY p_id DESC";
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
                        <div class="blog-box wow fadeIn">
                            <div class="post-media">
                                <a href="single.php?id=<?php echo $p_id ;?>" title="">
                                    <img src="admin/images/posts/<?php echo $thumbnail; ?>" height="100" width="100" alt="Image resize" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div>
                                    <!-- end hover -->
                                </a>
                            </div>
                            <!-- end media -->
                            <div class="blog-meta big-meta text-center">
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    </div><!-- end post-sharing -->
                                    <h4><a href="single.php?id=<?php echo $p_id ;?>" title=""><?php echo $title; ?></a></h4>
                                    <p><?php echo substr($description, 0, 400).'....'; ?></p>
                                    <small><a href="category.php?cat_id=<?php echo $cat_id2 ;?>" title="">
                                        <?php
                                        echo findvalue('cat_name', 'category', 'cat_id', $category);
                                        ?>
                                    </a></small>
                                    <small><a href="#" title=""><?php echo $date; ?></a></small>
                                    <small><a href="#" title="">by <?php
                                        echo findvalue('u_name', 'users', 'u_id', $author);
                                    ?> </a></small>
                                    <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small> -->
                                    </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                    <hr class="invis">
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    
                                </div>
                            </div>
                            <hr class="invis">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    </div><!-- end col -->
                                    </div><!-- end row -->
                                    </div><!-- end col -->

            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <?php include 'sidebar.php'; ?>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php include 'footer.php'; ?>