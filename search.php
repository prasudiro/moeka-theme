
<!-- Load header.php theme -->
<?php get_header(); ?>

<p class="moe-posts">

<a href="<?php echo esc_urL(home_url('/')); ?>" class="btn red moesubs tooltipped waves-effect waves-light" data-position="bottom" data-tooltip="Rilisan Terbaru"><i class="left material-icons">search</i> <?php echo $_GET['s']; ?></a><br><br>

<div class="moe-posts-related">
  <div class="row">

<?php
	if (have_posts()) :
	while (have_posts()) :
	  the_post();
	// print"<pre>";
	// print_r($post);exit();

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
<?php endwhile; ?>

<?php else : ?>

<div class="col s12" style="margin-top: -70px;">
	<h3 class="moesubs center">Di sini hanya ada hati yang kosong.</h3>
	<img src="https://neng.kirino.sexy/xsztm.jpg" class="moe-img">
</div>

<?php endif; ?>

  </div>
</div>

</p>

<!-- Load footer.php theme -->
<?php get_footer(); ?> 
