<?php 

$get_menu_desktop  = "";
$get_menu_desktop  = get_option('moesubs_menu_desktop', FALSE);
$menu_desktop      = base64_decode($get_menu_desktop);

echo str_replace("\'", "'", str_replace('\"', '"', htmlspecialchars_decode($menu_desktop)));
?>