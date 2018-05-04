<?php 

$get_menu_mobile  = "";
$get_menu_mobile  = get_option('moesubs_menu_mobile', FALSE);
$menu_mobile      = base64_decode($get_menu_mobile);

echo isset($menu_mobile) ? str_replace("\'", "'", str_replace('\"', '"', htmlspecialchars_decode($menu_mobile))) : "<ul class='sidenav collection' id='moe-mobile-view'><a>#</a></ul>";

?>