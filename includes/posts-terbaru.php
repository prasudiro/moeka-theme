<?php 

  $paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $query = new WP_Query(array('post_type'       => $post_type,
                                'order'           => $post_type == 'proyek' ? 'name' : 'date',
                                'orderby'         => 'asc',
                                'post_status'     => 'publish',
                                'paged'           => $paged,
                                ));
?>


<?php if($query->max_num_pages > 1): ?>
  <?php if(!is_front_page() || !is_home()): ?>
  <ul class="pagination" style="padding-bottom:10px; text-align: center">
    <li><span class="moesubs"><?php next_posts_link('&laquo; '.ucfirst($post_type).' sebelumnya', $query->max_num_pages); ?></span></li>
    <li><span class="moesubs"><?php previous_posts_link(ucfirst($post_type).' sesudahnya &raquo;', $query->max_num_pages); ?></span></li>
  </ul>
  <?php endif; ?>
<?php endif; ?>

<ul class="collection">

<?php
  if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        $image = '';
        $contents = get_the_content();
        $images = preg_match_all('/neng.kirino.sexy-([0-9]+).*?"/i', $contents, $matches);
        $regex = '/src="([^"]*)"/';
        // we want all matches
        preg_match_all( $regex, $contents, $matches );
        // reversing the matches array
        $matches = array_reverse($matches);
?>

<a href="<?php echo get_the_permalink(); ?>" class="moe-posts-container collection-item col s12">
  <div class="row">
    <div class="col s3">
      <i class="moe-posts-icons-date material-icons">access_time</i> 
      <span class="moe-posts-date">
        <?php echo get_the_date(); ?> - <?php echo get_the_time(); ?> WIB
      </span>
    </div>
    <div class="col s8">
      <?php if (($post->post_type == 'rilisan') || ($post->post_type == 'proyek')) : ?>
        <i class="moe-posts-icons-title material-icons">live_tv</i> 
      <?php endif; ?>
      <span class="moe-posts-title">
        <?php echo get_the_title(); ?>        
      </span>
    </div>
    <div class="col s1 right">
      <i class="moe-posts-icons-comment material-icons">comment</i> <span class="moe-posts-comment">
      <span class="disqus-comment-count" data-disqus-url="<?php echo get_the_permalink(); ?>"> </span>
      </span>
    </div>
  </div>
</a>

<?php endwhile; endif; ?>

</ul>

<?php if($query->max_num_pages > 1): ?>
  <?php if(!is_front_page() || !is_home()): ?>
  <ul class="pagination" style="text-align: center; margin-top: 30px;">
    <li><span class="moesubs"><?php next_posts_link('&laquo; '.ucfirst($post_type).' sebelumnya', $query->max_num_pages); ?></span></li>
    <li><span class="moesubs"><?php previous_posts_link(ucfirst($post_type).' sesudahnya &raquo;', $query->max_num_pages); ?></span></li>
  </ul>
  <?php endif; ?>
<?php endif; ?>