var site = function() {
	this.init();
};

site.prototype = {
 	
 	init : function() {
 		this.setMenu();
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

    //       j = Math.floor(Math.random()*4)+1;
        var btlr = new Array;
        val=hdiv(1);
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
  //      alert(x);
       $("<img src='/images/"+(i+1)+".jpg' width='"+ val[i*4]+"' height='"+val[i*4+1]+"' />").appendTo(x).css({
        "border-top-left-radius": btlr[0],
            "border-top-right-radius":btlr[1],
            "border-bottom-left-radius":btlr[2],
            "border-bottom-right-radius":btlr[3]    
        
       });
       $("<div class='mask' id='mask"+(i+1)+"' style='width:"+ (val[i*4]+1)+"px;height:"+(val[i*4+1]+1)+"px'></div>").appendTo(x).css(
        {
        "border-top-left-radius": btlr[0],
            "border-top-right-radius":btlr[1],
            "border-bottom-left-radius":btlr[2],
            "border-bottom-right-radius":btlr[3]    
        });
       y='#mask'+(i+1);
       $("<h2> HeaderPhotoDescription"+(i+1)+"</h2>").appendTo(y);
       $("<p> TextDescription"+(i+1)+"</p>").appendTo(y);
        }
    }

    $(".close").click(function(){
    window.history.back();
    });

    function placeCornerFrames()
    {
        contentTop=$("#content").height();
        $("#frame5").css('top',contentTop+"px");
        $("#frame6").css('top',(contentTop+15)+"px");
        $("#frame7").css('top',(contentTop)+"px");
        $("#frame8").css('top',(contentTop+15)+"px");
    }

    function adjustHeaderFooter()
    {
        $("#head").css('width',($(this).width() - 2) +"px");
        $("#footer").css('width',($("#head").width()) +"px");
    }

    $(document).ready(function()
    {
    $(".fixedBar").hide();
    adjustHeaderFooter();
    generateDivs();
    setTimeout(function() { placeCornerFrames(); }, 100);
    });
    }

 
}


new site();