$(document).ready(function(){
	
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