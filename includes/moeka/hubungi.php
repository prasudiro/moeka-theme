<?php 

$email 		= get_option('moesubs_email', FALSE);
$telepon  = get_option('moesubs_phone', FALSE);
$alamat 	= get_option('moesubs_address', FALSE);

?>

<p>

<h2>Silakan lengkapi data Kontak:</h2>

<form method="post" action="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-save" enctype="multipart/form-data">
	<table class="form-table">
		<tr>
			<th>Email</th>
			<td>
				<input class="form-control" type="text" name="moesubs_email" size="100" placeholder="Isi Email" value="<?php echo isset($email) ? $email : "" ?>" required>
			</td>
		</tr>
		<tr>
			<th>No. Telepon</th>
			<td>
				<input class="form-control" type="text" name="moesubs_phone" size="100" placeholder="Isi Nomor Telepon" value="<?php echo isset($telepon) ? $telepon : "" ?>" required>
			</td>
		</tr>
		<tr>
			<th>Alamat</th>
			<td>
			<textarea class="form-control" name="moesubs_address" placeholder="Isi Alamat" rows="3" cols="100" required><?php echo isset($alamat) ? $alamat : "" ?></textarea>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" value="Simpan">
			</td>
		</tr>
	</table>
</form>

</p>