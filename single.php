<!-- Load header.php theme -->
<?php get_header(); ?>

<!-- Call the content -->
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  // print"<pre>";
  // print_r($post);exit();
?>

<p class="moe-posts">
   <div class="moe-navbar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="moe-breadcrumb-link">Beranda</a>

    <?php if (($post->post_type == 'rilisan') || ($post->post_type == 'proyek')) : ?>
      <!-- GET the label -->
      <?php $tipe = get_the_terms($post->ID, 'kategori');
        foreach ($tipe as $t) 
        {
          if ($t->parent == 0) 
          {
            echo "<a href='".home_url('/').$t->taxonomy."/".$t->slug."' class='moe-breadcrumb-link'>".$t->name."</a>";
            break;
          }
        }
      ?>

      <!-- GET the label -->
      <?php $anime = get_the_terms($post->ID, 'kategori');
        foreach ($anime as $a) 
        {
          if ($a->parent != 0) 
          {
            echo "<a href='".home_url('/').$a->taxonomy."/".$a->slug."' class='moe-breadcrumb-link'>".$a->name."</a>";
            break;
          }
        }
      ?>
    <?php else : ?>
      <?php if ($post->post_type == 'informasi') : ?>
        <?php echo "<a href='".home_url('/').$post->post_type."' class='moe-breadcrumb-link'>".ucfirst($post->post_type)."</a>"; ?>
        <?php echo "<a href='".get_the_permalink()."' class='moe-breadcrumb-link'>".ucfirst($post->post_title)."</a>"; ?>
      <?php else : ?>
        <?php echo "<a href='".get_the_permalink()."' class='moe-breadcrumb-link'>".ucfirst($post->post_title)."</a>"; ?>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <div class="moe-single-meta grey-text moesubs">
    <div class="col s12">
      <div class="col s12 m6">
        <i class="moe-posts-icons-date-single material-icons">access_time</i> <?php echo get_the_date(); ?> - <?php echo get_the_time(); ?> WIB
        &nbsp;&nbsp;&nbsp;
        <i class="moe-posts-icons-date-single material-icons">person</i> <?php echo get_the_author(); ?>      
      </div>
      <div class="col s12 m6">
        <iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo get_the_permalink(); ?>%2Fdocs%2Fplugins%2F&width=300&layout=standard&action=like&size=small&show_faces=false&share=true&height=35&appId=145593842186986" width="300" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </div>
    </div>    
  </div>
  <div class="moe-single-title"><a href="<?php echo get_the_permalink(); ?>" class="tooltipped" data-position="top" data-tooltip="<?php echo get_the_title(); ?>">
    <?php if (($post->post_type == 'rilisan') || ($post->post_type == 'proyek')) : ?>
    <i class="moe-posts-icons-title material-icons">live_tv</i> 
    <?php endif; ?>
    <span class="moe-posts-title">
    <?php echo get_the_title(); ?>
    </span></a><hr>
    <div class="moe-posts-content">
    <?php if(has_post_thumbnail()): ?>
      <?php the_post_thumbnail('large', array('class' => 'img-responsive moe-img')); ?>
      <hr>
    <?php endif; ?>
    <?php echo get_the_content(); ?>
    </div>
    <?php if (($post->post_type == 'rilisan') || ($post->post_type == 'proyek')) : ?>
      <hr>
      <div class="moe-posts-footer">
        <i class="material-icons moe-posts-icons-comment">label_outline</i>

        <!-- GET the label -->
        <?php $tipe = get_the_terms($post->ID, 'kategori');
          foreach ($tipe as $t) 
          {
            if ($t->parent == 0) 
            {
              echo "<a href='".home_url('/').$t->taxonomy."/".$t->slug."'>".$t->name."</a>";
              break;
            }
          }
        ?>

        &nbsp;&nbsp;&nbsp;
        <i class="material-icons moe-posts-icons-comment">video_label</i> 
        
        <!-- GET the label -->
        <?php $tayangan = get_the_terms($post->ID, 'kategori');
          foreach ($tayangan as $k) 
          {
            if ($k->parent != 0) 
            {
              echo "<a href='".home_url('/').$k->taxonomy."/".$k->slug."'>".$k->name."</a>";
              break;
            }
          }
        ?>

        <?php if ($post->post_type == 'rilisan') : ?>
        &nbsp;&nbsp;&nbsp;
        <i class="material-icons moe-posts-icons-comment">wb_sunny</i> 
        
        <!-- GET the label -->
        <?php $musim = get_the_terms($post->ID, 'musim');
          if ($musim) 
          {            
            foreach ($musim as $m) 
            {
              echo "<a href='".home_url('/').$m->taxonomy."/".$m->slug."'>".$m->name."</a>";
              break;
            }
          }
          else
          {
            echo "<i>Musim tidak diketahui</i>";
          }
        ?>
        <?php endif; ?>
      </div> 
    <?php endif; ?>   
  </div>

  <?php if (($post->post_type == 'rilisan') || ($post->post_type == 'proyek')) : ?>
  <div class="moe-marginbar">
    <i class="material-icons moe-marginbar-icons">new_releases</i> <?php echo ucfirst($post->post_type); ?> Terkait
  </div>  
  <div class="moe-posts-related">
    <div class="row">

    <!-- START GET related posts -->
    <?php $related = get_the_terms($post->ID, 'kategori');
      $slug = "";
      if (isset($related[0]->parent) && $related[0]->parent != 0)
      {
        $slug = $related[0]->slug;
      }
      else
      {
        $slug = $related[1]->slug;
      }
        $terkait = new WP_Query(array('tax_query' =>  array(
                                        array(
                                          'taxonomy' => 'kategori',
                                          'field'    => 'slug',
                                          'terms'    => $slug,
                                          ),
                                        ),
                                      'orderby'         => 'rand',
                                      'post_status'     => 'publish',
                                      'posts_per_page'  => 8,
                                      'post__not_in'    => array($post->ID)));
        if ($terkait->have_posts()) :
            while ($terkait->have_posts()) :
              $terkait->the_post();
              $image = '';
              $contents = get_the_content();
              $images = preg_match_all('/neng.kirino.sexy-([0-9]+).*?"/i', $contents, $matches);
              $regex = '/src="([^"]*)"/';
              // we want all matches
              preg_match_all( $regex, $contents, $matches );
              // reversing the matches array
              $matches = array_reverse($matches);
    ?>

    <div class="col s6 l3">
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

    <?php endwhile; else : echo "<h4 class='moesubs center'>Tidak ada rilisan terkait</h4>"; endif; ?>

    <!-- END GET related posts -->

    </div>
  </div>
  <?php endif; ?>    

  <div class="moe-marginbar">
    <i class="material-icons moe-marginbar-icons">comment</i> Komentar
  </div>                 
  <div class="moe-posts-comments">
    <?php comments_template(); ?>
  </div>
  </div>
</p>

<?php endwhile; endif; ?>

<!-- Load footer.php theme -->
<?php get_footer(); ?>   