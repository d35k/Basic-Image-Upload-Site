<?php
if(url(2)){
    $id = url(2);
    $kategoriAd = $baglanti->query("SELECT kategoriAd FROM kategoriler WHERE kategoriId = '{$id}'")->fetch(PDO::FETCH_ASSOC);

    $query = $baglanti->prepare("DELETE FROM kategoriler WHERE kategoriId = :id");
    $delete = $query->execute(array(
        'id' => url(2)
    ));
    if($delete){
        KLASORSIL(realpath('.') . '/assets/images/' . permalink($kategoriAd['kategoriAd']) . '/');
        header('Location: ' . admin_url('kategoriler'));
    }
}
require view('admin/kategoriler');