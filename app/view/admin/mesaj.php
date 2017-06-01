<?php require 'static/header.php';
$id = url(2);
$query = $baglanti->query("SELECT * FROM mesajlar WHERE mesajId = '{$id}'")->fetch(PDO::FETCH_ASSOC);
if($query) {
    if ($query['mesajDurum'] == 0) {
        $sorgu = $baglanti->prepare("UPDATE mesajlar SET
                                        mesajDurum = :yeniDurum
                                        WHERE mesajId = :mesajId");
        $update = $sorgu->execute(array(
            "yeniDurum" => 1,
            "mesajId" => $id
        ));
    }
}
?>
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $query['mesajGonderen'] . ' Tarafından Gönderilen Mesaj'?> <a href="<?php echo admin_url('mesajlar')?>" class="btn btn-primary">GERİ DÖN</a>
            </div>
            <div class="panel-body">
                <ul class="nav nav-pills">
                    <li class="active"><a href="#home-pills" data-toggle="tab">Mesaj</a>
                    </li>
                    <li class=""><a href="#profile-pills" data-toggle="tab">Gönderen</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home-pills">
                        <h4><?php echo $query['mesajBaslik'] ?></h4>
                        <p><?php echo $query['mesajIcerik'] ?></p>
                        <p><?php echo $query['mesajTarih'] ?></p>
                    </div>
                    <div class="tab-pane fade" id="profile-pills">
                        <h4>Gönderici Bilgileri</h4>
                        <p>İsim Soyisim : <?php echo $query['mesajGonderen'] ?></p>
                        <p>Telefon Numarası : <?php echo $query['mesajTelefon'] ?></p>
                        <p>E-Posta : <?php echo $query['mesajEposta'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require 'static/footer.php'; ?>