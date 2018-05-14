<?php if (isset($_GET['tab']) && $_GET['tab'] == 'setoran-edit') : ?>

	<?php include dirname( __FILE__ ) . ('/setoran-edit.php'); ?>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'setoran-qc') : ?>

	<?php include dirname( __FILE__ ) . ('/setoran-qc.php'); ?>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'laporan-qc') : ?>

	<?php include dirname( __FILE__ ) . ('/laporan-qc.php'); ?>

<?php else : ?>

<h2>404 Halaman Tidak Ditemukan</h2>

<h4><a href="<?php echo admin_url('/admin.php?page=internal-admin'); ?>">&laquo; Kembali</a></h4>

<?php endif; ?>