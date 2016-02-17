<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');
// echo ($_SERVER["DOCUMENT_ROOT"]);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>ส้มตำอุดร</title>       
        <meta name="description" content="ส้มตำอุดร" />   
        <meta name="keywords" content="ส้มตำอุดร" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width"/> 

        <link rel="stylesheet" href="<?= ADDRESS ?>bootstrap.min.css" />
        <link rel="shortcut icon" href="<?= ADDRESS ?>images/icon.png" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    </head> 
    <body>
        <div class="container-fluid">
            <div style="max-width: 974px;margin: auto;">
                <div class="row">
                    <div class="hidden-lg hidden-md">
                        <nav class="navbar navbar-default"  style="margin-bottom: 0;">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="<?= ADDRESS ?>" style="font-family: Arial;font-size: 18px;"></a>
                                </div>
                                <div id="navbar" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav" >
                                        <li class="<?= PAGE_CONTROLLERS == '' || PAGE_CONTROLLERS == 'index' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>" title="หน้าหลัก"><img src="<?= ADDRESS ?>images/icon-home.png" style="width: 20px;">&nbsp;&nbsp;สาขา / ที่ตั้ง</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'location' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>location" title="ที่ตั้งโครงการ"><img src="<?= ADDRESS ?>images/icon-location.png" style="width: 20px;">&nbsp;&nbsp;เมนู / ราคา</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'chart-project' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>chart-project" title="ผังโครงการ"><img src="<?= ADDRESS ?>images/icon-plan.png" style="width: 20px;">&nbsp;&nbsp;ผังโครงการ</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'model' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>model" title="แบบบ้าน"><img src="<?= ADDRESS ?>images/icon-draft.png" style="width: 20px;">&nbsp;&nbsp;ครัว / บริการ</a></li>
                                        <li class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>contact" title="ติดต่อเรา"><img src="<?= ADDRESS ?>images/icon-contact.png" style="width: 20px;">&nbsp;&nbsp;ลูกค้า / คำติชม</a></li>
                                    </ul>

                                </div><!--/.nav-collapse -->
                            </div><!--/.container-fluid -->
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div id="eng" class="hidden-sm hidden-xs"><span>THAI</span> / ENG</div>
                        <div id="logo" class="hidden-sm hidden-xs"><a href=""><img src="<?= ADDRESS ?>images/logo.png" class="img-responsive" style="margin: auto;"/></a></div>



                        <div id="eng" class="hidden-lg hidden-md pull-right padding-all-10-xs "><span>THAI</span> / ENG</div>
                        <br class="hidden-lg hidden-md"/>
                        <div id="logo" class="padding-all-10-xs hidden-lg hidden-md"><a href=""><img src="<?= ADDRESS ?>images/logo.png" class="img-responsive" style="margin: auto;"/></a></div>
                           <div class="hidden-lg hidden-md" style="margin-bottom: 30px;"></div>
                        <div id="menu" class="text-center-xs">
                            <ul style="list-style-type: none;" class="padding-all-0-xs">
                                <li><a href="location.html" title="สาขา / ที่ตั้ง">
                                        <img src="<?= ADDRESS ?>images/imglocation.jpg" width="100%" class="menutop" />
                                        <div class="" style="margin-bottom: 15px;"></div>
                                        <p>สาขา / ที่ตั้ง<p></a>
                                                </li>
                                                <li><a href="menu.html" title="เมนู / ราคา">
                                                        <img src="<?= ADDRESS ?>images/imgmenu.jpg" width="100%" />
                                                        <div class="" style="margin-bottom: 15px;"></div>
                                                        <p>เมนู / ราคา</p>
                                                    </a>
                                                </li>
                                                <li><a href="service.html" title="ครัว / บริการ">
                                                        <img src="<?= ADDRESS ?>images/imgservice.jpg" width="100%" class="menutop" />
                                                        <div class="" style="margin-bottom: 15px;"></div>
                                                        <p>ครัว / บริการ</p></a>
                                                </li>
                                                <li><a href="contact.html" title="ลูกค้า / คำติชม">
                                                        <img src="<?= ADDRESS ?>images/imgclients.jpg" width="100%" class="menutop" />
                                                        <div class="" style="margin-bottom: 15px;"></div>
                                                        <p>ลูกค้า / คำติชม</p></a>
                                                </li>
                                                </ul>
                                                </div>
                                                <div id="footer">
                                                    <p>ส้มตำอุดร ซอยทานตะวัน สาขา 28/7 หมู่ 5 ถนนเชียงใหม่ สันกำแพง(สายเก่า) ตำบลท่าศาลา อำเภอเมือง จังหวัดเชียงใหม่ 50000</p>
                                                    <p>พิกัดร้าน : 18.782048.99.030616</p>
                                                    <ul style="list-style-type: none;" class="padding-all-0-xs">
                                                        <li>Tel. 087-1278061, 094-4982363</li>
                                                        <li>Facebook : www.facebook.com/chiangmaiwebdesign</li>
                                                        <li>LineID : metha-pun</li>
                                                    </ul>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>


                                                <style>
                                                    body {
                                                        padding: 0;
                                                        margin: 0;
                                                        background: url(<?= ADDRESS ?>images/bg.jpg) left top repeat;
                                                        font: normal 13px Arial, Helvetica, sans-serif;
                                                        color: #fff;
                                                    }
                                                    #menu li {
                                                        width: inherit;
                                                        height: inherit;
                                                        display: inherit;
                                                     
                                                        padding: 15px;
                                                        margin: inherit;
                                                        border: 1px dashed #fff;
                                                    }
                                                    #menu li a {
                                                        color: #fff;
                                                        text-decoration: none;
                                                    }
                                                    #menu li a:hover {
                                                        color: #fe0000;
                                                        text-decoration: none;
                                                    }
                                                    .bg_color_black {
                                                        background-color: #000;
                                                    }
                                                    .margin-auto-xs {
                                                        margin: auto;
                                                    }
                                                    .color-black-xs {
                                                        color: #000;
                                                    }
                                                    .border-xs {
                                                        border: 1px solid #000;
                                                        padding: 10px;
                                                    }
                                                    .line-height-xs-16 {
                                                        line-height: 16px;
                                                    }
                                                    .line-height-xs-20 {
                                                        line-height: 20px;
                                                    }
                                                    .line-height-xs-24 {
                                                        line-height: 24px;
                                                    }
                                                    .line-height-xs-28 {
                                                        line-height: 28px;
                                                    }
                                                    .line-height-xs-32 {
                                                        line-height: 32px;
                                                    }
                                                    .line-height-xs-36 {
                                                        line-height: 36px;
                                                    }
                                                    .line-height-xs-40 {
                                                        line-height: 40px;
                                                    }
                                                    .font-bold-xs {
                                                        font-weight: bold;
                                                    }
                                                    .font-xs-36 {
                                                        font-size: 36px;
                                                    }
                                                    .font-xs-34 {
                                                        font-size: 34px;
                                                    }
                                                    .font-xs-28 {
                                                        font-size: 28px;
                                                    }
                                                    .font-xs-26 {
                                                        font-size: 26px;
                                                    }
                                                    .font-xs-24 {
                                                        font-size: 24px;
                                                    }
                                                    .font-xs-22 {
                                                        font-size: 22px;
                                                    }
                                                    .font-xs-20 {
                                                        font-size: 20px;
                                                    }
                                                    .font-xs-18 {
                                                        font-size: 18px;
                                                    }
                                                    .font-xs-16 {
                                                        font-size: 16px;
                                                    }
                                                    .color-white-xs {
                                                        color: #FFF;
                                                    }
                                                    .text-indent-xs {
                                                        text-indent: 20px;
                                                    }
                                                    .text-center-xs {
                                                        text-align: center;
                                                    }
                                                    .text-right-xs {
                                                        text-align: right;
                                                    }
                                                    .text-left-xs {
                                                        text-align: left;
                                                    }
                                                    .margin-auto {
                                                        margin: auto;
                                                    }
                                                    .padding-all-0-xs {
                                                        padding-top: 0px;
                                                        padding-right: 0px;
                                                        padding-bottom: 0px;
                                                        padding-left: 0px;
                                                    }
                                                    .padding-all-10-xs {
                                                        padding-top: 10px;
                                                        padding-right: 10px;
                                                        padding-bottom: 10px;
                                                        padding-left: 10px;
                                                    }
                                                    .padding-left-0-xs {
                                                        padding-left: 0px;
                                                    }
                                                    .padding-right-0-xs {
                                                        padding-right: 0px;
                                                    }
                                                    .padding-top-10-xs {
                                                        padding-top: 10px;
                                                    }
                                                    .padding-bottom-10-xs {
                                                        padding-bottom: 10px;
                                                    }
                                                    .padding-left-10-xs {
                                                        padding-left: 10px;
                                                    }
                                                    .padding-right-10-xs {
                                                        padding-right: 10px;
                                                    }
                                                    .padding-top-15-xs {
                                                        padding-top: 15px;
                                                    }
                                                    .padding-bottom-15-xs {
                                                        padding-bottom: 15px;
                                                    }
                                                    .padding-left-15-xs {
                                                        padding-left: 15px;
                                                    }
                                                    .padding-right-15-xs {
                                                        padding-right: 15px;
                                                    }
                                                    .padding-top-20-xs {
                                                        padding-top: 20px;
                                                    }
                                                    .padding-bottom-20-xs {
                                                        padding-bottom: 20px;
                                                    }
                                                    .padding-left-20-xs {
                                                        padding-left: 20px;
                                                    }
                                                    .padding-right-20-xs {
                                                        padding-right: 20px;
                                                    }
                                                    .padding-top-1em-xs {
                                                        padding-top: 1em;
                                                    }
                                                    .padding-bottom-1em-xs {
                                                        padding-bottom: 1em;
                                                    }
                                                    .padding-left-1em-xs {
                                                        padding-left: 1em;
                                                    }
                                                    .padding-right-1em-xs {
                                                        padding-right: 1em;
                                                    }
                                                    .padding-top-2em-xs {
                                                        padding-top: 2em;
                                                    }
                                                    .padding-bottom-2em-xs {
                                                        padding-bottom: 2em;
                                                    }
                                                    .padding-left-2em-xs {
                                                        padding-left: 2em;
                                                    }
                                                    .padding-right-2em-xs {
                                                        padding-right: 2em;
                                                    }
                                                    .padding-top-3em-xs {
                                                        padding-top: 3em;
                                                    }
                                                    .padding-bottom-3em-xs {
                                                        padding-bottom: 3em;
                                                    }
                                                    .padding-left-3em-xs {
                                                        padding-left: 3em;
                                                    }
                                                    .padding-right-3em-xs {
                                                        padding-right: 3em;
                                                    }
                                                    .padding-top-4em-xs {
                                                        padding-top: 4em;
                                                    }
                                                    .padding-bottom-4em-xs {
                                                        padding-bottom: 4em;
                                                    }
                                                    .padding-left-4em-xs {
                                                        padding-left: 4em;
                                                    }
                                                    .padding-right-4em-xs {
                                                        padding-right: 4em;
                                                    }
                                                    .padding-top-5em-xs {
                                                        padding-top: 5em;
                                                    }
                                                    .padding-bottom-5em-xs {
                                                        padding-bottom: 5em;
                                                    }
                                                    .padding-left-5em-xs {
                                                        padding-left: 5em;
                                                    }
                                                    .padding-right-5em-xs {
                                                        padding-right: 5em;
                                                    }
                                                    .padding-top-6em-xs {
                                                        padding-top: 6em;
                                                    }
                                                    .padding-bottom-6em-xs {
                                                        padding-bottom: 6em;
                                                    }
                                                    .padding-left-6em-xs {
                                                        padding-left: 6em;
                                                    }
                                                    .padding-right-6em-xs {
                                                        padding-right: 6em;
                                                    }
                                                    @media(min-width:768px) {}
                                                    /*            md size*/

                                                    @media(min-width:992px) {
                                                        .margin-auto-xs {
                                                            margin: inherit;
                                                        }
                                                        /* CSS Document */

                                                        body {
                                                            padding: 0;
                                                            margin: 0;
                                                            background: url(<?= ADDRESS ?>images/bg.jpg) left top repeat;
                                                            font: normal 13px Arial, Helvetica, sans-serif;
                                                            color: #fff;
                                                        }
                                                        img {
                                                            border: 0;
                                                        }
                                                        h2 {
                                                            font: 16px bold Arial, Helvetica, sans-serif;
                                                        }
                                                        #container {
                                                            width: 974px;
                                                            margin: 0 auto;
                                                            padding: 0;
                                                        }
                                                        #eng {
                                                            float: right;
                                                            padding: 10px;
                                                            margin: 0;
                                                        }
                                                        #eng span {
                                                            color: #fe0000;
                                                        }
                                                        #logo {
                                                            width: 100%;
                                                            margin: 0 auto;
                                                            padding: 80px 0 20px 0;
                                                            text-align: center;
                                                        }
                                                        #menu {
                                                            width: 974px;
                                                            margin: 0 auto;
                                                            padding: 6px 0 0 0;
                                                        }
                                                        #menu ul {
                                                            list-style: none;
                                                            padding: 0 0 0 20px;
                                                            margin: 0 auto;
                                                            text-align: center;
                                                            font: 18px normal Arial, Helvetica, sans-serif;
                                                        }
                                                        #menu li {
                                                            width: 212px;
                                                            height: 400px;
                                                            display: block;
                                                            float: left;
                                                            padding: 10px 0px;
                                                            margin: 0 10px;
                                                            border: 1px dashed #fff;
                                                        }
                                                        #menu li a {
                                                            color: #fff;
                                                            text-decoration: none;
                                                        }
                                                        #menu li a:hover {
                                                            color: #fe0000;
                                                            text-decoration: none;
                                                        }
                                                        #submenu {
                                                            clear: both;
                                                            width: 974px;
                                                            margin: 0 auto;
                                                            padding: 0;
                                                            border-bottom: 1px dashed #606060;
                                                            border-top: 1px dashed #606060;
                                                        }
                                                        #submenu ul {
                                                            list-style: none;
                                                            padding: 0 0 0 20px;
                                                            margin: 0 auto;
                                                            text-align: center;
                                                            font: 14px normal Arial, Helvetica, sans-serif;
                                                        }
                                                        #submenu li {
                                                            display: block;
                                                            float: left;
                                                            padding: 10px 0px;
                                                            margin: 0 60px;
                                                        }
                                                        #submenu li a {
                                                            color: #fff;
                                                            text-decoration: none;
                                                        }
                                                        #submenu li a:hover {
                                                            color: #fe0000;
                                                            text-decoration: none;
                                                        }
                                                        .clear {
                                                            clear: both;
                                                        }
                                                        #content {
                                                            width: 100%;
                                                            margin: 0;
                                                            padding: 0;
                                                        }
                                                        #foodmenu {
                                                            width: 974px;
                                                            margin: 0 auto;
                                                            padding: 6px 0 0 0;
                                                        }
                                                        #foodmenu ul {
                                                            list-style: none;
                                                            padding: 0 0 0 20px;
                                                            margin: 0 auto;
                                                            text-align: center;
                                                            font: 18px normal Arial, Helvetica, sans-serif;
                                                        }
                                                        #foodmenu li {
                                                            width: 212px;
                                                            display: block;
                                                            float: left;
                                                            padding: 10px 0px;
                                                            margin: 0 10px;
                                                            border: 1px dashed #fff;
                                                        }
                                                        #foodmenu li a {
                                                            color: #fff;
                                                            text-decoration: none;
                                                        }
                                                        #foodmenu li a:hover {
                                                            color: #fe0000;
                                                            text-decoration: none;
                                                        }
                                                        #foodmenu p {
                                                            border-bottom: 1px dashed #545454;
                                                            font: 13px normal Arial, Helvetica, sans-serif;
                                                        }
                                                        #foodmenu span {
                                                            color: #7f7f7f;
                                                        }
                                                        #locationmenu {
                                                            width: 974px;
                                                            margin: 0 auto;
                                                            padding: 6px 0 0 0;
                                                        }
                                                        #locationmenu ul {
                                                            list-style: none;
                                                            padding: 0 0 0 20px;
                                                            margin: 0 auto;
                                                            text-align: center;
                                                            font: 18px normal Arial, Helvetica, sans-serif;
                                                        }
                                                        #locationmenu li {
                                                            width: 212px;
                                                            display: block;
                                                            float: left;
                                                            padding: 10px 0px;
                                                            margin: 0 10px;
                                                            border: 1px dashed #fff;
                                                        }
                                                        #locationmenu li a {
                                                            color: #fff;
                                                            text-decoration: none;
                                                        }
                                                        #locationmenu li a:hover {
                                                            color: #fe0000;
                                                            text-decoration: none;
                                                        }
                                                        #locationmenu p {
                                                            text-align: left;
                                                            font: 13px normal Arial, Helvetica, sans-serif;
                                                            margin: 5px 0 0 10px;
                                                        }
                                                        #locationmenu span {
                                                            color: #7f7f7f;
                                                        }
                                                        .map {
                                                            float: left;
                                                            width: 49%;
                                                        }
                                                        .formemail {
                                                            float: right;
                                                            width: 49%;
                                                        }
                                                        .contactin {
                                                            width: 100%;
                                                            height: 25px;
                                                            padding: 5px 0;
                                                            margin: 5px 0;
                                                        }
                                                        .area {
                                                            width: 100%;
                                                        }
                                                        .menutop {
                                                            padding: 50px 0 0 0;
                                                            margin: 116px 0 0 0;
                                                        }
                                                        #footer {
                                                            clear: both;
                                                            width: 100%;
                                                            margin: 20px 0;
                                                            padding: 10px 0;
                                                            text-align: center;
                                                        }
                                                        #footer ul {
                                                            list-style: none;
                                                            padding: 0 0 0 20px;
                                                            margin: 0 auto;
                                                            text-align: center;
                                                            color: #606060
                                                        }
                                                        #footer li {
                                                            display: block;
                                                            float: left;
                                                            padding: 5px 55px;
                                                            margin: 0;
                                                        }
                                                        /*--------------------------  img pop-up ----------------------*/

                                                        div#pop-up {
                                                            display: none;
                                                            position: absolute;
                                                            width: 400px;
                                                            padding: 0;
                                                            margin: -350px 0 0 0;
                                                            background: #eeeeee;
                                                            color: #000000;
                                                            border: 1px dashed #7f7f7f;
                                                        }
                                                        div#pop-up1 {
                                                            display: none;
                                                            position: absolute;
                                                            width: 400px;
                                                            padding: 0;
                                                            margin: -350px 0 0 0;
                                                            background: #eeeeee;
                                                            color: #000000;
                                                            border: 1px dashed #7f7f7f;
                                                        }
                                                        div#pop-up2 {
                                                            display: none;
                                                            position: absolute;
                                                            width: 400px;
                                                            padding: 0;
                                                            margin: -350px 0 0 0;
                                                            background: #eeeeee;
                                                            color: #000000;
                                                            border: 1px dashed #7f7f7f;
                                                        }
                                                        div#pop-up3 {
                                                            display: none;
                                                            position: absolute;
                                                            width: 400px;
                                                            padding: 0;
                                                            margin: -350px 0 0 0;
                                                            background: #eeeeee;
                                                            color: #000000;
                                                            border: 1px dashed #7f7f7f;
                                                        }
                                                        /*--------------------------  eng img pop-up ----------------------*/

                                                        .padding-top-10-xs {
                                                            padding-top: 0px;
                                                        }
                                                        .padding-bottom-10-xs {
                                                            padding-bottom: 0px;
                                                        }
                                                        .padding-left-10-xs {
                                                            padding-left: 0px;
                                                        }
                                                        .padding-right-10-xs {
                                                            padding-right: 0px;
                                                        }
                                                        .padding-top-15-xs {
                                                            padding-top: 0px;
                                                        }
                                                        .padding-bottom-15-xs {
                                                            padding-bottom: 0px;
                                                        }
                                                        .padding-left-15-xs {
                                                            padding-left: 0px;
                                                        }
                                                        .padding-right-15-xs {
                                                            padding-right: 0px;
                                                        }
                                                        .padding-top-20-xs {
                                                            padding-top: 0px;
                                                        }
                                                        .padding-bottom-20-xs {
                                                            padding-bottom: 0px;
                                                        }
                                                        .padding-left-20-xs {
                                                            padding-left: 0px;
                                                        }
                                                        .padding-right-20-xs {
                                                            padding-right: 0px;
                                                        }
                                                        .padding-top-1em-xs,
                                                        .padding-top-2em-xs,
                                                        .padding-top-3em-xs,
                                                        .padding-top-4em-xs,
                                                        .padding-top-5em-xs,
                                                        .padding-top-6em-xs {
                                                            padding-top: 0px;
                                                        }
                                                        .padding-right-1em-xs,
                                                        .padding-right-2em-xs,
                                                        .padding-right-3em-xs,
                                                        .padding-right-4em-xs,
                                                        .padding-right-5em-xs,
                                                        .padding-right-6em-xs {
                                                            padding-right: 0px;
                                                        }
                                                        .padding-bottom-1em-xs,
                                                        .padding-bottom-2em-xs,
                                                        .padding-bottom-3em-xs,
                                                        .padding-bottom-4em-xs,
                                                        .padding-bottom-5em-xs,
                                                        .padding-bottom-6em-xs {
                                                            padding-bottom: 0px;
                                                        }
                                                        .padding-left-1em-xs,
                                                        .padding-left-2em-xs,
                                                        .padding-left-3em-xs,
                                                        .padding-left-4em-xs,
                                                        .padding-left-5em-xs,
                                                        .padding-left-6em-xs {
                                                            padding-left: 0px;
                                                        }
                                                        .color-black-xs {
                                                            color: inherit;
                                                            ;
                                                        }
                                                        .border-xs {
                                                            border: inherit;
                                                            padding: inherit;
                                                        }
                                                        .line-height-xs-16,
                                                        .line-height-xs-20,
                                                        .line-height-xs-24,
                                                        .line-height-xs-28,
                                                        .line-height-xs-32,
                                                        .line-height-xs-36,
                                                        .line-height-xs-40 {
                                                            line-height: inherit;
                                                        }
                                                        .font-bold-xs {
                                                            font-weight: inherit;
                                                        }
                                                        .font-xs-36 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-34 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-28 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-26 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-24 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-22 {
                                                            font-size: inherit;
                                                        }
                                                        .font-xs-20,
                                                        .font-xs-18,
                                                        .font-xs-16 {
                                                            font-size: inherit;
                                                        }
                                                        .color-white-xs {
                                                            color: inherit;
                                                        }
                                                        .margin-auto {
                                                            margin: inherit;
                                                        }
                                                        .text-center-xs {
                                                            text-align: inherit;
                                                        }
                                                        .text-right-xs {
                                                            text-align: inherit;
                                                        }
                                                        .text-left-xs {
                                                            text-align: inherit;
                                                        }
                                                        .text-indent-xs {
                                                            text-indent: inherit;
                                                        }
                                                    }
                                                </style>

                                                </body>
                                                </html>


