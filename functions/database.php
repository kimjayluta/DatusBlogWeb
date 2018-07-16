<?php
$connect = mysqli_connect('localhost','root','','datusblog');

if (mysqli_connect_error()) {
    echo "failed to connect:" . mysqli_connect_error();
}
