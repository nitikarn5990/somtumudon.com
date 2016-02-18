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




    $footer->SetValues($arrData);



    if ($footer->GetPrimary() == '') {


        $footer->SetValue('created_at', DATE_TIME);


        $footer->SetValue('updated_at', DATE_TIME);
    } else {


        $footer->SetValue('updated_at', DATE_TIME);
    }



//$html = $_POST['google_map2'];
//
//
// $footer->SetValue('google_map', changeIframe($html));
    //	$footer->Save();


    if ($footer->Save()) {


        SetAlert('เพิ่ม แก้ไข ข้อมูลสำเร็จ', 'success');


        if ($redirect) {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'footer');


            die();
        } else {


            header('location:' . ADDRESS_ADMIN_CONTROL . 'footer&action=edit&id=' . $footer->GetPrimary());


            die();
        }
    } else {


        SetAlert('ไม่สามารถเพิ่ม แก้ไข ข้อมูลได้ กรุณาลองใหม่อีกครั้ง');
    }
}


if ($_GET['id'] != '' && $_GET['action'] == 'edit') {


    // For Update


    $footer->SetPrimary((int) $_GET['id']);


    // Try to get the information


    if (!$footer->GetInfo()) {


        SetAlert('ไม่สามารถค้นหาข้อมูลได้ กรุณาลองใหม่อีกครั้ง');


        $footer->ResetValues();
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
                <div class="da-panel-header"> <span class="da-panel-title"> <i class="icol-<?php echo ($footer->GetPrimary() != '') ? 'application-edit' : 'add' ?>"></i> <?php echo ($footer->GetPrimary() != '') ? 'แก้ไข' : 'เพิ่ม' ?> Footer </span> </div>
                <div class="da-panel-content da-form-container">
                    <form id="validate" enctype="multipart/form-data" action="<?php echo ADDRESS_ADMIN_CONTROL ?>footer<?php echo ($footer->GetPrimary() != '') ? '&action=edit&id=' . $footer->GetPrimary() : ''; ?>" method="post" class="da-form">
                        <?php if ($footer->GetPrimary() != ''): ?>
                            <input type="hidden" name="id" value="<?php echo $footer->GetPrimary() ?>" />
                            <input type="hidden" name="created_at" value="<?php echo $footer->GetValue('created_at') ?>" />
                        <?php endif; ?>
                        <div class="da-form-inline">
                            <div class="da-form-row">
                                <label class="da-form-label">ที่อยู่ (Thai)<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="address" id="address" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('address') : ''; ?>" />

                                </div>
                            </div>
                             <div class="da-form-row">
                                <label class="da-form-label">ที่อยู่ (English)<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="address_eng" id="address" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('address_eng') : ''; ?>" />

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">พิกัด<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="coordinates" id="coordinates" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('coordinates') : ''; ?>" />

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">Tel<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="tel" id="tel" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('tel') : ''; ?>" />

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">Facebook<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="facebook" id="facebook" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('facebook') : ''; ?>" />

                                </div>
                            </div>
                            <div class="da-form-row">
                                <label class="da-form-label">LineID<span class="required">*</span></label>
                                <div class="da-form-item large">
                                    <input type="text" name="line" id="line" class="span12 required" value="<?php echo ($footer->GetPrimary() != '') ? $footer->GetValue('line') : ''; ?>" />

                                </div>
                            </div>

                            <div class="btn-row">

                                <input type="submit" name="submit_bt" value="บันทึกข้อมูล และแก้ไขต่อ" class="btn btn-primary" />

                                </form>
                            </div>
                        </div>
                </div>
            </div>
        <?php } ?>

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
        <script type="text/javascript">
            $(document).ready(function () {
                $("iframe").width("100%").height("230");

            });
        </script>
