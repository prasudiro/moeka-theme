<div id="wpbody" role="main">
	<div id="wpbody-content" aria-label="Konten utama" tabindex="0">
		<div class="wrap">

<?php if (isset($_GET['tab'])) : include dirname( __FILE__ ) . ('/moeka-config.php'); ?>


<?php else : ?>

			<h2>Peraba Moeka Theme</h2>

<ul class="tab-menu">
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

		<form action="" method="post">
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="3bb631cfec" /><input type="hidden" name="_wp_http_referer" value="/wp-admin/admin.php?page=peraba-moeka" /><h3>Penyetelan Umum</h3>
<ul class="moeka-module-desc">
	<li>
		<h4>Banner</h4>
		<div class="desc">
			<div class="textinner justify">
				<p>
					Banner dapat diunggah secara manual dengan jumlah yang tanpa batas, dan menyetel status pada masing-masing gambar untuk diaktifkan juga ditampilkan secara acak.
				</p>			
			</div>
		</div>
		<div class="link">
			<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Setel</a>
		</div>
	</li>
	<li>
		<h4>Hubungi Kami</h4>
		<div class="desc">
			<div class="textinner justify">
				<p>
					Mengisi kontak email, telepon, dan alamat lengkap secara manual untuk langsung ditampilkan pada halaman depan di bagian navigasi kaki (footer).
				</p>
			</div>
		</div>
		<div class="link">
						<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Setel</a>
		</div>
	</li>
	<li>
		<h4>Pranala Berguna</h4>
		<div class="desc">
			<div class="inner justify">
				<p>
					Mengisi tautan-tautan ke luar yang berguna untuk memudahkan pengguna mengakses situs yang berhubungan baik secara langsung maupun tidak.
				</p>
			</div>
		</div>
		<div class="link">
						<a class="to-settings-page button" href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Setel</a>
		</div>
	</li>
</ul>
<h3>Informasi</h3>
<ul class="moeka-informations">
	<li>
		<span class="pub-date">02/05/2018</span>
		<a href="https://moesubs.com/2018/05/03/moeka-theme-riwayat-1-0" target="_blank">
			Moeka Theme mengudara di Github dengan kontribusi terbuka (Repo: moeka-theme)
		</a>
	</li>
</ul>
</form>

<?php endif; ?>

</div>
<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->

