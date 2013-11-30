<?php

include 'config.php';

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


if(!$link){
	echo 'connection failed.please check your config.php';
}

?>