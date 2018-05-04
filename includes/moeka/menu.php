<?php 

$get_menu_desktop  = "";
$get_menu_desktop  = get_option('moesubs_menu_desktop', FALSE);
$menu_desktop      = base64_decode($get_menu_desktop);

$get_menu_mobile  = "";
$get_menu_mobile  = get_option('moesubs_menu_mobile', FALSE);
$menu_mobile      = base64_decode($get_menu_mobile);

?>

<p>

<h2>Silakan tentukan template Menu:</h2>
<ul>
		<li><i>Hanya berlaku untuk HTML</i></li>
		<li><i>Lakukan dengan hati-hati! Tampilan taruhannya!</i></li>
	</ul>

<form method="post" action="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-save" enctype="multipart/form-data">
	<table class="wp-list-table widefat fixed striped posts">
		<tr>
			<th><h4><b>Menu Desktop</b></h4></th>
		<tr>
		</tr>
			<td>
				<textarea rows="10" cols="150" name="menu-desktop" placeholder="Isi HTML Menu Desktop di sini" required><?php echo isset($menu_desktop) ? str_replace("\'", "'", str_replace('\"', '"', htmlspecialchars_decode($menu_desktop))) : ""; ?></textarea>
			</td>
		</tr>
		</tr>
			<td>
				<input type="hidden" name="menu_type" value="desktop">
			</td>
		</tr>
	</table>

<hr>

	<table class="wp-list-table widefat fixed striped posts">
		<tr>
			<th><h4><b>Menu Mobile</b></h4></th>
		<tr>
		</tr>
			<td>
				<textarea rows="10" cols="150" name="menu-mobile" placeholder="Isi HTML Menu Mobile di sini" required><?php echo isset($menu_mobile) ? str_replace("\'", "'", str_replace('\"', '"', htmlspecialchars_decode($menu_mobile))) : ""; ?></textarea>
			</td>
		</tr>
		</tr>
			<td>
				<input type="hidden" name="menu_type" value="mobile">
			</td>
		</tr>
	</table>

<input type="submit">

</form>

</p>