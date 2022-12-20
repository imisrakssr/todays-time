<?php include 'inc/header.php'; ?>
<style type="text/css">
/*tag design*/
.tags-input-wrapper{
background: transparent;
padding: 10px;
border-radius: 4px;
max-width: 400px;
border: 1px solid #ccc
}
.tags-input-wrapper input{
border: none;
background: transparent;
outline: none;
width: 140px;
margin-left: 8px;
}
.tags-input-wrapper .tag{
display: inline-block;
background-color: #fa0e7e;
color: white;
border-radius: 40px;
padding: 0px 3px 0px 7px;
margin-right: 5px;
margin-bottom:5px;
box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7)
}
.tags-input-wrapper .tag a {
margin: 0 7px 3px;
display: inline-block;
cursor: pointer;
}
/*image upload design*/
.thumb {
height: 75px;
border: 1px solid #000;
margin: 10px 5px 0 0;
}
</style>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">All Post Page</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal">Dashboard</a></li>
                </ol>
                
            </div>
        </div>
    </div>
    <!-- col-lg-12 -->
</div>
<?php
// if(isset($_GET['do'])){
//  $do = $_GET['do'];
// }else{
//  $do = 'view';
// }
$do = isset($_GET['do']) ? $_GET['do'] : 'view';
if($do == 'view'){
//view code
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">All Post Information</h3>
                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Thumbnail</th>
                                    <th class="border-top-0">Title</th>
                                    <!-- <th class="border-top-0">Description</th> -->
                                    <th class="border-top-0">Author</th>
                                    <th class="border-top-0">Category</th>
                                    <th class="border-top-0">Tags</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $all_posts = "SELECT * FROM posts";
                                $posts_res = mysqli_query($conn,$all_posts);
                                $serial = 0;
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
                                $serial++;
                                ?>
                                <tr>
                                    <td><?php echo $serial; ?></td>
                                    <td>
                                        <?php echo $date; ?>
                                    </td>
                                    <td>
                                        <img src="images/posts/<?php echo $thumbnail; ?>" width="140" style="border-radius: 5%;">
                                    </td>
                                    <td><?php echo substr($title, 0,40); ?></td>
                                    <!-- <td> -->
                                    <?php //echo substr($description, 0,100); ?>
                                    <!-- </td> -->
                                    <td>
                                        <?php
                                        $value = findvalue('u_name', 'users', 'u_id', $author);
                                        echo $value;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo findvalue('cat_name', 'category', 'cat_id', $category);
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $tags = explode(',', $tags);
                                        for($i=0; $i<count($tags);$i++){
                                        echo '<a href="" class="badge bg-info" style="text-decoration: underline; border-radius:8px; margin-right:6px; ">#'.$tags[$i].'</a>';
                                        }
                                        // foreach ($tags as $item) {
                                        //    echo $item;
                                        // }
                                        ?>
                                        
                                    </td>
                                    <td>
                                        <?php
                                        if($status == 1)
                                        echo '<span class="badge bg-success">Active</span>';
                                        else
                                        echo '<span class="badge bg-danger">Inactive</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="posts.php?do=edit&edit_id=<?php echo $p_id; ?>" data-toggle="tooltip" data-placement="left" title="Edit"><i class="far fa-edit"></i></a>
                                        <!-- Delete Button -->
                                        <a href="" data-toggle="tooltip" data-placement="right" title="Delete" data-bs-toggle="modal" data-bs-target="#delid<?php echo $p_id;?>"><i class="fas fa-trash-alt text-danger"></i></a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delid<?php echo $p_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center text-danger" id="exampleModalLabel">Are you sure?</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a type="button" href="posts.php?do=delete&delid=<?php echo $p_id; ?>" class="btn btn-primary text-light btn-danger">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php
}
if($do == 'add'){
//add code
?>
<div class="container-fluid">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add a new category</h3>
                    <div>
                        <div class="form-group my-3">
                            <label>Post title</label>
                            <input type="text" name="title" class="form-control" placeholder="post title">
                        </div>
                        <div class="form-group my-3">
                            <label>Post description</label>
                            <textarea id="content" name="content" class="form-control" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button> <a href="index.php" class="btn btn-dark">Back</a>
                        
                        <style type="text/css">
                        #mceu_27-body{
                        display: none !important;
                        }
                        </style>
                    </div>
                </div>
                <!-- edit form -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="white-box analytics-info">
                    <div class="mt-4">
                        <div class="form-group">
                            <label>Select a category</label>
                            <select class="form-control" name="posts_cat">
                                
                                <?php
                                $cat_sel_sql = "SELECT * FROM category WHERE is_sub = 0";
                                $cat_sel_res = mysqli_query($conn,$cat_sel_sql);
                                
                                while($row = mysqli_fetch_assoc($cat_sel_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];
                                echo '<option value="'.$cat_id.'">'.$cat_name.'</option>';
                                find_subcat($cat_id,'');
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Add Tags</label>
                            <style>
                            body{
                            font-family:'Segoe UI', Roboto, Oxygen, Ubuntu,   Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
                            }
                            </style>
                            <input type="text" id="tag-input1" placeholder="Enter tags..." name="tags">
                        </div>
                        <div class="form-group my-3">
                            <label>Upload Featured Image</label>
                            <br>
                            <input type="file" id="files" name="image" multiple />
                            <br>
                            <output id="list"></output>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    $userid = $_SESSION['u_id '];
    if(isset($_POST['submit'])){
    $title     = mysqli_real_escape_string($conn,$_POST['title']);
    $content   = mysqli_real_escape_string($conn,$_POST['content']);
    $posts_cat = $_POST['posts_cat'];
    $tags      = $_POST['tags'];
    //for file upload
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    // $file_name = $_FILES['image']['size'];
    // if($file_name > 3000000){
    // }
    //echo $file_name.$file_size;
    $extensions = array('png','jpg','jpeg');
    $splited_name = explode('.', $_FILES['image']['name']);
    $extn = strtolower(end($splited_name));
    if(in_array($extn, $extensions) === TRUE){
    $file_name = rand().$file_name;
    move_uploaded_file($file_tmp, 'images/posts/'.$file_name);
    $post_insert = "INSERT INTO posts (title,thumbnail,date,description,author,category,tags,status) VALUES ('$title', '$file_name', now(), '$content', '$userid', '$posts_cat', '$tags', '1')";
    $insert_post_res = mysqli_query($conn, $post_insert);
    if($insert_post_res){
    header('Location: posts.php');
    }else{
    echo 'post insertion error!';
    }
    }else{
    echo 'Please insert image in correct format';
    }
    }
    ?>
</div>
<?php
}
if($do == 'edit'){
//edit code
if(isset($_GET['edit_id'])){
$edit_id = $_GET['edit_id'];
//read all the information for that particular post ID
$all_posts = "SELECT * FROM posts WHERE p_id=$edit_id";
$posts_res = mysqli_query($conn,$all_posts);
$serial = 0;
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
}
?>
<div class="container-fluid">
    <form method="POST" action="posts.php?do=update" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Edit & update post</h3>
                    <div>
                        <div class="form-group my-3">
                            <label>Post title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="post title" value="<?php echo $title; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label>Post description</label>
                            <textarea id="content" name="content" class="form-control" rows="10"><?php echo $description; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        
                        <style type="text/css">
                        #mceu_27-body{
                        display: none !important;
                        }
                        </style>
                    </div>
                </div>
                <!-- edit form -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="white-box analytics-info">
                    <div class="mt-4">
                        <div class="form-group">
                            <label>Select a category</label>
                            <select class="form-control" name="posts_cat">
                                
                                <?php
                                $cat_sel_sql = "SELECT * FROM category WHERE is_sub = 0";
                                $cat_sel_res = mysqli_query($conn,$cat_sel_sql);
                                
                                while($row = mysqli_fetch_assoc($cat_sel_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];
                                // echo '<option value="'.$cat_id.'">'.$cat_name.'</option>';
                                ?>
                                <option value="<?php echo $cat_id; ?>"
                                    <?php
                                    if($category == $cat_id){
                                    echo 'selected';
                                    }
                                    ?>
                                ><?php echo $cat_name; ?></option>
                                <?php
                                
                                find_subcat($cat_id,$category);
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value="1" <?php if($status==1)echo 'selected'; ?>>Approve</option>
                                <option value="0" <?php if($status==0)echo 'selected'; ?>>Pending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Add Tags</label>
                            <style>
                            body{
                            font-family:'Segoe UI', Roboto, Oxygen, Ubuntu,   Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
                            }
                            </style>
                            <input type="text" placeholder="Enter tags..." name="tags" value="<?php echo $tags; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label>Upload Featured Image</label>
                            <br>
                            <?php
                            if(empty($thumbnail)){
                            echo 'No image found!';
                            }else{
                            ?>
                            <img src="images/posts/<?php echo $thumbnail; ?>" width="140"><br><br>
                            <?php
                            }
                            ?>
                            
                            <input type="file" id="files" name="image" multiple />
                            <br>
                            <output id="list"></output>
                        </div>
                        <input type="hidden" value="<?php echo $edit_id; ?>" name="userid">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
}
}
if($do == 'update'){
//update code
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$userid    = $_POST['userid'];
$title     = mysqli_real_escape_string($conn,$_POST['title']);
$content   = mysqli_real_escape_string($conn,$_POST['content']);
$posts_cat = $_POST['posts_cat'];
$tags      = $_POST['tags'];
$status    = $_POST['status'];
$file_name = $_FILES['image']['name'];
$file_tmp  = $_FILES['image']['tmp_name'];
$file_size = $_FILES['image']['size'];
if(empty($file_name)){
//no image selected
$post_update = "UPDATE posts SET title='$title', description='$content', category='$posts_cat', tags='$tags', status='$status' WHERE p_id='$userid'";
$update_post_res = mysqli_query($conn, $post_update);
if($update_post_res){
header('Location: posts.php');
}else{
echo 'post insertion error!';
}
}else{
$extensions = array('png','jpg','jpeg');
$splited_name = explode('.', $_FILES['image']['name']);
$extn = strtolower(end($splited_name));
if(in_array($extn, $extensions) === TRUE){
$file_name = rand().$file_name;

move_uploaded_file($file_tmp, 'images/posts/'.$file_name);
delete_file('thumbnail','posts','p_id',$userid,'posts');
$post_update = "UPDATE posts SET title='$title', thumbnail='$file_name',  description='$content', category='$posts_cat', tags='$tags', status='$status' WHERE p_id='$userid'";
$update_post_res = mysqli_query($conn, $post_update);
if($update_post_res){
header('Location: posts.php');
}else{
echo 'post insertion error!';
}
}else{
echo 'Please insert image in correct format';
}
}
}
}
if($do == 'delete'){
//delete code
if(isset($_GET['delid'])){
$delid = $_GET['delid'];
// delete file
delete_file('thumbnail','posts','p_id',$delid,'posts');
delete('posts', 'p_id', $delid, 'posts.php');
}
}
?>
<?php include 'inc/footer.php'; ?>