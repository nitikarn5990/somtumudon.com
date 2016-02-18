<div class="row hidden-sm hidden-xs">
    <div class="col-md-12">
        <div id="foodmenu">
            <ul>
                <li>
                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image->getTbl() . " WHERE status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    echo "<p class='img-menu'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu'>";
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </li>
                <li style="padding: 0 10px 0 10px;">
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
                <li style="padding: 0 10px 0 10px;">
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
                <li style="padding: 0 10px 0 10px;">
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
<div class="row hidden-md hidden-lg">



    <?php
    $sql_image = "SELECT * FROM " . $menu_image->getTbl() . " WHERE status = 'ใช้งาน'";
    $query_image = $db->Query($sql_image);
    $numRow_image = $db->NumRows($query_image);
    $xx = 0;

    if ($numRow_image > 0) {
        while ($row_image = $db->FetchArray($query_image)) {
            ?>

            <div class="col-xs-12 text-center-xs">
                <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>" class="img-responsive margin-auto"></a> 
            </div>

        <?php } ?>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="col-xs-12 text-center-xs">
        <h2><?= $_GET['lang'] == 'en' ? 'Papaya Salad' : 'ส้มตำ' ?></h2>
    </div>
    <?php
    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 1 and status = 'ใช้งาน'";
    $query1 = $db->Query($sql1);
    $numRow1 = $db->NumRows($query1);
    $xx = 0;
    if ($numRow1 > 0) {
        while ($row1 = $db->FetchArray($query1)) {
            ?>
            <div class="col-xs-12 text-center-xs">
                <p><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
            </div>           
        <?php } ?>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="col-xs-12 text-center-xs">
        <h2><?= $_GET['lang'] == 'en' ? 'Chicken / Spicy / Grilled / Salad' : 'ไก่ ลาบ ย่าง ยำ' ?></h2>
    </div>
    <?php
    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 2 and status = 'ใช้งาน'";
    $query1 = $db->Query($sql1);
    $numRow1 = $db->NumRows($query1);
    $xx = 0;
    if ($numRow1 > 0) {
        while ($row1 = $db->FetchArray($query1)) {
            ?>
            <div class="col-xs-12 text-center-xs">
                <p><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
            </div>      
        <?php } ?>
    <?php } ?>


    <div class="col-xs-12 text-center-xs">
        <h2><?= $_GET['lang'] == 'en' ? 'Beverage' : 'เครื่องดื่ม' ?></h2>
    </div>
    <?php
    $sql1 = "SELECT * FROM " . $menu->getTbl() . " WHERE category_id = 3 and status = 'ใช้งาน'";
    $query1 = $db->Query($sql1);
    $numRow1 = $db->NumRows($query1);
    $xx = 0;
    if ($numRow1 > 0) {
        while ($row1 = $db->FetchArray($query1)) {
            ?>
            <div class="col-xs-12 text-center-xs">
                <p ><?= $_GET['lang'] == 'en' ? $row1['name_eng'] : $row1['name'] ?> : <span>150<?= $_GET['lang'] == 'en' ? ' Bath' : ' บาท' ?></span></p>
            </div>               
        <?php } ?>
    <?php } ?>


</div>
<p>&nbsp;</p>
<script>
    $("div .img-menu:last-child")
            .css("display", "none");

</script>

