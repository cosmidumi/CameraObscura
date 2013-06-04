var site = function() {
};

site.prototype = {
 	closePressed: function()
    {
    $("#viewImage").remove();
    $('body').removeClass('stop-scrolling');
    window.history.back();
    },
 	setMenu : function() {
 	    $(window).scroll(function(){
            placeCornerFrames();
            if ($(this).scrollTop() > 400) {
                $("#logo").attr('id','logo-small');
                $("#header-cont").attr('id',"header-cont-small");
                $(".edit").show();
                $(".fixedBar").show();
            } else {
                $("#header-cont-small").attr('id','header-cont');
                $("#logo-small").attr('id','logo');
                $(".edit").hide();
                $(".fixedBar").hide();
            }
            if (($(this).scrollTop() > 600)) {
                if ($(this).scrollTop() <= ($("html").height() - 600))
                    {
                    $('.scrollup').css('bottom','50px');
                    }
                    else
                    {
                    $('.scrollup').css('bottom','120px');
                    }
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function(){
            $("body").animate({ scrollTop: 0 }, 600);
            return false;
        });

        function hdiv(i)
        {
            var vals = new Array();
            if (i==1)
            {
                vals=[236,236,0,0,236,236,0,236,236,236,0,472,177,177,236,0,177,177,236,177,177,177,236,354,177,177,236,531];
              //  vals=[483,116,0,0,241,232,117,0,241,232,0,484,241,232,117,242,241,116,233,484];
            }
            return vals;
        };

        function generateDivs()
        {
        var btlr = new Array;
        val=hdiv(1);
        var title = new Array();
        title = ["texturi","portret","peisaje","macro"];
        for(var i = 0; i <= 6; i++){
            if (i==0) btlr=[10,0,0,0];
            else 
                if(i==2) btlr=[0,10,0,0];
                else 
                    if(i==3) btlr=[0,0,10,0]
                    else 
                        if(i==6) btlr=[0,0,0,10];
                        else btlr=[0,0,0,0];
            $("<div class='view header-divs-anim' id='header-div"+(i+1)+"'></div>").appendTo('.header-divs').css({
                "width":val[i*4],
                "height":val[i*4+1],
                "position":"absolute",
                "top": val[i*4+2],
                "left": val[i*4+3],
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]
            });
            x='#header-div'+(i+1);
            $("<img src='/images/"+(i+1)+".jpg' width='"+ val[i*4]+"' height='"+val[i*4+1]+"' />").appendTo(x).css({
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]    
                });
           if (i>2)
           $("<a href='tutorial.php?tut="+(i-2)+"'><div class='mask' id='mask"+(i+1)+"' style='width:"+ (val[i*4]+1)+"px;height:"+(val[i*4+1]+1)+"px'></div></a>").appendTo(x).css({
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]    
                });
            else if (i==0)
            {
                v0=btlr[0];v1=btlr[1];v2=btlr[2];v3=btlr[3];v4=(val[i*4]+1);v5=(val[i*4+1]+1); x2=x;
            var cont;
            $.post('insertContest.php',{
                'type':'contest'
            }, function(data){
                cont=data;
                $("<a href='contests.php?contest="+cont+"'><div class='mask' id='mask"+(i+1)+"' style='width:"+v4+"px;height:"+v5+"px'></div></a>").appendTo(x2).css({
                "border-top-left-radius": v0,
                "border-top-right-radius":v1,
                "border-bottom-left-radius":v2,
                "border-bottom-right-radius":v3    
                });
                $("<h2> Concursuri </h2>").appendTo('#mask8');
                $("<p> Verifica cele mai recente concursuri si provocari pentru orice fotograf.</p>").appendTo('#mask8');
            });
            
            }
            else if (i==1)
            $("<a href='appreciated.php'><div class='mask' id='mask"+(i+1)+"' style='width:"+ (val[i*4]+1)+"px;height:"+(val[i*4+1]+1)+"px'></div></a>").appendTo(x).css({
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]    
                });
            else if (i==2)
            $("<a href='work.php'><div class='mask' id='mask"+(i+1)+"' style='width:"+ (val[i*4]+1)+"px;height:"+(val[i*4+1]+1)+"px'></div></a>").appendTo(x).css({
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]    
                });
            else
            $("<div class='mask' id='mask"+(i+1)+"' style='width:"+ (val[i*4]+1)+"px;height:"+(val[i*4+1]+1)+"px'></div>").appendTo(x).css({
                "border-top-left-radius": btlr[0],
                "border-top-right-radius":btlr[1],
                "border-bottom-left-radius":btlr[2],
                "border-bottom-right-radius":btlr[3]    
                });
            y='#mask'+(i+1);
            if (i>2)
            {
                $("<h2> Tutorial "+title[i-3]+"</h2>").appendTo(y);
                $("<p> Invata totul despre pozele de tip "+title[i-3]+"</p>").appendTo(y);
            }
            else if (i==1)
            {
                $("<h2> Cele mai apreciate </h2>").appendTo(y);
                $("<p> Admira cele mai apreciate poze de pe Camera Obscura.</p>").appendTo(y);
            }
            else if(i==2)
            {
                $("<h2> Teme </h2>").appendTo(y);
                $("<p> Verifica si apreciaza temele date de incepatori.</p>").appendTo(y);
            }
        }
        }


    function placeCornerFrames()
    {
        setTimeout(function(){
        contentTop=$("#content").height();
        $("#frame5").css('top',contentTop+"px");
        $("#frame6").css('top',(contentTop+15)+"px");
        $("#frame7").css('top',(contentTop)+"px");
        $("#frame8").css('top',(contentTop+15)+"px");
        $("#frame7").show();
        $("#frame5").show();
        },400);
    }

    function adjustHeaderFooter()
    {
        $("#head").width($(window).width()-2);
        $("#footer").width($(window).width()-2);
        $('body').css('overflow-x','hidden');
    }

    //// MAIN GALLERY
    $("#delbtn").click(function(){
    if ($(".delete").is(":visible"))
        $(".delete").fadeOut(300);
    else
        $(".delete").fadeIn(300);
    });

    $("#renamebtn").click(function(){
    if ($(".rename").is(":visible"))
        $(".rename").fadeOut(300);
    else
        $(".rename").fadeIn(300);
    });
    
    $("#options").click(function(){
    if(!$("#delbtn").is(":visible"))
    {
        $("#delbtn").show();
        $("#renamebtn").show();
        $("#delbtn").animate({
          left:'20px',
          opacity:'1',
        });
        $("#renamebtn").animate({
          left:'40px',
          opacity:'1',
        });
    }
    else
    {
        $("#delbtn").animate({
          left:'-100px',
          opacity:'0.2',
        });
        $("#renamebtn").animate({
          left:'-120px',
          opacity:'0.3',
        },"slow");
        setTimeout(function(){ $("#delbtn").hide();
        $("#renamebtn").hide();},500);
       
    }
    });
    //
    $("#searchClick").click(function(){
      //  $.post("search.php",{s:"$('input[name=search]').val()"},);
        window.location="search.php?s="+$('input[name=search]').val();
    });
    $("#searchInput").keyup(function (e) {
    if (e.keyCode == 13) {
        window.location="search.php?s="+$('input[name=search]').val();
    }
    });



    $(document).keyup(function (e){
    if ((e.keyCode == 27) && ((($('#upload').css('opacity')==1)||($('#changeAvatar').css('opacity')==1)||($('#editModal').css('opacity')==1)||($('#viewImage').css('opacity')==1))||($('.modalDialog').css('opacity')==1))) {
    $("#viewImage").remove();
    window.history.back();
    }
    });

    $('#uploadTop,.fixedBar').click(function(){
        $('body').addClass('stop-scrolling');
    });

    $('input[name=usernamereg]').blur(function(){
        $("#checkValid").remove();
        $.post('registration_validation.php', {
            'type':'email',
            'email':this.value
        }, function(data)
            {
                if (data=="1") $("#usernameValid").append("<img id='checkValid' src='images/icons/checkmark.png' style='width:20px;height:20px; position:relative; float:left;left:5px'/>");
                else $("#usernameValid").append("<img id='checkValid' src='images/icons/delete.png' style='width:20px;height:20px;position:relative; float:left;left:5px'/>");
        });
    });

    $('input[name=cnf]').blur(function(){
        $(".checkValid2").remove();
        $.post('registration_validation.php', {
            'type':'pwd',
            'pwd':this.value,
            'cnf':$('input[name=pwdreg]').val()
        }, function(data)
            {
                if (data=="1") $(".pass").append("<img class='checkValid2' src='images/icons/checkmark.png' style='width:20px;height:20px; position:relative; float:left;left:5px'/>");
                else $(".pass").append("<img class='checkValid2' src='images/icons/delete.png' style='width:20px;height:20px;position:relative; float:left;left:5px'/>");
        });
    });

    $(document).ready(function()
    {
    $(".fixedBar").hide();
    $("#frame7").hide();
    $("#frame5").hide();
    adjustHeaderFooter();
    generateDivs();
    var default_value = $('input[name=search]').val();
    $('input[name=search]').focus(function() {
        if(this.value == default_value) $(this).val("");
        $(this).css('color', 'black');
    }).blur(function(){
        if(this.value.length == 0) $(this).val(default_value);
        $(this).css('color', 'grey');
    });
    placeCornerFrames();
    });
    $("#tutorial").width($("#content").width()-100);
    $("#tutorial").height($("#content").height());
    }
}

mySite = new site();
mySite.setMenu();

$('.close').bind('click', function () {
    mySite.closePressed();
});