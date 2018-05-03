<p>

<h2>Silakan pilih gambar banner:</h2>
	<form method="post" action="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=media-upload" enctype="multipart/form-data">
		<input type="file" accept="image/jpeg, image/png" name="file-upload" id="file-upload" required />
		<input type="submit">
	</form>
	<ul>
		<li><i>Tipe berkas hanya JPG dan PNG</i></li>
		<li><i>Resolusi gambar harus lebih dari 1600 pixel</i></li>
	</ul>

	<hr>

<h2>Daftar Banner:</h2>

<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th class="center" width="10%">No.</th>
			<th class="center" width="35%">URL</th>
			<th class="center" width="35%">Gambar</th>
			<th class="center" width="10%">Status</th>
			<th class="center" width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>

<?php 

$get_banner 	= get_option('moesubs_banner', FALSE);

$banner_list 	= json_decode($get_banner, TRUE);

sort($banner_list);

$no = 0;

foreach ($banner_list as $banner) 
{ ?>

<form method="post" action="admin.php?page=peraba-moeka&#038;tab=banner-save" enctype="multipart/form-data">

	<tr>		
		<td class="center">
			<?php $no++; echo $no; ?>
		</td>
		<td>
			<a href="<?php echo wp_get_attachment_url($banner['post_id']); ?>" target="_blank"><?php echo wp_get_attachment_url($banner['post_id']); ?></a>
		</td class="center">
		<td><img src="<?php echo wp_get_attachment_url($banner['post_id']); ?>" width="100%">
		</td>
		<td class="center">
			<input type="hidden" name="post_id" value="<?php echo $banner['post_id'] ?>">
			<select name="status">
				<option value="0" <?php echo $banner['status'] == 0 ? 'selected' : '' ?> >Nonaktif</option>
				<option value="1" <?php echo $banner['status'] == 1 ? 'selected' : '' ?> >Aktif</option>
			</select>
		</td>
		<td class="center">
			<input type="submit" value="Simpan">
			<input type="submit" value="Hapus" name="hapus">
		</td>
	</tr>

</form>

<?php } ?>

		
	</tbody>
</table>

</p>