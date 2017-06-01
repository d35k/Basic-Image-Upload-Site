<?php require 'static/header.php'; ?>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo asset_url('css/materialize.min.css') ?>" type="text/css" rel="stylesheet">
<div class="row" style="width: 40%;margin: 0 auto;">
    <form class="col s6" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input placeholder="İSİM SOYİSİM" id="first_name" name="isim" type="text" class="validate">
                <label for="first_name">ADINIZ VE SOYADINIZ</label>
            </div>
            <div class="input-field col s12">
                <input id="last_name" placeholder="TELEFON" name="telefon" type="text" class="validate">
                <label for="last_name">TELEFON NUMARANIZ</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" name="email" placeholder="EPOSTA" class="validate">
                <label id="email">EPOSTA ADRESİNİZ</label>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                MESAJINIZIN BAŞLIĞI
                <div class="input-field inline">
                    <input id="text" name="baslik" type="text" placeholder="BAŞLIK" class="validate">
                    <label for="text" data-error="wrong" data-success="right"></label>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" placeholder="MESAJ" name="mesaj" class="materialize-textarea"></textarea>
                        <label for="textarea1">Mesajınız</label>
                    </div>
                </div>

        </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="submit">YOLLA
                </div>
            </div>
    </form>
</div>
        <script type="text/javascript" src="<?php echo asset_url('js/materialize.min.js') ?>">
            $('#textarea1').val('New Text');
            $('#textarea1').trigger('autoresize');
        </script>
    </form>
</div>

<?php require 'static/footer.php'; ?>
<?php
if ($_POST) {
    $isim = post('isim');
    $eposta = post('email');
    $telefon = post('telefon');
    $baslik = post('baslik');
    $mesaj = post('mesaj');

    $gonder = $baglanti->prepare("INSERT INTO mesajlar SET
mesajGonderen = ?,
mesajEposta = ?,
mesajTelefon = ?,
mesajBaslik= ?,
mesajIcerik = ?");
    $ekleme = $gonder->execute(array(
        $isim, $eposta, $telefon, $baslik, $mesaj
    ));
    if ($ekleme) {
        $last_id = $baglanti->lastInsertId();
        header('Location:' . site_url(''));
    }else {
        header('Location:' . site_url('iletisim'));
    }
}
?>
