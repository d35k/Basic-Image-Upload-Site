<?php
if(url(2)){
    $id = url(2);
    $query = $baglanti->query("SELECT * FROM mesajlar WHERE mesajId = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    if($query){
        if($query['mesajDurum'] == 0){
            $sorgu = $baglanti->prepare("UPDATE mesajlar SET
                                        mesajDurum = :yeniDurum
                                        WHERE mesajId = :mesajId");
            $update = $sorgu->execute(array(
                "yeniDurum" => 1,
                "mesajId" => $id
            ));
            if ( $update ){
                header("Location: " . admin_url('mesajlar'));

            }else{
                header("Location: " . admin_url('mesajlar'));

            }
        }else{
            $sorgu = $baglanti->prepare("UPDATE mesajlar SET
                                        mesajDurum = :yeniDurum
                                        WHERE mesajId = :mesajId");
            $update = $sorgu->execute(array(
                "yeniDurum" => 0,
                "mesajId" => $id
            ));
            if ( $update ){
               header("Location: " . admin_url('mesajlar'));
            }else{
                header("Location: " . admin_url('mesajlar'));

            }
        }

    }


}else {
    require view('admin/mesajlar');
}