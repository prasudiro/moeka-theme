<!-- Load header.php theme -->
<?php get_header(); ?>

<?php 

if (have_posts()) :
  while (have_posts()) :
    the_post();

$post_type = $post->post_type;

endwhile;
endif;

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

$term = $wp_query->queried_object;
$getterm = $term->name; 

?>

<p class="moe-posts">

<div class="moe-navbar">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="moe-breadcrumb-link">Beranda</a>
  <?php if (count($uri_segments) == 3) : ?>
    <a href="<?php home_url('/'); ?><?php echo $term->slug; ?>" class="moe-breadcrumb-link"><?php echo $term->name; ?></a>
  <?php else : ?>
    <a href="<?php home_url('/'); ?><?php echo $term->name; ?>" class="moe-breadcrumb-link"><?php echo $term->label; ?></a>
  <?php endif; ?>
</div>

<div class="moe-posts-related">
    <div class="row">

  <?php if ($uri_segments[1] != $post_type) : ?>

    <!-- Include archive posts type -->
    <?php include dirname( __FILE__ ) . ('/includes/posts-arsip.php'); ?>

  <?php else : ?>


    <!-- Include list of Posts terbaru (like homepage) -->
    <?php include dirname( __FILE__ ) . ('/includes/posts-terbaru.php'); ?>

  <?php endif; ?>

  </div>
</div>

</p>

<!-- Load footer.php theme -->
<?php get_footer(); ?>   