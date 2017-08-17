
        //全局
var $directions = $(".direction .choice span");
var $departs = $(".depart .choice span");
var $levels = $(".level .choice span");

//上
$directions.on("click",function(){
    $(".direction .choice span").removeClass("current");
    $(this).addClass("current").siblings().removeClass("current");
});

 




