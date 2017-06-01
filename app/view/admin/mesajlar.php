<?php require 'static/header.php' ?>

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
                                        <th>Sil</th>
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
<?php require 'static/footer.php' ?>