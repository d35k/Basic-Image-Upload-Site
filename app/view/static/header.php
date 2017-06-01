<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset_url('bootstrap-3.3.7-dist/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('font-awesome-4.7.0/css/font-awesome.min.css')?>">
    <script src="<?php echo asset_url('bootstrap-3.3.7-dist/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo asset_url('jq/jquery-3.1.1.min.js')?>"></script>
    <script src="<?php echo asset_url('js/lightbox.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/style.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/styla.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/lightbox.css')?>">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>


    <title>Resim Proje Ödevi</title>
    <style type="text/css">
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed navbar-static-top hidden-print">
    <div class="container">
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo site_url();?>"><div class="navbar-brand">Resim Yükle</div></a>
        </div>
        <div class="collapse navbar-collapse" class="menu">
            <ul class="nav navbar-nav navbar-right" class="menu">
                <li><a href="<?php echo site_url()?>"><span class="fa fa-upload"></span> Resim Yükle</a></li>
                <li><a href="<?php echo site_url('galeri')?>"><span class="fa fa-picture-o"></span> Galeri</a></li>
                <?php if(session('uye')){ echo '<li><a href="'.site_url("resimlerim").'"><span class="fa fa-user"></span> Yüklediğim Resimler</a></li>'; }?>
                <?php if(session('uye')){ echo '<li><a href="'.site_url("uyeGiris/cikis").'"><span class="fa fa-user"></span> ÇIKIŞ YAP</a></li>'; }?>
                <?php if(session('uye')){ }else{echo '<li><a href="'.site_url("uyeGiris").'"><span class="fa fa-user"></span> Üye Girişi / Kayıt</a></li>';}?>
                <li><a href="<?php echo site_url('iletisim')?>"><span class="fa fa-address-book"></span> İletişim</a></li>
            </ul>
        </div>
    </div>
</nav>