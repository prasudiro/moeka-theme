<?php 

if (isset($_GET['action'])) 
{
	print"<pre>";
	print_r($_POST);
	exit();
}
else
{

?>

<?php 

$kategori = get_terms( array(
    'taxonomy' => 'kategori',
    'hide_empty' => false,
) );

// print"<pre>";
// print_r($kategori);
// exit();

$kualitas = get_terms( array(
    'taxonomy' => 'kualitas',
    'hide_empty' => false,
) );

?>

<h2>Laporan QC</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-edit">Setoran Edit</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-qc">Setoran QC</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=laporan-qc">Laporan QC</a></li>
</ul>

<form method="post" action="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=laporan-qc&#038;action=save" enctype="multipart/form-data">
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
			<th>Isi Laporan</th>
			<td>
			<?php wp_editor( '', 'laporan' ); ?>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<input type="submit" value="Laporkan">
			</td>
		</tr>
	</table>
</form>

<hr>

<table class="wp-list-table widefat fixed striped posts dataTables-setoran">
	<thead>
		<tr>
			<th class="" width="40%">Nama Setoran</th>
			<th class="" width="20%">Penyetor</th>
			<th class="" width="20%">Disetor pada</th>
			<th class="" width="20%">Pengaturan</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	</tbody>
	</table>
	<?php } ?>