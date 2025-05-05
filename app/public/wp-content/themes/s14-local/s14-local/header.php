<?php
    /**
     * The header for our theme
     *
     * This is the template that displays all of the <head> section and everything up until <div id="content">
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package s14.local
     */

?>
<!doctype html>
<html      <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body      <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!--<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 's14-local'); ?></a>-->

<header class="navigation">
  <div class="top-bar">
    <div class="top-links">
	<?php
        wp_nav_menu([
            'theme_location' => 'topbarButtons',
            'container'      => false,
            'menu_class'     => 'top-links',
            'fallback_cb'    => false,
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        ]);
    ?>

      <!-- <a href="#">Contact Us</a> |
      <a href="#">Members Login</a> |
      <a href="#">Search</a> -->
    </div>
  </div>

  <div class="main-nav">
    <div class="logo">
	<?php
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        } else {
           
            echo '<a href="' . esc_url(home_url()) . '">
              <img src="' . get_stylesheet_directory_uri() . '/assets/images/Logo (5).png" alt="' . esc_attr(get_bloginfo('name')) . '">
            </a>';
        }
    ?>
    </div>
	<?php
        wp_nav_menu([
            'theme_location' => 'headerMenuLocation',
            'container'      => false,
            'menu_class'     => 'menu', 
            'fallback_cb'    => false,  
        ]);
    ?>
      <!-- <a href="#">Who we Are</a>
      <a href="#">What We Do</a>
      <a href="#">Events</a>
      <a href="#">Join & Support</a>
      <a href="#">News</a> -->
    </nav>
    <div class="buttons">
	<?php
        wp_nav_menu([
            'theme_location' => 'headerButtons']);
    ?>
      <!-- <a href="#" class="btn become-member">Become a Member</a>
      <a href="#" class="btn donate">Donate</a> -->
    </div>
  <!--</div>-->
</header>