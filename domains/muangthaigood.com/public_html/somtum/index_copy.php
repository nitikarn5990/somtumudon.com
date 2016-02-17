<?php
session_start();

include_once($_SERVER["DOCUMENT_ROOT"] . '/lib/application.php');
// echo ($_SERVER["DOCUMENT_ROOT"]);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>บ้านไชยยันต์</title>
        <meta name="description" content="บ้านไชยยันต์" />
        <meta name="keywords" content="บ้านไชยยันต์" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="<?= ADDRESS ?>bootstrap.min.css">

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

            <link rel="shortcut icon" href="<?= ADDRESS ?>images/icon.png">
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                <script src="<?= ADDRESS ?>dist/slippry.min.js"></script>
                <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
                <meta name="viewport" content="width=device-width"/> 

                <link rel="stylesheet" href="<?= ADDRESS ?>dist/slippry.css">
                    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
                    </head> 
                    <body>
                        <div class="container-fluid">
                            <div class="row">

                                <div id="navigate" class="hidden-xs hidden-sm">
                                    <div id="logo-menu">
                                        <div class="logo"><a href="<?= ADDRESS ?>" title="บ้านไชยยันต์"><img src="<?= ADDRESS ?>images/logo.png"  class="img-responsive margin-auto-xs" /></a></div>
                                        <div class="menu">
                                            <ul>
                                                <li><a href="<?= ADDRESS ?>" title="หน้าหลัก">หน้าหลัก</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>location" title="ที่ตั้งโครงการ">ที่ตั้งโครงการ</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>chart-project" title="ผังโครงการ">ผังโครงการ</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>model" title="แบบบ้าน">แบบบ้าน</a></li>
                                                <li>/</li>
                                                <li><a href="<?= ADDRESS ?>contact" title="ติดต่อเรา">ติดต่อเรา</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

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
                                                <ul class="nav navbar-nav">
                                                    <li class="<?= PAGE_CONTROLLERS == '' || PAGE_CONTROLLERS == 'index' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>" title="หน้าหลัก"><img src="<?= ADDRESS ?>images/icon-home.png" style="width: 20px;">&nbsp;&nbsp;หน้าหลัก</a></li>
                                                    <li class="<?= PAGE_CONTROLLERS == 'location' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>location" title="ที่ตั้งโครงการ"><img src="<?= ADDRESS ?>images/icon-location.png" style="width: 20px;">&nbsp;&nbsp;ที่ตั้งโครงการ</a></li>
                                                    <li class="<?= PAGE_CONTROLLERS == 'chart-project' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>chart-project" title="ผังโครงการ"><img src="<?= ADDRESS ?>images/icon-plan.png" style="width: 20px;">&nbsp;&nbsp;ผังโครงการ</a></li>
                                                    <li class="<?= PAGE_CONTROLLERS == 'model' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>model" title="แบบบ้าน"><img src="<?= ADDRESS ?>images/icon-draft.png" style="width: 20px;">&nbsp;&nbsp;แบบบ้าน</a></li>
                                                    <li class="<?= PAGE_CONTROLLERS == 'contact' ? 'active' : '' ?>"><a href="<?= ADDRESS ?>contact" title="ติดต่อเรา"><img src="<?= ADDRESS ?>images/icon-contact.png" style="width: 20px;">&nbsp;&nbsp;ติดต่อเรา</a></li>
                                                </ul>

                                            </div><!--/.nav-collapse -->
                                        </div><!--/.container-fluid -->
                                    </nav>
                                </div>

                                <div class="col-xs-12 bg_color-xs">
                                    <p class="hidden-lg hidden-md">&nbsp;</p>
                                    <div class="logo hidden-lg hidden-md ">
                                        <a href="<?= ADDRESS ?>" title="บ้านไชยยันต์"><img src="<?= ADDRESS ?>images/logo.png"  class="img-responsive margin-auto-xs" /></a>
                                    </div>
                                    <p class="hidden-lg hidden-md">&nbsp;</p>
                                </div>


                                <?php
                                if (PAGE_CONTROLLERS == '' || PAGE_CONTROLLERS == 'index') {
                                    include 'controllers/home.php';
                                } else if (PAGE_CONTROLLERS == 'location') {
                                    include 'controllers/location.php';
                                } else if (PAGE_CONTROLLERS == 'chart-project') {
                                    include 'controllers/chart-project.php';
                                } else if (PAGE_CONTROLLERS == 'model') {
                                    include 'controllers/model.php';
                                } else if (PAGE_CONTROLLERS == 'contact') {
                                    include 'controllers/contact.php';
                                }
                                ?> 
                                <div id="footer">
                                    <div class="linefooter"></div>
                                    <p class="text-center-xs">© สงวนลิขสิทธิ์  บ้านไชยยันต์.com</p>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(function () {
                                var demo1 = $("#demo1").slippry({
                                    transition: 'fade',
                                    useCSS: true,
                                    speed: 1000,
                                    pause: 3000,
                                    auto: true,
                                    preload: 'visible'
                                });

                                $('.stop').click(function () {
                                    demo1.stopAuto();
                                });

                                $('.start').click(function () {
                                    demo1.startAuto();
                                });

                                $('.prev').click(function () {
                                    demo1.goToPrevSlide();
                                    return false;
                                });
                                $('.next').click(function () {
                                    demo1.goToNextSlide();
                                    return false;
                                });
                                $('.reset').click(function () {
                                    demo1.destroySlider();
                                    return false;
                                });
                                $('.reload').click(function () {
                                    demo1.reloadSlider();
                                    return false;
                                });
                                $('.init').click(function () {
                                    demo1 = $("#demo1").slippry();
                                    return false;
                                });
                            });
                        </script>
                        <style>


                            .model_detail2  img{
                                max-height: 100%;
                                max-width: 100%;
                            }


                            .bg_color-xs{
                                background-color: #102741;
                            }
                            .margin-auto-xs{
                                margin: auto;   
                            }
                            @font-face {
                                font-family:PSLxImperial;
                                src: url('<?= ADDRESS ?>PSLxImperial.ttf');
                            }


                            h1{
                                font-size: 26px;
                                font-family: PSLxImperial;
                                color: #102741;
                            }


                            #navigate {
                                background: url(<?= ADDRESS ?>images/bgnavigate.png) left top repeat;
                                width: inherit;
                                height: inherit;
                                position: inherit;
                                z-index: 1;
                            }
                            #logo-menu {
                                width: inherit;
                                margin: inherit;
                                padding: inherit;
                            }
                            .logo {

                            }
                            .menu {
                                clear: both;
                                margin: inherit;
                                padding: inherit;
                                width: inherit;
                            }
                            .menu ul {
                                list-style: none;
                                padding: inherit;
                                margin: inherit;
                                text-align: inherit;
                                font-family: PSLxImperial;
                                font-size: 22px;
                                color: #ffca14;
                                border-bottom:inherit;
                                border-top: inherit;
                                height: 35px;
                            }
                            .menu li {
                                display: block;

                                padding:inherit;
                                margin:inherit;
                            }
                            .menu li a {
                                color: #ffca14;
                                text-decoration: none;
                            }
                            .menu li a:hover {
                                color: #fff;
                                text-decoration: none;
                            }
                            #slide {
                                position: inherit;
                                padding: inherit;
                                margin: 0;
                                z-index: 0;
                                width: inherit;
                            }
                            #bottomslide {
                                width: inherit;
                                background: #102741;
                            }
                            .sizebottomslide {
                                width: inherit;
                                margin: inherit;
                                padding: inherit;
                                clear: both;
                            }
                            .boxleft {

                            }
                            .boxrigthfty {

                            }
                            .clear {
                                clear: both;
                            }
                            #content {
                                clear: both;
                                width: inherit;
                                margin: 0;
                                padding: 0 15px;
                            }
                            #content ul {
                                list-style: none;
                                padding: inherit;
                                margin: inherit;
                                text-align: center;
                            }
                            #content li {
                                display: inherit;

                                padding: inherit;
                                margin: 0;
                            }
                            #content li a {
                                color: #000;
                                text-decoration: none;
                            }
                            .map {

                                width: inherit;
                            }
                            .formemail {

                                width: inherit;
                            }
                            .contactin {
                                width: 100%;
                                height: inherit;
                                padding: inherit;
                                margin: inherit;
                            }
                            .area {
                                width: 100%;
                            }
                            /*#content span{ color:#fb0709;}*/

                            #footer {
                                clear: both;
                                width: inherit;
                                margin: 0;
                                padding: inherit;
                                text-align: inherit;
                                color: #ffca14;
                            }
                            .linefooter {
                                background: url(<?= ADDRESS ?>images/linefooter.jpg) left top repeat-x;
                                height: 2px;
                            }

                            .text-center-xs{

                                text-align: center;   
                            }



                            @media(min-width:768px){

                            }
                            /*            md size*/
                            @media(min-width:992px){
                                .bg_color-xs{
                                    background-color: inherit;
                                }

                                .text-center-xs{

                                    text-align: inherit;   
                                }
                                .margin-auto-xs{
                                    margin: inherit;   
                                }

                                #navigate {
                                    background: url(<?= ADDRESS ?>images/bgnavigate.png) left top repeat;
                                    width: 100%;
                                    height: 172px;
                                    position: absolute;
                                    z-index: 1;
                                }
                                #logo-menu {
                                    width: 1000px;
                                    margin: 0 auto;
                                    padding: 20px 0;
                                }
                                .logo {
                                    float: right;
                                }
                                .menu {
                                    clear: both;
                                    margin: 0;
                                    padding: 12px 0;
                                    width: 1000px;
                                }
                                .menu ul {
                                    list-style: none;
                                    padding: 0 0 0 20px;
                                    margin: 0 auto;
                                    text-align: center;
                                    font-family: PSLxImperial;
                                    font-size: 22px;
                                    color: #ffca14;
                                    border-bottom: 1px solid #fff;
                                    border-top: 1px solid #fff;
                                    height: 35px;
                                }
                                .menu li {
                                    display: block;
                                    float: left;
                                    padding: 0 38px;
                                    margin: 0;
                                }
                                .menu li a {
                                    color: #ffca14;
                                    text-decoration: none;
                                }
                                .menu li a:hover {
                                    color: #fff;
                                    text-decoration: none;
                                }
                                #slide {
                                    position: relative;
                                    padding: 0;
                                    margin: 0 auto;
                                    z-index: 0;
                                    width: 100%;
                                }
                                #bottomslide {
                                    width: 100%;
                                    background: #102741;
                                }
                                .sizebottomslide {
                                    width: 1000px;
                                    margin: 0 auto;
                                    padding: 20px 0 10px 0;
                                    clear: both;
                                }
                                .boxleft {
                                    float: left;
                                }
                                .boxrigthfty {
                                    float: right;
                                }
                                .clear {
                                    clear: both;
                                }
                                #content {
                                    clear: both;
                                    width: 1000px;
                                    margin: 0 auto;
                                    padding: 10px 0;
                                }
                                #content ul {
                                    list-style: none;
                                    padding: 0 0 0 20px;
                                    margin: 0 auto;
                                    text-align: center;
                                }
                                #content li {
                                    display: block;
                                    float: left;
                                    padding: 5px 27px;
                                    margin: 0;
                                }
                                #content li a {
                                    color: #000;
                                    text-decoration: none;
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
                                /*#content span{ color:#fb0709;}*/

                                #footer {
                                    clear: both;
                                    width: 1000px;
                                    margin: 0 auto;
                                    padding: 0;
                                    text-align: center;
                                    color: #ffca14;
                                }
                                .linefooter {
                                    background: url(<?= ADDRESS ?>images/linefooter.jpg) left top repeat-x;
                                    height: 2px;
                                }
                            }


                        </style>

                    </body>
                    </html>


