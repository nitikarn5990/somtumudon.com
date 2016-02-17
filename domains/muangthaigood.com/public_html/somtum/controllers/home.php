<div class="clearfix"></div>

<div id="slide">

    <article class="demo_block">
        <ul id="demo1" style="list-style:none; position:0; margin:0; width:100%;">
            <?php
            $sql1 = "SELECT * FROM " . $slides->getTbl() . " WHERE status = 'ใช้งาน' ORDER BY sort ASC";
            $query1 = $db->Query($sql1);
            $numRow1 = $db->NumRows($query1);
            if ($numRow1 > 0) {
                while ($row1 = $db->FetchArray($query1)) {
                    ?>
                    <li><a href="#slide1"><img class="img-responsive margin-auto-xs" src="<?= ADDRESS ?>img/<?= $slides_file->getDataDescLastID('file_name', 'slides_id = ' . $row1['id']) ?>" /></a></li>

                    <?php
                }
            }
            ?>

        </ul>
    </article>

</div>
<div class="clearfix"></div>

<div id="bottomslide">

    <div class="sizebottomslide">
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="boxleft">
            <img class="img-responsive margin-auto-xs" src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc('image', 'name = "index" AND position = "L"') ?>" />
        </div>
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="boxrigthfty">
            <img class="img-responsive margin-auto-xs" src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc('image', 'name = "index" AND position = "R"') ?>" />
        </div>
        <p class="hidden-lg hidden-md">&nbsp;</p>
        <div class="clear"></div>
    </div>
</div>
<div id="content">

    <h1><strong><?= $home->getDataDescLastID('home_title', 'id = 1') ?></strong></h1>
    <div class="model_detail2">
        <p>
            <?php
            //   $product_Detail = $products->getDataDesc("product_detail", "product_name_ref = '" . $_GET['productID'] . "'");
            $model_detail = str_replace("../files", "../../files", $home->getDataDescLastID('home_detail', 'id = 1'));

            $html = preg_replace('/(width|height)="\d*"\s/', "", $model_detail);

            echo $html;
            ?>
        </p>
    </div>
</div>