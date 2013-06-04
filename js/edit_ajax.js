
        function rotation(x, y, z)
        {
           $(x).rotate({ 
         bind: 
        { 
        mouseover : function() { 
            $(this).rotate({animateTo:y})
        },
        mouseout : function() { 
            $(this).rotate({animateTo:z})
        }
        } 
        }); 
        }

        rotation(".rotation", 180, 0);
        rotation(".apply",180,0);
        rotation("#rotateleft", 180, 360  );

        $("#rotateleft").click(function(){
        rotval=$("#amount").val();
        if (parseInt(rotval) >= 360 )
        rotval=360-parseInt(rotval);
        rotval=parseInt(rotval)+90;
        $("#amount").attr('value',rotval);
        changeAmount();
        });

        $("#rotateright").click(function(){
        rotval=$("#amount").val();
        if (parseInt(rotval) < 90 )
            rotval=360-parseInt(rotval);
        rotval=parseInt(rotval)-90;
        $("#amount").attr('value',rotval);
        changeAmount();
        });


        $(function(){
        $('#cropbox').Jcrop({
        onSelect: updateCoords
        });

        });
/*
        function checkSize()
        {
            x=9/10;
        y=$("#myImg").width();
        while(y>980)
        {
        y=y/(x+1/10);
        y=y*x;
        x=x-1/10;
        }
        x2=((((1-x)+1/10)*100).toFixed(0))+"%";
        $("#myImg").width(x2);
        w=$("#myImg").width();
        h=$("#myImg").height();

        $(".jcrop-holder").children("img").width(w);
        $(".jcrop-tracker").width(w);
        $(".jcrop-holder").children().children().children().width(w);
        $(".jcrop-holder").width(w);
        $(".jcrop-holder").height(h);
        $(".jcrop-holder").children("img").height(h);
        $(".jcrop-tracker").height(h);
        $(".jcrop-holder").children().children().children().height(h);
        }
*/
        function updateCoords(c)
        {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#x2').val(c.x2);
        $('#y2').val(c.y2);
        $('#w').val(c.w);
        $('#h').val(c.h);
        };

        function checkCoords()
        {
        if (parseInt($('#w').val())) return true;
        alert('Selecteaza o regiune.');
        return false;
        };


        $("#myImg").attr('src',$("#cropbox").attr('src'));

/*
        $("#effectHead").hover(  function () {
            $("#effectsHidden").show();
            },
        function () {
            $("#effectsHidden").hide();
            });
*/
        $(document).ready(function(){
     //   $("#effectsHidden").hide();
        $("#amount").attr('value',0);
        $("body").append("<div id='cropContainer' style='position:relative; margin-right:auto;margin-left:auto; display: table; margin:0 auto;'></div>");
        $("#myImg").hide();
        setTimeout(function() {
        $(".jcrop-holder").appendTo("#cropContainer");
        $('#cropContainer').insertBefore($(".edit"));
        $('.jcrop-holder').css({'display': 'table', 'margin':'0 auto'});
        topContainer=Math.abs(($("#myImg").height())-($("#myImg").width()));
        $("#cropContainer").css('top',(topContainer+80)+'px');

        //checkSize();
        },200);
        //checkSize();
        });
        var sursa=$("#myImg").attr('src');

        $('#submit').bind("click", function(){
        $.post('crop_async.php', {
        'type':'crop',
        'x':$('#x').val(),
        'y':$('#y').val(),
        'x2':$('#x2').val(),
        'y2':$('#y2').val(),
        'w':$('#w').val(),
        'h':$('#h').val(),
        'src':$('#myImg').attr('src')
        }, function(data){
        $("*").css("cursor", "progress");
        var x=($("#myImg").height()+$("#myImg").width())*0.75;
        //  $("#cropped").append(t);
        setTimeout(function() {

        $("*").css("cursor", "auto");
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
}, x);
        setTimeout(function() {
        $(".jcrop-holder").children("img").width($("#myImg").width());
        $(".jcrop-tracker").width($("#myImg").width());
        $(".jcrop-holder").children().children().children().width($("#myImg").width());
        $(".jcrop-holder").width($("#myImg").width());
        $(".jcrop-holder").height($("#myImg").height());
        $(".jcrop-holder").children("img").height($("#myImg").height());
        $(".jcrop-tracker").height($("#myImg").height());
        $(".jcrop-holder").children().children().children().height($("#myImg").height());
        
        }, (x+200));
        //  $(t).find("#myImg").attr('src',data);
        });
        });

        $('#censor').bind("click", function(){
        $.post('crop_async.php', {
        'type':'censor',
        'x':$('#x').val(),
        'y':$('#y').val(),
        'x2':$('#x2').val(),
        'y2':$('#y2').val(),
        'w':$('#w').val(),
        'h':$('#h').val(),
        'src':$('#myImg').attr('src')
        }, function(data){
        //  $("#cropped").append(t);
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        //  $(t).find("#myImg").attr('src',data);
        });
        });


        $('.redim').bind("click", function(){
        $.post('crop_async.php', {
        'type':'resize',
        'size':this.id,
        'x':$('#x').val(),
        'y':$('#y').val(),
        'x2':$('#x2').val(),
        'y2':$('#y2').val(),
        'w':$('#w').val(),
        'h':$('#h').val(),
        'src':$('#myImg').attr('src')
        }, function(data){

        var x=($("#myImg").height()+$("#myImg").width())*0.75;
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        $("*").css("cursor", "progress");
        
        setTimeout(function() {

        $("*").css("cursor","auto");
        //checkSize();
        $(".jcrop-holder").children("img").width($("#myImg").width());
        $(".jcrop-tracker").width($("#myImg").width());
        $(".jcrop-holder").children().children().children().width($("#myImg").width());
        $(".jcrop-holder").width($("#myImg").width());
        $(".jcrop-holder").height($("#myImg").height());
        $(".jcrop-holder").children("img").height($("#myImg").height());
        $(".jcrop-tracker").height($("#myImg").height());
        $(".jcrop-holder").children().children().children().height($("#myImg").height());
        topContainer=Math.abs(($("#myImg").height())-($("#myImg").width()));
        $("#cropContainer").css('top',(topContainer+80)+'px');
        }, x);

        });
        });


        $('.apply').bind("click", function(){
        $.post('crop_async.php', {
        'type':'effect',
        'effectType':$(this).attr('id'),
        'src':$('#myImg').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        });
        });


        $('#min').bind("click", function(){
        $.post('crop_async.php', {
        'type':'minbright',
        'src':$('#myImg').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        });
        });

          $('#pls').bind("click", function(){
        $.post('crop_async.php', {
        'type':'maxbright',
        'src':$('#myImg').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        });
        });


        $('#minContrast').bind("click", function(){
        $.post('crop_async.php', {
        'type':'mincontrast',
        'src':$('#myImg').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        });
        });

        $('#plsContrast').bind("click", function(){
        $.post('crop_async.php', {
        'type':'maxcontrast',
        'src':$('#myImg').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        });
        });



        $('#save').bind("click", function(){
        $.post('crop_async.php', {
        'type':'save',
        'src':$('#cropbox').attr('src'),
        'src2':thumb,
        'src3':url
        }, function(data){
        });
        });


        $('#done').bind("click", function(){
        $.post('crop_async.php', {
        'type':'rotate',
        'deg': $( "#amount" ).val(),
        'src':$('#cropbox').attr('src')
        }, function(data){   // alert("Saved");
        $("#myImg").attr('src','temp/poza.jpg');
        $("#cropbox").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children("img").attr('src','temp/poza.jpg');
        $(".jcrop-holder").children().children().children("img").attr('src','temp/poza.jpg');
        $("#amount").attr('value','0');
          setTimeout(function() {
        
        $(".jcrop-holder").children("img").width($("#myImg").width());
        $(".jcrop-tracker").width($("#myImg").width());
        $(".jcrop-holder").children().children().children().width($("#myImg").width());
        $(".jcrop-holder").width($("#myImg").width());
        $(".jcrop-holder").height($("#myImg").height());
        $(".jcrop-holder").children("img").height($("#myImg").height());
        $(".jcrop-tracker").height($("#myImg").height());
        $(".jcrop-holder").children().children().children().height($("#myImg").height());
         topContainer=Math.abs(($("#myImg").height())-($("#myImg").width()));
        $("#cropContainer").css('top',(topContainer+80)+'px');
        }, 200);
        changeAmount();
        });
        });

        $("#amount").change(function(){
        changeAmount();
     });
        
        function changeAmount(){
              x=360 - $("#amount").val();
        topContainer=Math.abs(($("#myImg").height())-($("#myImg").width()));
        $("#cropContainer").css('top',(topContainer+80)+'px');
        $(".jcrop-holder").css("background","transparent");
         $(".jcrop-holder").children("img").css({
                "transform": "rotate("+x+"deg)",
                "-moz-transform": "rotate("+x+"deg)",
                "-webkit-transform": "rotate("+x+"deg)"
         });
         $(".jcrop-holder").children().children().children("img").css({
                "transform": "rotate("+x+"deg)",
                "-moz-transform": "rotate("+x+"deg)",
                "-webkit-transform": "rotate("+x+"deg)"
         }); 
        }
