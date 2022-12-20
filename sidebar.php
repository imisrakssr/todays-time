<div class="sidebar" style="width: 403px;">
    <div class="widget">
        <h2 class="widget-title">Recent Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                
        <?php
                $all_posts = "SELECT * FROM posts WHERE status = '1' ORDER BY p_id DESC LIMIT 2";
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

    <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
        <ul>
            <?php

                $cat_sel_sql = "SELECT * FROM category ORDER BY cat_name ASC";
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


                                    
                                       <!--  <li><a href="#">Marketing <span>(21)</span></a></li>
                                        <li><a href="#">SEO Service <span>(15)</span></a></li>
                                        <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                        <li><a href="#">Make Money <span>(22)</span></a></li>
                                        <li><a href="#">Blogging <span>(66)</span></a></li>
                                        <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                        <li><a href="#">Video Tuts <span>(87)</span></a></li> -->
                                    </ul>
                                </div><!-- end link-widget -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Tags</h2>
        <div class="blog-list-widget">
            <div class="tags-group">
                
            <a href="">#Politcs</a>
            <a href="">#Fashion</a>
            <a href="">#Football</a>
            <a href="">#Entertainment</a>
            <a href="">#Education</a>
        
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->
</div><!-- end sidebar -->