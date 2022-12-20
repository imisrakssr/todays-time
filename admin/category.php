<?php include 'inc/header.php'; ?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Category</h4>
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
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Add a new category</h3>
                <div>
                    <form class="mt-4" method="POST">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="cat_name" placeholder="Category Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Add a Parent Category</label>
                            <select class="form-control" name="sub_id">
                                <option>Select a parent category</option>
                                <?php
                                $parent_cat = "SELECT * FROM category WHERE is_sub = '0'";
                                $parent_res = mysqli_query($conn,$parent_cat);
                                while($row = mysqli_fetch_assoc($parent_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];
                                ?>
                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea type="text" rows="6" name="cat_desc" placeholder="Category Description" class="form-control"></textarea>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="submit" name="add_cat" value="Add Category" class="btn btn-md btn-info text-light">
                            </div>
                        </div>
                        
                    </form>
                    <?php
                    if(isset($_POST['add_cat'])){
                    $cat_name = $_POST['cat_name'];
                    $sub_id   = $_POST['sub_id'];
                    $cat_desc = $_POST['cat_desc'];
                    $insert_cat_sql = "INSERT INTO category(cat_name, cat_desc, is_sub, cat_status) VALUES ('$cat_name', '$cat_desc', '$sub_id', '1')";
                    $insert_cat_res = mysqli_query($conn,$insert_cat_sql);
                    if($insert_cat_res){
                    header('Location: category.php');
                    }else{
                    echo 'category insertion error!';
                    }
                    }
                    ?>
                </div>
            </div>
            <!-- edit form -->
            <?php
            if(isset($_GET['edit_id'])){
            $edit_id = $_GET['edit_id'];
            $edit_sql = "SELECT * FROM category WHERE cat_id = '$edit_id'";
            $edit_res = mysqli_query($conn,$edit_sql);
            $row = mysqli_fetch_assoc($edit_res);
            $e_cat_id     = $row['cat_id'];
            $e_cat_name   = $row['cat_name'];
            $e_cat_desc   = $row['cat_desc'];
            $e_is_sub     = $row['is_sub'];
            $e_cat_status = $row['cat_status'];
            ?>
            <div class="white-box analytics-info">
                <h3 class="box-title">Add a new category</h3>
                <div>
                    <form class="mt-4" method="POST">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="cat_name" placeholder="Category Name" class="form-control" required="required" value="<?php echo $e_cat_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Edit your Category</label>
                            <select class="form-control" name="sub_id">
                                <option>Select a parent category</option>
                                <?php
                                $parent_cat = "SELECT * FROM category WHERE is_sub = '0'";
                                $parent_res = mysqli_query($conn,$parent_cat);
                                while($row = mysqli_fetch_assoc($parent_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];
                                if($e_is_sub!=0){
                                ?>
                                <option value="<?php echo $cat_id; ?>" <?php if($e_is_sub == $cat_id) echo 'selected'; ?>><?php echo $cat_name; ?></option>
                                <?php
                                }else{
                                ?>
                                <option value="<?php echo $e_cat_id; ?>"><?php echo $cat_name; ?></option>
                                <?php
                                }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea type="text" rows="6" name="cat_desc" placeholder="Category Description" class="form-control"><?php echo $e_cat_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Change Category Status</label>
                            <select class="form-control" name="cat_status">
                                <option value="1" <?php if($e_cat_status==1) echo 'selected';?>>Active</option>
                                <option value="0" <?php if($e_cat_status==0) echo 'selected';?>>Inactive</option>
                            </select>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="submit" name="update_cat" value="Update Category" class="btn btn-md btn-danger text-light">
                            </div>
                        </div>
                        
                    </form>
                    <?php
                    if(isset($_POST['update_cat'])){
                    $cat_name   = $_POST['cat_name'];
                    $sub_id     = $_POST['sub_id'];
                    $cat_desc   = $_POST['cat_desc'];
                    $cat_status = $_POST['cat_status'];
                    $update_sql = "UPDATE category SET cat_name='$cat_name', cat_desc='$cat_desc', is_sub='$sub_id', cat_status='$cat_status' WHERE cat_id='$edit_id'";
                    $update_res = mysqli_query($conn,$update_sql);
                    if($update_res){
                    header('Location: category.php');
                    }else{
                    die('update error!'.mysqli_error($conn));
                    }
                    }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">All Category</h3>
                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Category Name</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                $cat_sel_sql = "SELECT * FROM category WHERE is_sub = '0'";
                                $cat_sel_res = mysqli_query($conn,$cat_sel_sql);
                                $serial = 0;
                                while($row = mysqli_fetch_assoc($cat_sel_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];
                                $serial++;
                                
                                ?>

                                <tr>
                                    <td><?php echo $serial; ?></td>
                                    <td><?php echo $cat_name; ?></td>
                                    <td><?php echo $cat_desc; ?></td>
                                    <td>
                                        <?php
                                        if($cat_status == 1){
                                        echo '<span class="bagde bg-success text-light px-2">Active</span>';
                                        }
                                        if($cat_status == 0){
                                        echo '<span class="bagde bg-danger text-light px-2">Inactive</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                     <!-- Edit Button -->
                                        <a href="category.php?edit_id=<?php echo $cat_id; ?>" data-toggle="tooltip" data-placement="left" title="Edit"><i class="far fa-edit"></i></a>
                    <!-- Delete Button -->
                                        <a href="" data-toggle="tooltip" data-placement="right" title="Delete" data-bs-toggle="modal" data-bs-target="#delid<?php echo $cat_id; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delid<?php echo $cat_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-center text-danger" id="exampleModalLabel">Are you sure?</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a type="button" href="category.php?delid=<?php echo $cat_id; ?>" class="btn btn-primary text-light btn-danger">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                subcat_show($cat_id);
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
if(isset($_GET['delid'])){
$delid = $_GET['delid'];
$table = 'category';
$p_key = 'cat_id';
$redirect = 'category.php';
delete($table, $p_key, $delid, $redirect);
}
?>
<?php include 'inc/footer.php'; ?>