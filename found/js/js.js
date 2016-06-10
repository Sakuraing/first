/*$(document).ready(function(){
	alert("abs");
    $("#main-left-txt li.sum1").click(function(){
        if($("this").next().hide()){
        	$("this").next().show();
        }
        else{
        	$("this").next().hide();
        }
    });
});*/
/*function toGo(){
		$(this).blur();
		var that=this;
		$(that).next('.details').toggle();
		return false;		
};*/
/*$(document).ready(function(){
	alert("abs");
	$(".sum").click(function(){
		$("this").children().eq($("this").index()+2).toggle();
	});
});*/
$(document).ready(function(){
	$(".sum").click(function(){
		var that = this ;
		/*$(that).blur();*/
		$(that).next().toggle();
	    return false;
    });
});