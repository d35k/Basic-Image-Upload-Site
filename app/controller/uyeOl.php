<?php
if ($_POST) {
    $userName = post('userName');
    $password = post('password');
    $password = md5($password);
    $query = $baglanti->prepare("INSERT INTO uyeler SET userName = :userName, userPass = :userPass");
    $query = $query->execute(array(
        "userName" => $userName,
        "userPass" => $password,
    ));

    if ($query) {
        $_SESSION['uye'] = $userName;
        header("Location: " . site_url('profil'));
    } else {
        header("Location: " . site_url('uyeGiris'));
    }
}
require view('uyeOl');
