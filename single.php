<?php include 'header.php'; ?> 

        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

            <?php

            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $all_posts = "SELECT * FROM posts WHERE p_id ='$id'";
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

    <div class="page-wrapper">
                <div class="blog-title-area">
                    <ol class="breadcrumb hidden-xs-down">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active"><?php echo $title; ?></li>
                    </ol>

                    <span class="color-yellow"><a href="marketing-category.html" title=""><?php
                    echo findvalue('cat_name', 'category', 'cat_id', $category);
                    ?></a></span>

                    <h3><?php echo $title; ?></h3>

                    <div class="blog-meta big-meta">
                        <small><a href="#" title=""><?php echo $date; ?></a></small>
                        <small><a href="#" title="">by <?php
                            echo findvalue('u_name', 'users', 'u_id', $author);
                        ?></a></small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                    </div><!-- end meta -->

                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div><!-- end post-sharing -->
                </div><!-- end title -->

                <div class="single-post-media">
                    <img src="admin/images/posts/<?php echo $thumbnail; ?>" alt="" class="img-fluid">
                </div><!-- end media -->

                <div class="blog-content">  
                    <div class="pp">
                        <?php echo $description; ?>
                    </div>
                </div><!-- end content -->

                <div class="blog-title-area">
                    <div class="tag-cloud-single">
                        <span>Tags</span>
                        <?php 
            $tags = explode(',', $tags);
                for($i=0; $i<count($tags);$i++){
                echo '<small><a href="#" title="">'.$tags[$i].'</a></small>';
                            }
                            ?>
                    </div><!-- end meta -->

                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div><!-- end post-sharing -->
                </div><!-- end title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="custombox authorbox clearfix">
                    <h4 class="small-title">About author</h4>

                    <?php

                    $all_users = "SELECT * FROM users WHERE u_id = '$author'";
                    $users_res = mysqli_query($conn,$all_users);

                        while ($row = mysqli_fetch_assoc($users_res)){
                        $u_id         = $row['u_id'];
                        $u_name       = $row['u_name'];
                        $u_mail       = $row['u_mail'];
                        $u_pass       = $row['u_pass'];
                        $u_photo      = $row['u_photo'];
                        $u_status     = $row['u_status'];
                        $u_type       = $row['u_type'];
                        $u_profession = $row['u_profession'];
                        ?>

                        <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <img src="admin/images/users/<?php echo $u_photo; ?>" alt="" class="img-fluid rounded-circle"> 
                        </div><!-- end col -->

                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                            <h4><a href="#"><?php echo $u_name; ?></a></h4>
                            <p><?php echo $u_profession; ?></p>

                            <div class="topsocial">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                            </div><!-- end social -->

                        </div><!-- end col -->
                    </div><!-- end row -->

                        <?php

                            }
                                ?>

                    
                </div><!-- end author-box -->

                <hr class="invis1">
                <div class="custombox clearfix">
                    <h4 class="small-title">You may also like</h4>
                    <div class="row">
                        
                    <?php
                    $all_posts = "SELECT * FROM posts WHERE status = '1' AND category = '$category' ORDER BY p_id DESC LIMIT 2";
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

                    <div class="col-lg-6">
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="single.php?id=<?php echo $p_id ;?>" title="">
                                        <img src="admin/images/posts/<?php echo $thumbnail; ?>" alt="" class="img-fluid">
                                        <div class="hovereffect">
                                            <span class=""></span>
                                        </div><!-- end hover -->
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <h4><a href="single.php?id=<?php echo $p_id ;?>" title=""><?php echo $title; ?></a></h4>
                                    <small><a href="category.php?cat_id=<?php echo $category ;?>" title="">
                                        <?php
                                        echo findvalue('cat_name', 'category', 'cat_id', $category);
                                        ?>
                                    </a></small>
                                    <small><a href="#" title=""><?php echo $date; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        </div><!-- end col -->

                    <?php
                }
                    ?>
                    </div><!-- end row -->
                </div><!-- end custom-box -->

                <hr class="invis1">


                <?php include 'comments.php'; ?>
            </div>

                <?php
            }
        }else{
            header('Location: admin/404.php');

        }
                ?>
                
                        



                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <?php include 'sidebar.php'; ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include 'footer.php'; ?>