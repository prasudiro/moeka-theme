<!-- Load header.php theme -->
<?php get_header(); ?>

<?php 

if (have_posts()) :
  while (have_posts()) :
    the_post();

$post_type = $post->post_type;

endwhile;
endif;

$term = $wp_query->queried_object;
$getterm = $term->name; 

?>

<p class="moe-posts">

<div class="moe-navbar">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="moe-breadcrumb-link">Beranda</a>
  <?php if (isset($term->labels)) : ?>
    <a href="<?php home_url('/'); ?><?php echo $term->name; ?>" class="moe-breadcrumb-link"><?php echo $term->label; ?></a>
  <?php else : ?>
    <a href="<?php home_url('/'); ?><?php echo $term->slug; ?>" class="moe-breadcrumb-link"><?php echo $term->name; ?></a>
  <?php endif; ?>
</div>

<div class="moe-posts-related">
    <div class="row">

  <?php if (isset($term->labels)) : ?>

    <!-- Include list of Posts terbaru (like homepage) -->
    <?php include dirname( __FILE__ ) . ('/includes/posts-terbaru.php'); ?>

  <?php else : ?>

    <!-- Include archive posts type -->
    <?php include dirname( __FILE__ ) . ('/includes/posts-arsip.php'); ?>

  <?php endif; ?>

  </div>
</div>

</p>

<!-- Load footer.php theme -->
<?php get_footer(); ?>   