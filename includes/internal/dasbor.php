<div id="wpbody" role="main">
<div id="wpbody-content" aria-label="Konten utama" tabindex="0">
<div class="wrap">
			
<?php if (isset($_GET['tab'])) : include dirname( __FILE__ ) . ('/config.php'); ?>

<?php else : ?>

<h2>Internal Admin Moesubs</h2>

<ul class="tab-menu">
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-edit">Setoran Edit</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-qc">Setoran QC</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=laporan-qc">Laporan QC</a></li>
</ul>

<form action="" method="post">
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="3bb631cfec" /><input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=internal-admin" /><h3>Pelaporan Khusus</h3>
<ul class="moeka-module-desc">
	<li>
		<h4>Setoran Edit</h4>
		<div class="desc">
			<div class="textinner justify">
				<p>
					Setoran skrip yang sudah selesai diterjemahankan dan siap untuk diedit (dipasang Timing, Typesetting, Karaoke, dan elemen pendukung lain).
				</p>			
			</div>
		</div>
		<div class="link">
			<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-edit">Setorkan</a>
		</div>
	</li>
	<li>
		<h4>Setoran QC</h4>
		<div class="desc">
			<div class="textinner justify">
				<p>
					Setoran skrip yang sudah melewati tahap editing dan siap untuk diperiksa terakhir kali sebelum dirilis ke publik. Pemeriksaan dapat dilakukan berkali-kali.
				</p>
			</div>
		</div>
		<div class="link">
						<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=setoran-qc">Setorkan</a>
		</div>
	</li>
	<li>
		<h4>Laporan QC</h4>
		<div class="desc">
			<div class="inner justify">
				<p>
					Laporan hasil pemeriksaan skrip terakhir, proses selanjutnya diperbaiki di bagian Editor. Pelaporan skrip sendiri dapat direvisi berulang kali.
				</p>
			</div>
		</div>
		<div class="link">
						<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=internal-admin&#038;tab=laporan-qc">Laporkan</a>
		</div>
	</li>
</ul>

<?php 
//Check if table exist
global $wpdb;
		$table_name = $wpdb->prefix."internal_admin";
		$wpdb->get_var('SELECT * FROM '.$table_name);
		if($wpdb->last_error !== '')
		{
			echo "<h1 style='color:red'>ERROR!!! DATABASE BELUM DIBUAT!!!</h1>";
		}

?>

<h3>Informasi</h3>
<ul class="moeka-informations">
	<li>
		<span class="pub-date">14/05/2018</span>
		<a href="https://internal.moesubs.com/" target="_blank">
			Untuk sementara harap tetap menggunakan website Internal Moesubs<br>(Jangan lupa tambahkan /login untuk masuk ke dalamnya).
		</a>
	</li>
	<li>
		<span class="pub-date">14/05/2018</span>
		<a href="<?php echo admin_url(); ?>plugins.php">
			(PENTING!!!)<br>Apabila Database belum dibuat, silakan nonaktifkan dan aktifkan kembali plugin Moesubs Posts.
		</a>
	</li>
</ul>
</form>

<?php endif; ?>

</div>
<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->

<?php include dirname( __FILE__ ) . ('/add-js.php'); ?>
