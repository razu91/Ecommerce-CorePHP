<?php
if (isset($_GET['name'])) {
    $id = $_GET['id'];



    $message = $obj_admin->delete_category($id);
}

$query_result = $obj_admin->select_all_category_info();
?>




<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Category Forms</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>



            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td> <?php echo $row['category_id']; ?></td>
                            <td class="center"> <?php echo $row['category_name']; ?></td>
                            <td class="center"> <?php echo $row['category_description']; ?></td>
                            <td class="center">

                                <span class="label label-success">
                                    <?php
                                    if ($row['publication_status'] == 1) {
                                        echo $row['publication_status'] = 'Published';
                                    } else {
                                        echo $row['publication_status'] = 'Unpublished';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="update_category.php?id=<?php echo $row['category_id']; ?>">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?name=delete&id=<?php echo $row['category_id']; ?>" onclick=" return checkDelete();">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->