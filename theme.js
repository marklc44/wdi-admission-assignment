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

    // custom slider 
    // added for GA WDI Admissions Assignment

    var $images = $('.slider').find('img');
    var $slider = $('#custom-slider');
    var $next = $('.next');
    var $previous = $('.previous');
    var $sliderInner = $('.slider-inner');
    var currentPosition = 1;
    var imgWidth = $('body').width();
    var numOfSlides = $sliderInner.find('img').length;

    // set sliderInner and image width to full width of body
    $sliderInner.css({
      'width': imgWidth * 3 + 'px'
    });
    $sliderInner.find('img').css('width', imgWidth);

    // hide previous button
    $previous.addClass('hidden');

    // if the window is resized, reset sliderInner and image width
    $(window).resize(function() {
      imgWidth = $('body').width();
      $sliderInner.css({
        'width': imgWidth * 3 + 'px'
      });
      $sliderInner.find('img').css('width', imgWidth);
    });

    // hide next control when on the last slide
    // hide previous control when on the first image
    function showControls() {
      if(currentPosition == numOfSlides) {
        $next.addClass('hidden');
      } else {
        $next.removeClass('hidden');
      }
      if(currentPosition == 1) {
        $previous.addClass('hidden');
      } else {
        $previous.removeClass('hidden');
      }
    } 

    // on clicking next, 
    // if currentPosition is less than the number of slides
    // slide $slider left by the width of one image
    $next.click(function() {
      if(currentPosition < numOfSlides) {
        $sliderInner.animate({ 
          left: -1 * currentPosition * imgWidth
        });
        currentPosition++;
        showControls();
        console.log(currentPosition);
      } 
    });

    // on clicking previous
    // if currentPosition is greater than 1
    // slide $slider right by the width of one image
    $previous.click(function() {
      if(currentPosition > 1) {
        var posLeft = $sliderInner.offset().left;
        $sliderInner.animate({ 
          left: posLeft+imgWidth
        });
        currentPosition--;
        showControls();
        console.log(currentPosition);
      } 
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


