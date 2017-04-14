$(document).ready(function(){

    $.ajax({
        type:"GET",
        url:"js/todayspump.json",
        dataType:"json",
        success:function(result){
            $(".img-thumbnail")[0].src=result.image;
            $("#pumpTitle").html(result.title);
            $("#paragraph").html(result.paragraph);
        }
    });

});

$(document).ready(function(){

   var width = $(window).width();
   $("#thebuttonbar").width(width);

   $(window).resize(function(){
	   width = $(window).width();
	   $("#thebuttonbar").width(width);
   });

   if(document.cookie.indexOf("disclaimer=off")>=0){
       $("#disclaimer").hide();
   }

   $("#disclaimer").click(function(){
      $("#hiddenDiv").slideToggle().show();
   });

   $("#slogan").toggle("puff",{percent:300});

   var originalColor = $(".btn-lg:not(.active)").css("color");
   var backgroundColor = $(".btn-lg:not(.active)").css("backgroundColor");

    $("a.btn.btn-lg").mouseenter(function(){
        $(this).stop(true).animate({color:"white",backgroundColor:"#3d78b2",opacity:0.6});
   });

   $("a.btn.btn-lg:not(active)").mouseleave(function(){
       $(this).stop(true).animate(
               {color:originalColor,backgroundColor:backgroundColor,opacity:1.0});
   });

});

$(document).ready(function(){

   $(".btn.btn-lg").click(function(){
      $(".active").removeClass("active");
      $(this).addClass("active");
      });

    $("#closedisclaimer").click(function(){
       $(".navbar-fixed-bottom").hide();
    });

    $(".btn-primary").click(function(){
        window.location.href="adminlogin.php";
    });

    $("#pump").click(function(){
       window.location.href=document.getElementsByClassName(
               "img-thumbnail")[0].src;
    });

});
