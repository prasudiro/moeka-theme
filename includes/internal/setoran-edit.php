<?php 

if (isset($_GET['action']))
{
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attachment_id 		= media_handle_upload('file-upload', 0);

	global $wpdb;
  $table_name = $wpdb->prefix."internal_admin";

  $wpdb->insert($table_name, array(

  'kategori' => $_POST['kategori'],
  'kualitas' => $_POST['kualitas'],
  'episode' => $_POST['episode'],
  'isi' => $attachment_id,
  'users' => get_current_user_id(),
  'type' => 'edit',
  'added' => date("Y-m-d H:i:S"),

  ));

  if($wpdb->last_error !== '')
	{
		echo "<h1 style='color:red'>ERROR!!! SILAKAN DIPERIKSA LAGI!!!</h1>";
		die();
	}
	else
	{
		echo "<h1>SUKSES!!! SETORAN BERHASIL DITAMBAHKAN!!!</h1>";
		echo "<a href='".admin_url('/admin.php?page=internal-admin&tab=setoran-edit')."'>&laquo; Kembali</a>";
	}
}
else
{

$kategori = get_terms( array(
    'taxonomy' => 'kategori',
    'hide_empty' => false,
) );

$kualitas = get_terms( array(
    'taxonomy' => 'kualitas',
    'hide_empty' => false,
) );

?>

<h2>Setoran Edit</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin">Beranda</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-edit">Setoran Edit</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-qc">Setoran QC</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=laporan-qc">Laporan QC</a></li>
</ul>

<form method="post" action="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-edit&#038;action=save" enctype="multipart/form-data">
	<table class="form-table">
		<tr>
			<th>Judul Kartun</th>
			<td>
				<select class="chosen-select" name="kategori" required>
				<option style="display:none" value="">Pilih Judul Kartun</option>
				<?php foreach ($kategori as $k) 
				{
					if ($k->parent != 0) 
					{
						
					echo "<option value=".$k->term_id.">".$k->name;
					
						$tipe_tayang = get_terms( array(
						    'taxonomy' => 'kategori',
						    'hide_empty' => false,
						) );
						
						foreach ($tipe_tayang as $tt) 
						{
							if ($tt->term_id == $k->parent AND $tt->slug != 'serial-tv') 
							{
								echo " (".$tt->name.")";
							}
						}

					echo "</option>";
					}
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Tipe Media</th>
			<td>
				<select class="chosen-select" name="kualitas" required>
				<option style="display:none" value="">Pilih Kualitas Rilisan</option>
				<?php foreach ($kualitas as $k) 
				{
					echo "<option value=".$k->term_id.">".$k->name."</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Episode</th>
			<td>
				<input class="form-control" type="number" name="episode" size="100" placeholder="Nomor Episode" required>
			</td>
		</tr>
		<tr>
			<th>Unggah berkas</th>
			<td><input type="file" name="file-upload" id="file-upload" required accept="application/octet-stream, application/zip, application/x-rar-compressed" />
			<i style="color:red">* hanya berkas zip/rar</i></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input name="users" type="hidden" value="<?php echo get_current_user_id(); ?>">
				<input type="submit" value="Setorkan">
			</td>
		</tr>
	</table>
</form>

<hr>
<hr>
<hr>
<table class="wp-list-table widefat fixed striped posts dataTables-setoran">
	<thead>
		<tr>
			<th class="center" width="50%"><b>Nama Setoran</b></th>
			<th class="center" width="10%"><b>Berkas</b></th>
			<th class="center" width="10%"><b>Penyetor</b></th>
			<th class="center" width="20%"><b>Disetor pada</b></th>
			<th class="center" width="10%"><b>Pengaturan</b></th>
		</tr>
	</thead>
	<tbody>

<?php 
//get data and fetch it to array
global $wpdb;
$table_name 	= $wpdb->prefix."internal_admin";
$setoran_edit = $wpdb->get_results("SELECT * FROM $table_name WHERE type = 'edit'", ARRAY_A);

foreach ($setoran_edit as $edit) { 

$kategori = get_term($edit['kategori']);
$users		= get_userdata($edit['users']);
$avatar		= get_avatar_url($edit['users']);
?>

	<tr>
		<td><?php echo $kategori->name; ?> - Episode <?php echo $edit['episode']; ?></td>
		<td class="center"><a href="<?php echo wp_get_attachment_url($edit['isi']) ?>" class="button">Unduh</a></td>
		<td class="center"><img src="<?php echo $avatar; ?>" width="28" title="<?php echo $users->display_name ?>"></td>
		<td class="center"><?php echo date("d/m/Y - H:i", strtotime($edit['added']."+7 hours")); ?> WIB</td>
		<td class="center">
			<form>
				<input type="submit" value="Hapus" class="form-control">
			</form>
		</td>
	</tr>

<?php } ?>

	</tbody>
	</table>

<?php } ?>