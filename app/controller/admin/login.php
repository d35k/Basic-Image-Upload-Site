<?php
if ($_POST) {
    $username = post('username');
    $password = post('password');
    if (!$password || !$username) {
        header('Location:'. admin_url());
    } else {
        $pass = md5($password);
        $user = $baglanti->query("SELECT * FROM users WHERE userName = '{$username}' AND userPass = '{$pass}'")->fetch(PDO::FETCH_ASSOC);
        if ($user) {
                $_SESSION['login'] = 1;
                header('Location:'. admin_url());
        }else{
            header('Location:'. admin_url());
        }
    }
}
require view('admin/login');