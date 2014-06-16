// theme javascript

jQuery(document).ready(function ( $ ) {

    // shuffle implementation
    // using shuffle.js from http://vestride.github.io/Shuffle
    var $container = $('#posts');
    var $container2 = $('#p-items');
    var $filter = $('.filters').find('.label');
    var $pFilter = $('.p-filters').find('.label');

    // set up sizer div
    var $sizer = $container2.find('.sizer');

    // check if images are loaded
    // using imagesLoadded from desandro http://imagesloaded.desandro.com
    imagesLoaded($container, function() {
      $container.shuffle({
        itemSelector: '.blog-post',
        sizer: $sizer
      });
    });

    imagesLoaded($container2, function() {
      $container2.shuffle({
        itemSelector: '.project',
        sizer: $sizer
      });
    });

    filterItems($container2, $pFilter);
    filterItems($container, $filter);

    // filter with shuffle
    function filterItems($container, $filterEl) {
      $filterEl.click(function(e) {
        e.preventDefault();
        var filter = $(this).attr('data-filter');

        $container.shuffle('shuffle', function($el, shuffle) {
          return ( filter == '.' + $el.attr('data-groups') || filter == '*');
        });
      });
    }

    // custom nav collapsing

    $('.navbar-toggle').click(function() {
      var $fade = $('body').find('.bg-fade');
      var bodyHeight = $('body').height();

      if($fade.length > 0) {
        $fade.remove();
      } else {
        $('body').prepend('<div id="bg-fade" class="bg-fade clickable"></div>');
        $('.bg-fade').css('height', bodyHeight);
      }   
    });
    $('#bg-fade').live('click', function() {
      $('.navbar-collapse').removeClass('in');
      $(this).remove(); 
    });

});

// Smooth Scrolling
// From CSS Tricks: http://css-tricks.com/snippets/jquery/smooth-scrolling/
// Added extra 48px of offset to accommodate margins and padding

jQuery(function( $ ) {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 48
        }, 1000);
        return false;
      }
    }
  });
});

// Scrollup fadein/out navbar - fadeout upon scrolling down, fadein upon scrolling up
// remove .scrollup from navbar to remove this functionality

jQuery(function( $ ) {
  var lastScroll;
  var $scrollup = $('.scrollup');

  $(window).scroll(function() {
    var curScroll = $('body').scrollTop();

    if(curScroll > 80 && curScroll > lastScroll) {
      $scrollup.fadeOut();
    }
    if(curScroll < lastScroll) {
      $scrollup.fadeIn();
    }

    lastScroll = curScroll;
  });
});


