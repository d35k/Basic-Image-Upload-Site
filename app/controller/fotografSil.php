<?php
$id = url(1);
$query = $baglanti->prepare("DELETE FROM resimler WHERE resimId = :id");
$delete = $query->execute(array(
    'id' => $id
));
if($delete){
    header("Location: " . $_SERVER['HTTP_REFERER']);
}