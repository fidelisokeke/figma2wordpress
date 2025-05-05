<?php
    /**
     * The main template file
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * E.g., it puts together the home page when no home.php file exists.
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package s14.local
     */

    get_header();
?>

<section class="contact-details">
        <div class="container contact-grid">
          <!-- Left column: headings & address -->
          <div class="contact-details__text">
            <h1 class="contact-details__title">Contact Us</h1>
            <div class="contact-details__line"></div>
            <h2 class="contact-details__subtitle">Address:</h2>
            <p class="contact-details__address">
              We are based at SOAS,<br> University of London.<br>
              Royal African Society, SOAS, 21<br> Russell Square London<br> WC1B 5EA<br>
              <br>
              Tel: +44 (0)207 074 5176
            </p>
          </div>

          <!-- Right column: map image -->
          <div class="contact-details__map">
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/screen.png"
              alt="Map showing location of SOAS"

            >
          </div>
        </div>
      </section>



      <section class="general-enquiries">
        <div class="container">
          <h2 class="general-enquiries__heading">General Enquiries</h2>
          <div class="general-enquiries__text">
            <p>
              For General Enquiries, please send an email to <a href="mailto:ras@soas.ac.uk">ras@soas.ac.uk</a>
              or get in touch via the contact form below.
            </p>
            <p>
              For Donations and Legacies, please contact Caitlin Pearson on
              <a href="mailto:caitlin.pearson@soas.ac.uk">
                caitlin.pearson@soas.ac.uk
              </a>.
            </p>
          </div>
        </div>
      </section>









      <section class="donate-section">
        <!-- Dark tint + full‐width background via CSS -->
        <div class="container donate-section__content">
          <h2>Help us tell the African Story</h2>
          <a href="#" class="btn cta-btn">Donate</a>
        </div>
      </section>

<?php
    //get_sidebar();
get_footer();
