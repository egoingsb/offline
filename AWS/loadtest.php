<?php
$time = microtime(true);
password_hash('Hello',CRYPT_BLOWFISH,array("cost"=>empty($_GET['cost']) ? 14 : (int)$_GET['cost']));
echo $_SERVER['SERVER_ADDR'].' : '.(microtime(true) - $time);
?>
