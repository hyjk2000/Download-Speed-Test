<?php
header('Content-Type: application/octet-stream');
header('Expires: Thu, 01 Dec 1983 20:00:00 GMT');
header('Cache-Control: no-store');

// file size in KB
$file_size = (int)$_GET['size'];
if ($file_size < 1 || $file_size > 32768) $file_size = 4096; // 0KB < $file_size < 32MB

$bytes_remaining = $file_size * 1024;

while ($bytes_remaining > 0) {
	$block = min(8388608, $bytes_remaining); // 1 block = 8MB
	$bytes_remaining -= $block;
	echo str_repeat(0, $block);
	ob_flush();
	flush();
}
