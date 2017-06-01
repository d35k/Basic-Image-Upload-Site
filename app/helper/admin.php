<?php
function error_f($message)
{
    echo '<div class="message error box-">' . $message . '</div>';
}

function warning($message)
{
    echo '<div class="message warning box-">' . $message . '</div>';
}

function info($message)
{
    echo '<div class="message info box-">' . $message . '</div>';
}
function success($message){
    echo '<div class="message success box-">'.$message.'</div>';
}
