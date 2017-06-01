<?php
if(url(1)){
    session_destroy();
}
if($_POST){
    $userName = post('userName');
    $password = post('password');
    $password = md5($password);
    $query = $baglanti->query("SELECT * FROM uyeler WHERE userName = '{$userName}' AND userPass = '{$password}'")->fetch(PDO::FETCH_ASSOC);

    if($query){
        $_SESSION['uye'] = $query['userName'];
        header("Location: " . site_url('profil'));
    }else{
        header("Location: " . site_url('uyeGiris'));
    }
}

require view('uyeGiris');