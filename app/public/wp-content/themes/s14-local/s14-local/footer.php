<?php
    /**
     * The template for displaying the footer
     *
     * Contains the closing of the #content div and all content after.
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package s14.local
     */

?>

<footer class="site-footer">
        <!-- FULL-WIDTH TOP AREA (green) -->
        <div class="site-footer__top">
          <div class="container footer-container">
		  <?php if (is_active_sidebar('footer-about')): ?>
<?php dynamic_sidebar('footer-about'); ?>
<?php else: ?>
            <div class="footer-col footer-col--about">
			<h4><?php esc_html_e('Our Mission', 's14-local'); ?></h4>




			<?php
                
                echo wp_kses_post(get_theme_mod('footer_about_text'));
            ?>
            </div>
			<?php endif; ?>

           <?php if (is_active_sidebar('footer-contact')): ?>
<?php dynamic_sidebar('footer-contact'); ?>
<?php else: ?>
  <div class="footer-col footer-col--contact">
    <h4><?php esc_html_e('Contact Us', 's14-local'); ?></h4>
    <?php
        
        echo wp_kses_post(get_theme_mod('footer_contact_html'));
    ?>
  </div>
<?php endif; ?>


            <div class="footer-col footer-col--sitemap">
              <h4>Site Map</h4>
              <?php
                  wp_nav_menu([
                      'theme_location' => 'footer_sitemap',
                      'container'      => false,
                      'menu_class'     => '', // no extra classes
                      'items_wrap'     => '<ul>%3$s</ul>',
                      'fallback_cb'    => false,
                  ]);
              ?>
            </div>

            <?php if (is_active_sidebar('footer-social')): ?>
<?php dynamic_sidebar('footer-social'); ?>
<?php else: ?>
  <div class="footer-col footer-col--follow">
    <h4><?php esc_html_e('Follow Us', 's14-local'); ?></h4>
    <div class="social-icons">
      <?php if ($fb = get_theme_mod('footer_facebook_url')): ?>
        <a href="<?php echo esc_url($fb); ?>" aria-label="<?php esc_attr_e('Facebook', 's14-local'); ?>">
          <i class="fab fa-facebook-f"></i>
        </a>
      <?php endif; ?>
<?php if ($ig = get_theme_mod('footer_instagram_url')): ?>
        <a href="<?php echo esc_url($ig); ?>" aria-label="<?php esc_attr_e('Instagram', 's14-local'); ?>">
          <i class="fab fa-instagram"></i>
        </a>
      <?php endif; ?>
<?php if ($yt = get_theme_mod('footer_youtube_url')): ?>
        <a href="<?php echo esc_url($yt); ?>" aria-label="<?php esc_attr_e('YouTube', 's14-local'); ?>">
          <i class="fab fa-youtube"></i>
        </a>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>

          </div>
        </div>

        <!-- FULL-WIDTH BOTTOM STRIP (dark) -->
        <?php if (is_active_sidebar('footer-bottom')): ?>
<?php dynamic_sidebar('footer-bottom'); ?>
<?php else: ?>
  <div class="site-footer__bottom">
    <div class="container footer-container">
      <p>
        <?php echo esc_html(get_theme_mod('footer_copyright_text')); ?>
      </p>
    </div>
  </div>
<?php endif; ?>

      </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
