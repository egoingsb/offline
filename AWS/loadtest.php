<?php
$time = microtime(true);
password_hash('Hello',CRYPT_BLOWFISH,array("cost"=>empty($_GET['cost']) ? 14 : (int)$_GET['cost']));
echo microtime(true) - $time;
?>
