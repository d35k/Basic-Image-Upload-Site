<?php
$query = $baglanti->prepare("DELETE FROM uyeler WHERE userId = :id");
$delete = $query->execute(array(
    'id' => url(2)
));
header("Location: " .admin _url('uyeler'));