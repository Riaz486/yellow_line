$(document).ready(function () {
  // Initialize accordion state
  $(".custom-accordian-item").each(function (index) {
    var $accordionItem = $(this);
    var $accordionBody = $accordionItem.find(".custom-accordian-body");
    var $icon = $accordionItem.find(".custom-accordian-item-header i");

    // Check if this is the first item
    if (index === 0) {
      $accordionItem.addClass("active");
      $accordionBody.show();
      $icon.removeClass("fa-plus").addClass("fa-minus");
    } else {
      $accordionItem.removeClass("active");
      $accordionBody.hide();
      $icon.removeClass("fa-minus").addClass("fa-plus");
    }
  });

  // Handle accordion header clicks
  $(".custom-accordian-item-header").on("click", function () {
    var $accordionItem = $(this).closest(".custom-accordian-item");
    var $accordionBody = $accordionItem.find(".custom-accordian-body");
    var $icon = $accordionItem.find(".custom-accordian-item-header i");

    // Close other open items
    $(".custom-accordian-item")
      .not($accordionItem)
      .removeClass("active")
      .find(".custom-accordian-body")
      .slideUp()
      .siblings(".custom-accordian-item-header")
      .find("i")
      .removeClass("fa-minus")
      .addClass("fa-plus");

    // Toggle the current item
    $accordionItem.toggleClass("active");
    if ($accordionItem.hasClass("active")) {
      $accordionBody.slideDown();
      $icon.removeClass("fa-plus").addClass("fa-minus");
    } else {
      $accordionBody.slideUp();
      $icon.removeClass("fa-minus").addClass("fa-plus");
    }
  });
  $(".blog-carousel-container").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    responsive: [
      {
        breakpoint: 1200, // medium screens (md)
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 992, // mobile screens
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      ,
      {
        breakpoint: 768, // mobile screens
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".upcoming-section .content-slide .right").slick({
    slidesToShow: 1,
    variableWidth: true,
    arrows: false,
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    centerMode: false,
  });
  $(".roomwrap").slick({
    slidesToShow: 5,
    arrows: true,
    dots: true,
    infinite: true,
    speed: 300,
    responsive: [
      {
        breakpoint: 1400, // medium screens (md)
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1200, // medium screens (md)
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 992, // medium screens (md)
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768, // mobile screens
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $(".gallery").slick({
    slidesToShow: 1,
    variableWidth: true,
    arrows: false,
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    centerMode: false,
  });

  $(".hero-section-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  });


  function showSearchCanvas() {
    $('.search-canvas').addClass('show');
  }

  // Function to hide the search canvas
  function hideSearchCanvas() {
    $('.search-canvas').removeClass('show');
  }

  // Add event listener to the button that opens the canvas
  $('#openSearchCanvas').on('click', showSearchCanvas);

  // Add event listener to the delete icon inside the canvas
  $('.search-canvas .icon-delete').on('click', hideSearchCanvas);
  $('.search-canvas .icon-delete').css({ 'cursor': 'pointer' });


});

