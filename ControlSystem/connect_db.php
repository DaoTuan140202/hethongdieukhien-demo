<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "cd";
$con = mysqli_connect($host, $user, $password, $database);

$con -> set_charset('utf8');
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

