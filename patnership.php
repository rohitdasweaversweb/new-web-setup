<?php
/*
Template Name:contact

*/
get_header();
?>

<main class="main-section">
    <!-- banner section -->
    <section class="slider-wrap common-padd">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="banner-content">
              <h1>Our Partnership</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br> ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="banner-image">
              <img src="images/partner-banner.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section -->
    <section class="marketing-partners-section">
        <div class="container">
            <div class="validation-tool text-center">
                <h2>Our Marketing Partners</h2>
                <div class="validation-slider">
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/taboola_logo_dark_blue-2.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/Picture.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/OB-Logo-2019-Web-Orange.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/google-partner-logo-8462431A20-seeklogo.com.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/Facebook_Marketing_Partners_logo_stacked.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/taboola_logo_dark_blue-2.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/Picture.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/OB-Logo-2019-Web-Orange.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/google-partner-logo-8462431A20-seeklogo.com.png" alt="">
                    </div>
                  </div>
                  <div class="valid-item">
                    <div class="valid-wrap">
                      <img src="images/Facebook_Marketing_Partners_logo_stacked.png" alt="">
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </section>
    <section class="work-with-us-section common-padd-small">
        <div class="container">
            <div class="common-title text-center">
                <h2>Work With Us</h2>
                <p>Ready to start working with us? We look forward to hearing from you. Whether you’re a local business <br> or a national giant, whatever your size and budget, we want to hear from you. Please fill out the short <br> form below.</p>
            </div>
            <div class="row">
                <div class="col-md-9 mx-auto">
                   <?php echo do_shortcode('[contact-form-7 id="59bf18f" title="contact"]');?>
                </div>
            </div>
        </div>
    </section>
  </main>

<?php get_footer();?>