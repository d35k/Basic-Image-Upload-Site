<?php require 'static/header.php';
$id = url(2);
$resimlerim = $baglanti->query("SELECT * FROM resimler WHERE resimYukleyenId = '{$id}'",PDO::FETCH_ASSOC);
?>
    <div class="row">
        <div class="col-xs-3 col-sm-1 col-lg-1"></div>
        <div class="col-xs-4 col-sm-10 col-lg-10">
            <?php
            if($resimlerim->rowCount()){
                foreach ($resimlerim as $key){
                    $kategoriAd = $baglanti->query("SELECT * FROM kategoriler WHERE kategoriId = '{$key['kategoriId']}'")->fetch(PDO::FETCH_ASSOC);
                    $kategori = permalink($kategoriAd['kategoriAd']);
                    ?>
                    <div class="fotoDiv">
                        <a href="<?php echo asset_url('images/'.$kategori . '/' .$key['resimYol'])?>" data-lightbox="Fotoğraf-1" data-title="Lütfen kapatmak için rastgele bir yere basın"><img style="width:400px; height:400px;" class="fotoDivFoto" class="img-resposive" src="<?php echo asset_url('images/'.$kategori . '/' .$key['resimYol'])?>"></a>
                        <div class="fotoAciklama">
                            <h4><?php echo $key['resimAd']?></h4>
                            <h5><a onclick="return confirm('Emin Misiniz?')" href="<?php echo site_url('fotografSil/'.$key['resimId'])?>">Fotoğrafı silmek için tıklayın</a></<h5>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

<?php require 'static/footer.php'; ?>