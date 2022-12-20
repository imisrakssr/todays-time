<?php 

include 'admin/inc/connection.php';

$q = $_REQUEST['q'];
//read every title from database
	$all_posts = "SELECT * FROM posts WHERE status = '1' AND title LIKE '%$q%' ORDER BY p_id DESC";
    $posts_res = mysqli_query($conn,$all_posts);
    while ($row = mysqli_fetch_assoc($posts_res)){
        $p_id        = $row['p_id'];
        $title       = $row['title'];

        echo $title;
    }
                        


?>