<div class="row">
    <div class="col-md-12 hidden-sm hidden-xs">
        <div id="foodmenu">
            <ul>
                <!--Block 1 -->
                <li>

                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = 1 and status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    $count = 0;
                    echo "<p class='img-menu-block-1'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger<?= $count == 0 ? '' : $count ?>"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" alt="<?= $row_image['alt'] ?>" style="width: 81px;height: 63px;"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-1'>";
                            }
                            ?>
                            <?php
                            $count++;
                        }
                        ?>
                    <?php } ?>

                </li>
                <!--Block 2 -->
                <li>
                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = 2 and status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    echo "<p class='img-menu-block-2'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger<?= $count == 0 ? '' : $count ?>"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" alt="<?= $row_image['alt'] ?>" style="width: 81px;height: 63px;"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-2'>";
                            }
                            ?>
                            <?php
                            $count++;
                        }
                        ?>
                    <?php } ?>
                </li>

                <!--Block 3 -->
                <li>
                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = 3 and status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    echo "<p class='img-menu-block-3'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger<?= $count == 0 ? '' : $count ?>"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" alt="<?= $row_image['alt'] ?>" style="width: 81px;height: 63px;"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-3'>";
                            }
                            ?>
                            <?php
                            $count++;
                        }
                        ?>
                    <?php } ?>
                </li>

                <!--Block 4 -->
                <li>
                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = 4 and status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    echo "<p class='img-menu-block-4'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger<?= $count == 0 ? '' : $count ?>"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" alt="<?= $row_image['alt'] ?>" style="width: 81px;height: 63px;"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-1'>";
                            }
                            ?>
                            <?php
                            $count++;
                        }
                        ?>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <span class="hidden-sm hidden-xs">
            <?php
            $sql2 = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE  status = 'ใช้งาน'";
            $query2 = $db->Query($sql2);
            $numRow2 = $db->NumRows($query2);
            $xx2 = 0;
            if ($numRow2 > 0) {
                while ($row2 = $db->FetchArray($query2)) {
                    ?>
                    <div id="pop-up<?= $xx2 == 0 ? '' : $xx2 ?>" class="pop-up" style="padding: 10px;">
                        <img src="<?= ADDRESS ?>img/<?= $row2['image'] ?>" class="img-responsive" alt="<?= $row2['alt'] ?>" />
                        <?= $_GET['lang'] == 'en' ? $row2['detail_eng'] : $row2['detail'] ?>
                    </div>

                    <?php
                    $xx2++;
                }
                ?>
            <?php } ?>
        </span>



    </div>
    <p>&nbsp;</p>
    <div class="col-md-12">
        <div id="content">


            <?php
            //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
            $model_detail = str_replace("../files", "../../files", $_GET['lang'] == 'en' ? $service->getDataDesc('service_detail_eng', 'id = 1') : $service->getDataDesc('service_detail', 'id = 1'));

            $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

            echo $html;
            ?>


        </div>
    </div>

    <div class=" hidden-lg hidden-md">
        <?php
        $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE status = 'ใช้งาน'";
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
                        <a href="javascript:;" data-toggle="modal" data-target="#myModal<?= $count_menu ?>">  <img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" class="img-responsive  margin-auto-xs">
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
</div>
<script>
    $("div .img-menu-block-1:last-child").css("border-bottom", "none");
    $("div .img-menu-block-2:last-child").css("border-bottom", "none");
    $("div .img-menu-block-3:last-child").css("border-bottom", "none");
    $("div .img-menu-block-4:last-child").css("border-bottom", "none");

</script>
<?php
$sql2 = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE  status = 'ใช้งาน'";
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
<style>
    .padding-right-0{
        padding-right: 0px !important;
    }
</style>


