<?php require 'static/header.php' ?>
<?php
$id = url(1);
$query = $baglanti->query("SELECT * FROM resimler WHERE kategoriId = '{$id}' AND fotografDurum = 1", PDO::FETCH_ASSOC);
$yol = $baglanti->query("SELECT kategoriAd FROM kategoriler WHERE kategoriId = '{$id}'")->fetch(PDO::FETCH_ASSOC);
$kategori = $baglanti->query("SELECT kategoriAd FROM kategoriler WHERE kategoriId = '{$id}'")->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container-fluid">
            <h2 style="text-align: center;margin: 20px 0;"><?php echo $kategori['kategoriAd']?> KATEGORİSİNDEKİ RESİMLER</h2>
        <div class="row">
            <div class="col-xs-3 col-sm-1 col-lg-1">

            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <?php
                if($query->rowCount()){
                    foreach($query as $key){
                        ?>
                        <div class="fotoDiv">
                            <a href="<?php echo asset_url('images/' . permalink($yol['kategoriAd']) . '/' . $key['resimYol'])?>" data-lightbox="Fotoğraf-1" data-title="Lütfen kapatmak için rastgele bir yere basın"><img style="width: 208px;height: 198px;"
                                    src="<?php echo asset_url('images/' . permalink($yol['kategoriAd']) . '/' . $key['resimYol'])?>" alt="<?php echo $key['resimAciklama']?>"></a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php require 'static/footer.php' ?>