
<div id="menu" class="text-center-xs">
    <ul style="list-style-type: none;" class="padding-all-0-xs">
        <li><a href="<?=ADDRESS?>location<?=$url_get?>" title="<?= $_GET['lang'] == 'en' ? 'Branch / Location' : 'สาขา / ที่ตั้ง' ?>">
                <img src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc("image", "name='สาขา/ที่ตั้ง'") ?>"  class="menutop img-responsive margin-auto-xs" />
                <div class="" style="margin-bottom: 15px;"></div>
                <p><?= $_GET['lang'] == 'en' ? 'Branch / Location' : 'สาขา / ที่ตั้ง' ?><p></a>
        </li>
        <li><a href="<?=ADDRESS?>menu<?=$url_get?>" title="<?= $_GET['lang'] == 'en' ? 'Menu / Price' : 'เมนู / ราคา' ?>">
                <img src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc("image", "name='เมนู/ราคา'") ?>" class="img-responsive margin-auto-xs"/>
                <div class="" style="margin-bottom: 15px;"></div>
                <p><?= $_GET['lang'] == 'en' ? 'Menu / Price' : 'เมนู / ราคา' ?></p>
            </a>
        </li>
        <li><a href="<?=ADDRESS?>service<?=$url_get?>" title="<?= $_GET['lang'] == 'en' ? 'Kitchen / service' : 'ครัว / บริการ' ?>">
                <img src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc("image", "name='ครัว/บริการ'") ?>"  class="menutop img-responsive margin-auto-xs" />
                <div class="" style="margin-bottom: 15px;"></div>
                <p><?= $_GET['lang'] == 'en' ? 'Kitchen / service' : 'ครัว / บริการ' ?></p></a>
        </li>
        <li><a href="<?=ADDRESS?>clients<?=$url_get?>" title="<?= $_GET['lang'] == 'en' ? ' Customer / Feedback' : 'ลูกค้า / คำติชม' ?>">

                <img src="<?= ADDRESS ?>img/<?= $sub_images->getDataDesc("image", "name='ลูกค้า/คำติชม'") ?>"  class="menutop img-responsive margin-auto-xs" />
                <div class="" style="margin-bottom: 15px;"></div>
                <p><?= $_GET['lang'] == 'en' ? ' Customer / Feedback' : 'ลูกค้า / คำติชม' ?></p></a>
        </li>
    </ul>
</div>
<p>&nbsp;</p>
