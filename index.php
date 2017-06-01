<?php
require 'app/init.php';
$_url = get('url');
$_url = array_filter(explode('/', $_url));
if (isset($_url[0])) {
    if(!file_exists(controller($_url[0]))){
        $_url[0] = 'index';
    }
} else {
    $_url[0] = 'index';
}
require controller($_url[0]);
