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
     
var i = 1;
var v = 1;
  var list_info_defer = $.Deferred();

  var list_info_defer_a = $.Deferred();

  var from_company_promise = list_info_defer.promise();
  var from_company_promise_a = list_info_defer_a.promise();



    $(".company_name").click(function(){
      // var list_info_defer = $.Deferred();
     $.when(
           $('.container-fluid').fadeOut("slow")
        )
        .done(function(){
          $("h2").fadeIn();
        });
    });
  

    $("h2").click(function(){
      // var list_info_defer = $.Deferred();
     $.when(
           $('h2').fadeOut("slow")
        )
        .done(function(){
          $(".container-fluid").fadeIn();
        });
    });


    
  
    // setTimeout(function(){
    //   list_info_defer.reject();
    // },3000);


    // from_company_promise.then(
    //   function(){
    //     console.log(i++);
    //   $("h2").fadeIn();
    //   // $("h2").addClass("run");

    //   });



      // $("h2").click(function(){
      //   // var list_info_defer_a = new $.Deferred();

      //   $('h2').fadeOut("slow",function(){
          
      //     list_info_defer_a.resolve();
      //   });
      // });
    
      // // setTimeout(function(){
      // //   list_info_defer_a.reject();
      // // },3000);
  
  
      // from_company_promise_a.then(
      //   function(){
      //     console.log(v++);
      //   $(".container-fluid").fadeIn();
      //   // $("h2").addClass("run");
  
      //   });
  

      // $(".company_name").click(function(){
      //   $('.container-fluid').addClass("hide_from_company",1000,function(){
      //     list_info_defer.resolve();
      //   });
      // });

     
  

      











      // function inOut(class_name_flag){
      //   if(!class_name_flag === 1){
      //     class_name = "hide_from_company";
      //   }
      //   var click_element =  $('#' + class_name);
      //   click_element.click(function(){
      //     $('.container-fluid').fadeOut("slow",function(){
      //       list_info_defer.resolve();
      //     });
      //   });



      // }

    



        // $('.container-fluid').toggle('easing');





    

});
// -----------------------------------------------------------------------