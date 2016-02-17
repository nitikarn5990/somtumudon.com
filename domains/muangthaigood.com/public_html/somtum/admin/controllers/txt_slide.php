<?php
// If they are saving the Information	


if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {


    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


        $redirect = true;
    } else {


        $redirect = false;
    }

    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);


    $txt_slide->SetValues($arrData);



    if ($txt_slide->GetPrimary() == '') {


        $txt_slide->SetValue('created_at', DATE_TIME);


        $txt_slide->SetValue('updated_at', DATE_TIME);
    } else {


        $txt_slide->SetValue('updated_at', DATE_TIME);
    }


    if ($txt_slide->Save()) {


        //  SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

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
                    //$txt_slide->SetValue('slides_file_name', $newImage);
                    //  $txt_slide->SetValue('file_name', $newImage);
                    // $txt_slide->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image' => $newImage
                    );
                    $arrKey = array(
                        'id' => $txt_slide->GetValue('id')
                    );

                    // $txt_slide->SetValue('slides_id', $txt_slide->GetPrimary());
                    //$product_files->Save();


                    if ($txt_slide->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$txt_slide->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }

        ////////





        if ($redirect) {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'txt_slide');


            die();
        } else {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'txt_slide&action=edit&id=' . $txt_slide->GetPrimary());


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


    $txt_slide->SetValues($arrDel);

    // Remove the info from the DB


    if ($txt_slide->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $txt_slide->GetValue('image'))) {
            // Set alert and redirect
            SetAlert('Delete Data Success', 'success');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'txt_slide');
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'txt_slide');

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}





if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $txt_slide->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$txt_slide->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $txt_slide->ResetValues();
    }
}
?>
<?php if ($_GET['action'] == "add" || $_GET['action'] == "edit") { ?>
    <div class="row-fluid">
        <div class="span12">

            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($txt_slide->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($txt_slide->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> ภาพข้อความสไลด์ </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>txt_slide<?php echo ($txt_slide->GetPrimary() != '') ? '&id=' . $txt_slide->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($txt_slide->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $txt_slide->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $txt_slide->GetValue('created_at') ?>" />
                            <input type="hidden" name="image" value="<?php echo $txt_slide->GetValue('image') ?>" />
                        <?php endif; ?>
                        <div class="da-form-inline">
                            <div class="da-form-row">
                                <label class="da-form-label">ชื่อภาพ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="name" id="name" value="<?php echo ($txt_slide->GetPrimary() != '') ? $txt_slide->GetValue('name') : ''; ?>" class="span12 required" />
                                </div>
                            </div>

                            <div class="da-form-row">
                                <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                <div class="da-form-item large">
                                    <ul style=" list-style-type: none;" class="da-form-list">
                                        <ul>
                                            <li> 
                                                <span class="">
                                                    <?php if ($txt_slide->GetPrimary() != '') { ?>
                                                        <img src="<?php echo ADDRESS_SLIDES . $txt_slide->getDataDesc("image", "id = " . $txt_slide->GetPrimary()) ?>" alt="<?php echo $txt_slide->GetValue('alt') ?>" style="max-width: 100%;" class="img-thumbnail"> 
                                                    <?php } ?>
                                                </span> 
                                            </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">อัพโหลดไฟล์</label>
                                <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag</strong> </span>
                                    <input type="text" placeholder="" name="alt" value="<?php echo $txt_slide->GetValue('alt') ?>" >
                                    <input type="file" name="file_array[]" id="image"  class="span4"/>

                                    <label class="da-form-label"> <span class="required">*</span>ขนาดรูปภาพแนะนำ 812x230</label>

                                </div>
                            </div>
                           
                            <div class="da-form-row">
                                <label class="da-form-label">สถานะ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <ul class="da-form-list">
                                        <?php
                                        $getStatus = $txt_slide->get_enum_values('status');

                                        $i = 1;

                                        foreach ($getStatus as $status) {
                                            ?>
                                            <li>
                                                <input type="radio" name="status" id="status" value="<?php echo $status ?>" <?php echo ($txt_slide->GetPrimary() != "") ? ($txt_slide->GetValue('status') == $status) ? "checked=\"checked\"" : "" : ($i == 1) ? "checked=\"checked\"" : "" ?> class="required"/>
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
                            <a href="<?php echo ADDRESS_ADMIN_CONTROL ?>txt_slide" class="btn btn-danger">ยกเลิก</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row-fluid">
        <div class="span12">
            <?php
            // Report errors to the user


            Alert(GetAlert('error'));


            Alert(GetAlert('success'), 'success');
            ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-grid"></i> รูปภาพ ทั้งหมด </span> </div>
                <div class="da-panel-toolbar">
                    <div class="btn-toolbar">
                        <div class="btn-group"> <a class="btn" href="<?php echo ADDRESS_ADMIN_CONTROL ?>txt_slide&action=add"><i class="icol-add"></i> เพิ่มข้อมูล</a> </div>
                    </div>
                </div>
                <div class="da-panel-content da-table-container">
                    <table id="da-ex-datatable-sort" class="da-table" sort="0" order="asc" width="1000">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อภาพ</th>
                                <th>ภาพย่อย</th>
                                <th>สถานะ</th>
                                <th>แก้ไขล่าสุด</th>
                                <th>ลำดับ</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM " . $txt_slide->getTbl();


                            $query = $db->Query($sql);


                            while ($row = $db->FetchArray($query)) {
                                ?>
                                <tr>
                                    <td class="center" width="15"><?php echo $row['id']; ?></td>
                                    <td  width=""><?php echo $row['name']; ?></td>
                                    <td class="center"  width=""><img src="<?php echo $txt_slide->getDataDesc("image", "id = '" . $row['id'] . "'") == "" ? NO_IMAGE : ADDRESS_SLIDES . $txt_slide->getDataDesc("image", "id = '" . $row['id'] . "'") ?>" style="height:70px; width:150px;"></td>
                                    <td class="center" width=""><i class="icol-<?php echo ($row['status'] == 'ใช้งาน') ? 'accept' : 'cross' ?>" title="<?php echo $row['status'] ?>"></i></td>
                                    <td class="center" width=""><?php echo $functions->ShowDateThTime($row['updated_at']) ?></td>
                                    <td class="center" width=""><?php echo $row['sort']; ?></td>
                                    <td class="center"  width=""><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>txt_slide&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-small">แก้ไข / ดู</a> <a href="javascript:;" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>txt_slide&action=del&id=<?php echo $row['id'] ?>'
                                                        }" class="btn btn-danger btn-small">ลบ</a></td>
                                </tr>
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
