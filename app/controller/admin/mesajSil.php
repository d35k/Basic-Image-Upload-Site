<?php
$query = $baglanti->prepare("DELETE FROM mesajlar WHERE mesajId = :id");
$delete = $query->execute(array(
    'id' => url(2)
));
header("Location: " . admin_url('mesajlar'));