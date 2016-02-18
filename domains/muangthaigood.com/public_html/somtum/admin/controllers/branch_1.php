
<?php
// If they are saving the Information	





if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {


    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


        $redirect = true;
    } else {


        $redirect = false;
    }

    if ($_FILES["file_array_shop"]["name"][0] == "") {
        if ($_POST['image_shop'] == '') {
            SetAlert('กรุณาอัพโหลดภาพป้ายร้าน');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch&action=edit&id='.$_POST['id']);
            die();
        }
    }
    if ($_FILES["file_array_thai"]["name"][0] == "" ) {
        if ($_POST['image_map_thai'] == '' ) {
            SetAlert('กรุณาอัพโหลดภาพแผนที่ (Thai)');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch&action=edit&id='.$_POST['id']);
            die();
        }
    }
     if ($_FILES["file_array_eng"]["name"][0] == "") {
        if ( $_POST['image_map_eng'] == '') {
            SetAlert('กรุณาอัพโหลดภาพแผนที่ (English)');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch&action=edit&id='.$_POST['id']);
            die();
        }
    }


    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);

    if ($arrData['ref'] != "") {

        $arrData['name_ref'] = $functions->seoTitle($arrData['ref']);
    } else {

        $arrData['name_ref'] = $functions->seoTitle($arrData['name']);
    }

    $branch->SetValues($arrData);



    if ($branch->GetPrimary() == '') {


        $branch->SetValue('created_at', DATE_TIME);


        $branch->SetValue('updated_at', DATE_TIME);
    } else {


        $branch->SetValue('updated_at', DATE_TIME);
    }


    if ($branch->Save()) {


        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

        //อัพโหลดภาพ หน้าร้าน
        if (isset($_FILES['file_array_shop'])) {

            $Allfile = "";

            $Allfile_ref = "";

            //loop file array
            for ($i = 0; $i < count($_FILES['file_array_shop']['tmp_name']); $i++) {


                if ($_FILES["file_array_shop"]["name"][$i] != "") {


                    $targetPath = DIR_ROOT_SLIDES . "/";

                    $ext = explode('.', $_FILES['file_array_shop']['name'][$i]);
                    $extension = $ext[count($ext) - 1];
                    $rand = mt_rand(1, 100000);

                    $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                    //   die();
                    $cdir = getcwd(); // Save the current directory


                    chdir($targetPath);


                    copy($_FILES['file_array_shop']['tmp_name'][$i], $targetPath . $newImage);


                    chdir($cdir); // Restore the old working directory   
                    //$branch->SetValue('slides_file_name', $newImage);
                    //  $branch->SetValue('file_name', $newImage);
                    // $branch->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image_shop' => $newImage
                    );
                    $arrKey = array(
                        'id' => $branch->GetValue('id')
                    );

                    // $branch->SetValue('slides_id', $branch->GetPrimary());
                    //$product_files->Save();


                    if ($branch->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$branch->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }
        //อัพโหลดภาพ แผนที่
        if (isset($_FILES['file_array_thai'])) {

            $Allfile = "";

            $Allfile_ref = "";

            //loop file array
            for ($i = 0; $i < count($_FILES['file_array_thai']['tmp_name']); $i++) {


                if ($_FILES["file_array_thai"]["name"][$i] != "") {


                    $targetPath = DIR_ROOT_SLIDES . "/";

                    $ext = explode('.', $_FILES['file_array_thai']['name'][$i]);
                    $extension = $ext[count($ext) - 1];
                    $rand = mt_rand(1, 100000);

                    $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                    //   die();
                    $cdir = getcwd(); // Save the current directory


                    chdir($targetPath);


                    copy($_FILES['file_array_thai']['tmp_name'][$i], $targetPath . $newImage);


                    chdir($cdir); // Restore the old working directory   
                    //$branch->SetValue('slides_file_name', $newImage);
                    //  $branch->SetValue('file_name', $newImage);
                    // $branch->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image_map_thai' => $newImage
                    );
                    $arrKey = array(
                        'id' => $branch->GetValue('id')
                    );

                    // $branch->SetValue('slides_id', $branch->GetPrimary());
                    //$product_files->Save();


                    if ($branch->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$branch->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }
        if (isset($_FILES['file_array_eng'])) {

            $Allfile = "";

            $Allfile_ref = "";

            //loop file array
            for ($i = 0; $i < count($_FILES['file_array_eng']['tmp_name']); $i++) {


                if ($_FILES["file_array_eng"]["name"][$i] != "") {


                    $targetPath = DIR_ROOT_SLIDES . "/";

                    $ext = explode('.', $_FILES['file_array_eng']['name'][$i]);
                    $extension = $ext[count($ext) - 1];
                    $rand = mt_rand(1, 100000);

                    $newImage = DATE_TIME_FILE . $rand . "." . $extension;

                    //   die();
                    $cdir = getcwd(); // Save the current directory


                    chdir($targetPath);


                    copy($_FILES['file_array_eng']['tmp_name'][$i], $targetPath . $newImage);


                    chdir($cdir); // Restore the old working directory   
                    //$branch->SetValue('slides_file_name', $newImage);
                    //  $branch->SetValue('file_name', $newImage);
                    // $branch->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image_map_eng' => $newImage
                    );
                    $arrKey = array(
                        'id' => $branch->GetValue('id')
                    );

                    // $branch->SetValue('slides_id', $branch->GetPrimary());
                    //$product_files->Save();


                    if ($branch->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$branch->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }
        ////////

        if ($redirect) {
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch');
            die();
        } else {
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch&action=edit&id=' . $branch->GetPrimary());
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


    $branch->SetValues($arrDel);

    // Remove the info from the DB


    if ($branch->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $branch->GetValue('image'))) {
            // Set alert and redirect
            SetAlert('Delete Data Success', 'success');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'branch');
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'branch');

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}





if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $branch->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$branch->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $branch->ResetValues();
    }
}
?>
<?php if ($_GET['action'] == "add" || $_GET['action'] == "edit") { ?>
    <div class="row-fluid">
        <div class="span12">
            <?php
            // Report errors to the user


            Alert(GetAlert('error'));


            Alert(GetAlert('success'), 'success');
            ?>
            <div class="da-panel collapsible">
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($branch->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($branch->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> สาขา </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>branch<?php echo ($branch->GetPrimary() != '') ? '&id=' . $branch->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($branch->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $branch->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $branch->GetValue('created_at') ?>" />
                            <input type="hidden" name="image_shop" value="<?php echo $branch->GetValue('image_shop') ?>" />
                            <input type="hidden" name="image_map_thai" value="<?php echo $branch->GetValue('image_map_thai') ?>" />
                            <input type="hidden" name="image_map_eng" value="<?php echo $branch->GetValue('image_map_eng') ?>" />
                        <?php endif; ?>
                        <div class="da-form-inline">
                            <div class="da-form-row">
                                <label class="da-form-label">ชื่อสาขา (Thai)<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="name" id="name" value="<?php echo ($branch->GetPrimary() != '') ? $branch->GetValue('name') : ''; ?>" class="span12 required" />
                                    <label class="help-block">&nbsp;</label>
                                </div>
                                <label class="da-form-label">ชื่อสาขา (English)<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="name_eng" id="name" value="<?php echo ($branch->GetPrimary() != '') ? $branch->GetValue('name_eng') : ''; ?>" class="span12 required" />
                                    <label class="help-block"></label>
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">เบอร์โทร <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="tel" id="sort" value="<?php echo ($branch->GetPrimary() != '') ? $branch->GetValue('tel') : ''; ?>" class="span12 required" />
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">พิกัด <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="coordinates" id="sort" value="<?php echo ($branch->GetPrimary() != '') ? $branch->GetValue('coordinates') : ''; ?>" class="span12 required" />
                                </div>
                            </div>

                            <fieldset class="da-form-inline">
                                <legend><i class="fa fa-picture-o "></i>&nbsp;&nbsp;อัพโหลดภาพ ป้ายร้าน</legend>
                                <div class="da-form-row">
                                    <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                    <div class="da-form-item large">
                                        <ul style=" list-style-type: none;" class="da-form-list">
                                            <ul>
                                                <li> 
                                                    <span class="">
                                                        <?php if ($branch->GetPrimary() != '') { ?>
                                                            <img src="<?php echo ADDRESS_SLIDES . $branch->getDataDesc("image_shop", "id = " . $branch->GetPrimary()) ?>" alt="<?php echo $branch->GetValue('alt_shop') ?>" style="max-width: 100%;" class="img-polaroid"> 
                                                        <?php } ?>
                                                    </span> 
                                                </li>
                                            </ul>
                                    </div>
                                </div>

                                <div class="da-form-row">
                                    <label class="da-form-label">อัพโหลดไฟล์ <span class="required">*</span></label>
                                    <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag</strong> </span>
                                        <input type="text" placeholder="" name="alt_shop" value="<?php echo $branch->GetValue('alt_shop') ?>" >
                                        <input type="file" name="file_array_shop[]" id="image"  class="span4"/>

                                        <label class="da-form-label"> </label>

                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="da-form-inline">
                                <legend><i class="fa fa-map"></i>&nbsp;&nbsp;อัพโหลดภาพ แผนที่ (Thai) <span class="required" style="color: red;">*</span></legend>
                                <div class="da-form-row">
                                    <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                    <div class="da-form-item large">
                                        <ul style=" list-style-type: none;" class="da-form-list">
                                            <ul>
                                                <li> 
                                                    <span class="">
                                                        <?php if ($branch->GetPrimary() != '') { ?>
                                                            <img src="<?php echo ADDRESS_SLIDES . $branch->getDataDesc("image_map_thai", "id = " . $branch->GetPrimary()) ?>" alt="<?php echo $branch->GetValue('alt_thai') ?>" style="max-width: 100%;" class="img-polaroid"> 
                                                        <?php } ?>
                                                    </span> 
                                                </li>
                                            </ul>
                                    </div>
                                </div>

                                <div class="da-form-row">
                                    <label class="da-form-label">อัพโหลดไฟล์ <span class="required">*</span></label>
                                    <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag</strong> </span>
                                        <input type="text" placeholder="" name="alt_thai" value="<?php echo $branch->GetValue('alt_thai') ?>" >
                                        <input type="file" name="file_array_thai[]" id="image_map"  class="span4"/>

                                        <label class="da-form-label"> </label>

                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="da-form-inline">
                                <legend><i class="fa fa-map"></i>&nbsp;&nbsp;อัพโหลดภาพ แผนที่ (English) <span class="required" style="color: red;">*</span></legend>
                                <div class="da-form-row">
                                    <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                    <div class="da-form-item large">
                                        <ul style=" list-style-type: none;" class="da-form-list">
                                            <ul>
                                                <li> 
                                                    <span class="">
                                                        <?php if ($branch->GetPrimary() != '') { ?>
                                                            <img src="<?php echo ADDRESS_SLIDES . $branch->getDataDesc("image_map_eng", "id = " . $branch->GetPrimary()) ?>" alt="<?php echo $branch->GetValue('alt_eng') ?>" style="max-width: 100%;" class="img-polaroid"> 
                                                        <?php } ?>
                                                    </span> 
                                                </li>
                                            </ul>
                                    </div>
                                </div>

                                <div class="da-form-row">
                                    <label class="da-form-label">อัพโหลดไฟล์ <span class="required">*</span></label>
                                    <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag</strong> </span>
                                        <input type="text" placeholder="" name="alt_eng" value="<?php echo $branch->GetValue('alt_eng') ?>" >
                                        <input type="file" name="file_array_eng[]" id="image_map"  class="span4"/>

                                        <label class="da-form-label"> </label>

                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="da-form-inline">
                                <legend>&nbsp;&nbsp;</legend>
                            </fieldset>
                            <div class="da-form-row">
                                <label class="da-form-label">จัดลำดับ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="number" name="sort" id="sort" value="<?php echo ($branch->GetPrimary() != '') ? $branch->GetValue('sort') : '0'; ?>" class="span12 required" />
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">สถานะ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <ul class="da-form-list">
                                        <?php
                                        $getStatus = $branch->get_enum_values('status');


                                        $i = 1;

                                        foreach ($getStatus as $status) {
                                            ?>
                                            <li>
                                                <input type="radio" name="status" id="status" value="<?php echo $status ?>" <?php echo ($branch->GetPrimary() != "") ? ($branch->GetValue('status') == $status) ? "checked=\"checked\"" : "" : ($i == 1) ? "checked=\"checked\"" : "" ?> class="required"/>
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
                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล" class="btn btn-success" />
                            <input type="submit" name="submit_bt" value="บันทึกข้อมูล และแก้ไขต่อ" class="btn btn-primary" />
                            <a href="<?php echo ADDRESS_ADMIN_CONTROL ?>branch" class="btn btn-danger">ยกเลิก</a> </div>
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-grid"></i> สาขา ทั้งหมด </span> </div>
                <div class="da-panel-toolbar">
                    <div class="btn-toolbar">
                        <div class="btn-group"> <a class="btn" href="<?php echo ADDRESS_ADMIN_CONTROL ?>branch&action=add"><i class="icol-add"></i> เพิ่มข้อมูล</a> </div>
                    </div>
                </div>
                <div class="da-panel-content da-table-container">
                    <table id="da-ex-datatable-sort" class="da-table" sort="0" order="asc" width="1000">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อสาขา</th>
                                <th>ภาพป้ายร้าน</th>
                                <th>สถานะ</th>
                                <th>แก้ไขล่าสุด</th>
                                <th>ลำดับ</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM " . $branch->getTbl() . " ORDER BY sort ASC";


                            $query = $db->Query($sql);


                            while ($row = $db->FetchArray($query)) {
                                ?>
                                <tr>
                                    <td class="center" width="15"><?php echo $row['id']; ?></td>
                                    <td  width=""><?php echo $row['name']; ?></td>
                                    <td class="center"  width=""><img src="<?php echo $branch->getDataDesc("image_shop", "id = '" . $row['id'] . "'") == "" ? NO_IMAGE : ADDRESS_SLIDES . $branch->getDataDesc("image_shop", "id = '" . $row['id'] . "'") ?>" style="height:70px; width:150px;" class="img-polaroid"></td>
                                    <td class="center" width=""><i class="icol-<?php echo ($row['status'] == 'ใช้งาน') ? 'accept' : 'cross' ?>" title="<?php echo $row['status'] ?>"></i></td>
                                    <td class="center" width=""><?php echo $functions->ShowDateThTime($row['updated_at']) ?></td>
                                    <td class="center" width=""><?php echo $row['sort']; ?></td>
                                    <td class="center"  width=""><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>branch&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-small">แก้ไข / ดู</a> <a href="javascript:;" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                        document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>branch&action=del&id=<?php echo $row['id'] ?>'
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
