$(function() {

    $( ".card-main__item-image img" ).hover(
      function() {
        $(this).parent().siblings().find('.btn').addClass('active')
      }, function() {
         $(this).parent().siblings().find('.btn').removeClass('active')
      }
    );

    $('.btn--order').click(function(){
        $('.order').addClass('open')
        $('.cart').removeClass('open')
         $('.main-nav').removeClass('open')
    })

    $('.order-toggler').click(function() {
        $(this).next().slideToggle()
    })

    $('.form__phone').mask('+7 (000) 000-00-00');

    // CUSTOM SELECT

    $(".js-select").select2();

    // ADAPTIVE MENU

    $('.hamburger').click(function() {
        $(this).toggleClass('is-active');
        $('.main-nav').toggleClass('open');
        $('.cart').removeClass('open')
        $('.order').removeClass('open')
    });

    // SLICK SLIDER

    $('.main-slider').slick({
        rows: false,
        arrows: false, 
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        pauseOnHover: false, 
    })

    // SCROLL TO ANY SECTION

    $('.main-list li:not(:last-child) a[href*="#"]').on('click', function(e) {
        e.preventDefault();
        $('.hamburger').removeClass('is-active');
        $('.cart').removeClass('open')
        $('.order').removeClass('open')
        $('body').removeClass('hidden')
        $('html').removeClass('hidden')
        $('.main-nav').removeClass('open')
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 65
        }, 500, 'linear');
    });

    // MODAL MAGNIFIC POPUP INIT

    $('.btn-modal').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        removalDelay: 500,
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
                // $('.hamburger').removeClass('is-active')
            },
            open: function() {
                $('.header').addClass('move')
            },
            close: function() {
                $('.header').removeClass('move')
            }
        },
        midClick: true
    });

    $('.btn-modal').click(function(e){
        e.preventDefault()
    })

    $('<div class="quantity-nav"><div class="quantity-button quantity-up"></div><div class="quantity-button quantity-down"></div></div>').insertAfter('.quantity input');
    $('.quantity').each(function() {
        var spinner = $(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });

    if ($(window).width() > 767) {
        $(document).mouseup(function(e) {
            var container = $(".cart");
            var containerOrder = $(".order");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.removeClass('open')
            }
            if (!containerOrder.is(e.target) && containerOrder.has(e.target).length === 0) {
                containerOrder.removeClass('open')
            }
        });
        $('.header-cart').click(function() {
            $(this).next().addClass('open')
            $('.main-nav').removeClass('open')
        })
        $(".order-scroll").mCustomScrollbar({
            axis: "y",
            scrollInertia: 300,
        });
        $(".cart-content").mCustomScrollbar({
            axis: "y",
            scrollInertia: 300,
        });
    }

    if ($(window).width() < 767) {
        $('.header-cart').click(function() {
            $(this).next().toggleClass('open')
            // $('body').toggleClass('hidden')
            // $('html').toggleClass('hidden')
            $('.main-nav').removeClass('open')
            $('.hamburger').removeClass('is-active')
            $('.notWorkingNow').removeClass('open')
             
        })
        $('.btn--order').click(function(){
            $('.order').addClass('open')
            $('.cart').removeClass('open')
            $('.main-nav').removeClass('open')
        })
    }


});

let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);

  window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  });