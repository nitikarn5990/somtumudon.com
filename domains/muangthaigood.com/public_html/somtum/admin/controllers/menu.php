<?php
// If they are saving the Information	

if ($_POST['submit_bt'] == 'บันทึกข้อมูล' || $_POST['submit_bt'] == 'บันทึกข้อมูล และแก้ไขต่อ') {

    if ($_POST['submit_bt'] == 'บันทึกข้อมูล') {


        $redirect = true;
    } else {
        $redirect = false;
    }

//    if ($_POST["post_action"] == "add") {
//        if ($_FILES["file_array"]["name"][0] == "") {
//
//            SetAlert('กรุณาอัพโหลดภาพสินค้า');
//            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu&action=add');
//            die();
//        }
//    }
//    if ($_POST["post_action"] == "edit") {
//        if ($_FILES["file_array"]["name"][0] == "") {
//            if ($_POST['image'] == '') {
//                SetAlert('กรุณาอัพโหลดภาพสินค้า');
//                header('location:' . ADDRESS_ADMIN_CONTROL . 'menu&action=edit&id=' . $_POST['id']);
//                die();
//            }
//        }
//    }

    $arrData = array();


    $arrData = $functions->replaceQuote($_POST);

    if ($arrData['ref'] != "") {

        $arrData['name_ref'] = $functions->seoTitle($arrData['ref']);
    } else {

        $arrData['name_ref'] = $functions->seoTitle($arrData['name']);
    }

    $menu->SetValues($arrData);

    if ($menu->GetPrimary() == '') {
        $menu->SetValue('created_at', DATE_TIME);
        $menu->SetValue('updated_at', DATE_TIME);
    } else {
        $menu->SetValue('updated_at', DATE_TIME);
    }

    if ($menu->Save()) {
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
                    //$menu->SetValue('slides_file_name', $newImage);
                    //  $menu->SetValue('file_name', $newImage);
                    // $menu->SetValue('alt', $_POST['alt']);
                    $arrData = array(
                        'image' => $newImage
                    );
                    $arrKey = array(
                        'id' => $menu->GetValue('id')
                    );

                    // $menu->SetValue('slides_id', $menu->GetPrimary());
                    //$product_files->Save();


                    if ($menu->updateSQL($arrData, $arrKey)) {

                        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');

                        //	$menu->ResetValues();
                    } else {


                        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
                    }
                }
            }
        }
        ////////

        if ($redirect) {
            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu');
            die();
        } else {
            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu&action=edit&id=' . $menu->GetPrimary());
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


    $menu->SetValues($arrDel);

    // Remove the info from the DB


    if ($menu->Delete()) {

        if (unlink(DIR_ROOT_SLIDES . $menu->GetValue('image'))) {
            // Set alert and redirect
            SetAlert('Delete Data Success', 'success');
            header('location:' . ADDRESS_ADMIN_CONTROL . 'menu');
        }

        // Set alert and redirect
        SetAlert('Delete Data Success', 'success');
        header('location:' . ADDRESS_ADMIN_CONTROL . 'menu');

        die();
    } else {


        SetAlert('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}

if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $menu->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$menu->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $menu->ResetValues();
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($menu->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($menu->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> รายการอาหร </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>menu<?php echo ($menu->GetPrimary() != '') ? '&id=' . $menu->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($menu->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $menu->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $menu->GetValue('created_at') ?>" />
                            <input type="hidden" name="image" value="<?php echo $menu->GetValue('image') ?>" />
                        <?php endif; ?>
                        <input type="hidden" name="post_action" value="<?php echo $_GET['action'] ?>" />
                        <div class="da-form-inline">

                            <div class="da-form-row">
                                <label class="da-form-label">ชื่อสินค้า (Thai)<span class="required"> *</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="name" id="name" value="<?php echo ($menu->GetPrimary() != '') ? $menu->GetValue('name') : ''; ?>" class="span12 required" />
                                </div>
                                <p>&nbsp;</p>
                                 <label class="da-form-label">ชื่อสินค้า (English)<span class="required"> *</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="name_eng" id="name" value="<?php echo ($menu->GetPrimary() != '') ? $menu->GetValue('name_eng') : ''; ?>" class="span12 required" />
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">หมวดหมู่ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <select id="category_id" name="category_id" class="span12 select2 required">
                                        <option value=""></option>
                                        <?php $category->CreateDataList("id", "category_name", "status='ใช้งาน'", ($menu->GetPrimary() != "") ? $menu->GetValue('category_id') : "") ?>
                                    </select>
                                </div>
                            </div>
                          
                            <div class="da-form-row">
                                <label class="da-form-label">ราคา<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="number" name="price" id="price" value="<?php echo ($menu->GetPrimary() != '') ? $menu->GetValue('price') : ''; ?>" class="span12 required" />
                                </div>
                            </div>

                            

                            <div class="da-form-row ">
                                <label class="da-form-label">ไฟล์ที่อัพโหลด</label>
                                <div class="da-form-item large">
                                    <ul style=" list-style-type: none;" class="da-form-list">
                                        <ul>
                                            <li> 
                                                <span class="">
                                                    <?php if ($menu->GetPrimary() != '') { ?>
                                                        <img src="<?php echo ADDRESS_SLIDES . $menu->getDataDesc("image", "id = " . $menu->GetPrimary()) ?>" alt="<?php echo $menu->GetValue('alt') ?>" style="max-width: 100%;" class="img-polaroid"> 
                                                    <?php } ?>
                                                </span> 
                                            </li>
                                        </ul>
                                </div>
                            </div>
                            <div class="da-form-row ">
                                <label class="da-form-label">อัพโหลดไฟล์ <span class="required">*</span></label>
                                <div class="da-form-item large" id="filecopy"> <span class="formNote"><strong>Alt tag</strong> </span>
                                    <input type="text" placeholder="" name="alt" value="<?php echo $menu->GetValue('alt') ?>" >
                                    <input type="file" name="file_array[]" id="image"  class="span4"/>

                                    <label class="da-form-label"> </label>

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">จัดลำดับ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="number" name="sort" id="sort" value="<?php echo ($menu->GetPrimary() != '') ? $menu->GetValue('sort') : '0'; ?>" class="span12" />
                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">สถานะ <span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <ul class="da-form-list">
                                        <?php
                                        $getStatus = $menu->get_enum_values('status');


                                        $i = 1;

                                        foreach ($getStatus as $status) {
                                            ?>
                                            <li>
                                                <input type="radio" name="status" id="status" value="<?php echo $status ?>" <?php echo ($menu->GetPrimary() != "") ? ($menu->GetValue('status') == $status) ? "checked=\"checked\"" : "" : ($i == 1) ? "checked=\"checked\"" : "" ?> class="required"/>
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
                            <a href="<?php echo ADDRESS_ADMIN_CONTROL ?>menu" class="btn btn-danger">ยกเลิก</a> </div>
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-grid"></i> รายการอาหาร ทั้งหมด </span> </div>
                <div class="da-panel-toolbar">
                    <div class="btn-toolbar">
                        <div class="btn-group"> <a class="btn" href="<?php echo ADDRESS_ADMIN_CONTROL ?>menu&action=add"><i class="icol-add"></i> เพิ่มข้อมูล</a> </div>
                    </div>
                </div>
                <div class="da-panel-content da-table-container">
                    <table id="da-ex-datatable-sort" class="da-table" sort="6" order="asc" width="1000">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                 <th>รูปภาพ</th>
                                <th>ชื่อสินค้า</th>
                                <th>หมวดหมู่</th>
                                <th>ราคา</th>
                                <th>สถานะ</th>
                                <th>แก้ไขล่าสุด</th>
                                <th>ลำดับ</th>
                                <th>ตัวเลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM " . $menu->getTbl() . " ORDER BY sort ASC";


                            $query = $db->Query($sql);


                            while ($row = $db->FetchArray($query)) {
                                ?>
                                <tr>
                                    <td class="center" width=""><?php echo $row['id']; ?></td>
                                    <td  width="" style="width: 15%;"><img src="<?=ADDRESS?>img/<?php echo $row['image']; ?>" class="img-responsive img-polaroid"></td>
                                    <td  width="" style="width: 15%;"><?php echo $row['name']; ?></td>
                                    <td  width=""><?php echo $category->getDataDesc("category_name", "id =" . $row['category_id']) ?></td>
                                    <td  width="" style=""><?php echo $row['price']; ?></td>
                                    <td class="center" width=""><i class="icol-<?php echo ($row['status'] == 'ใช้งาน') ? 'accept' : 'cross' ?>" title="<?php echo $row['status'] ?>"></i></td>
                                    <td class="center" width=""><?php echo $functions->ShowDateThTime($row['updated_at']) ?></td>
                                    <td class="center" width=""><?php echo $row['sort']; ?></td>
                                    <td class="center"  width=""><a href="<?php echo ADDRESS_ADMIN_CONTROL ?>menu&action=edit&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-small">แก้ไข / ดู</a> <a href="javascript:;" onclick="if (confirm('คุณต้องการลบข้อมูลนี้หรือใม่?') == true) {
                                                        document.location.href = '<?php echo ADDRESS_ADMIN_CONTROL ?>menu&action=del&id=<?php echo $row['id'] ?>'
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
