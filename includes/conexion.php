<?php
     //Iniciar la session
     //$mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket);
     session_start();
     
     $host = "localhost";
     $user = "root";
     $password = "root";
     $dbname = "proyecto";
     $port = 3308;       
     $socket = false;
     //$db = mysqli_connect($server,$username,$password,$database);
     $db = mysqli_connect($host,$user,$password,$dbname,$port);

     mysqli_query($db ,"SET NAMES 'utf8'");



?>