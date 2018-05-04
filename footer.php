</p>
              </div>
            </div>
          </div>
        </div>
  </div>

  <footer class="page-footer moesubs">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Hubungi Kami</h5>
          <p class="grey-text text-lighten-4">
            <ul>

            <?php 
              $email    = get_option('moesubs_email', FALSE);
              $telepon  = get_option('moesubs_phone', FALSE);
              $alamat   = get_option('moesubs_address', FALSE);
            ?>

              <li><i class="material-icons moe-posts-icons-title">email</i> 
              <a href="<?php echo isset($email) ? $email : "email@name.com" ?>" class="tooltipped grey-text text-lighten-4" data-delay="50" data-position="top" data-tooltip="Email to Moesubs"><?php echo isset($email) ? $email : "email@name.com" ?></a></li>
              <li><i class="material-icons moe-posts-icons-title">phone</i> <?php echo isset($telepon) ? $telepon : "000000000" ?></li>
              <li style="width: 75%"><i class="material-icons moe-posts-icons-title">store</i> <?php echo isset($alamat) ? $alamat : "Jalan Kaki No. 1" ?></li>
            </ul>  
          </p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Pranala Berguna</h5>
          <ul>

           <?php 
              $pranala_list   = array();
              $get_pranala    = get_option('moesubs_pranala_berguna', FALSE);
              $pranala_list   = json_decode($get_pranala, TRUE);

              if (count($pranala_list) > 0) 
              {
                foreach ($pranala_list as $key => $value) 
                {
                  echo"<li><a class='grey-text text-lighten-3' target='_blank' href='".$value['url']."'>".$value['name']."</a></li>";
                }
              }

            ?>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      ©2010-<?php echo date("Y"); ?> <a href="#link_kosong" class="tooltipped grey-text text-lighten-4" data-delay="50" data-position="top" data-tooltip="[Moesubs] Jagonya Ngesub">[Moesubs] Jagonya Ngesub</a>
      <span class="grey-text text-lighten-4 right" href="#!">
      Tema oleh <a href="https://github.com/prasudiro" target="_blank" class="tooltipped grey-text text-lighten-4" data-delay="50" data-position="top" data-tooltip="Prasudiro di Github">Prasudiro</a>. 
      Dikembangkan dengan <a href="https://wordpress.org/" target="_blank" class="tooltipped grey-text text-lighten-4" data-delay="50" data-position="top" data-tooltip="Wordpress">Wordpress</a> 
      dan <a href="https://kusanagi.tokyo/" target="_blank" class="tooltipped grey-text text-lighten-4" data-delay="50" data-position="top" data-tooltip="[KUSANAGI] Ultrafast Wordpress Virtual Machine">KUSANAGI</a>.
      </span>
      </div>
    </div>
  </footer>

<!-- Load WP Admin Footer -->
<?php wp_footer(); ?>

</body>
</html>