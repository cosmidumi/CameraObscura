<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Crop
        </title>
          <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript" charset="utf-8">

</script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

        <script src="/js/jquery.Jcrop.js" type="text/javascript">
</script>
        <script type="text/javascript">

        $(function(){
        $('#cropbox').Jcrop({
        onSelect: updateCoords
        });

        });

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
  $(function() {
    $( "#slider" ).slider({
      range: "max",
      min: 0,
      max: 360,
      value: 0,
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.value );
       }
      });
    $( "#amount" ).val( $( "#slider" ).slider( "value" ) );
  });
        </script>
    </head>
    <body>


        <img src="images/1.jpg" id="cropbox">
        <div>
            <input type="hidden" id="x" name="x"> <input type="hidden" id="y" name="y"> <input type="hidden" id="w" name="w"> <input type="hidden" id="h" name="h"> <input type="hidden" id="x2" name="x2"> <input type="hidden" id="y2" name="y2"> <input type="hidden" value="" id="src"> <select id="selSize">
                <option label="big" id="1">
                    </option>
                <option label="midsize" id="2">
                    </option>
                <option label="small" id="3">
                    </option>
                <option label="thumb" id="4">
                    </option>
            </select> <input type="submit" value="Crop Image" id="submit"> <input type="submit" value="Resize Image" id="resize"> <select id="effects">
                <option label="sepia" id="1e">
                    </option>
                <option label="negate" id="2e">
                    </option>
                <option label="grayscale" id="3e">
                    </option>
                <option label="colorize" id="4e">
                    </option>
                <option label="edge detect" id="5e">
                    </option>    
            </select> <input type="submit" value="Apply" id="apply"> <input type="submit" value="Save Image" id="save">
            <div id="slider" style="width:200px; background:blue;"></div>
              <input type="text" id="amount" style="border: 0; color: #f6931f; font-weight: bold;" />

        </div>
        <div id="cropped">
            <img id="myImg">
        </div><script src="/js/edit_ajax.js" type="text/javascript">
    
        </script>
    </body>
</html>