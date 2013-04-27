$('#submit').bind("click", function(){
        $.post('crop_async.php', {
        'type':'crop',
        'x':$('#x').val(),
        'y':$('#y').val(),
        'x2':$('#x2').val(),
        'y2':$('#y2').val(),
        'w':$('#w').val(),
        'h':$('#h').val(),
        'src':$('#cropbox').attr('src')
        }, function(data){
        // t=$("#template").html();
        //  $("#cropped").append(t);
        $("#myImg").attr('src','temp/poza.jpg');
        //  $(t).find("#myImg").attr('src',data);
        });
        });


        $('#resize').bind("click", function(){
        $.post('crop_async.php', {
        'type':'resize',
        'size':$('#selSize option:selected').attr('id'),
        'x':$('#x').val(),
        'y':$('#y').val(),
        'x2':$('#x2').val(),
        'y2':$('#y2').val(),
        'w':$('#w').val(),
        'h':$('#h').val(),
        'src':$('#cropbox').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        });
        });


        $('#apply').bind("click", function(){
        $.post('crop_async.php', {
        'type':'effect',
        'effectType':$('#effects option:selected').attr('id'),
        'src':$('#cropbox').attr('src')
        }, function(data){
        $("#myImg").attr('src','temp/poza.jpg');
        });
        });



        $('#save').bind("click", function(){
        $.post('crop_async.php', {
        'type':'save',
        'src':$('#cropbox').attr('src'),
        'src2':$('#myImg').attr('src')
        }, function(data){
        alert("Saved");
        $("#cropbox").attr('src','images/logos.jpg');
        });
        });


        $('#slider').bind("click", function(){
        $.post('crop_async.php', {
        'type':'rotate',
        'deg': $( "#amount" ).val(),
        'src':$('#cropbox').attr('src')
        }, function(data){
    //    alert("Saved");
        $("#myImg").attr('src','temp/poza.jpg');
        });
        });
//alert(  $( "#amount" ).val());

