<?php 
    // $connect = mysgli_connect("localhost", "root", "root", "proweb");
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'chat_app');
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
?>