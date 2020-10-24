<?php
$time = microtime(true);
password_hash('Hello',CRYPT_BLOWFISH,array("cost"=>14));
echo microtime(true) - $time;
?>