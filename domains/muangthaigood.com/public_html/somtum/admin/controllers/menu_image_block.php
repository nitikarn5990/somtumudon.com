<?php
// If they are saving the Information	





if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {


    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


        $redirect = true;
    } else {


        $redirect = false;
    }


    if ($_POST["post_action"] == "add") {
        if ($_FILES["file_array"]["name"][0] == "") {

            SetAlert('กรุณาอัพโหลดภาพ');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&action=add&number_block='.$_POST['number_block']);
            die();
        }
    }
    if ($_POST["post_action"] == "edit") {
        if ($_FILES["file_array"]["name"][0] == "") {
            if ($_POST['image'] == '') {
                SetAlert('กรุณาอัพโหลดภาพ');
                header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&action=edit&id=' . $_POST['id'].'&number_block='.$_POST['number_block']);
                die();
            }
        }
    }

    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);


    $menu_image_block->SetValues($arrData);



    if ($menu_image_block->GetPrimary() == '') {


        $menu_image_block->SetValue('created_at', DATE_TIME);


        $menu_image_block->SetValue('updated_at', DATE_TIME);
    } else {


        $menu_image_block->SetValue('updated_at', DATE_TIME);
    }


    if ($menu_image_block->Save()) {


        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

        if (isset($_FILES['file_array'])) {

            $Allfile = "";


            $Allfile_ref = "";

            //loop file array
            for ($i = 0; $i < count($_FILES['file_array']['tmp_name']); $i++) {


                if ($_FILES["file_array"]["name"][$i] != "") {


                    $targetPath = DIR_ROOT_SLIDES . "/";

                    $ext = explode('.', $_FILES['file_array']['name'][$i]);
                    $extension = $ext[count($ext) - 1];
                    $rand = mt_rand(1, 100000);

                    $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                    //   die();
                    $cdir = getcwd(); // Save the current directory


                    chdir($targetPath);


                    copy($_FILES['file_array']['tmp_name'][$i], $targetPath . $newImage);


                    chdir($cdir); // Restore the old working directory   
                    //$menu_image_block->SetValue('slides_file_name', $newImage);
                    //  $menu_image_block->SetValue('file_name', $newImage);
                    // $menu_image_block->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image' => $newImage
                    );
                    $arrKey = array(
                        'id' => $menu_image_block->GetValue('id')
                    );

                    // $menu_image_block->SetValue('slides_id', $menu_image_block->GetPrimary());
                    //$product_files->Save();


                    if ($menu_image_block->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$menu_image_block->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }

        ////////


        if ($redirect) {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&type=' . $menu_image_block->GetValue('name'));


            die();
        } else {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&action=edit&id=' . $menu_image_block->GetPrimary().'&number_block='.$_POST['number_block']);


            die();
        }
    } else {


        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}

// If Deleting the Page


if ($_GET['id'] != '' && $_GET['action'] == 'del') {


    // Get all the form data


    $arrDel = array('id' => $_GET['id']);


    $menu_image_block->SetValues($arrDel);

    // Remove the info from the DB


    if ($menu_image_block->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $menu_image_block->GetValue('image'))) {
            // Set alert and redirect
            SetAlert('Delete Data Success', 'success');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&number_block='.$_GET['number_block']);
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'menu_image_block&number_block='.$_GET['number_block']);

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}


if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $menu_image_block->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$menu_image_block->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $menu_image_block->ResetValues();
    }
}
?>
<?php
if ($_GET['action'] == "add" || $_GET['action'] == "edit") {
    ?>
    <div class="row-fluid">
        <div class="span12">
              <?php
            // Report errors to the user


            Alert(GetAlert('error'));


            Alert(GetAlert('success'), 'success');
            ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($menu_image_block->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($menu_image_block->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> ภาพ Block  <?= $_GET['number_block'] ?></span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>menu_image_block<?php echo ($menu_image_block->GetPrimary() != '') ? '&id=' . $menu_image_block->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($menu_image_block->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $menu_image_block->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $menu_image_block->GetValue('created_at') ?>" />
                            <input type="hidden" name="image" value="<?php echo $menu_image_block->GetValue('image') ?>" />
                            <input type="hidden" name="number_block" value="<?php echo $menu_image_block->GetValue('number_block') ?>" />
                        <?php endif; ?>
                        <input type="hidden" name="post_action" value="<?php echo $_GET['action'] ?>" />
                           <input type="hidden" name="number_block" value="<?php echo $_GET['number_block'] ?>" />
                        <div class="da-form-inline">
                            
                            <div class="da-form-row">
                                <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                <div class="da-form-item large">
                                    <ul style=" list-style-type: none;" class="da-form-list">
                                        <ul>
                                            <li> 
                                                <span class="">
                                                    <?php if ($menu_image_block->GetPrimary() != '') { ?>
                                                        <img src="<?php echo ADDRESS_SLIDES . $menu_image_block->getDataDesc("image", "id = " . $menu_image_block->GetPrimary()) ?>" alt="<?php echo $menu_image_block->GetValue('alt') ?>" style="max-width: 100%;" class="img-polaroid"> 
                                                    <?php } ?>
                                                </span> 
                                            </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">อัพโหลดไฟล์ <span class="required"> *</span></label>
                                <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag &nbsp;</strong> </span>
                                    <input type="text" placeholder="" name="alt" value="<?php echo $menu_image_block->GetValue('alt') ?>" >
                                    <input type="file" name="file_array[]" id="image"  class="span4"/>

                                    <label class="da-form-label"> <span class="required"></span></label>

                                </div>
                            </div>
                       
                            <div class="da-form-row">
                                <label class="da-form-label">รายละเอียดภาพ (Thai)<span class="required"> *</span></label>
                                <div class="da-form-item large">
                                    <textarea name="detail" id="detail" class="span12 tinymce required"><?php echo ($menu_image_block->GetPrimary() != '') ? $menu_image_block->GetValue('detail') : ''; ?></textarea>
                                    <label for="detail" generated="true" class="error" style="display:none;"></label>
                                </div>
                            </div>
                             <div class="da-form-row">
                                <label class="da-form-label">รายละเอียดภาพ (English)<span class="required"> *</span></label>
                                <div class="da-form-item large">
                                    <textarea name="detail_eng" id="detail_eng" class="span12 tinymce required"><?php echo ($menu_image_block->GetPrimary() != '') ? $menu_image_block->GetValue('detail_eng') : ''; ?></textarea>
                                    <label for="detail_eng" generated="true" class="error" style="display:none;"></label>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">จัดลำดับ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="number" name="sort" id="sort" value="<?php echo ($menu_image_block->GetPrimary() != '') ? $menu_image_block->GetValue('sort') : '0'; ?>" class="span12" />
                                </div>
                            </div>
                               <div class="da-form-row">
                                <label class="da-form-label">สถานะ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <ul class="da-form-list">
                                        <?php
                                        $getStatus = $menu_image_block->get_enum_values('status');
                                        $i = 1;

                                        foreach ($getStatus as $status) {
                                            ?>
                                            <li>
                                                <input type="radio" name="status" id="status" value="<?php echo $status ?>" <?php echo ($menu_image_block->GetPrimary() != "") ? ($menu_image_block->GetValue('status') == $status) ? "checked=\"checked\"" : "" : ($i == 1) ? "checked=\"checked\"" : "" ?> class="required"/>
                                                <label><?php echo $status ?></label>
                                            </li>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="btn-row">
                    
                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล และแก้ไขต่อ" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
   
    ?>
    <div class="row-fluid">
        <div class="span12">
            <?php
            // Report errors to the user


            Alert(GetAlert('error'));


            Alert(GetAlert('success'), 'success');
            ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-grid"></i> แก้ไขรูปภาพ Block <?=$_GET['number_block']?></span> </div>
                <div class="da-panel-toolbar">
                    <div class="btn-toolbar">
                        <div class="btn-group"> <a class="btn" href="<?php echo ADDRESS_ADMIN_CONTROL ?>menu_image_block&action=add&number_block=<?=$_GET['number_block']?>"><i class="icol-add"></i> เพิ่มข้อมูล</a> </div>
                    </div>
                </div>
                <div class="da-panel-content da-table-container">
                    <table id="da-ex-datatable-sort" class="da-table" sort="4" order="asc" width="1000">
                        <thead>
                            <tr>
                              <th>รหัส</th>
                                <th>รูปภาพ</th>
                                <th>สถานะ</th>
                                <th>แก้ไขล่าสุด</th>
                                <th>ลำดับ</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = ".$_GET['number_block'];


                            $query = $db->Query($sql);

                            $_count = 0;
                            while ($row = $db->FetchArray($query)) {
                                ?>
                               <tr>
                                    <td class="center" width="15"><?php echo $row['id']; ?></td>
                          
                                    <td class="center"  width=""><img src="<?php echo $menu_image_block->getDataDesc("image", "id = '" . $row['id'] . "'") == "" ? NO_IMAGE : ADDRESS_SLIDES . $menu_image_block->getDataDesc("image", "id = '" . $row['id'] . "'") ?>" style="max-height: 120px;" class="img-polaroid img-responsive"></td>
                                      <td class="center" width=""><i class="icol-<?php echo ($row['status'] == 'ใช้งาน') ? 'accept' : 'cross' ?>" title="<?php echo $row['status'] ?>"></i></td>
                                    <td class="center" width=""><?php echo $functions->ShowDateThTime($row['updated_at']) ?></td>
                                    <td class="center" width=""><?php echo $row['sort']; ?></td>
                                    <td class="center"  width=""><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>menu_image_block&action=edit&id=<?php echo $row['id'] ?>&type=<?= $_GET['type'] ?>&position=<?= $_count ?>&number_block=<?=$_GET['number_block']?>" class="btn btn-primary btn-small">แก้ไข / ดู</a> 
                                        <a href="javascript:;" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                        document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>menu_image_block&action=del&id=<?php echo $row['id'] ?>&number_block=<?=$_GET['number_block']?>'
                                                                }" class="btn btn-danger btn-small">ลบ</a>

                                    </td>
                                </tr>
                                <?php $_count = $_count + 1 ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script type="text/javascript">








    function addfile() {





        $("#filecopy:first").clone().insertAfter("div #filecopy:last");


    }


    function delfile() {


        //$("#filecopy").clone().insertAfter("div #filecopy:last");


        var conveniancecount = $("div #filecopy").length;


        if (conveniancecount > 2) {


            $("div #filecopy:last").remove();


        }


    }


//});





</script>
<style>


    /*Colored Label Attributes*/


    .label {


        background-color: #BFBFBF;


        border-bottom-left-radius: 3px;


        border-bottom-right-radius: 3px;


        border-top-left-radius: 3px;


        border-top-right-radius: 3px;


        color: #FFFFFF;


        font-size: 9.75px;


        font-weight: bold;


        padding-bottom: 2px;


        padding-left: 4px;


        padding-right: 4px;


        padding-top: 2px;


        text-transform: uppercase;


        white-space: nowrap;


    }





    .label:hover {


        opacity: 80;


    }





    .label.success {


        background-color: #46A546;


    }


    .label.success2 {


        background-color: #CCC;


    }


    .label.success3 {


        background-color: #61a4e4;





    }





    .label.warning {


        background-color: #FC9207;


    }





    .label.failure {


        background-color: #D32B26;


    }





    .label.alert {


        background-color: #33BFF7;


    }





    .label.good-job {


        background-color: #9C41C6;


    }








</style>
