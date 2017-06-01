<?php require 'static/header.php'?>
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Kategoriler <small>kategorileri düzenlemeniz için!</small>
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Lütfen Eklenecek Kategorinin Adını Yazınız</label>
                                    <input type="text" class="form-control" name="ad" placeholder="Kategori Adı - MAX 21 KARAKTER" maxlength="21" required>
                                </div>
                                <div class="form-group">
                                    <label>Lütfen Kategorinin Açıklamasını Giriniz</label>
                                    <input type="text" class="form-control" name="aciklama" placeholder="Açıklaması - MAX 30 KARAKTER" maxlength="30" required>
                                </div>
                                <button type="submit" class="btn btn-default">Ekle</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
                            <?php $query = $baglanti->query("SELECT * FROM kategoriler", PDO::FETCH_ASSOC);
                                if($query->rowCount()){
                                    foreach ($query as $item) {
                                       ?>
                            <h4><a href="<?php echo admin_url('kategoriler/' . $item['kategoriId'])?>"><i style="font-size:20px;" class="fa fa-trash-o"></i></a> <?php echo $item['kategoriAd']?></h4>
                                        <?php
                                    }
                                }
                            ?>

                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
<?php
    if($_POST){
        $isim = post('ad');
        $aciklama = post('aciklama');
        mkdir(realpath('.') . "/assets/images/" . permalink($isim), 0777);
        $query = $baglanti->prepare("INSERT INTO kategoriler SET
kategoriAd = ?,
kategoriAciklama= ?");
        $insert = $query->execute(array(
            $isim, $aciklama
        ));
        if($insert){
            header("Location: " . admin_url('kategoriler'));
        }
    }
?>
<?php require 'static/footer.php'?>