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

  $(document).on('click', '.search-header-btn', function(e) {
    e.preventDefault();
    $('.search-header').toggleClass('activate-header-search');
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

    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,      
        autoplaySpeed: 3000, 
        dots: true,          
        arrows: false       
    });

    $('.marquee-slider').slick({
        slidesToShow: 4,      
        autoplay: true,         
        autoplaySpeed: 0,      
        speed: 6000,           
        cssEase: 'linear',    
        infinite: true,         
        arrows: false,        
        dots: false             
    });

    $('.main-testimonial-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,      
        dots: true,          
        arrows: true       
    });

    $('.right-slider').slick({
        slidesToShow: 2,  
        slidesToScroll: 1,
        autoplay: true,      
        autoplaySpeed: 3000, 
        infinite: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.latest-news-marquee').slick({
        slidesToShow: 4,      
        autoplay: true,         
        autoplaySpeed: 0,      
        speed: 6000,           
        cssEase: 'linear',    
        infinite: true,         
        vertical: true,   
        arrows: false,        
        dots: false,
        pauseOnHover: true,
    });

    const videos = document.querySelectorAll('.video-slider video');
    const thumbs = document.querySelectorAll('.video-slider-nav canvas');

    if (videos.length > 9 || thumbs.length > 9) {
        console.error("Unexpected number of elements found. Check HTML structure.");
        return;
    }
    
    videos.forEach((video, index) => {
        if (index < thumbs.length) { // To avoid issues with mismatched numbers
            video.addEventListener('loadeddata', function() {
                video.currentTime = 2;
                video.pause();

                const canvas = thumbs[index];
                const context = canvas.getContext('2d');
                video.addEventListener('seeked', function() {
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);
                }, { once: true });
            });
        }
    });

    $('.video-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.video-slider-nav'
    });

    // Navigation slider
    $('.video-slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
    });

    $('.projects-slideshow').slick({
        autoplay: true,          
        autoplaySpeed: 2000,     
        fade: true,              
        speed: 1000,             
        arrows: false,           
        dots: false            
    });

    
    $(document).on('click', '.btn-video-nav', function (e) {
        e.preventDefault();
    
        // Get the data-url attribute from the clicked thumbnail
        var target = $(this).attr('data-url');
    
        // Update the main video source
        $('#video-item source').attr('src', target);
        
        // Reload the video to play the newly set source
        $('#video-item')[0].load();
    });

  $(".blog-carousel-container").slick({
    slidesToShow: 5,
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

    $(document).on('submit', '.post-comment', function() {
        $('#comment-load').fadeIn();

        var formData = new FormData(this);
        var form = $(this);

        $.ajax({
            url: $(this).attr('action'),
            type : 'POST',
            data : formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function( response ) {
                $('#comment-load').fadeOut();
                form[0].reset();
                
                $('.comments-count').html( response.totalComments );
                
                if(response.reply == 0) {
                    $('.post-comments').append( response.commentHtml );
                } else {
                    $('.comment-' + response.parentID).children().find('.replies').html(response.replies);
                    $('html, body').animate({
                        scrollTop: $('.comment-' + response.parentID).offset().top
                    }, 2000);
                }
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('click', '.post-reply', function() {
        $('html, body').animate({
            scrollTop: $(".post-comment").offset().top
        });

        var ID = $(this).attr('data-id');

        $('input[name="comment[response]"]').val(ID);
    });

    $(document).on('click', '.addComment', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('.commentingWrapper').offset().top
        });
    });

    $(document).ready(function() {
        $('.faq-item-content').hide();
    
        $('.faq-item').click(function() {
            $('.faq-item').removeClass("active-faq");

            $(this).next('.faq-item-content').slideToggle();
            
            var icon = $(this).find('.faq-icon');
            if (icon.text() === "+") {
                icon.text("-");
                $(this).addClass("active-faq");
            } else {
                icon.text("+");
                $(this).removeClass("active-faq");
            }
    
            $('.faq-item-content').not($(this).next()).slideUp();
            $('.faq-icon').not(icon).text("+");
        });
    });

    $(document).on('click', '.team-member-card', function() {
        $('.popupTeam').addClass('active-popup');
        $('.left-profile').html($(this).html());
        $('.descContent').html($(this).next('.team-desc').html());
    });

    $(document).on('click', '.popupTeam', function() {
        $(this).removeClass('active-popup');
        $('.left-profile').html('');
        $('.descContent').html('');
    });

    if($('#start-camera').length > 0) {
        const video = document.getElementById('video');
        const startCameraButton = document.getElementById('start-camera');
        const snapButton = document.getElementById('snap');
        const saveImageButton = document.getElementById('save-image');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        let stream;  // To hold the camera stream


        // Start the camera when the button is clicked
        startCameraButton.addEventListener('click', () => {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(mediaStream => {
                    stream = mediaStream;  // Store the media stream
                    video.srcObject = stream;
                    video.style.display = 'block';  // Show the video element
                    startCameraButton.style.display = 'none';
                    canvas.style.display = 'none';
                    snapButton.style.display = 'inline';  // Show the scan now button
                    saveImageButton.style.display = 'block';  // Show the save image button
                })
                .catch(error => {
                    console.error("Error accessing webcam: ", error);
                });
        });

        // Capture image when the "Scan Now" button is clicked
        snapButton.addEventListener('click', () => {

            // Draw the video frame on the canvas
            context.drawImage(video, 0, 0, 320, 240);

            // Convert canvas image to Base64 data URL
            const imageData = canvas.toDataURL('image/png');

            // Set the hidden input field value to the image data
            document.getElementById('imageData').value = imageData;

            // Stop the camera stream and hide the video element
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());  // Stop each track
            }

            video.style.display = 'none';  // Hide the video element
            snapButton.style.display = 'none';  // Hide the capture button
            canvas.style.display = 'block';
            startCameraButton.style.display = 'block';
        });
    }
    
    const codRadio = document.getElementById('cod');
    const onlineRadio = document.getElementById('online');
    const paymentMethods = document.getElementById('paymentMethods');

    $(document).on('click', '.paymentMethodbtn', function() {
        var target = $(this).val();
 
        if(target == 'online') {
            $('#' + target).fadeIn();
        } else {
            $('#online').hide();
        }
    });

    $(document).on('submit', '.afc-card-request-form', function() {
        $('#carReq-load').fadeIn();

        var formData = new FormData(this);
        var form = $(this);

        $.ajax({
            url: $(this).attr('action'),
            type : 'POST',
            data : formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function( response ) {
                $('#carReq-load').fadeOut();

                if(response.status == 1) {
                    form[0].reset();
                }

                $('.messageBox').fadeIn().html(response.htmlData);

                setTimeout(function() {
                    $('.messageBox').hide().html('');
                }, 5000);

                $('html, body').animate({
                    scrollTop: $('.messageBox').offset().top
                }, 800);
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('submit', '.complains-request-form', function() {
        $('#carReq-load').fadeIn();

        var formData = new FormData(this);
        var form = $(this);

        $.ajax({
            url: $(this).attr('action'),
            type : 'POST',
            data : formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function( response ) {
                $('#carReq-load').fadeOut();

                if(response.status == 1) {
                    form[0].reset();
                }

                $('.messageBox').fadeIn().html(response.message);

                setTimeout(function() {
                    $('.messageBox').hide().html('');
                }, 5000);

                $('html, body').animate({
                    scrollTop: $('.messageBox').offset().top
                }, 800);

                $('input[name="application[documents][]"]').each(function() {
                    $(this).remove();
                });

                $('.file-uploader-message').html('');
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('submit', '.contact-form-process', function() {
        $('#carReq-load').fadeIn();

        var formData = new FormData(this);
        var form = $(this);

        $.ajax({
            url: $(this).attr('action'),
            type : 'POST',
            data : formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function( response ) {
                $('#carReq-load').fadeOut();

                if(response.status == 1) {
                    form[0].reset();
                }

                $('.messageBox').fadeIn().html(response.htmlData);

                setTimeout(function() {
                    $('.messageBox').hide().html('');
                }, 5000);

                $('html, body').animate({
                    scrollTop: $('.messageBox').offset().top
                }, 800);
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('click', '.all-events-btn', function(e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $('.all-events-wrapper').offset().top
        }, 2000);
    });

    $(document).on('click', '.increase', function() {
        let currentValue = parseInt($('#number-field').val());
        $('#number-field').val(currentValue + 1);
    });

    $(document).on('click', '.decrease', function() {
        let currentValue = parseInt($('#number-field').val());
        if (currentValue > 0) {
            $('#number-field').val(currentValue - 1);
        }
    });

    function getMaxEducationIndex() {
        let maxIndex = 0;

        // Loop through each input in .education-box to find the highest index
        $('.education-box').find('select[name*="education["], input[name*="education["]').each(function() {
            let name = $(this).attr('name');
            let match = name.match(/\[(\d+)\]/); // Extract the index from the name attribute

            if (match && parseInt(match[1]) >= maxIndex) {
                maxIndex = parseInt(match[1]) + 1; // Set maxIndex to the next available index
            }
        });

        return maxIndex;
    }

    let educationIndex = getMaxEducationIndex(); 

    $(document).on('click', '.add-education', function() {
        let newBlock = $('.educationBlock.template').clone().removeClass('template').show();

        newBlock.find('select, input').each(function() {
            let name = $(this).attr('name');
    
            $(this).attr('name', name.replace('[0]', '[' + educationIndex + ']'));
        });

        $('.education-box').append(newBlock);

        educationIndex++;
    });

    $('.education-box').on('click', '.btn-edu-remove', function() {
        $(this).closest('.educationBlock').remove();
        refreshEducationIndices();
    });

    function refreshEducationIndices() {
        $('.education-box .educationBlock').each(function(index) {
            $(this).find('select, input').each(function() {
                let name = $(this).attr('name');
                name = name.replace(/\[\d+\]/, '[' + index + ']');
                $(this).attr('name', name);
            });
        });
        educationIndex = $('.education-box .educationBlock').length;
    }

    function initializeUploader(inputId, messageId, dropZoneId, progressId, filename) {
        var baseUrl = $('input[name=processUrl]').val();
    
        $('#' + inputId).simpleUpload({
            url: baseUrl,
            method: 'post',
            params: { filename: filename,  _token : $('meta[name="csrf-token"]').attr('content')},
            ajax: {
                headers: { 'X-Test': 'test' },
                statusCode: {
                    200: function(response) {
                        $('form').append(response.returnFile);

                        var Filehtml = '<div class="file-uploaded">';
                        Filehtml += '<div class="fileDataUploaded">'
                        Filehtml += '<i class="icon-file-text"></i>';
                        Filehtml += '<span>' + response.originalFilename + '</span>';
                        Filehtml += '</div>';
                        Filehtml += '<a href="javascript:void(0);" class="removeFileUploaded" data-field="' + filename + '" data-file="' + response.uploadedFile + '">';
                        Filehtml += '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" viewBox="0 0 24 24" data-icon="mdi:trash-can-outline" data-inline="false" class="iconify iconify--mdi"><path fill="currentColor" d="M9 3v1H4v2h1v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1V4h-5V3zM7 6h10v13H7zm2 2v9h2V8zm4 0v9h2V8z"></path></svg>';
                        Filehtml += '</a>';
                        Filehtml += '</div>';

                        $('#' + messageId).prepend(Filehtml);
                    }
                }
            },
            dropZone: '#' + dropZoneId,
            progress: '#' + progressId
        }).on('upload:done', function(e, file) {
            console.log(e);
            
        }).on('upload:fail', function(e, file) {
            $('#' + messageId).prepend('<p>fail: ' + file.name + '</p>');
        });

        $('#' + dropZoneId).on('click', function() {
            $('#' + inputId).trigger('click');
        });
    }

    $(document).on('click', '.removeFileUploaded', function() {
        var matchedValue = $(this).attr('data-file');
        var targetFile = $(this).attr('data-field');
        console.log(matchedValue);
        console.log(targetFile);
        $(this).parent().remove();

        $("input[name='application[" + targetFile + "][]'][value='" + matchedValue + "']").remove();
    });

    initializeUploader('coverLetter', 'cover_letter_message', 'cover_letter_dropzone', 'coverLetter_progress', 'coverLetter');
    initializeUploader('resume', 'resume_message', 'resume_dropzone', 'resume_progress', 'resume');
    initializeUploader('documents', 'documents_message', 'documents_dropzone', 'documents_progress', 'documents');

    $(document).ready(function() {
        $('.m-cat-dropdown').hover(
            function() {
                $(this).find('.category-dropdown').addClass('visible-dropdown');
            },
            function() {
                $(this).find('.category-dropdown').removeClass('visible-dropdown');
            }
        );
    });

    function updateSlug(newSlug) {
        const currentUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        const newUrl = currentUrl.replace(/[^/]+$/, newSlug);
    
        history.pushState(null, '', newUrl);
    }    

    $(document).on('click', '.select-category, .selected-category', function(e) {
        e.preventDefault();

        var type       = $(this).attr('type');
        var curRequest = $(this);
        var id         = $(this).attr('data-id');
        var formData   = {
            categoryID  : id,  
            _token      : $('meta[name="csrf-token"]').attr('content'),
            search      : $('input[name=search]').val(),
            start_date  : $('input[name=start_date]').val(),
            end_date    : $('input[name=end_date]').val(),
            timeframe   : $('select[name=timeframe] option:selected').val(),
            rfp_rfb_no  : $('input[name=rfp_rfb_no]').val()
        };
        
        $.ajax({
            url: $('input[name=targeturl]').val(),
            type : 'POST',
            data : formData,
            dataType: 'text',
            success: function( response ) {
                $('.procurementData').html(response);

                $('.selected-category').removeClass('bg-yellow');
                $('.selected-category').removeClass('text-white');
                
                if(type == 'main') {
                    curRequest.addClass('bg-yellow');
                    curRequest.addClass('text-white');
        
                    updateSlug(curRequest.attr('href'));

                    $('.category-main-title').text(curRequest.text());
                } else {
                    curRequest.parent().parent().parent().find('a').addClass('bg-yellow');
                    curRequest.parent().parent().parent().find('a').addClass('text-white');

                    $('.category-main-title').text(curRequest.closest('.m-cat-dropdown').find('.selected-category').text());
                }
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('click', '.filter-item-button', function() {
        var target = $(this).data('target'); // Get the target ID
        var content = $('#' + target);       // Get the target content
        
        // Toggle the display with a slide effect
        content.slideToggle(300);
        
        // Toggle the icon between up and down
        var icon = $(this).find('.iconify');
        if (content.is(':visible')) {
            icon.attr('data-icon', 'icon-park-outline:up');
        } else {
            icon.attr('data-icon', 'icon-park-outline:down');
        }
    });

    $('.dropdown-tab').on('click', function(e) {
        e.preventDefault();

        // Remove active class from all tabs and hide all content
        $('.dropdown-tab').removeClass('bg-yellow text-white');
        $('.dropdown-tab').removeClass('drop-tab-selected');
        $('.tabs-content').hide();

        // Add active class to the clicked tab
        $(this).addClass('bg-yellow text-white');
        $(this).addClass('drop-tab-selected');

        // Show the corresponding tab content
        const target = $(this).attr('href');
        $(target).fadeIn();
    });

    $(document).on('click', '.nav-tab-default-item', function(e) {
        e.preventDefault();

        // Remove active class from all tabs and hide all content
        $('.tabs-content').removeClass('default-tab-show');
        $('.nav-tab-default-item').removeClass('drop-tab-selected');

        $(this).addClass('drop-tab-selected');

        // Show the corresponding tab content
        const target = $(this).attr('href');
        $(target).addClass('default-tab-show');
    });


    $(document).on('click', '.nav-item-btn', function(e) {
        e.preventDefault();

        var targetTab   = $(this).attr('href');
        var tabTheme    = $(this).attr('theme');
        var footerTitle = $(this).attr('footer-title');

        $('.nav-item-btn').removeClass('nav-item-active');
        $('.fare-tab-content').removeClass('fare-tab-active');

        $(targetTab).addClass('fare-tab-active');
        $(this).addClass('nav-item-active');

        $('.footer-title').text(footerTitle);
        
        $('#theme-content-area').attr('class', tabTheme);

        $('.policy-tab-content').removeClass('policy-tab-active');
    });

    $(document).on('click', '.btn-policy-data', function(e) {
        e.preventDefault();

        var targetTab   = $(this).attr('href');

        $('.policy-tab-content').removeClass('policy-tab-active');

        $(targetTab).addClass('policy-tab-active');
    });

    $(document).on('click', '.policy-btn', function(e) {
        e.preventDefault();

        var targetTab   = $(this).attr('data-target');

        $('.policy-tabs-data').removeClass('policy-tab-active');

        $('#' + targetTab).addClass('policy-tab-active');
    });

    $(document).on('click', '.table-nav-item', function(e) {
        e.preventDefault();

        var targetTab   = $(this).attr('href');

        $('.table-tabber-content').removeClass('show');
        $('.table-nav-item').removeClass('table-nav-active');

        $(targetTab).addClass('show');
        $(this).addClass('table-nav-active');
    });

    $(document).ready(function() {
        $('.value-header').click(function() {
          var $card = $(this).closest('.value-card');
          
          // If this card is already active, just close it
          if ($card.hasClass('active')) {
            $card.removeClass('active');
            $card.find('.icon').text('+');
            $card.find('.value-description').slideUp();
          } else {
            // Close any currently open card
            $('.value-card.active').removeClass('active').find('.icon').text('+').end().find('.value-description').slideUp();
            
            // Open the clicked card
            $card.addClass('active');
            $card.find('.icon').text('−');
            $card.find('.value-description').slideDown();
          }
        });
    });

    $('.has-mega-menu').hover(
        function() {
            $('.mega-menu-routes').addClass('routes-mega-menu-active');
        },
        function() {
            $('.mega-menu-routes').removeClass('routes-mega-menu-active');
        }
    );

    $('.mega-menu-routes').hover(
        function() {
            $(this).addClass('routes-mega-menu-active');
        },
        function() {
            $(this).removeClass('routes-mega-menu-active');
        }
    );

    $(document).on('click', '.get-city-data', function(e) {
        $('#route-load').fadeIn();

        $.ajax({
            url: $(this).attr('href'),
            type : 'POST',
            dataType: 'json',
            success: function( response ) {
                $('#route-load').fadeOut();
                
                $('.cityname').text(response.cityName);
                $('.routes-menu-tabs').html(response.routesMenuData);
                $('.city').text(response.city);

                $('.route-title').text(response.routeTitle);
                $('.route-description').text(response.routeDescription);
                $('.route-distance').text(response.distance);

                $('.routes-stops-wrapper ul').text(response.routeStops);
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('click', '.get-routes', function(e) {
        e.preventDefault();
        $('#route-load').fadeIn();

        $('.get-routes').removeClass('get-routes-active');
        $(this).addClass('get-routes-active');

        $.ajax({
            url: $(this).attr('href'),
            type : 'GET',
            dataType: 'json',
            success: function( response ) {
                $('#route-load').fadeOut();
                
                $('.cityname').text(response.cityName);
                $('.routes-menu-tabs').html(response.routesMenuData);
                $('.city').text(response.city);

                $('.route-title').text(response.routeTitle);
                $('.route-description').text(response.routeDescription);
                $('.route-distance').text(response.distance);

                $('.routes-stops-wrapper ul').html(response.routeStops);
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });

    $(document).on('click', '.fare-calculator', function(e) {
        e.preventDefault();

        $('.fare-calculator-popup ').addClass('calculator-popup-show');
        $('.calculator-popup-content').addClass('fadeInPupupContent');
    });

    $(document).on('click', '.close-fare-calculator', function(e) {
        e.preventDefault();

        $('.fare-calculator-popup ').removeClass('calculator-popup-show');
        $('.calculator-popup-content').removeClass('fadeInPupupContent');
    });

    $(document).on('submit', '.calculate-fare', function(e) {
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type : 'POST',
            data : formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function( response ) {
                if(response.status == 1) {
                   $('.price-info').html(response.fareData); 
                }
            },
            error: function(xhr, status, error) {
                $('#comment-load').fadeOut();
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
            }
        });
    });
});