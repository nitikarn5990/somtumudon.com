
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div id="slide">
    <article class="demo_block">
        <img class="img-responsive margin-auto-xs" id="slide_top" src="<?= ADDRESS ?>img/<?= $head_image->getDataDesc('image', 'type = "contact"') ?>" />
</div>
<div id="bottomslide">
    <div class="sizebottomslide">
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="boxleft">
            <img class="img-responsive margin-auto-xs" src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc('image', 'name = "contact" AND position = "L"') ?>" />
        </div>
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="boxrigthfty">
            <img class="img-responsive margin-auto-xs" src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc('image', 'name = "contact" AND position = "R"') ?>" />
        </div>
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="clear"></div>
    </div>
</div>
<div id="content">
    <h1>
        <strong><?= $contact->getDataDescLastID('contact_title', 'id = 1') ?></strong>
    </h1>
    <div class="model_detail2">
        <p>
            <?php
            //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
            $model_detail = str_replace("../files", "../../files", $contact->getDataDescLastID('contact_detail', 'id = 1'));

            $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

            echo $html;
            ?>
        </p>
    </div>

    <div class="clear"></div>
    <div class="map">
        <?= $contact->getDataDescLastID('google_map', 'id = 1') ?>
    </div>
    <p class="hidden-lg hidden-md">&nbsp;</p>
    <div class="formemail">
        <form action="<?php echo ADDRESS ?>contact" method="post" class="form-send-msg">
            <p>FULL NAME<br />
                <span>
                    <input class="contactin" name="txt_name" type="text" required="required" value="<?= $chk == 0 ? $_POST['txt_name'] : '' ?>"/>
                </span></p>
            <p>EMAIL<br />
                <span>
                    <input class="contactin" name="txt_email" type="email"  required="required" value="<?= $chk == 0 ? $_POST['txt_email'] : '' ?>" />
                </span></p>
            <p>PHONE<br />
                <span>
                    <input class="contactin" name="txt_tel" type="number" required="required" value="<?= $chk == 0 ? $_POST['txt_tel'] : '' ?>"/>
                </span></p>
            <p>SUBJECT<br />
                <span>
                    <input class="contactin" name="txt_subject" type="text" required="required" value="<?= $chk == 0 ? $_POST['txt_tel'] : '' ?>"/>
                </span></p>
            <p>YOUR MESSAGE<br />
                <span>
                    <textarea class="area" name="txt_message" rows="7"><?= $chk == 0 ? $_POST['txt_message'] : '' ?>
                    </textarea>
                </span></p>
            <p> Enter Code
                <input type="text" name="capt" id="capt" required=""/>
                <span><img src="image_capt.php" id="mycapt"  align="absmiddle" />&nbsp;&nbsp;<i id="changeCpt" class="fa fa-refresh" style="vertical-align: middle;cursor: pointer;"></i></span>
                <img class="hidden" id="" src="https://www.e-cnhsp.sp.gov.br/GFR/imagens/refresh.png" > </p>
            
            <p>
                <input id="submit" name="submit_bt" style="width:80px; height:30px;" type="submit" value="Send" />
                <input name="reset" style="width:80px; height:30px;" type="reset" value="Reset" />
            </p>
        </form>
    </div>
</div>

<style>
    .form-send-msg p{
        margin-bottom: 10px;
    }
    #contant input{
        height: 20px;
        width: 300px;
    }
    #capt{
        width: 100px;
    }
    textarea{
        background-color: white;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script type="text/javascript">



    $('#changeCpt').click(function (e) {
        var v = Math.random();
        $('#mycapt').attr('src', 'image_capt.php?v=' + v);
    });

</script>
</div>



<script type="text/javascript">
    $(document).ready(function () {

        $("iframe").width("100%").height("450");
        if ($(window).width() < 992) {

        } else {
            $("#slide_top").width("100%").height("292");
        }

    });
</script> 

