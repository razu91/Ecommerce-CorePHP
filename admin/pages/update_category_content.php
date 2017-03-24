
<?php
$category_id = $_GET['id'];
$result = $obj_admin->show_category_info($category_id);
$result_1 = mysqli_fetch_assoc($result);
//echo '<pre>';
//print_r($result_f);
//exit();


if (isset($_POST['btn'])) {
    $message = $obj_admin->update_category_info($_POST);
}
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category Form</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3>
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>

            </h3>
            <form name="edit_category_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" name="category_name" required class="span6 typeahead" id="typeahead" value="<?php echo $result_1['category_name']; ?>">
                            <input type="hidden" name="category_id" required class="span6 typeahead" id="typeahead" value="<?php echo $result_1['category_id']; ?>">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor" id="textarea2" rows="3"><?php echo $result_1['category_description']; ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option>---Select Publication Status---</option>
                                <option value="1">Published</option>
                                <option value="2">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Category Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

<script>
    document.forms['edit_category_form'].elements['publication_status'].value = '<?php echo $result_1['publication_status']; ?>';
</script>





