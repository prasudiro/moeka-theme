<?php 

$paged   = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = (array(
              'post_type' => array('rilisan', 'proyek'),
              'tax_query' => array(
              array(                     
                  'taxonomy' => $term->taxonomy,
                  'field' => 'slug',
                  'terms' => $getterm,
                  'include_children' => true,          
                  'operator' => 'IN' 
              ),
          ),
              'order' => 'desc',
              'paged'           => $paged,
              ) );  

$query = new wp_query($args); 

?>

<?php if($query->max_num_pages > 1): ?>
  <?php if(!is_front_page() || !is_home()): ?>
  <ul class="pagination" style="padding-bottom:10px; text-align: center">
    <li><span class="moesubs"><?php next_posts_link('&laquo; Rilisan sebelumnya', $query->max_num_pages); ?></span></li>
    <li><span class="moesubs"><?php previous_posts_link('Rilisan sesudahnya &raquo;', $query->max_num_pages); ?></span></li>
  </ul>
  <?php endif; ?>
<?php endif; ?>

<?php 
if ($query->have_posts()) : 
    while ($query->have_posts()) : $query->the_post(); 

    $image = '';
    $contents = get_the_content();
    $images = preg_match_all('/neng.kirino.sexy-([0-9]+).*?"/i', $contents, $matches);
    $regex = '/src="([^"]*)"/';
    // we want all matches
    preg_match_all( $regex, $contents, $matches );
    // reversing the matches array
    $matches = array_reverse($matches);

?>

<div class="col s6 m3">
  <a href="<?php echo get_the_permalink(); ?>" class="tooltipped" data-delay="50" data-position="top" data-tooltip="<?php echo $post->post_title; ?>">
    <div class="card small">
      <div class="card-image">
        <?php if(has_post_thumbnail()): ?>
          <?php the_post_thumbnail('large', array('class' => 'img-responsive moe-img')); ?>
        <?php else: ?>
          <img src="<?php echo $matches[0][0]; ?>" alt="<?php echo get_the_title(); ?>" class="img-responsive moe-img" />
        <?php endif; ?>     
      </div>
      <div class="card-content">
          <?php echo strlen(wp_strip_all_tags($post->post_content))>140 ? substr(wp_strip_all_tags($post->post_content), 0, 140)." ..." : wp_strip_all_tags($post->post_content); ?>
      </div>
      <div class="card-action moesubs red">
        &raquo; Selengkapnya
      </div>
    </div>
  </a>
</div>

<?php endwhile; endif; ?>

<?php if($query->max_num_pages > 1): ?>
  <?php if(!is_front_page() || !is_home()): ?>
  <div class="col s12">
  <ul class="pagination" style="text-align: center; margin-bottom:-10px;">
    <li><span class="moesubs"><?php next_posts_link('&laquo; Rilisan sebelumnya', $query->max_num_pages); ?></span></li>
    <li><span class="moesubs"><?php previous_posts_link('Rilisan sesudahnya &raquo;', $query->max_num_pages); ?></span></li>
  </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>