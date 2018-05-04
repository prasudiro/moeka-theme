<!DOCTYPE html>
<html>
<head>
  <!-- Favicon -->
  <link href="https://puu.sh/wbdmk.png" rel="shorcut icon" type="image/icon" />

  <!-- Let browser know website is optimized for mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <!-- Check for frontpage to determine custom meta -->
  <?php if(is_front_page() || is_home()): ?>
    <meta name="keywords" content="anime, fansub, moesubs, moe, sub indo, subtitle indonesia">
    <meta property="og:keywords" content="anime, fansub, moesubs, moe, sub indo, subtitle indonesia">
    <meta name="description" content="<?php echo get_bloginfo('name').' | '.get_bloginfo('description'); ?>">
  <?php else: ?>
    <?php global $post; ?>
    <meta name="keywords" content="anime, fansub, moesubs, moe, <?php echo get_the_title(); ?>, sub indo, subtitle indonesia">
    <meta property="og:keywords" content="anime, fansub, moesubs, moe, <?php echo get_the_title(); ?>, sub indo, subtitle indonesia">
    <meta name="description" content="<?php echo wp_strip_all_tags($post->post_content, true); ?>">
  <?php endif; ?>

  <!-- Identity and SEO -->
  <title>
    <?php if(is_front_page() || is_home()){
        echo get_bloginfo('name').' | '.get_bloginfo('description');
    } else{
        echo wp_title('').' | '.get_bloginfo('description');
    }?>
  </title>

<!-- Get and use background image data -->
<?php
$moesubs_bg_id  = get_option('moesubs_bg', FALSE);
$moesubs_bg     = wp_get_attachment_url($moesubs_bg_id);
?>

<style type="text/css">
body::before {
  content: "";
  opacity: 0.5;
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: -2;
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
  background-image: url(<?php echo $moesubs_bg_id != "" ? $moesubs_bg : "./wp-content/themes/moeka-theme/assets/img/moesubs-moeka-bg.jpg"; ?>);
  background-position: center center;
}
</style>

<!-- Load WP Admin Head -->
<?php wp_head(); ?>

</head>
<body>

<!-- Loader GIF -->
<div id="preloader">
  <div id="status">&nbsp;
  </div>
    <div id="moe-loading">
      Harap Menunggu ....
    </div>
</div>

  <!-- Moesubs Logo: DO NOT CHANGE IT!!! -->
  <nav>
    <div class="nav-wrapper">
      <a href="<?php echo home_url('/'); ?>" class="brand-logo center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Moe.png" class="tooltipped" data-delay="50" data-position="bottom" data-tooltip="[Moesubs] Jagonya Ngesub">
      </a>
      <a href="#" data-target="moe-mobile-view" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </nav>
  
  <!-- Include mobile menu -->
  <?php include dirname( __FILE__ ) . ('/includes/menu-mobile.php'); ?>

  <!-- Call custom container -->
  <div class="moe-container">

    <!-- Banner section -->
    <div class="col s12 center moe-banner">
      <a href="<?php echo home_url('/'); ?>">

      <!-- GET randomized banner -->
      <?php 
        $banner_list  = array();
        $get_banner   = get_option('moesubs_banner', FALSE);
        $banner_list  = json_decode($get_banner, TRUE);

        foreach ($banner_list as $key => $value) 
        {
          if ($value['status'] == 0) 
          {
           unset($banner_list[$key]);
          }
        }

        shuffle($banner_list);
      ?>
      <?php if (count($banner_list) > 0) : ?>
        <img src="<?php echo wp_get_attachment_url($banner_list[0]['post_id']); ?>" class="tooltipped" data-delay="50" data-position="top" data-tooltip="[Moesubs] Jagonya Ngesub">
      <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-moesubs-moeka.jpg" class="tooltipped" data-delay="50" data-position="top" data-tooltip="[Moesubs] Jagonya Ngesub">
      <?php endif; ?>
      </a>
    </div>
    <!-- END of Banner section -->

        <!-- START OF Informasi section -->
        <div class="col s12 z-depth-3 moe-margin-x2">
          <div class="moe-marginbar">
          <i class="material-icons moe-marginbar-icons">info</i> Informasi
          </div>
          <div class="moe-background-white moe-information">
            <div style="line-height:23px;">

            <!-- START Get active informasi -->
            <?php 
              $informasi = new WP_Query(array('post_type'       => 'informasi',
                                              'post_status'     => 'publish',
                                              'posts_per_page'  => 5));
              if ($informasi->have_posts()) :
                while ($informasi->have_posts()) :
                  $informasi->the_post();
                  echo "<b>[".get_the_date()."]</b>";
                  echo "&nbsp;&nbsp;";
                  echo get_the_content('');
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                  echo "<br>";
                endwhile;
              endif;
            ?>
            <!-- END Get active informasi -->

            <hr>
            <b><a href="<?php echo home_url('/'); ?>informasi" class="tooltipped" data-delay="50" data-position="bottom" data-tooltip="Informasi Moesubs">&raquo; Lihat seluruh informasi</a></b>
            </div>
          </div>
        </div>
        <!-- END OF Informasi section -->

        <!-- Call content -->
        <div class="col s12">
          <div class="row">

            <!-- Sidebar section -->
            <div class="col s12 l4 hide-on-med-and-down">
              <p>
                <div class="z-depth-3 moe-background-white">
                  <div class="moe-menu hide-on-med-and-down">
                    <ul class="collection">
                      <div class="row">
                        <div class="col s12">
                          <div class="col s1"><li class="collection-item"><i class="material-icons">search</i></li></div>           
                          <div class="col s11"><li class="moe-margin-x1 input-field">
                            <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                              <input name="s" type="search" placeholder="Pencarian" class="right">
                            </form>
                          </li>
                          </div>
                        </div>
                      </div>

                        <!-- START Include mobile menu -->
                        <?php include dirname( __FILE__ ) . ('/includes/menu-desktop.php'); ?>
                        <!-- END Include mobile menu -->

                    </ul>
                  </div> 
                </div>   
              </p>  

                <!-- START Include widget sidebar -->
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Moesubs Side Widget") ) : ?>
                <?php endif;?>
                <!-- END Include widget sidebar -->

            </div>
            <!-- END of Sidebar section -->

            <div class="col s12 l8">
              <p>
                <div class="z-depth-3 moe-background-white">
                  <div class="moe-navigation hide-on-med-and-down">
                    <nav>
                      <div class="nav-wrapper">

                        <!-- START Add menu utama -->
                        <?php wp_nav_menu(array('theme_location' => 'menu_utama', 'items_wrap' => wrap_menu_utama())); ?>
                        <!-- END Add menu utama -->

                      </div>
                    </nav>
                   </div>