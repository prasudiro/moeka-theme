<?php 

if (isset($_GET['hal']) && $_GET['hal'] == 'dlrilisan') 
{
	wp_safe_redirect(home_url('/').'/rilisan/'.$_GET['id'].'/a');
}

if (isset($_GET['hal']) && $_GET['hal'] == 'dlproyek') 
{
	wp_safe_redirect(home_url('/').'/proyek');
}

?>