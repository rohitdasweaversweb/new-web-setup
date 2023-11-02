function menu_open() {
    jQuery(".main-menu").css({"transform":"translateX(0)"}) 
}
function menu_close() { 
    jQuery(".main-menu").css({"transform":"translateX(320px)"})
}

jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('header').addClass('fixed');
   }
   else {
    jQuery('header').removeClass('fixed');
   }
});
jQuery(document).ready(function(){
jQuery('.main-menu li a').click(function() {
    //alert("ssss");
       if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = jQuery(this.hash);
          target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            jQuery('html, body').animate({
              scrollTop: (target.offset().top - 64)
            }, 1000 );
            return false;
          }
        }
      });
      if (jQuery(window).width() < 1199) {
        jQuery("header li.menu-item-has-children").append('<div class="dropdown-icon-menu"></div>');
        jQuery(".main-menu.mobile-menu .sub-menu").hide();
        jQuery("header .sub-menu").hide();
        jQuery(document).on('click', '.dropdown-icon-menu', function(){ 
          jQuery(this).prev(".sub-menu").slideToggle();
          jQuery(this).toggleClass('active');
      });}
      jQuery('.technology-slide').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1000,
        arrows: true,
        responsive: [
           {
              breakpoint: 1201,
              settings: {
                arrows:true,
                slidesToShow: 3,
              }
          },
    
          {
              breakpoint: 992,
              settings: {
                arrows:true,
                slidesToShow: 2,
              }
          },
          {
            breakpoint: 767,
              settings: {
                arrows:false,
                dots: true,
                slidesToShow: 1,
              }
          },
          {
            breakpoint: 575,
              settings: {
                arrows:false,
                dots: true,
                slidesToShow: 1,
              }
          }
      ]
    });
    jQuery('.validation-slider').slick({
      dots: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 1000,
      arrows: true,
      responsive: [
         {
            breakpoint: 1025,
            settings: {
              arrows:true,
              slidesToShow: 4,
            }
        },
  
        {
            breakpoint: 992,
            settings: {
              arrows:true,
              slidesToShow: 4,
            }
        },
        {
          breakpoint: 821,
          settings: {
            arrows:true,
            slidesToShow: 3,
          }
      },
        {
          breakpoint: 767,
            settings: {
              arrows:false,
              dots: true,
              slidesToShow: 2,
            }
        },
        {
          breakpoint: 575,
            settings: {
              arrows:false,
              dots: true,
              slidesToShow: 1,
            }
        }
    ]
  });
});

//============================================register//==============================


jQuery(document).ready(function($) {
  $('#custom-registration-form').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();

    var data = {
      action: 'custom_register_user',
      formData: formData, // Pass the serialized form data directly
    };
    $.ajax({
      type: 'POST',
      url: ajax_object.ajax_url,
      data: data,
      success: function(response) {
        if(response=='success'){
            window.location.href='http://localhost/blogsite/log_in/';
        }
        // Handle the response from the server
        console.log(response);
      }
    });
  });
});



// ======================================login===============================

jQuery(document).ready(function($) {
  $('#custom-login-form').submit(function(e) {
      e.preventDefault();
      // var loginData = $(this).serialize();
      var formData = $(this).serialize();
      console.log(formData);
      var data={
          action:'custom_user_login',
          formData: formData,
      }

      $.ajax({
          type: 'POST',
          url: ajax_object.ajax_url,
          data:data,
          success: function(response) {
              // Handle the login response
          
              if (response=='success') {
                // console.log('yyyyyyyyy');
                window.location.href = 'http://localhost/blogsite/';
                 

              } else {
                  $('#login-status').html('Login failed. Please try again.');
              }
          }
      });
  });

  // Logout functionality (use a delegated event for dynamically added logout button)
  $('#logout-button').on('click', function(e) {
    console.log('xdthfthff');
      e.preventDefault();

      $.ajax({
          type: 'POST',
          url: ajax_object.ajax_url,
          data: { action: 'custom_user_logout' },
          success: function(response) {
              // Handle the logout response
              console.log(response);
              if (response=='success') {
                // console.log('yess sourav');
                window.location.href = 'http://localhost/blogsite/';
                  
              }
          }
      });
  });
});

