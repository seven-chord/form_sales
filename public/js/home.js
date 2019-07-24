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


     
    //  営業開始ボタン
    $('.sales_start_button').click(function(){
     $.when(
           $('.justify-content-center').fadeOut('fast'),
        //    $('.from_copany_button').fadeOut("fast")
        )
        .done(function(){
          $('.sale_start_container').fadeIn('fast');
          $('.sale_start_container').css({'display':'flex'});
        // //   $(".from_company_info").fadeIn("fast");
        //   $(".to_company_info").fadeIn("fast");
        });
    });
  
    //  一覧へ戻るボタン
    $('.return_list_button').click(function(){
     $.when(
           $('.sale_start_container').fadeOut('fast'),
        )
        .done(function(){
          $('.justify-content-center').fadeIn('fast');
        });
    });


    //iframe処理ここから
    
    var next_company_count = 0;

    //送付可のカウント数
    var send_posssible_count = 0;
    
    //送付数の更新
    var send_count = "送付数 " + send_posssible_count;
    $('.send_count').html(send_count);
    
    //urlの値を取得
    var to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();
    to_company_change(to_company_url);


    //「送付完了->次の企業へ」ボタンクリック
    $('.next_list_possible_button').click(function(){
        next_company_count++;
        send_posssible_count++;
        to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();
        send_count = "送付数 " + send_posssible_count;
        $('.send_count').html(send_count);
        to_company_change(to_company_url);
    });

    //「送付不可->次の企業へ」ボタンクリック
    $('.next_list_impossible_button').click(function(){
        next_company_count++;
        to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();
        to_company_change(to_company_url);
    });



    //送付先企業切り替え関数
    function to_company_change(url){
        $('.to_comapny_container').children('iframe').attr('src',url);
    }

    //iframe処理ここまで





});
// -----------------------------------------------------------------------