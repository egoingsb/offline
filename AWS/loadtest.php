<?php
$time = microtime(true);
date_default_timezone_set("Asia/Seoul");
password_hash('Hello',CRYPT_BLOWFISH,array("cost"=>empty($_GET['cost']) ? 14 : (int)$_GET['cost']));
echo 'IP address : '. $_SERVER['SERVER_ADDR'].'<br>';
echo '현재 시간 : '.date("Y-m-d h:i:sa").'<br>';
echo '소요 시간 : '.(microtime(true) - $time).'<br>';
?>
