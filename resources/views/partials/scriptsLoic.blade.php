<script>
    //  ----------------------start check all checkboxes in contact part form--------------
$('.checkAll').click(function (e) {
    // e.preventDefault();
    $(".cbClass").prop('checked', $(this).prop('checked'));
});
// -----------------------------------------end-----------------------------------

// --------------------- start two way binding-------------------------
// ; (function main($) {
//     'use strict';

//     const $output = $('.output');
//     const $input = $('#input');

//     const updateOutput = function () {
//         $output.val($input.val());
//     }
//     $input.on('keyup', updateOutput);
// })(jQuery);
// // -------------------- end -------------------------

// // ---------- start sweetch between MANUAL end CONTACT section---------
// $(document).ready(function () {
//     $('#manuel').removeClass("hidden");
//     $('#contact').removeClass("hidden");

//     $('#typeMessage').change(function (e) {
//         // e.preventDefault();
//         $('.data').hide();
//         $("#" + $(this).val()).fadeIn(200);
//     }).change();
//     // -------------------- end----------------
    
// });

// // ------------start count chars number first manual section-------
// count($("#text"), $("#count"));
// $("#text").keyup(function () {
//     // $(this).addClass('is-valid');
//     $('#count').removeClass("hidden");
//     count($("#text"), $("#count"));
// });

// counttwo($("#textt"), $("#countt"));
// $("#textt").keyup(function () {
//     // $(this).addClass('is-valid');
//     $('#countt').removeClass("hidden");
//     counttwo($("#textt"), $("#countt"));
// });


// function count(src, dest) {
//     var txtVal = src.val();
//     var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
//     var chars = txtVal.length;

//     var limit = 100;
//     var total = limit - chars;

//     if (total < 0) {
//         $('#count').css({
//             "color": "red"
//         });
//         $('#text').addClass("is-invalid");
//         // $('#text').keydown(function (event) { 
//         //     console.log("touche: " +  event.key + " bloquée")
//         //     event.preventDefault();
//         // });
//     } else {
//         $('#count').css({
//             "color": "#808080"
//         });
//         $('#text').removeClass("is-invalid");
//         // $('#text').addClass("is-valid");
//     }
//     if (chars === 0) {
//         words = 0;
//     }
//     dest.html(words + ' {{ __("message.word_number") }} | ' + total + ' {{ __("message.remaning_chars")}} '); //+ chars + ' /100 chars<br/>');
// }

// // -----------end end   ------------------  end---------

// // ================================================= CONTACT SECTION PART================================================


// // ------------start count chars number-------
// function counttwo(src, dest) {
//     var txtVal = src.val();
//     var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
//     var chars = txtVal.length;

//     var limit = 100;
//     var total = limit - chars;

//     if (total < 0) {
//         $('#countt').css({
//             "color": "red"
//         });
//         $('#text').addClass("is-invalid");
//         // $('#text').keydown(function (event) { 
//         //     console.log("touche: " +  event.key + " bloquée")
//         //     event.preventDefault();
//         // });
//     } else {
//         $('#countt').css({
//             "color": "#808080"
//         });
//         $('#textt').removeClass("is-invalid");
//         // $('#text').addClass("is-valid");
//     }
//     if (chars === 0) {
//         words = 0;
//     }
//     dest.html(words + ' {{ __("message.word_number") }} | ' + total + ' {{ __("message.remaning_chars")}} '); //+ chars + ' /100 chars<br/>');
// }

// -----------end end   ------------------  end---------


</script>