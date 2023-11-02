
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/AkiraExpanded-SuperBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--header sction-->

<header class="main-header">
    <div class="navbar-menu container-fluid header-row common-padd-lt-rt">
      <!-- <div class="header-search">
        <a href="#"><img src="./images/search.png" alt=""></a>
      </div> -->
      <div class="logo">
      <?php 
          $logo=get_theme_value('driverite_header_logo');
         
          if($logo ==""){
            echo "please attach the logo";
              }else{?>
                
              <a href="<?php echo site_url(); ?>"><img src= "<?php  echo $logo;?> "> </a><?php }?>
      </div>
      <div class="hdr-rt">
        <div class="main-menu">
          <div class="nav_close" onclick="menu_close()">
            <i class="far fa-times-circle"></i>
          </div>
          <ul>
            <?php wp_nav_menu(array('theme_location'=>'primary') ); ?>
          
          </ul>
        </div>
        <div class="hdr-rt-log-reg desktop">
          <ul>
          <!-- <div id="login-status"></div> -->
            <?php
           if(isset($_SESSION['user'])){
        
              ?>
              <li><button class="btn" id="logout-button">Log Out</button></li>
            <?php
            }else{
            ?> 
            <li><a href="<?php echo site_url("register");?>" class="btn r_btn">Register</a></li>
            <li><a href="<?php echo site_url("log_in");?>" class="btn l_btn">login</a></li>
             <?php
             
             }
            ?>
          </ul>
        </div>
        <div onclick="menu_open()" class="nav_btn">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </div>


  </header>

<!--header sction-->
<script>

jQuery(document).ready(function() {
	jQuery(".search-box-field").click(function() {
	   jQuery(".search-box").toggle();
     jQuery(this).toggleClass("active-search")
	 });
});

</script>
