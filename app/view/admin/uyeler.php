<?php require 'static/header.php';?>
<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="panel panel-default">
        <div class="panel-heading">
            ÜYELER
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Üye Adı</th>
                        <th>Ekledikleri</th>
                        <th>Şifre Düzenle</th>
                        <th>Sil</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $uyeler = $baglanti->query("SELECT * FROM uyeler", PDO::FETCH_ASSOC);
                        if($uyeler->rowCount()){
                            foreach ($uyeler as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['userName']?></td>
                        <td><a href="<?php echo admin_url('uyeEklenen/' . $item['userId'])?>">FOTOĞRAFLAR</a></td>
                        <td><a href="<?php echo admin_url('uyeSifre/' . $item['userId'])?>">DEĞİŞTİR</a></td>
                        <td><a onclick="return confirm('Emin Misiniz?')" href="<?php echo admin_url('uyeSil/' . $item['userId'])?>">SİL</a></td>
                    </tr>
                    <?php
                              }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php require 'static/footer.php';?>
