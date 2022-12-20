<?php include 'header.php'; ?>

<?php 

    $posts_per_page = 2; 
    $current_page = 1;  // default first page
    $total_posts = 0;  // total no of posts


    $all_posts = "SELECT * FROM posts WHERE status = '1'";
    $posts_res = mysqli_query($conn, $all_posts);
    $total_posts = mysqli_num_rows($posts_res);

    $current_page = isset($_GET['cp']) ? $_GET['cp'] : 1 ;

    $starting = $current_page * $posts_per_page - 2;

?>

        <section class="section lb mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-custom-build">

                                <?php 

                               // $c = $starting - 1;

                                $all_posts = "SELECT * FROM posts WHERE status = '1' ORDER BY p_id DESC LIMIT $starting,$posts_per_page";
                                $posts_res = mysqli_query($conn, $all_posts);
                                

                                while ($row = mysqli_fetch_assoc($posts_res)) {
                                    $p_id           = $row['p_id'];
                                    $title          = $row['title'];
                                    $thumbnail      = $row['thumbnail'];
                                    $date           = $row['date'];
                                    $description    = $row['description'];
                                    $author         = $row['author'];
                                    $category       = $row['category'];
                                    $tags           = $row['tags'];
                                    $status         = $row['status'];

                                    ?>

                                <div class="blog-box wow fadeIn">
                                    <div class="post-media">
                                        <a href="single.php?id=<?php echo $p_id;?>" title="">
                                            <img src="admin/images/posts/<?php echo $thumbnail;?>" alt="" class="img-fluid">
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
                                        <h4><a href="single.php?id=<?php echo $p_id;?>" title=""><?php echo $title;?></a></h4>
                                        <p><?php echo substr($description, 0 , 400).'....';?></p>
                                        <small><a href="category.php?cat_id=<?php echo $cat_id2;?>" title="">
                                            <?php
                                             echo findValue('cat_name', 'category', 'cat_id', $category);
                                            ?>
                                                
                                            </a></small>
                                        <small><a href="" title=""><?php echo $date;?></a></small>
                                        <small><a href="#" title="">by <?php
                                             echo findValue('u_name', 'users', 'u_id', $author);
                                            ?></a></small>
                                        <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small> -->
                                    </div><!-- end meta -->
                                </div>
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
                                        <?php 
                                            if($current_page != 1){
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="index.php?cp=<?php echo $current_page-1;?>">Prev</a>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                        
                                        <?php 

                                            $pages_no = ceil($total_posts/$posts_per_page);
                                            for($i=1;$i<=$pages_no;$i++){
                                                echo '<li class="page-item"><a class="page-link" href="index.php?cp='.$i.'">'.$i.'</a></li>';
                                            }

                                        ?>
                                        <?php 
                                            if($current_page != $pages_no){
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="index.php?cp=<?php echo $current_page+1;?>">Next</a>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                        
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <?php include 'sidebar.php'; ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

<?php include 'footer.php'; ?>