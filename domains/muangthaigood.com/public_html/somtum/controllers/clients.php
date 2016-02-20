
<?php
@session_start();
if ($_POST ["submit_bt"] == 'Send') {
    $chk = 0;
    $cpt = $_POST['capt'];
    if ($cpt != $_SESSION['CAPTCHA']) {
        ?>
        <script> alert('Error code');</script>
        <?php
    } else {

        $chk = 1;
        $arrData = array();

        $arrData = $functions->replaceQuote($_POST);

        $contact_message->SetValues($arrData);

        if ($contact_message->GetPrimary() == '') {

            $contact_message->SetValue('created_at', DATE_TIME);

            $contact_message->SetValue('updated_at', DATE_TIME);
        } else {

            $contact_message->SetValue('updated_at', DATE_TIME);
        }

        $contact_message->SetValue('status', 'no read');

        // $contact_message->Save();

        if ($contact_message->Save()) {

            echo "<script>  alert('Send Success');</script>";
        } else {
            echo "<script>  alert('Error');</script>";
        }
    }
}
?>
<div class="row">
    <div id="content">
        <div class="col-xs-12">
            <p>
             <?php
            //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
            $model_detail = str_replace("../files", "../../files", $_GET['lang'] == 'en' ? $contact->getDataDesc('contact_detail_eng', 'id = 1') : $contact->getDataDesc('contact_detail', 'id = 1'));

            $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

            echo $html;
            ?>

            </p>
        </div>
        <p>&nbsp;</p>
        <div class="col-xs-12 col-md-6 pull-left">
            <div class="">
                <?= $contact->getDataDesc('google_map', 'id = 1') ?>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 pull-right">
            <div class="">
                <br>
                <form action="<?php echo ADDRESS ?>clients" method="post" class="form-send-msg">
                    <p>FULL NAME<br />
                        <span>
                            <input class="form-control" name="txt_name" type="text" required="required" value="<?= $chk == 0 ? $_POST['txt_name'] : '' ?>"/>
                        </span></p>
                    <p>EMAIL<br />
                        <span>
                            <input class="form-control" name="txt_email" type="email"  required="required" value="<?= $chk == 0 ? $_POST['txt_email'] : '' ?>" />
                        </span></p>
                    <p>PHONE<br />
                        <span>
                            <input class="form-control" name="txt_tel" type="number" required="required" value="<?= $chk == 0 ? $_POST['txt_tel'] : '' ?>"/>
                        </span></p>
                    <p>SUBJECT<br />
                        <span>
                            <input class="form-control" name="txt_subject" type="text" required="required" value="<?= $chk == 0 ? $_POST['txt_subject'] : '' ?>"/>
                        </span></p>
                    <p>YOUR MESSAGE<br />
                        <span>
                            <textarea class="form-control" name="txt_message" rows="7"><?= $chk == 0 ? $_POST['txt_message'] : '' ?></textarea>
                        </span>
                    </p>
                    <div class="col-xs-2">Enter Code </div>
                    <div class="col-xs-7"><input type="text" name="capt" id="capt" class="form-control" required=""/></div>
                    <div class="col-xs-3"> 
                        <span><img src="image_capt.php" id="mycapt"  align="absmiddle" />&nbsp;&nbsp;</span><img style="cursor: pointer;" class="" id="changeCpt" src="<?= ADDRESS ?>images/refresh-button.png" >
                    </div>
                    <p>&nbsp;</p>
                    <div class="col-xs-12"> 
                        <input id="submit" class="btn btn-default" name="submit_bt" style="width:80px; height:30px;color: #000;" type="submit" value="Send" />
                        <input name="reset" class="btn btn-default" style="width:80px; height:30px;color: #000;" type="reset" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="col-xs-12">
            <?= $contact->getDataDesc('script_fb', 'id = 1') ?>
        </div>
        <p>&nbsp;</p>
    </div>
</div>
<p>&nbsp;</p>
<script type="text/javascript">



    $('#changeCpt').click(function (e) {
        var v = Math.random();
        $('#mycapt').attr('src', 'image_capt.php?v=' + v);
    });

</script>