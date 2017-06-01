<?php require 'static/header.php';?>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo asset_url('css/materialize.min.css')?>" type="text/css" rel="stylesheet">

    <div class="section no-pad-bot" style="width: 50%;margin: 0 auto;">
        <div>
            <form id="upload_form" enctype="multipart/form-data" method="post" action="<?php echo site_url('fotoYukle') ?>" class="card" style="margin: 0.5rem; overflow: hidden;">

                <div class="card-content" style="padding: 15px 20px;">
                    <div id="upload_files_and_urls" class="row" style="height: 130px; margin-bottom: 0;">
                        <div id="upload_local_tab" class="col s12">
                            <div class="input-field">
                                <input required id="local_files" name="files[]" type="file" multiple="multiple" style="width: 100%; height: 43px; margin-top: 13px; cursor: pointer;">
                            </div>
                        </div>
                    </div>
                    <div id="upload_datas" class="row" style="height: 130px; margin-bottom: 0; display: none;">
                        <p class="col s12 flow-text"><span></span> dosya y&uuml;kleme i&ccedil;in bekliyor.</p>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col s12">
                            <textarea required name="description" placeholder="A&ccedil;ıklama" maxlength="1024" class="materialize-textarea" style="margin: 0; padding: 0 0 1rem 0;"></textarea>
                        </div>
                    </div>
                    <div class="row"  style="margin-bottom:35px;">
                    <label>Kategori Seçimi</label>
                    <select name="select" class="browser-default" required>
                        <option value="" disabled selected>Lütfen Kategori Seçiniz</option>
                        <?php
                            $query = $baglanti->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
                        if($query->rowCount()) {
                            foreach ($query as $key) {
                        ?>
                        <option value="<?php echo permalink($key['kategoriAd']) .'/' . $key['kategoriId'] ?>"><?php echo $key['kategoriAd']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <script type="text/javascript" src="<?php echo asset_url('js/materialize.min.js')?>"></script>
                    <script>
                        $(document).ready(function() {
                            $('select').material_select();
                        });
                    </script>
                </div>
                    <div id="upload_toolbar" class="row" style="height: 50px; margin-bottom: 0;">
                        <div class="col">
                            <button type="submit" class="btn waves-effect waves-light left">Y&Uuml;KLE</button>
                            <p class="tooltipped left" style="margin: 7px 0 0 20px;" data-position="top" data-delay="250" data-tooltip="Paylaşımınız &ouml;zelse l&uuml;tfen bunu işaretlemeyiniz.">
                                <input id="privacysetting" name="privacySettings" type="checkbox" value="1" checked>
                                <label for="privacysetting">Herkese A&ccedil;ık</label>
                            </p>
                        </div>

                    </div>
                    <div id="upload_progress" class="row" style="height: 50px; margin-bottom: 0; display: none;">
                        <div class="progress">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card-panel blue-grey darken-1 center-align">
                    <span class="white-text">&quot;S&uuml;r&uuml;kle &amp; Bırak&quot; ile de dosya y&uuml;kleyebilirsiniz.</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>


<?php

if ($_POST) {

    $aciklama = post('description');
    $kategori = post('select');
    $kategori = explode("/", $kategori);
    $uyeAdi = session('uye');
    if($uyeAdi != "") {
        $uyeAdi = $baglanti->query("SELECT userId FROM uyeler WHERE userName = '{$uyeAdi}'")->fetch(PDO::FETCH_ASSOC);
    }
    else{
        $uyeAdi['userId'];
    }
    $durum = post('privacySettings');
    $dizinadi = realpath('.') . '/assets/images/' . $kategori[0] .'/';

    $dosya_sayi = count($_FILES['files']['name']);
    for ($i = 0; $i < $dosya_sayi; $i++) {
        if (!empty($_FILES['files']['name'][$i])) {
            $gercekIsim = generateRandomString(5);
            $isim = $_FILES['files']['name'][$i];
            $tur = pathinfo($isim, PATHINFO_EXTENSION);
$tur = strtolower($tur);
		if($tur == "jpeg" || $tur == "jpg" || $tur == "png" || $tur == "gif" || $tur == "bmp" || $tur =="tiff"){


            move_uploaded_file($_FILES['files']['tmp_name'][$i], $dizinadi . $gercekIsim . '.' . $tur);
            $query = $baglanti->prepare("INSERT INTO resimler SET resimAd = ?, resimAciklama = ?, resimYol = ?, resimYukleyenId = ?, kategoriId = ?, fotografDurum = ?");
            $insert = $query->execute(array(
                $gercekIsim, $aciklama, $gercekIsim . '.' . $tur,$uyeAdi['userId'],$kategori[1],$durum

            ));
            echo ' <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
  <a href="'. site_url('i/'.$gercekIsim) .'">'.site_url('i/'.$gercekIsim).'</a>
</div>';
        }else{
echo "<script type='text/javascript'>alert('Desteklenmeyen veri tipi');</script>";
}
}
    }
    echo "<script type='text/javascript'>alert('Basarili');</script>";


}
?>
<?php require 'static/footer.php'?>
