<footer>
    <div class="ftr-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="ftr-logo">
                        <?php
                $logo=get_theme_value('bc_footer_logo');
                  if($logo ==""){
                  echo "<h3 style='color:red'>please attach the logo</h3>";
              }else{?>
                        <a href="<?php echo site_url(); ?>"><img src="<?php  echo $logo;?> "> </a><?php }?>
                    </div>
                </div>
                <div class="ms-auto col-xl-7 col-lg-9">
                    <div class="ftr-email">
                        <h3>Subscribe To Newsletter:</h3>
                        <div class="email">
                            <input type="email" placeholder="Enter your email address …">
                            <input type="submit" class="btn" value="Subscribe Now">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ftr-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="ftr-col">
                        <h3><?php echo get_theme_value('bc_footer_menu_title'); ?></h3>
                        <p><?php echo get_theme_value('bc_footer_desc'); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftr-col">
                        <h3><?php echo get_theme_value('bc_footer_menu_title2'); ?></h3>
                        <div class="ftr-menu">
                            <ul>
                                <?php wp_nav_menu(array('theme_location'=>'secondary') ); ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftr-col">
                        <h3><?php echo get_theme_value('bc_footer_menu_title3');?></h3>
                        <div class="ftr-menu">
                            <ul>
                                <li><a href="<?php echo get_theme_value('driverite_linkdin_link'); ?>"
                                        target="_blank">Linkedin Company page</a></li>
                                <li><a href="callto:<?php echo get_theme_value('bc_phone_number'); ?>"
                                        target="_blank">Office:<?php echo get_theme_value('bc_phone_number'); ?></a>
                                </li>
                                <li><a href="mailto:<?php echo get_theme_value('bc_email_address'); ?>"
                                        target="_blank">Email:<?php echo get_theme_value('bc_email_address'); ?> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftr-col">
                        <h3><?php echo get_theme_value('bc_footer_menu_title4');?></h3>
                        <div class="ftr-menu">
                            <ul>
                                <?php wp_nav_menu(array('theme_location'=>'company') ); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ftr-btm">
        <div class="container">
            <div class="ftr-btm-wrap">
                <ul class="copyrht-menu">
                    <p>Follow Us:</p>
                    <li>
                        <?php 
                $icon_logo= get_theme_value('driverite_twitter_link'); 
                if($icon_logo ==""){
                  echo "<h5 style='color:white'>please attach the icon_links</h5>";
              }else{?>
                        <a href="<?php echo $icon_logo ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li><?php } ?>

                    <li>
                        <?php 
                $icon_logo= get_theme_value('driverite_linkdin_link'); 
                if($icon_logo ==""){
                  echo "<h5 style='color:white'>please attach the icon_links</h5>";
              }else{?>
                        <a href="<?php echo $icon_logo; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    </li><?php } ?>

                    <li>
                        <?php 
                $icon_logo= get_theme_value('driverite_facebook_link'); 
                if($icon_logo ==""){
                  echo "<h5 style='color:white'>please attach the icon_links</h5>";
              }else{?>

                        <a href="<?php echo $icon_logo; ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li><?php } ?>

                </ul>
                <p><?php echo get_theme_value('driverite_copyright_text'); ?></p>
            </div>
        </div>
    </div>
</footer>


<script>
jQuery(document).ready(function($) {
    var timeoutMinus;
    jQuery('body').on('click', '.minus', function(e) {
        var $input = jQuery(this).parent().find('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 1) {
            $input.val(val - step).change();
        }

        if (timeoutMinus != undefined) {
            clearTimeout(timeoutMinus)
        }
        timeoutMinus = setTimeout(function() {
            $('[name="update_cart"]').trigger('click');
        }, );
    });
    var timeoutPlus;
    jQuery('body').one().on('click', '.plus', function(e) {
        var $input = jQuery(this).parent().find('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val(val + step).change();

        if (timeoutPlus != undefined) {
            clearTimeout(timeoutPlus)
        }
        timeoutPlus = setTimeout(function() {
            jQuery('[name="update_cart"]').trigger('click');
        }, );
    });

    var timeoutInput;
    jQuery('div.woocommerce').on('change', 'input.qty', function() {
        if (timeoutInput != undefined) {
            clearTimeout(timeoutInput)
        }
        timeoutInput = setTimeout(function() {
            jQuery('[name="update_cart"]').trigger('click');
        }, );
    });

});
</script>

<script src="js/function.js"></script>

<?php wp_footer(); ?>

</body>

</html>