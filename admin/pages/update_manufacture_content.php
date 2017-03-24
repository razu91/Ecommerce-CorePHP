
<?php
$manufacture_id = $_GET['id'];
require 'functions.php';
$result = show_manufacture_info($manufacture_id);
$result_2 = mysqli_fetch_assoc($result);
//echo '<pre>';
//print_r($result_f);
//exit();


if (isset($_POST['btn'])) {
    $message = update_manufacture_info($_POST);
}
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Manufacture Form</h2>
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
            <form name="edit_manufacture_form" class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manufacture Name </label>
                        <div class="controls">
                            <input type="text" name="manufacture_name" required class="span6 typeahead" id="typeahead" value="<?php echo $result_2['manufacture_name']; ?>">
                            <input type="hidden" name="manufacture_id" required class="span6 typeahead" id="typeahead" value="<?php echo $result_2['manufacture_id']; ?>">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Manufacture Description</label>
                        <div class="controls">
                            <textarea name="manufacture_description" class="cleditor" id="textarea2" rows="3"><?php echo $result_2['manufacture_description']; ?></textarea>


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
                        <button type="submit" name="btn" class="btn btn-primary">Update Manufacture Info</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

<script>
    document.forms['edit_manufacture_form'].elements['publication_status'].value = "<?php echo $result_2['publication_status']; ?>";
</script>





