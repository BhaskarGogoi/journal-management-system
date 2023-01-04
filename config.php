<?php
// $http_host = '//'.$_SERVER['HTTP_HOST'];
$http_host = '//' . $_SERVER['HTTP_HOST'] . '/journal-management-system';
$http_root = $_SERVER['DOCUMENT_ROOT'] . '/journal-management-system';


$host = "localhost";
$username = "root";
$password = "";
$database = "journal";


$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
