$(document).ready(function(){
    $(".delete-btn"). click(function() {
        $('#imagePreview').css('background-image', 'url(assets/images/thumbnail.png)');
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
    });
    $(document).ready(function(){
        $(".delete-btn"). click(function() {
            $('#customerimagePreview').css('background-image', 'url(assets/images/thumbnail.png)');
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#customerimagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#customerimagePreview').hide();
                    $('#customerimagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#customerimageUpload").change(function() {
            readURL(this);
        });
        });
    $(document).ready(function() {
        $('.select-custom-design').select2();
        $('.select-custom-design-group').select2();
    });
    $(document).ready(function() {
        $('.search-toggle').click(function(){
            $('.search-form').addClass('active');
        });
        $('.close-search').click(function(){
            $('.search-form').removeClass('active');
        });
    });
    // $(document).ready(function() {
    //     $(".edit").click(function(){
    //         $(this).parents('li').toggleClass("edit-active");
    //         if ($(this).parents('li').hasClass('edit-active')){
    //                 $(this).parent('form').addClass('edit-on');
    //             } else {
    //                 $(this).parent('form').removeClass('edit-on');
    //             }
    //       });
    // });


    $(document).ready(function(){
        $(".card_reviews").slice(0,3).show();
        $(".btn_show_more").click(function(e){
          e.preventDefault();
          $(".card_reviews:hidden").slice(0,3).fadeIn("slow");

          if($(".card_reviews:hidden").length == 0){
             $(".btn_show_more").fadeOut("slow");
            }
        });
      });
      $(document).ready(function() {
        /*
        $("#sidebar-account-dropdown").click(() => {
            $(this).find('#sidebar-account-dropdown-menu').toggleClass('show');
        });
        */

        $('.account_dropdown>a').click(function(){
            $(this).toggleClass('active');
        });




    });

      $(document).ready(function(){
        $(".toggle_menu img").click(function(){
          $('.blue-bg-wrapper').addClass("show");
        });
      });
      $(document).ready(function(){
        $(".blue-bg-wrapper.bar_left .blue-bg-heading").click(function(){
          $('.blue-bg-wrapper').removeClass("show");
        });
      });
