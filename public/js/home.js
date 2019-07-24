// -----------------------------------------------------------------------
//      ex01.js
//
//                                      Jun/20/2018
//
/*
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
*/
// -----------------------------------------------------------------------
jQuery (function ()
{
      var clipboard_company_name = new ClipboardJS('.btn_company_name_clipboard');
      var clipboard_postcode = new ClipboardJS('.postcode_clipboard');

      console.log("test");

      // クリップ成功
      // var copy_success = $('.copy_success').append('<span class="clipboard-success">コピーしました</span>')

      // clipboard.on('success', function(e) {
      //   $('.clipboard-success').fadeIn(1000).fadeOut(1000);
      // });

      // clipboard.on('success', function(e) {
      //   $('.clipboard-success').fadeIn(1000).fadeOut(1000);
      // });

    //  依頼企業情報ボタン
    $(".sales_start_button").click(function(){
     $.when(
           $('.justify-content-center').fadeOut("fast"),
        //    $('.from_copany_button').fadeOut("fast")
        )
        .done(function(){
          $(".sale_start_container").fadeIn("fast");
          $(".sale_start_container").css({"display":"flex"});
        // //   $(".from_company_info").fadeIn("fast");
        //   $(".to_company_info").fadeIn("fast");
        });
    });
  

    $(".return_list_button").click(function(){
     $.when(
           $('.sale_start_container').fadeOut("fast"),
        )
        .done(function(){
          $(".justify-content-center").fadeIn("fast");
        });
    });


});
// -----------------------------------------------------------------------