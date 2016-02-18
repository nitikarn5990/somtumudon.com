

<div id="content">
    <p>
        <?php
        //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
        $model_detail = str_replace("../files", "../../files", $_GET['lang'] == 'en' ? $location->getDataDesc('location_detail_eng', 'id=1') : $location->getDataDesc('location_detail', 'id=1'));

        $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

        echo $html;
        ?>
    </p>
</div>

<div id="locationmenu" class="">
    <ul style="padding: 0;list-style: none;">
        <?php
        $sql1 = "SELECT * FROM " . $branch->getTbl() . " WHERE  status = 'ใช้งาน'";
        $query1 = $db->Query($sql1);
        $numRow1 = $db->NumRows($query1);
        $xx = 0;
        if ($numRow1 > 0) {
            while ($row1 = $db->FetchArray($query1)) {

                if ($_GET['lang'] == 'en') {
                    $strBranch = $row1['name_eng'] . " Branch";
                    $strTel = "Tel. " . $row1['tel'];
                    $strLatiLongi = "latitude/longitude " . $row1['coordinates'];
                    $strMap = "Map ";
                    $ImageShop = ADDRESS . "/img/" . $row1['image_shop'];
                    $ImageMap = "";
                    $alt = $row1['alt_eng'];
                } else {
                    $strBranch = "สาขา " . $row1['name'];
                    $strTel = "เบอร์โทร. " . $row1['tel'];
                    $strLatiLongi = "พิกัด " . $row1['coordinates'];
                    $strMap = "แผนที่ ";
                    $ImageShop = ADDRESS . "img/" . $row1['image_shop'];
                    $ImageMap = "";
                    $alt = $row1['alt_thai'];
                }
                ?>
                <li>
                    <h2><?= $strBranch ?></h2>
                    <p><?= $strTel ?></p>
                    <p><?= $strLatiLongi ?></p>
                    <p><?= $strMap ?></p><br />
                    <a href="#"  id="trigger<?= $xx==0?'':$xx ?>"><img src="<?= $ImageShop ?>" class="img-responsive" /></a>            
                </li>              
                <?php
                $xx++;
            }
            ?>
        <?php } ?>

    </ul>

    <?php
    $sql2 = "SELECT * FROM " . $branch->getTbl() . " WHERE  status = 'ใช้งาน'";
    $query2 = $db->Query($sql2);
    $numRow2 = $db->NumRows($query2);
    $xx2 = 0;
    if ($numRow2 > 0) {
        while ($row2 = $db->FetchArray($query2)) {

            if ($_GET['lang'] == 'en') {
                $strBranch = "  ". $row2['name_eng'] . " Branch";
                $strTel = "Tel. " . $row2['tel'];
                $strLatiLongi = "latitude/longitude " . $row2['coordinates'];
                $strMap = "Map";
                $ImageShop = ADDRESS . "/img/" . $row2['image_shop'];
                $ImageMap = ADDRESS . "img/" . $row2['image_map_eng'];
            } else {
                $strBranch = "  สาขา " . $row2['name'];
                $strTel = "เบอร์โทร. " . $row2['tel'];
                $strLatiLongi = "พิกัด " . $row2['coordinates'];
                $strMap = "แผนที่";
                $ImageShop = ADDRESS . "img/" . $row2['image_shop'];
                $ImageMap = ADDRESS . "img/" . $row2['image_map_thai'];
            }
            ?>

            <div id="pop-up<?= $xx2==0?'':$xx2 ?>" >
                <img src="<?= $ImageMap ?>" width="100%;" />
                <h2>&nbsp;<?= $strBranch ?></h2>
                <p><?= $strTel ?></p>
                <p><?= $strLatiLongi ?></p>
                <p>&nbsp;</p>
            </div>
            <?php
            $xx2++;
        }
        ?>
    <?php } ?>


</div>
<div class="clearfix"></div>
<p>&nbsp;</p>

<?php
$sql2 = "SELECT * FROM " . $branch->getTbl() . " WHERE  status = 'ใช้งาน'";
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
                $('a#trigger<?=$xx2==0?'':$xx2?>').hover(function (e) {
                    $('div#pop-up<?=$xx2==0?'':$xx2?>').show();
                }, function () {
                    $('div#pop-up<?=$xx2==0?'':$xx2?>').hide();
                });

                $('a#trigger<?=$xx2==0?'':$xx2?>').mousemove(function (e) {
                    $("div#pop-up<?=$xx2==0?'':$xx2?>").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
                });

    <?php $xx2++; } ?>
<?php } ?>

    });

</script>
