<?php if (isset($_GET['tab']) && $_GET['tab'] == 'banner') : ?>

<h2>Banner Moeka Theme</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

<?php include dirname( __FILE__ ) . ('/moeka/banner.php') ?>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'hubungi-kami') : ?>

<h2>Hubungi Kami Moeka Theme</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'pranala-berguna') : ?>

<h2>Pranala Berguna Moeka Theme</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'menu-paten') : ?>

<h2>Menu Paten Moeka Theme</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'gambar-latar') : ?>

<h2>Gambar Latar Moeka Theme</h2>

<ul class="tab-menu">
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka">Beranda</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=banner">Banner</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=hubungi-kami">Hubungi Kami</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=pranala-berguna">Pranala Berguna</a></li>
	<li class="tab-item"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=menu-paten">Menu Paten</a></li>
	<li class="current"><a href="<?php echo admin_url(); ?>admin.php?page=peraba-moeka&#038;tab=gambar-latar">Gambar Latar</a></li>
</ul>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'media-upload') : 

if (!isset($_SERVER['HTTP_REFERER'])) 
{
	echo "<h2>Gagal! Asal tidak jelas!</h2>";
	echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
	die();
}

require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attachment_id 		= media_handle_upload('file-upload', 0);

	$get_option   		= get_option('moesubs_banner', FALSE) ? : array();

	$option_detail 		= json_decode($get_option, TRUE);

	$option_detail[] 	= array(
													'post_id'		=> $attachment_id,
													'status'		=> 1
											);

	$save_detail		  = json_encode($option_detail);


	$save_option     	= update_option('moesubs_banner', $save_detail, '', 'yes');

	if ($save_option) 
	{
		echo "<h2>Sukses menambahkan Banner!</h2>";
		echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
	}
	else
	{
		echo "<h2>Gagal! Silakan periksa lagi!</h2>";
		echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
	}

?>

<?php elseif (isset($_GET['tab']) && $_GET['tab'] == 'banner-save') : 

if (!isset($_SERVER['HTTP_REFERER'])) 
{
	echo "<h2>Gagal! Asal tidak jelas!</h2>";
	echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
	die();
}

$get_banner 	= get_option('moesubs_banner', FALSE);

$banner_list 	= json_decode($get_banner, TRUE);

foreach ($banner_list as $key => $value) 
{
	if (isset($_POST['hapus'])) 
	{
		if ($value['post_id'] == $_POST['post_id']) 
		{
			unset($banner_list[$key]);
		}
	}
	else
	{
		if ($value['post_id'] == $_POST['post_id']) 
		{
			unset($banner_list[$key]);
			$banner_list[] = array('post_id' => $_POST['post_id'], 'status' => $_POST['status']);
		}
	}
}

$save_detail		  = json_encode($banner_list);
$save_option     	= update_option('moesubs_banner', $save_detail, '', 'yes');

if ($save_option) 
{
	echo "<h2>Sukses mengubah Banner!</h2>";
	echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
}
else
{
	echo "<h2>Gagal! Silakan periksa lagi!</h2>";
	echo "<a href='".admin_url('/admin.php?page=peraba-moeka&tab=banner')."'>&laquo; Kembali</a>";
}

?>

<?php else : ?>

<h2>404 Halaman Tidak Ditemukan</h2>

<h4><a href="<?php echo admin_url('/admin.php?page=peraba-moeka'); ?>">&laquo; Kembali</a></h4>

<?php endif; ?>