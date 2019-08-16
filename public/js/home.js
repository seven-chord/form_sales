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
    new ClipboardJS('.company_name_clipboard');
    new ClipboardJS('.company_name_kana_clipboard');
    new ClipboardJS('.postcode_clipboard');
    new ClipboardJS('.division_clipboard');


    new ClipboardJS('.address_clipboard');
    new ClipboardJS('.municipalities_and_number_clipboard');
    new ClipboardJS('.municipalities_clipboard');
    new ClipboardJS('.building_name_clipboard');


    new ClipboardJS('.telephone_clipboard');
    new ClipboardJS('.homepage_clipboard');
    new ClipboardJS('.email_clipboard');

    new ClipboardJS('.person_in_charge_clipboard');
    new ClipboardJS('.person_in_charge_sei_clipboard');
    new ClipboardJS('.person_in_charge_mei_clipboard');

    new ClipboardJS('.kana_full_clipboard');
    new ClipboardJS('.kana_sei_clipboard');
    new ClipboardJS('.kana_mei_clipboard');


    new ClipboardJS('.furigana_hiragana_clipboard');
    new ClipboardJS('.furigana_sei_clipboard');
    new ClipboardJS('.furigana_mei_clipboard');

    new ClipboardJS('.subject_clipboard');
    new ClipboardJS('.sales_letter_set_btn');
    new ClipboardJS('.sales_letter_url_none_set_btn');
    new ClipboardJS('.sales_letter_300_words_btn');





    var next_company_count = 0;

    //送付可のカウント数
    var send_posssible_count = 0;
    var send_count = "送付数 " + send_posssible_count;


    //  営業開始ボタン
    $('.sales_start_button').click(function(){
        var from_company_id = $('.from-company option:selected').val();
        // console.log(from_company_id);
     $.when(
           $('.justify-content-center').fadeOut('fast'),
        //    $('.from_copany_button').fadeOut("fast")

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/home/get_from_company',
                type: 'GET',
                data:{
                    'from_company_id'  : from_company_id,
                }
            })
        )
        .done(function(a1, fromCompanyInfo){

          $('.sale_start_container').fadeIn('fast');
          $('.sale_start_container').css({'display':'flex'});
          $('.from_company_container').css({'width':'50%'});
          $('.send_count').html(send_count);
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




    //urlの値を取得
    var to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();
    to_company_change(to_company_url);

    //「送付完了->次の企業へ」ボタンクリック
    $('.next_list_possible_button').click(function(){
        var to_company_id = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_id').text();
        next_company_count++;
        send_posssible_count++;
        to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();

        send_count = "送付数 " + send_posssible_count;
        $('.send_count').html(send_count);
        to_company_change(to_company_url);
        //----------ここからajax処理(送信可能日付をupdate)！！！！！----------
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/home/send_date_update',
                type: 'POST',
                data:{
                    'to_company_id'  : to_company_id,
                }
            })
            // Ajaxリクエストが成功した場合
            .done(function(data) {
                if(data) {
                    console.log('update_success');
                } else {
                    console.log('update_fail');
                }
            })
            // Ajaxリクエストが失敗した場合
            .fail(function(data) {
                console.log(data);
                console.log('update_fail');
            });
        //----------ここまでajax処理(送信可能日付をupdate)！！！！！----------



    });

    //「送付不可->次の企業へ」ボタンクリック
    $('.next_list_impossible_button').click(function(){
        var to_company_id = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_id').text();
        next_company_count++;
        to_company_url = $('#to_company_list').find('tr').eq(next_company_count).find('.to_company_url').text();
        to_company_change(to_company_url);


         //----------ここからajax処理(送信不可日付をupdate)！！！！！----------
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: '/home/send_impossible',
            type: 'POST',
            data:{
                'to_company_id'  : to_company_id,
            }
        })
        // Ajaxリクエストが成功した場合
        .done(function(data) {
            if(data) {
                console.log('update_success');
            } else {
                console.log('update_fail');
            }
        })
        // Ajaxリクエストが失敗した場合
        .fail(function(data) {
            console.log(data);
            console.log('update_fail');
        });
    //----------ここまでajax処理(送信不可日付をupdate)！！！！！----------



    });



    //送付先企業切り替え関数
    function to_company_change(url){
        $('.to_comapny_container').children('iframe').attr('src',url);
    }


    function truncate(str, len){
        return str.length <= len ? str: (str.substr(0, len)+"...");
      }

    //-----------営業メール文省略ここから-----------

    $('.short_character').each(function() {
        var count = 10;
        var thisText = $(this).text();
         var textLength = thisText.length;
          if (textLength > count) {
             var showText = thisText.substring(0, count);
             var insertText = showText += '…';
             $(this).html(insertText);
         };
     });
    

    //-----------営業メール文省略ここまで-----------



     //----------ショートカットここから----------
     $(function() {
 
        shortcut.add("Shift+1",function() {
            $('.company_name_clipboard').click();
        });

        shortcut.add("Shift+2",function() {
            $('.postcode_clipboard').click();
        });


        shortcut.add("Shift+3",function() {
            $('.sales_letter_set_btn').click();
        });

    });
     
    //----------ショートカットここまで----------



    //window.children
    $('iframe').on('load',function(){
        console.log("te");
        var iframe = $('iframe').contents();

    iframe.find("body").click(function(){
           alert("test");
    });
   });

   


});
// -----------------------------------------------------------------------
