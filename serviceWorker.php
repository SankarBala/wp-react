<?php
$url = substr(dirname($_SERVER['PHP_SELF']), 0, strrpos(dirname($_SERVER['PHP_SELF']),"/wp-content/themes/"));
header("Location: $url", true, 301);
exit();
?>
