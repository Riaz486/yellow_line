$(function () {
    "use strict";
    $(function () {
        $(".preloader").fadeOut();
    });
    jQuery(document).on('click', '.mega-dropdown', function (e) {
        e.stopPropagation()
    });
    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 55;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
            $(".sidebartoggler i").addClass("ti-menu");
        }
        else {
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
         var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);
    // ============================================================== 
    // Theme options
    // ==============================================================     
    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $("body").removeClass("mini-sidebar");
            $('.navbar-brand span').show();
        }
        else {
            $("body").trigger("resize");
            $("body").addClass("mini-sidebar");
            $('.navbar-brand span').hide();
        }
    });
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
        $(".nav-toggler i").addClass("ti-close");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
        $(".app-search").toggle(200);
    });
    // ============================================================== 
    // Right sidebar options
    // ============================================================== 
    $(".right-side-toggle").click(function () {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function (e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
    
    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function () {
         $('[data-toggle="popover"]').popover()
    })
       
    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    if($('.scroll-sidebar, .right-side-panel, .message-center, .right-sidebar').length > 0) {
        $('.scroll-sidebar, .right-side-panel, .message-center, .right-sidebar').perfectScrollbar();
    }
    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body").trigger("resize");
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function () {
        $(this).toggleClass("task-done");
    });
    // ============================================================== 
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="collapse"] i').toggleClass('ti-minus ti-plus');
        $(this).closest('.card').children('.card-body').collapse('toggle');
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="expand"] i').toggleClass('mdi-arrow-expand mdi-arrow-compress');
        $(this).closest('.card').toggleClass('card-fullscreen');
    });
    // Close Card
    $('a[data-action="close"]').on('click', function () {
        $(this).closest('.card').removeClass().slideUp('fast');
    });
    // ============================================================== 
    // Color variation
    // ==============================================================
    
    var mySkins = [
        "skin-default",
        "skin-green",
        "skin-red",
        "skin-blue",
        "skin-purple",
        "skin-megna",
        "skin-default-dark",
        "skin-green-dark",
        "skin-red-dark",
        "skin-blue-dark",
        "skin-purple-dark",
        "skin-megna-dark"
    ]

    /**
     * Get a prestored setting
     *
     * @param String name Name of of the setting
     * @returns String The value of the setting | null
     */
    function get(name) {
        if (typeof (Storage) !== 'undefined') {
            return localStorage.getItem(name)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    /**
     * Store a new settings in the browser
     *
     * @param String name Name of the setting
     * @param String val Value of the setting
     * @returns void
     */
    function store(name, val) {
        if (typeof (Storage) !== 'undefined') {
            localStorage.setItem(name, val)
        }
        else {
            window.alert('Please use a modern browser to properly view this template!')
        }
    }
    
    /**
     * Replaces the old skin with the new skin
     * @param String cls the new skin class
     * @returns Boolean false to prevent link's default action
     */
    function changeSkin(cls) {
        $.each(mySkins, function (i) {
            $('body').removeClass(mySkins[i])
        })
        $('body').addClass(cls)
        store('skin', cls)
        return false
    }

    function setup() {
        var tmp = get('skin')
        if (tmp && $.inArray(tmp, mySkins)) changeSkin(tmp)
            // Add the change skin listener
        $('[data-skin]').on('click', function (e) {
            if ($(this).hasClass('knob')) return
            e.preventDefault()
            changeSkin($(this).data('skin'))
        })
    }
    setup()
    $("#themecolors").on("click", "a", function () {
        $("#themecolors li a").removeClass("working"), 
        $(this).addClass("working")
    })

    if($(".select2").length > 0) {
        $(".select2").select2();
    }

    $(document).on('click', '.show-form', function() {
        var targetData = $(this).attr('data-target');

        if($(this).is(':checked') == true) {
            $('.'+targetData).fadeIn();
        } else {
            $('.'+targetData).fadeOut();
        }
    });

    $(document).on('click', '.nav-link', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        $('input[name="formData[routeID]"]').val(id);

        $('.nav-link').removeClass('active');
        $('.tab-pane').removeClass('show');
        $('.tab-pane').removeClass('active');

        $(this).addClass('active');

        var bs_target = $(this).attr('data-bs-target');
        
        $(bs_target).addClass('show');
        $(bs_target).addClass('active');
    });

    $(document).ready(function() {
        $('.create-route-stop').on('click', function() {
            var routeId = $(this).data('id');
            $('#route-table-' + routeId).hide(); 
            $('#route-table-form').fadeIn();
            $('.cancel-create-stop').attr('data-id', routeId);
        });
    
        $('.cancel-create-stop').on('click', function() {
            var routeId = $(this).data('id');
            $('#route-table-form').hide();
            $('#route-table-' + routeId).fadeIn(); 
        });
    });

    $(document).ready(function() {
        // Handle the address input change
        $('input[name="formData[address]"]').on('change', function() {
            var address = $(this).val();
            var apiKey = '6713ee32e6d50546465261hgua3b298'; // Replace with your actual API key
    
            // Make an AJAX call to the Geocode API
            $.ajax({
                url: `https://geocode.maps.co/search?q=${encodeURIComponent(address)}&api_key=${apiKey}`,
                method: 'GET',
                success: function(response) {
                    if (response && response.length > 0) {
                        var lat = response[0].lat; // Get the latitude
                        var lon = response[0].lon; // Get the longitude
    
                        // Store the latitude and longitude in hidden fields
                        $('input[name="formData[latitude]"]').val(lat);
                        $('input[name="formData[longitude]"]').val(lon);
                    } else {
                        console.log("No results found for the address.");
                    }
                },
                error: function() {
                    console.error("Error occurred while fetching geocode data.");
                }
            });
        });
    });

    $(document).on('submit', '.processRouteStop', function(e) {
        e.preventDefault();

        var form = this;

        $('#loader-route').fadeIn();

        setTimeout(function() {
            var formData = new FormData(form);

            $.ajax({
                url  : $(form).attr('action'),
                type : 'POST',
                data : formData,
                dataType : 'json',
                processData : false,
                contentType : false,
                success     : function( response ) {
                    var routeID = $('input[name="formData[routeID]"]').val();

                    var actionBtns = '';

                    actionBtns += '<a href="javascript:void(0);" class="edit-stop" id="' + response.createdID + '" name="' + response.data.stopName + '" address="' + response.data.address + '" route="' + routeID + '" lat="' + response.data.latitude + '" long="' + response.data.longitude + '">';
                    actionBtns += '<i class="fa fa-pencil-square-o"></i>';
                    actionBtns += '</a>';

                    actionBtns += '&nbsp;';

                    actionBtns += '<a href="' + response.baseUrl + '/manage-buses/delete-route-stop/' + response.createdID + '" class="delete-route-stop" id="' + routeID + '">';
                    actionBtns += '<i class="fa fa-trash-o"></i>';
                    actionBtns += '</a>';

                    var createRow = '<tr class="' + response.createdID + '">';
                    createRow += '<td>' + response.createdID + '</td>';
                    createRow += '<td>' + response.data.stopName + '</td>';
                    createRow += '<td>' + response.data.address + '</td>';
                    createRow += '<td>' + actionBtns + '</td>';
                    createRow += '</tr>';

                    $('#loader-route').hide();

                    $('#route-table-form').hide();
                    $('#route-table-' + routeID).fadeIn();

                    if(response.method == 'insert') {
                        $('#route-table-' + routeID + ' table tbody').append(createRow);
                    } else {
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' .stopID').text(response.createdID);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' .stopName').text(response.data.stopName);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' .stopAddress').text(response.data.address);

                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' td .edit-stop').attr('id', response.createdID);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' td .edit-stop').attr('name', response.data.stopName);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' td .edit-stop').attr('address', response.data.address);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' td .edit-stop').attr('lat', response.data.latitude);
                        $('#route-table-' + routeID + ' .row-' + response.createdID + ' td .edit-stop').attr('long', response.data.longitude);
                    }

                    form.reset();
                },
                error : function(request, status, error) {
                    $('#login-load').fadeOut();
                    console.log(request.responseText);
                }
            });
        }, 2000);
    });

    $(document).on('click', '.delete-route-stop', function(e) {
        e.preventDefault();

        $('#loader-route-stop').fadeIn();

        var curRequest = $(this);

        $.ajax({
            url  : $(this).attr('href'),
            type : 'GET',
            success : function() {
                curRequest.parent().parent().remove();
                $('#loader-route-stop').hide();
            },
            error : function(request, status, error) {
                $('#login-load').fadeOut();
                console.log(request.responseText);
            }
        });
    });

    $(document).on('click', '.edit-category', function() {
        var id     = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var title  = $('.row-' + id).text();
        var parent = $(this).attr('parent');

        $('input[name="category[name]"]').val(title);
        $('select[name="category[parentID]"]').val(parent);
        $('select[name="category[status]"]').val(status);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="reset" class="btn btn-inverse cancel-category">Cancel</button>' );
        $('.cat-submit').text( 'Update Category' );
    });
   
    $(document).on('click', '.cancel-category', function() {
        var postType = $('input[name="category[postType]"]').val();

        $('.cat-submit').text( 'Create Category' );
        $('form')[0].reset();

        setTimeout(function() {
            $('.btn-reset').html('');
        }, 100);

        $('input[name="category[postType]"]').val(postType);
    });

    $(document).on('click', '.edit-fare', function() {
        var id     = $(this).attr('id');
        var from = $(this).attr('from');
        var to  =  $(this).attr('to');
        var fare = $(this).attr('fare');

        $('input[name="formDate[from]"]').val(from);
        $('input[name="formDate[to]"]').val(to);
        $('input[name="formDate[amount]"]').val(fare);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="reset" class="btn btn-inverse cancel-fare">Cancel</button>' );
        $('.cat-submit').text( 'Update Fare' );
    });
   
    $(document).on('click', '.cancel-fare', function() {
        $('.cat-submit').text( 'Create Fare' );
        
        $('input[name="formDate[from]"]').val('');
        $('input[name="formDate[to]"]').val('');
        $('input[name="formDate[amount]"]').val('');

        $('input[name=id]').val('');

        setTimeout(function() {
            $('.btn-reset').html('');
        }, 100);
    });

    $(document).on('click', '.edit-faq', function() {
        var id     = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var title  = $('.row-' + id).text();
        var answer = $(this).attr('answer');

        $('input[name="faq[question]"]').val(title);
        $('textarea[name="faq[answer]"]').val(answer); 
        $('select[name="faq[status]"]').val(status);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="reset" class="btn btn-inverse cancel-faq">Cancel</button>' );
        $('.cat-submit').text( 'Update Faq' );
    });
   
    $(document).on('click', '.cancel-faq', function() {
        $('.btn-reset').html('');
        $('.cat-submit').text( 'Create Faq' );
        $('form')[0].reset();

        $('input[name="faq[question]"]').val('');
        $('textarea[name="faq[answer]"]').val(''); 
        $('select[name="faq[status]"]').val('');

        $('input[name=id]').val('');
    });

    $(document).on('click', '.edit-bus', function() {
        var id          = $(this).attr('id');
        var description = $('.description-' + id).text();
        var title       = $('.row-' + id).text();
        var theme       = $(this).attr('theme');
        var file        = $(this).attr('file');

        $('input[name="formData[title]"]').val(title);
        $('select[name="formData[theme]"]').val(theme);
        $('textarea[name="formData[description]"]').text(description);
        $('.ftImage').attr('src', file);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="reset" class="btn btn-inverse cancel-bus">Cancel</button>' );
        $('.cat-submit').text( 'Update Bus' );
    });
   
    $(document).on('click', '.cancel-bus', function() {
        var currentUrl  = $('input[name=currentFile]').val();

        $('.btn-reset').html('');
        $('.cat-submit').text( 'Create Bus' );
        $('form')[0].reset();

        $('input[name="formData[title]"]').val('');
        $('select[name="formData[theme]"]').val('yellow');
        $('textarea[name="formData[description]"]').text('');
        $('input[name=id]').val('');

        $('.ftImage').attr('src', currentUrl);
    });

    $(document).on('click', '.edit-city', function() {
        var id          = $(this).attr('id');
        var title       = $('.row-' + id).text();

        $('input[name="formData[name]"]').val(title);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="reset" class="btn btn-inverse cancel-city">Cancel</button>' );
        $('.cat-submit').text( 'Update City' );
    });
   
    $(document).on('click', '.cancel-city', function() {
        $('.btn-reset').html('');
        $('.cat-submit').text( 'Publish' );
        $('form')[0].reset();

        $('input[name="formData[name]"]').val('');
        $('input[name=id]').val('');
    });

    $(document).on('click', '.edit-route', function() {
        var id   = $(this).attr('id');
        var name = $(this).attr('name');
        var description = $(this).attr('description');

        $('input[name="formData[name]"]').val(name);
        $('input[name="formData[description]"]').val(description);

        $('input[name=id]').val(id);

        $('.btn-reset').html( '<button type="button" class="btn btn-inverse cancel-route">Cancel</button>' );
        $('.cat-submit').text( 'Update Route' );
    });
   
    $(document).on('click', '.cancel-route', function() {
        $('.btn-reset').html('');
        $('.cat-submit').text( 'Publish' );

        $('input[name="formData[name]"]').val('');
        $('input[name="formData[description]"]').val('');

        $('input[name=id]').val('');
    });

    $(document).on('click', '.edit-stop', function() {
        var id      = $(this).attr('id');
        var name    = $(this).attr('name');
        var address = $(this).attr('address');
        var route   = $(this).attr('route');
        var lat     = $(this).attr('lat');
        var long    = $(this).attr('long');

        $('input[name="formData[stopName]"]').val(name);
        $('input[name="formData[address]"]').val(address);
        $('input[name="formData[routeID]"]').val(route);
        $('input[name="formData[latitude]"]').val(lat);
        $('input[name="formData[longitude]"]').val(long);

        $('input[name=id]').val(id);

        $('#route-table-' + route).hide(); 
        $('#route-table-form').fadeIn();
        $('.cancel-create-stop').attr('data-id', route);

        $('.btn-create-stop').text( 'Update Stop' );
    });
   
    $(document).on('click', '.cancel-create-stop', function() {
        $('.btn-create-stop').text( 'Save Stop' );

        var route = $('input[name="formData[routeID]"]').val();

        $('input[name="formData[stopName]"]').val('');
        $('input[name="formData[address]"]').val('');
        $('input[name="formData[routeID]"]').val('');
        $('input[name="formData[latitude]"]').val('');
        $('input[name="formData[longitude]"]').val('');

        $('input[name=id]').val('');

        $('#route-table-form').hide();
        $('#route-table-' + route).fadeIn(); 
    });
    
    $(document).on('click', '.add-addon', function() {
        var html = '<div class="input-row mg-b-20"><input type="text" name="pkg_addon[]" class="form-control" value="" />';
        html += '<a class="delete-row close-tag"><i class="fa fa-times-rectangle-o"></i></a>';
        html += '</div>';
        
        $('.pkg-addon-row').append( html );
    });

    $(document).on('click', '.delete-row', function() {
        $(this).parent().remove();
    });

    $(document).on('keyup', 'input[name=password], input[name=confirm_password]', function() {
        var curCheck = $(this).attr('name');

        if(curCheck == 'confirm_password') {
            var password        = $('input[name=password]').val();
            var confirmPassword = $('input[name=confirm_password]').val();

            if(password == confirmPassword) {
                $('.emp-submit').prop('disabled', false);
                $('.error_pass').text('');
                $('.cpass').css({
                    'background-color' : 'transparent',
                    'border' : 'none',
                    'border-bottom' : '2px solid #ececec'
                });
            } else {
                $('.cpass').css({
                    'background-color' : '#ffcece',
                    'border' : '1px solid #d40000'
                });
                $('.emp-submit').prop('disabled', true);
                $('.error_pass').text('Password Did not matched');
            }
        }
    });    

    $(document).on('click', '.add-gallery', function() {
        // Clone the gallery-image structure
        let newGalleryImage = $('.gallery-image').first().clone();

        // Get the current count of .gallery-image elements to set the correct index starting at 0
        let index = $('.gallery-image').length -1;

        // Update the name attributes for the new gallery image with the correct index
        newGalleryImage.find('select, input').each(function() {
            let nameAttr = $(this).attr('name');
            if (nameAttr) {
                // Replace the existing index with the new index
                let updatedName = nameAttr.replace(/\[\d+\]/, `[${index}]`);
                $(this).attr('name', updatedName);
            }
        });

        // Append the new gallery image to the gallery-images-wrapper
        $('.gallery-images-wrapper').append(newGalleryImage);
    });

    $(document).on('click', '.add-faq', function() {
        let newGalleryImage = $('.faq-data-wrap').first().clone();

        let index = $('.faq-data-wrap').length -1;

        newGalleryImage.find('select, input, textarea').each(function() {
            let nameAttr = $(this).attr('name');
            if (nameAttr) {
                let updatedName = nameAttr.replace(/\[\d+\]/, `[${index}]`);
                $(this).attr('name', updatedName);
            }
        });

        $('.faq-wrapper').append(newGalleryImage);
    });

    $(document).on('click', '.btn-delete', function() {
       $(this).parent().parent().remove();
    });

    $(document).on('change', 'select[name="gallery[type]"]', function() {
        var valueSet = $('option:selected', this).val();

        if(valueSet == 'video') {
            $(this).parent().parent().find('.' + valueSet).fadeIn();
        } else {
            $(this).parent().parent().find('.video').hide();
        }
    });

    $('#summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });

    $('.inline-editor').summernote({
        airMode: true
    });

    
});