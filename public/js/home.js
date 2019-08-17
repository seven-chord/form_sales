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
    new ClipboardJS('.sales_letter_clipboard');
    new ClipboardJS('.sales_letter_url_none_clipboard');
    new ClipboardJS('.sales_letter_300_words_clipboard');





    var next_company_count = 0;

    //送付可のカウント数
    var send_posssible_count = 0;
    var send_count = "送信加算： " + send_posssible_count;


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


          fromCompany = fromCompanyInfo[0]["info"]
          $('#company_name').html(fromCompany.company_name)
          $('#company_name_kana').html(fromCompany.company_name_kana)
          $('#postcode').html(fromCompany.postcode)
          $('#division').html(fromCompany.division)
          $('#address').html(fromCompany.address)
          $('#municipalities_and_number').html(fromCompany.municipalities_and_number)
          $('#municipalities').html(fromCompany.municipalities)
          $('#building_name').html(fromCompany.building_name)
          $('#telephone').html(fromCompany.telephone)
          $('#homepage').html(fromCompany.homepage)
          $('#email').html(fromCompany.email)
          $('#person_in_charge').html(fromCompany.person_in_charge)
          $('#person_in_charge_sei').html(fromCompany.person_in_charge_sei)
          $('#person_in_charge_mei').html(fromCompany.person_in_charge_mei)
          $('#kana_full').html(fromCompany.kana_full)
          $('#kana_sei').html(fromCompany.kana_sei)
          $('#kana_mei').html(fromCompany.kana_mei)
          $('#furigana_hiragana').html(fromCompany.furigana_hiragana)
          $('#furigana_sei').html(fromCompany.furigana_sei)
          $('#furigana_mei').html(fromCompany.furigana_mei)
          $('#subject').html(fromCompany.subject)
          $('#sales_letter').html(fromCompany.sales_letter);
          $('#sales_letter_url_none').html(fromCompany.sales_letter_url_none)
          $('#sales_letter_300_words').html(fromCompany.sales_letter_300_words)
          $('#to_company_mail_all').html(fromCompanyInfo[0]["count"])

            //営業メール省略配列
            var short_text = {
                company_name:'company_name',
                company_name_kana:'company_name_kana',
                postcode:'postcode',
                division:'division',
                address:'address',
                municipalities_and_number:'municipalities_and_number',
                municipalities:'municipalities',
                building_name:'building_name',
                // telephone:'telephone',
                homepage:'homepage',
                // email:'email',
                person_in_charge:'person_in_charge',
                person_in_charge_sei:'person_in_charge_sei',
                person_in_charge_sei:'person_in_charge_sei',
                person_in_charge_sei:'person_in_charge_mei',
                kana_full:'kana_full',
                kana_sei:'kana_sei',
                kana_mei:'kana_mei',
                furigana_hiragana:'furigana_hiragana',
                furigana_sei:'furigana_sei',
                furigana_mei:'furigana_mei',
                subject:'subject',
                sales_letter:'sales_letter',
                sales_letter_url_none:'sales_letter_url_none',
                sales_letter_300_words:'sales_letter_300_words',
            }

          //from_company情報省略
          for(key in short_text){
            $('#' + short_text[key]).each(function() {
                var count = 10;
                var thisText = $(this).text();
                 var textLength = thisText.length;
                  if (textLength > count) {
                     var showText = thisText.substring(0, count);
                     var insertText = showText += '…';
                     $(this).html(insertText);
                 };
             });    
         }

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

  
     //----------ショートカットここから----------
     var shortcut_data = [
         { shortcut:'Shift+1', clipboard_class:'company_name_clipboard', shortcut_explain_id:'company_name_shortcut'},
         { shortcut:'Shift+2', clipboard_class:'company_name_kana_clipboard', shortcut_explain_id:'company_name_kana_shortcut'},
         { shortcut:'Shift+3', clipboard_class:'postcode_clipboard', shortcut_explain_id:'postcode_shortcut'},
         { shortcut:'Shift+4', clipboard_class:'division_clipboard', shortcut_explain_id:'division_shortcut'},
         { shortcut:'Shift+Q', clipboard_class:'address_clipboard', shortcut_explain_id:'address_shortcut'},
         { shortcut:'Shift+W', clipboard_class:'municipalities_and_number_clipboard', shortcut_explain_id:'municipalities_and_number_shortcut'},
         { shortcut:'Shift+E', clipboard_class:'municipalities_clipboard', shortcut_explain_id:'municipalities_shortcut'},
         { shortcut:'Shift+R', clipboard_class:'building_name_clipboard', shortcut_explain_id:'building_name_shortcut'},
         { shortcut:'Shift+T', clipboard_class:'telephone_clipboard', shortcut_explain_id:'telephone_shortcut'},
         { shortcut:'Shift+M', clipboard_class:'homepage_clipboard', shortcut_explain_id:'homepage_shortcut'},
         { shortcut:'Shift+J', clipboard_class:'email_clipboard', shortcut_explain_id:'email_shortcut'},
         { shortcut:'Shift+A', clipboard_class:'person_in_charge_clipboard', shortcut_explain_id:'person_in_charge_shortcut'},
         { shortcut:'Shift+S', clipboard_class:'person_in_charge_sei_clipboard', shortcut_explain_id:'person_in_charge_sei_shortcut'},
         { shortcut:'Shift+D', clipboard_class:'person_in_charge_mei_clipboard', shortcut_explain_id:'person_in_charge_mei_shortcut'},
         { shortcut:'Shift+Z', clipboard_class:'kana_full_clipboard', shortcut_explain_id:'kana_full_shortcut'},
         { shortcut:'Shift+X', clipboard_class:'kana_sei_clipboard', shortcut_explain_id:'kana_sei_shortcut'},
         { shortcut:'Shift+C', clipboard_class:'kana_mei_clipboard', shortcut_explain_id:'kana_mei_shortcut'},
         { shortcut:'Shift+F', clipboard_class:'furigana_hiragana_clipboard', shortcut_explain_id:'furigana_hiragana_shortcut'},
         { shortcut:'Shift+G', clipboard_class:'furigana_sei_clipboard', shortcut_explain_id:'furigana_sei_shortcut'},
         { shortcut:'Shift+H', clipboard_class:'furigana_mei_clipboard', shortcut_explain_id:'furigana_mei_shortcut'},
         { shortcut:'Shift+Y', clipboard_class:'subject_clipboard', shortcut_explain_id:'subject_shortcut'},
         { shortcut:'Shift+V', clipboard_class:'sales_letter_clipboard', shortcut_explain_id:'sales_letter_shortcut'},
         { shortcut:'Shift+B', clipboard_class:'sales_letter_url_none_clipboard', shortcut_explain_id:'sales_letter_url_none_shortcut'},
         { shortcut:'Shift+N', clipboard_class:'sales_letter_300_words_clipboard', shortcut_explain_id:'sales_letter_300_words_shortcut'},
     ]

     $.each(shortcut_data,function(property,value){
        //ショートカットキー操作
        shortcut.add(value.shortcut,function() {
            $('.' + value.clipboard_class).click();
            $('.' + value.clipboard_class).css('border','1.5px solid orange');
            setTimeout(function(){
                $('.' + value.clipboard_class).css('border','1px solid rgb(216, 216, 216)');
            },200)
         });

        //ショートカットキーをHTMLに表示
         $('#' + value.shortcut_explain_id).append('<span style="font-weight:normal;">（ ' + value.shortcut + ' ）</span>');
     });


     //送信完了&不可ショートカット設定
     var send_shortcut_data = [
        { shortcut:'Shift+Enter', next_list_btn_class:'next_list_possible_button'},
        { shortcut:'Shift+Tab', next_list_btn_class:'next_list_impossible_button'},
     ];

     $.each(send_shortcut_data,function(property,value){
        //ショートカットキー操作
        shortcut.add(value.shortcut,function() {
            $('.' + value.next_list_btn_class).click();            
         });
     })


    



    //----------ショートカットここまで----------




});
// -----------------------------------------------------------------------
