<?php

	include 'connection.php';

	function subcat_show($cat_id){

		global $conn;


		$cat_sel_sql = "SELECT * FROM category WHERE is_sub = $cat_id"; 
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
                                    <td><?php //echo $serial; ?></td>
                                    <td><?php echo '-'.$cat_name; ?></td>
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

                                        <a href="category.php?edit_id=<?php echo $cat_id; ?>" data-toggle="tooltip" data-placement="left" title="Edit"><i class="far fa-edit"></i></a>
                                        <a href="" data-toggle="tooltip" data-placement="right" title="Delete" data-bs-toggle="modal" data-bs-target="#delid<?php echo $cat_id; ?>"><i class="fas fa-trash-alt text-danger"></i></a>
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
                                }

	}



    function find_subcat($cat_id,$category){

        global $conn;

        $cat_sel_sql = "SELECT * FROM category WHERE is_sub = $cat_id"; 
                            $cat_sel_res = mysqli_query($conn,$cat_sel_sql);

                            $serial = 0;

                            while($row = mysqli_fetch_assoc($cat_sel_res)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];
                                $cat_desc   = $row['cat_desc'];
                                $is_sub     = $row['is_sub'];
                                $cat_status = $row['cat_status'];

                        // echo '<option value="'.$cat_id.'">-- '.$cat_name.'</option>';
                        ?>
                        <option value="<?php echo $cat_id; ?>"
                        <?php
                        if($category == $cat_id){
                        echo 'selected';
                        }
                        ?>
                        ><?php echo '--'.$cat_name; ?></option>
                        <?php
                    }

    }

//delete funtion
//table name, primary key, delete id, page name

    function delete($table, $p_key, $delid, $redirect){
        global $conn;

        $del_sql = "DELETE FROM $table WHERE $p_key = '$delid'"; 
        $del_res = mysqli_query($conn,$del_sql);

        if($del_res){
            header('Location: '. $redirect);
        }else{
            die($table.' delete error!'.mysqli_error($conn));
        }

    }

    //delete a file
    function delete_file($file_name,$table,$p_key,$delid,$folder){

        global $conn;

$file_sql = "SELECT $file_name FROM $table WHERE $p_key='$delid'";
$file_res = mysqli_query($conn,$file_sql);
$file_row = mysqli_fetch_assoc($file_res);
$file     = $file_row[$file_name];
unlink('images/'.$folder.'/'.$file);

    }

// find value
    function findvalue($col_name, $table, $key, $id){

        global $conn;

    $read_me = mysqli_query($conn,"SELECT $col_name FROM $table WHERE $key = '$id'");
    $row     = mysqli_fetch_assoc($read_me);
    $name    = $row[$col_name];
    return $name;

    }

//find submenu
    function submenu($cat_id){

        global $conn;

        $cat_sel_sql = "SELECT * FROM category WHERE is_sub = $cat_id ORDER BY cat_name ASC"; 
        $cat_sel_res = mysqli_query($conn,$cat_sel_sql);

        $serial = 0;
        ?> <div class="dropdown-menu"> <?php

            while($row = mysqli_fetch_assoc($cat_sel_res)){
                $cat_id     = $row['cat_id'];
                $cat_name   = $row['cat_name'];
                $cat_desc   = $row['cat_desc'];
                $is_sub     = $row['is_sub'];
                $cat_status = $row['cat_status'];
        ?> 

            <a class="dropdown-item" href="#"><?php echo $cat_name; ?></a>
                
                <?php
                        
                    }
        ?> </div> <?php

    }

?>