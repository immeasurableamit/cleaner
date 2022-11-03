$(document).ready(function(){
$('.search-btn').click(function(){
$('.header-search').addClass('active');
});
$('.close-header-search').click(function(){
    $('.header-search').removeClass('active');
    });
});
$(document).ready(function(){
    $('.toggle_menu').click(function(){
    $('#admin-sidebar').toggleClass('active');
    });
});

// $(document).ready(function() {
//     $(".edit").click(function(){
//         $(this).parents('li').toggleClass("edit-active");
//         if ($(this).parents('form').find('li').hasClass('edit-active')){
//                 $(this).parents('.customer-account-forms').addClass('edit-on');  
//             } else {
//                 $(this).parents('.customer-account-forms').removeClass('edit-on'); 
//             }
//       });
// });