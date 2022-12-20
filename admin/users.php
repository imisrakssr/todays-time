<?php include 'inc/header.php'; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
?>
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
            <h4 class="page-title">All Users Information</h4>
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
                <h3 class="box-title">All Users</h3>
                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Photo</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Profession</th>
                                    <th class="border-top-0">UserRole</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $all_users = "SELECT * FROM users";
                                $users_res = mysqli_query($conn,$all_users);
                                $serial = 0;
                                while ($row = mysqli_fetch_assoc($users_res)){
                                $u_id         = $row['u_id'];
                                $u_name       = $row['u_name'];
                                $u_mail       = $row['u_mail'];
                                $u_pass       = $row['u_pass'];
                                $u_photo      = $row['u_photo'];
                                $u_status     = $row['u_status'];
                                $u_type       = $row['u_type'];
                                $u_profession = $row['u_profession'];
                                $serial++;
                                ?>
                                <tr>
                                <td><?php echo $serial; ?></td>

                                <td><img src="images/users/<?php echo $u_photo; ?>" width="60" style="border-radius: 100%;"></td>
                                <td><?php echo $u_name; ?></td>
                                <td><?php echo $u_mail; ?></td>
                                <td><?php echo $u_profession; ?></td>
                                <td>
                                <?php
                                if($u_type == 0)
                                    echo '<span class="badge bg-info">Subscriber</span>';
                                else if($u_type == 1)
                                    echo '<span class="badge bg-success">Editor</span>';
                                else
                                    echo '<span class="badge bg-danger">Admin</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($u_status == 1)
                                        echo '<span class="badge bg-success">Active</span>';
                                        else
                                        echo '<span class="badge bg-danger">Inactive</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="users.php?do=edit&edit_id=<?php echo $u_id; ?>" data-toggle="tooltip" data-placement="left" title="Edit"><i class="far fa-edit"></i></a>
                                        <!-- Delete Button -->
                                        <a href="" data-toggle="tooltip" data-placement="right" title="Delete" data-bs-toggle="modal" data-bs-target="#delid<?php echo $u_id;?>"><i class="fas fa-trash-alt text-danger"></i></a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delid<?php echo $u_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center text-danger" id="exampleModalLabel">Are you sure?</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a type="button" href="users.php?do=delete&delid=<?php echo $u_id; ?>" class="btn btn-primary text-light btn-danger">Confirm</a>
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
                    <h3 class="box-title">Add a new user</h3>
                    <div>
                        <div class="form-group my-3">
                            <label>User Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group my-3">
                            <label>User Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="User Email" required="required">
                        </div>
                        <div class="form-group my-3">
                            <label>User Password</label>
                            <input type="text" id="pass" name="password" class="form-control" placeholder="Password" required="required">
                            <button class="btn btn-md btn-info mt-4" id="btn">Generate</button>
                        </div>
                        <div class="form-group">
                            <label>Set user role</label>
                            <select class="form-control" name="userrole">
                                <option value="0" selected>Subscriber</option>
                                <option value="1">Editor</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <input type="checkbox" name="sendmail" value="ON">
                            <label class="ms-1">Send mail with user info</label>
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
                    
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['submit'])){
    
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password2 = $_POST['password'];
    $userrole = $_POST['userrole'];
    // $sendmail = $_POST['sendmail'];

    $password = sha1($password2);

    if(isset($_POST['sendmail']) && $_POST['sendmail'] == 'ON'){
        //send mail to the user


  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'asir15-7842@diu.edu.bd';
  $mail->Password = 'fjdbitqcnambacbb';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('asir15-7842@diu.edu.bd');
  $mail->addAddress($email);
  $mail->isHTML(true);

  $mail->Subject = 'Your account has been successfully created!';
  $mail->Body = 'Your account info: Username: '.$email.' Password: '.$password2.'';

  $mail->send();
    }

    $add_user_sql = "INSERT INTO users (u_name,u_mail,u_pass,u_status,u_type) VALUES ('$name','$email','$password','1','$userrole')";
    $add_user_res = mysqli_query($conn,$add_user_sql);

    if ($add_user_res) {
        header('Location: users.php');
    }else{
        die('Adding user error!'.mysqli_error($conn));
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
      $title     = $_POST['title'];
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
    delete_file('u_photo','users','u_id',$userid,'users');


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
delete_file('u_photo','users','u_id',$delid,'users');

delete('users', 'u_id', $delid, 'users.php');
}
}
?>
<?php include 'inc/footer.php'; ?>
