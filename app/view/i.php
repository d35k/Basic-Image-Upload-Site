<?php
$id = url(1);
$resim = $baglanti->query("SELECT * FROM resimler WHERE resimAd = '{$id}'")->fetch(PDO::FETCH_ASSOC);

$kategoriler = $baglanti->query("SELECT * FROM kategoriler WHERE kategoriId = '{$resim['kategoriId']}'")->fetch(PDO::FETCH_ASSOC);
?>
<style>
    body{
        margin:0;
        padding:0;
    }
</style>
<img src="<?php echo asset_url('images/' . permalink($kategoriler['kategoriAd']) . '/' . $resim['resimYol'])?>" alt="resim">
