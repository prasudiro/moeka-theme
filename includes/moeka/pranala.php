<p>

<h2>Silakan masukkan data Pranala:</h2>
	
	<form method="post" action="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-save" enctype="multipart/form-data">
		<table class="form-table">
			<tr>
				<th>Judul</th>
				<td>
					<input type="text" name="name" size="100" placeholder="Isi Judul Tautan" required>
				</td>
			</tr>
			<tr>
				<th>Permalink</th>
				<td>
					<input type="text" name="url" size="100" placeholder="Isi Permalink" required>
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

<hr>
<p></p>

<table class="wp-list-table widefat fixed striped posts">
	<thead>
		<tr>
			<th class="" width="10%">No.</th>
			<th class="" width="40%">Judul</th>
			<th class="" width="40%">Permalink</th>
			<th class="" width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php 
      $pranala_list   = array();
      $get_pranala    = get_option('moesubs_pranala_berguna', FALSE);
      $pranala_list   = json_decode($get_pranala, TRUE);
      $no 						= 0;

      if (count($pranala_list) > 0) 
      {
        foreach ($pranala_list as $key => $value) 
        {
        	$no++;
        	echo "<form method='post' action='".admin_url()."admin.php?page=peraba-moeka&#038;tab=pranala-save' enctype='multipart/form-data'>";
        	echo "<tr>";
        	echo "<td>".$no."</td>";
        	echo "<td>".$value['name']."</td>";
        	echo "<td>".$value['url']."</td>";
        	echo "<input type='hidden' name='name' value='".$value['name']."'><input type='hidden' name='url' value='".$value['url']."'>";
        	echo "<td><input type='submit' value='Hapus' name='hapus'></td>";
        	echo "</tr>";
        	echo "</form>";
        }
      }
      else
      {
      	echo "<tr>";
      	echo "<td colspan='4' class='center'><h1>Tidak Ada Data</h2></td>";
      	echo "</tr>";
      }

    ?>

	</tbody>
</table>

</p>