<?php

if(!url(1)){
    $_url[1] = 'index';
}
if(!session('login')){
    $_url[1] = 'login';
}
if(!file_exists(controller('admin/' . url(1)))){
    $_url[1] = 'index';
}
require controller('admin/' . url(1));