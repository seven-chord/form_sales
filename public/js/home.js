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

    var next_company_count = 0;
    
    //送付可のカウント数
    var send_posssible_count = 0;
    // if(!send_posssible_count_2 === 0){
    //     send_posssible_count = send_posssible_count_2;
    // }
    //送付数の更新
    var send_count = "送付数 " + send_posssible_count;
    


     
    //  営業開始ボタン
    $('.sales_start_button').click(function(){
        console.log()

     $.when(
           $('.justify-content-center').fadeOut('fast'),
        //    $('.from_copany_button').fadeOut("fast")
        )
        .done(function(){
          $('.sale_start_container').fadeIn('fast');
          $('.sale_start_container').css({'display':'flex'});
          $('.from_company_container').css({'width':'50%'});
        //   $('iframe')
        //   .css({'transform':'scale(0.75)',
        //         '-o-transform':'scale(0.75)',
        //         '-webkit-transform':'scale(0.75)'
                    
        // });
        $('.send_count').html(send_count);

        console.log(send_posssible_count);


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

        //----------ここからajax処理(送信可能日付をupdate)テスト中！！！！！----------
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // url: "{{ action('controller@destroy', ['id' => $user->id]) }}",
                // url: "{{ action('SendDateUpdateController@sendDateUpdate'}}",

                url: 'http://localhost:8888/home/send_date_update',
                type: 'GET',
                // data: "{'user_id': {{ $user->id }}, '_method': 'DELETE'}"
            })
            // Ajaxリクエストが成功した場合
            .done(function() {
                console.log('update_success');
            })
            // Ajaxリクエストが失敗した場合
            .fail(function() {
                console.log('update_fail');
            });
        //----------ここまでajax処理(送信可能日付をupdate)テスト中！！！！！----------



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


    //ajaxテスト
    // $('.ajax_button').click(function(){
    //     $.ajax({
    //         type: 'GET',
    //         url: 'http://localhost:8888/home?page=2', // url: は読み込むURLを表す
    //         dataType: 'html', // 読み込むデータの種類を記入
    //         context: send_posssible_count,
    //     }).done(function (results) {
    //         // 通信成功時の処理
            
    //         // bodyが読み込み原因
    //         $('body').html(results); 
    //         // $('.justify-content-center').html(results.find('.justify-content-center').outerHTML); 

    //         $('.sale_start_container').css({'display':'none'});
    //         var send_count_hiki = "送付数 " + this;
    //         console.log(send_count_hiki);
            
    //     }).fail(function (err) {
    //         // 通信失敗時の処理
    //         alert('ファイルの取得に失敗しました。');
    //     });
    // });


    $('.ajax_button').click(function(){
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8888/home?page=2', // url: は読み込むURLを表す
            dataType: 'html', // 読み込むデータの種類を記入
            context: send_posssible_count,
            success:function(data){
                // var test = $(data).find('.justify-content-center');
                // var test = $('body').html($(data).find('.justify-content-center').outerHTML)
                // $('#all_container').html($(data).find('.justify-content-center'));
                console.log("test");

                // console.log($(data).find('.justify-content-center').html());
                // $('.justify-content-center').html($(data).find('.justify-content-center'));
                // $('body').html(send_posssible_count);

                $('body').html(data);
                // console.log(send_posssible_count);
            // $('#all_container').html($(data).find('.justify-content-center').outerHTML);
                // $('body').html($(data).find('.justify-content-center').outerHTML);


            }
        })
    });



});
// -----------------------------------------------------------------------