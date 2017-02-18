<?php
$message = "test";
$hash =  password_hash($message, PASSWORD_DEFAULT);
echo $hash;
?>