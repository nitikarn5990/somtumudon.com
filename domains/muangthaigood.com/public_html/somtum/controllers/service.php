<div class="row">
    <div class="col-md-12">
        <div id="foodmenu">
            <ul>
                <li>

                    <?php
                    $sql_image = "SELECT * FROM " . $menu_image_block->getTbl() . " WHERE number_block = 1 and status = 'ใช้งาน'";
                    $query_image = $db->Query($sql_image);
                    $numRow_image = $db->NumRows($query_image);
                    $xx = 0;
                    echo "<p class='img-menu-block-1'>";
                    if ($numRow_image > 0) {
                        while ($row_image = $db->FetchArray($query_image)) {
                            $xx++;
                            ?>

                            <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-1'>";
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>

                </li>
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

                            <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-2'>";
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </li>
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

                            <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-3'>";
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </li>
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

                            <a href="#" id="trigger1"><img src="<?= ADDRESS ?>img/<?= $row_image['image'] ?>"></a> 
                            <?php
                            if ($xx % 2 == 0) {
                                echo "</p><p class='img-menu-block-1'>";
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </li>
            </ul>
        </div>

    </div>
    <p>&nbsp;</p>
    <div class="col-md-12">
        <div id="content">
        
          
            <?php
            //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
            $model_detail = str_replace("../files", "../../files",  $_GET['lang'] == 'en' ? $service->getDataDesc('service_detail_eng') : $service->getDataDesc('service_detail'));

            $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

            echo $html;
            ?>
            

        </div>
    </div>
</div>
<script>
    $("div .img-menu-block-1:last-child").css("display", "none");
    $("div .img-menu-block-2:last-child").css("display", "none");
    $("div .img-menu-block-3:last-child").css("display", "none");
    $("div .img-menu-block-4:last-child").css("display", "none");

</script>

