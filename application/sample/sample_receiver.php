<?php 

if (!empty($_POST)) {
	$file = fopen('receiver.txt', 'a+') or die('Failed');
	fwrite($file, implode(" " , $_POST)  . ' ' . date('y-m-d H-i', time()) . PHP_EOL);
	fclose($file);
}

 ?>