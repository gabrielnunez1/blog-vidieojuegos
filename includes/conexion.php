<?php

$db = mysqli_connect('localhost', 'root', 'root','blog_master', 3306);


mysqli_query($db, "SET NAMES 'UTF-8'");

// Iniciar sesion
if(!isset($_SESSION)){
    session_start();
}

