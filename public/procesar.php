<?php 

echo "<pre>";
print_r($_POST);
echo "</pre>";

echo md5($_POST['name']);

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>