<?php require 'static/header.php'?>
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="input-group">
		<form method="get">
		        <input type="text" class="form-control" name="search" placeholder="İsime Göre Ara">
		        <div class="input-group-btn">
		            <button class="btn btn-default" type="submit">
		                <i class="glyphicon glyphicon-search"></i>
		            </button>
		        </div>
		</form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3 col-sm-1 col-lg-1"></div>
            <div class="col-xs-6 col-sm-10 col-lg-10">
                <?php
                if($_GET){
			$search = get('search');
			$query = $baglanti->query("SELECT * FROM kategoriler WHERE kategoriAciklama LIKE '%$search%'", PDO::FETCH_ASSOC);
			$resimler = $baglanti->query("SELECT * FROM resimler WHERE resimAciklama LIKE '%$search%'", PDO::FETCH_ASSOC);		
		}else{
			$query = $baglanti->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
		}
                if($query->rowCount()){
                    foreach($query as $key){
                        $foto = $baglanti->query("SELECT resimYol FROM resimler WHERE kategoriId = '{$key['kategoriId']}' AND fotografDurum = 1")->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <a href="<?php echo site_url('galeri' . '/' . $key['kategoriId'])?>"><div class="fotoDiv">
                            <img  class="fotoDivFoto" class="img-resposive" src="<?php echo asset_url('images/'. permalink($key['kategoriAd']) .'/'.$foto['resimYol'])?>">
                            <div class="fotoAciklama">
                                <h4><?php echo $key['kategoriAd']?></h4>
                                <h5><?php echo $key['kategoriAciklama']?></h5>
                            </div>
                        </div></a>
                        <?php
                    }
                }
?>
<?php
		if(!empty($_GET['search'])){
                if($resimler->rowCount()){
                    foreach($resimler as $key){
			$kategori = $baglanti->query("SELECT kategoriAd FROM kategoriler WHERE kategoriId = '{$key['kategoriId']}'")->fetch(PDO::FETCH_ASSOC);
			if(!empty($kategori['kategoriAd'])){
                        ?>
                        <div class="fotoDiv">
			<a data-lightbox="Fotoğraf-1" data-title="Lütfen kapatmak için rastgele bir yere basın" href="<?php echo asset_url('images/'. permalink($kategori['kategoriAd']) .'/'.$key['resimYol'])?>">
                            <img  style="width: 208px;height: 198px;" class="fotoDivFoto" class="img-resposive" src="<?php echo asset_url('images/'. permalink($kategori['kategoriAd']) .'/'.$key['resimYol'])?>">
                        </a></div>
                        <?php
			}
                    }
                }
	}
?>
            </div>
        </div>
    </div>
<?php require 'static/footer.php'?>