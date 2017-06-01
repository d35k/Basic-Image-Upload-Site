<?php require 'static/header.php';

$query = $baglanti->query("SELECT COUNT(resimId) FROM resimler")->fetch(PDO::FETCH_ASSOC);
$kategori = $baglanti->query("SELECT COUNT(kategoriId) FROM kategoriler")->fetch(PDO::FETCH_ASSOC);
$mesaj = $baglanti->query("SELECT COUNT(mesajId) FROM mesajlar")->fetch(PDO::FETCH_ASSOC);
$uyeler = $baglanti->query("SELECT COUNT(userId) FROM uyeler")->fetch(PDO::FETCH_ASSOC);

?>


        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    ADMİN PANEL <small>Resim yükleme sitesi</small>
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3><?php echo $query['COUNT(resimId)']; ?></h3>
                    </div>
                    <div class="panel-footer back-footer-green">
                       Toplam Yüklenen Fotoğraf

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                    <div class="panel-body">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <h3><?php echo $kategori['COUNT(kategoriId)']?> </h3>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        Toplam Kategori

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-red">
                    <div class="panel-body">
                        <i class="fa fa fa-comments fa-5x"></i>
                        <h3><?php echo $mesaj['COUNT(mesajId)']?> </h3>
                    </div>
                    <div class="panel-footer back-footer-red">
                        Toplam Mesaj

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-body">
                        <i class="fa fa-users fa-5x"></i>
                        <h3><?php echo $uyeler['COUNT(userId)']?> </h3>
                    </div>
                    <div class="panel-footer back-footer-brown">
                        Toplam Üye

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mesajlar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        <th>İçerik</th>
                                        <th>Gönderen</th>
                                        <th>Telefon</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $query = $baglanti->query("SELECT * FROM mesajlar ORDER BY mesajDurum", PDO::FETCH_ASSOC);
                                    if($query->rowCount()) {
                                        foreach ($query as $key) {
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><a href="<?php echo admin_url('mesaj/'.$key['mesajId'])?>"><?php echo kisalt($key['mesajBaslik'],40) ?></a></td>
                                                <td style="text-align:center;"><?php echo kisalt($key['mesajIcerik'],60) ?></td>
                                                <td style="text-align:center;"><?php echo $key['mesajGonderen'] ?></td>
                                                <td style="text-align:center;"><?php echo $key['mesajTelefon'] ?></td>
                                                <td style="text-align:center;"><?php echo $key['mesajTarih'] ?></td>
                                                <td style="width: 100px;text-align: center; font-size:15px;"><a href="<?php echo admin_url("mesajlar/".$key['mesajId'])?>"><?php echo $key['mesajDurum'] == 0 ? "<i class='fa fa-times'> Okunmadı</i>" : "<i class='fa fa-check-square'> Okundu</i>" ?></a></td>
                                                <td style="text-align:center;"><a href="<?php echo admin_url('mesajSil/'.$key['mesajId'])?>">SİL</a></td>
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
                    <!--End Advanced Tables -->
                </div>
            </div>
            <!-- /. ROW  -->
        </div>
        <?php require 'static/footer.php'?>