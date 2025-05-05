<?php
    /**
     * Template Name: Contact Page
     */
    get_header();
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
    ?>
  </main>
</div>
<?php
get_footer();
