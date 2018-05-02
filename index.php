<!-- Load header.php theme -->
<?php get_header(); ?>

<p class="moe-posts">
  <a href="<?php echo esc_urL(home_url('/')); ?>" class="btn red moesubs tooltipped waves-effect waves-light" data-position="bottom" data-tooltip="Rilisan Terbaru"><i class="left material-icons">format_list_numbered</i> Rilisan Terbaru</a><br><br>

  <?php if(is_front_page() || is_home()): ?>
  <ul class="pagination" style="padding-bottom:10px; margin-top:-40px; text-align: center">
    <li><a href="<?php echo esc_urL(home_url('/')); ?>/rilisan/page/2" class="moesubs red-text tooltipped" data-delay="50" data-position="top" data-tooltip="Lihat rilisan sebelumnya">&laquo; Rilisan sebelumnya</a></li>
  </ul>
  <?php endif; ?>

  <?php $post_type = 'rilisan'; ?>
  <!-- START Include posts terbaru -->
  <?php include dirname( __FILE__ ) . ('/includes/posts-terbaru.php'); ?>
  <!-- END Include posts terbaru -->

</p>

<?php if(is_front_page() || is_home()): ?>
<p class="moe-posts">
  <ul class="pagination" style="padding-bottom:10px; margin-top:-40px; text-align: center">
    <li><a href="<?php echo esc_urL(home_url('/')); ?>/rilisan/page/2" class="moesubs red-text tooltipped" data-delay="50" data-position="top" data-tooltip="Lihat rilisan sebelumnya">&laquo; Rilisan sebelumnya</a></li>
  </ul>
</p>
<?php endif; ?>

<!-- Load footer.php theme -->
<?php get_footer(); ?>   