<?php 

$moesubs_bg_id  = get_option('moesubs_bg', FALSE);
$moesubs_bg     = wp_get_attachment_url($moesubs_bg_id);

?>

<p>

<h2>Silakan unggah Gambar Latar:</h2>

<form method="post" action="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=bg-upload" enctype="multipart/form-data">
		<input type="file" accept="image/jpeg, image/png" name="file-upload" id="file-upload" required />
		<input type="submit">
	</form>
	<ul>
		<li><i>Tipe berkas hanya JPG dan PNG</i></li>
		<li><i>Resolusi gambar harus lebih dari 1600 pixel</i></li>
	</ul>

<hr>

<h2>Gambar Latar saat ini:</h2>

<img src="<?php echo $moesubs_bg_id != "" ? $moesubs_bg : "./../wp-content/themes/moeka-theme/assets/img/moesubs-moeka-bg.jpg"; ?>" width="50%">

</p>