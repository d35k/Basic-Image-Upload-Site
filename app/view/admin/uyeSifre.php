<?php require 'static/header.php'?>
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Üye şifre değiştirme ekranı
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
                                <label>Üyenin yeni şifresini giriniz</label>
                                <input type="text" class="form-control" name="uyeSifre"  required>
                            </div>
                            <button type="submit" class="btn btn-default">Ekle</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
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
    $yeniSifre = post('uyeSifre');
    $yeniSifre = md5($yeniSifre);
    $id = url(2);
    $query = $baglanti->prepare("UPDATE uyeler SET userPass = :userPass where userId = :id");
    $success = $query->execute(array(
        "userPass" => $yeniSifre,
        "id" => $id
    ));
    if($success){
        echo "<script>alert('BAŞARILI')</script>";
        header("Location: " . admin_url('uyeler'));
    }
}
?>
<?php require 'static/footer.php'?>