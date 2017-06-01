<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resim Yükleme Sitesi</title>
    <!-- Bootstrap Styles-->
    <link href="<?php echo admin_asset_url('css/bootstrap.css')?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo admin_asset_url('css/font-awesome.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo admin_asset_url('css/custom-styles.css')?>" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        .okunmadi {
            background-color: red;
            color: white;
            text-shadow: 1px 1px 3px black;
        }

        .okundu {
            background-color: greenyellow;
            color: white;
            text-shadow: 1px 1px 3px black;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Tarayıcı navigasyon</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url();?>">RESİM YÜKLE</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="<?php echo admin_url('mesajlar')?>">
                            <?php $mesaj = $baglanti->query("SELECT count(*) FROM mesajlar WHERE mesajDurum = 0")->fetch(PDO::FETCH_ASSOC)?>
                            <div>
                                <i class="fa fa-comment fa-fw"></i><?php echo $mesaj['count(*)']?> Yeni mesaj
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-alerts -->
            </li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo admin_url('login/cikis')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a <?php echo url(1) == 'index' ? 'class="active-menu"' : ""?> href="<?php echo admin_url('')?>"><i class="fa fa-dashboard"></i> ANA EKRAN</a>
                </li>
                <li>
                    <a <?php echo url(1) == 'mesajlar' || url(1) == 'mesaj' ? 'class="active-menu"' : ""?> href="<?php echo admin_url('mesajlar')?>"><i class="fa fa-desktop"></i> MESAJLAR</a>
                </li>
                <li>
                    <a <?php echo url(1) == 'kategoriler' ? 'class="active-menu"' : ""?> href="<?php echo admin_url('kategoriler')?>"><i class="fa fa-bar-chart-o"></i> KATEGORILER</a>
                </li>
                <li>
                    <a <?php echo url(1) == 'uyeler' ? 'class="active-menu"' : ""?> href="<?php echo admin_url('uyeler')?>"><i class="fa fa-users"></i> ÜYELER</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">