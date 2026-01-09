<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//serve_image.php
//MMXXVI MSCRATCH

function serve_image(string $file) {
$file = basename($file);
$real = realpath(images_path . '/' . $file);

if (! $real || ! str_starts_with($real, realpath(images_path))) {
http_response_code(404);
exit('File not found');
}

$ext = strtolower(pathinfo($real, PATHINFO_EXTENSION));
switch ($ext) {
case 'jpg':
case 'jpeg':
header('Content-Type: image/jpeg'); break;
case 'png':
header('Content-Type: image/png'); break;
default:
header('Content-Type: application/octet-stream');
}
readfile($real);
exit;
}
