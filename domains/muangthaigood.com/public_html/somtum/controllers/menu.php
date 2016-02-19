<div class="row ">
    <div class="col-md-12">
        <div id="foodmenu">
            <ul style="list-style-type: none;padding: 0;">
                <li class="hidden-sm hidden-xs"> 
                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image->getTbl() . " WHERE status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    $count_menu = 0;
                    echo "<p class='img-menu'>";
                    if ($numRow_image > 0) {

                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger<?= $count_menu == 0 ? '' : $count_menu ?>"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" style="width: 81px; height:63px;" class="img-rounded"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu'>";
                            }
                            ?>
                            <?php
                            $count_menu++;
                        }
                        ?>
                    <?php } ?>
                </li>
                <li style="padding: 0 10px 0 10px;" class="text-center-xs">
                    <h2><?= $_GET['lang'] == 'en' ? 'Papaya Salad' : 'ส้มตำ' ?></h2>
                    <?php
                    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 1 and status = 'ใช้งาน'";
                    $query1 = $db->Query($sql1);
                    $numRow1 = $db->NumRows($query1);
                    $xx = 0;
                    if ($numRow1 > 0) {
                        while ($row1 = $db->FetchArray($query1)) {
                            ?>
                            <p><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
                        <?php } ?>
                    <?php } ?>
                </li>
                <li style="padding: 0 10px 0 10px;" class="text-center-xs">
                    <h2><?= $_GET['lang'] == 'en' ? 'Chicken / Spicy / Grilled / Salad' : 'ไก่ ลาบ ย่าง ยำ' ?></h2>
                    <?php
                    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 2 and status = 'ใช้งาน'";
                    $query1 = $db->Query($sql1);
                    $numRow1 = $db->NumRows($query1);
                    $xx = 0;
                    if ($numRow1 > 0) {
                        while ($row1 = $db->FetchArray($query1)) {
                            ?>
                            <p><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
                        <?php } ?>
                    <?php } ?>

                </li>
                <li style="padding: 0 10px 0 10px;" class="text-center-xs">
                    <h2><?= $_GET['lang'] == 'en' ? 'Beverage' : 'เครื่องดื่ม' ?></h2>
                    <?php
                    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 3 and status = 'ใช้งาน'";
                    $query1 = $db->Query($sql1);
                    $numRow1 = $db->NumRows($query1);
                    $xx = 0;
                    if ($numRow1 > 0) {
                        while ($row1 = $db->FetchArray($query1)) {
                            ?>
                            <p ><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
                        <?php } ?>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</div>
<p class="hidden-lg hidden-md">&nbsp;</p>
<div class="row hidden-lg hidden-md">
    <?php
    $sql_image = "SELECT * FROM " . $menu_image->getTbl() . " WHERE status = 'ใช้งาน'";
    $query_image = $db->Query($sql_image);
    $numRow_image = $db->NumRows($query_image);
    $xx = 0;
    $count_menu = 1;
    if ($_GET['lang'] == 'en') {
        $txtClickDetail = "Click for see detail";
    } else {
        $txtClickDetail = "คลิกเพื่อดูรายละเอียด";
    }

    if ($numRow_image > 0) {

        while ($row_image = $db->FetchArray($query_image)) {
            $xx++;
            ?>

            <div class="col-xs-6" style="color: #000;"> 
                <div style="border: dashed 1px #606060;padding: 10px;" class="text-center-xs">
                    <a href="javascript:;" data-toggle="modal" data-target="#myModal<?= $count_menu ?>">  <img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" class="img-responsive margin-auto-xs">
                        <p ><span style="color: #ddd;"><?= $txtClickDetail ?></span> <img src="<?= ADDRESS ?>images/magnifier-tool.png" class=""></p>
                    </a>
                </div>
                <div id="myModal<?= $count_menu ?>" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" class="img-responsive"><br/>
                                <?= $_GET['lang'] == 'en' ? $row_image['detail_eng'] : $row_image['detail'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $count_menu++;
        }
        ?>
    <?php } ?>

</div>

<p>&nbsp;</p>
<script>
    $("div .img-menu:last-child").css("border-bottom", "none");

</script>
<span class="hidden-sm hidden-xs">
    <?php
    $sql2 = "SELECT * FROM " . $menu_image->getTbl() . " WHERE  status = 'ใช้งาน'";
    $query2 = $db->Query($sql2);
    $numRow2 = $db->NumRows($query2);
    $xx2 = 0;
    if ($numRow2 > 0) {
        while ($row2 = $db->FetchArray($query2)) {
            ?>
            <div id="pop-up<?= $xx2 == 0 ? '' : $xx2 ?>" class="pop-up-menu" style="padding: 10px;">
                <img src="<?= ADDRESS ?>img/<?= $row2['image'] ?>" class="img-responsive" /> 
                <?= $_GET['lang'] == 'en' ? $row2['detail_eng'] : $row2['detail'] ?>
            </div>

            <?php
            $xx2++;
        }
        ?>
    <?php } ?>
</span>

<?php
$sql2 = "SELECT * FROM " . $menu_image->getTbl() . " WHERE  status = 'ใช้งาน'";
$query2 = $db->Query($sql2);
$numRow2 = $db->NumRows($query2);
$xx2 = 0;
?>

<script type="text/javascript">
    $(document).ready(function () {

        var moveLeft = 20;
        var moveDown = 10;

<?php
if ($numRow2 > 0) {
    while ($row2 = $db->FetchArray($query2)) {
        ?>
                $('a#trigger<?= $xx2 == 0 ? '' : $xx2 ?>').hover(function (e) {

                    // console.log('ss');
                    $('div#pop-up<?= $xx2 == 0 ? '' : $xx2 ?>').show();
                }, function () {
                    $('div#pop-up<?= $xx2 == 0 ? '' : $xx2 ?>').hide();
                });

                $('a#trigger<?= $xx2 == 0 ? '' : $xx2 ?>').mousemove(function (e) {
                    $("div#pop-up<?= $xx2 == 0 ? '' : $xx2 ?>").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
                });

        <?php
        $xx2++;
    }
    ?>
<?php } ?>


    });

</script>



<script>
    function centerModal() {
        $(this).css('display', 'block');
        var $dialog = $(this).find(".modal-dialog");
        var offset = ($(window).height() - $dialog.height()) / 2;
        // Center modal vertically in window
        $dialog.css("margin-top", offset);
    }

    $('.modal').on('show.bs.modal', centerModal);
    $(window).on("resize", function () {
        $('.modal:visible').each(centerModal);
    });
</script>

