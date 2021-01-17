<?php

define('BASEURL', 'http://localhost/yogishop/');
define('ASSET', 'http://localhost/yogishop/public/');

//database
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'yogi');

function amankan($data)
{
    $data = trim($data); //hapus spasi kanan kiri
    $data = stripslashes($data); //hapus tanda \
    $data = htmlspecialchars($data); //ilangin tag html
    return $data;
}
