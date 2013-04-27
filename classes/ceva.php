<?php 
    function my_func($variable) {
        return (is_numeric($variable) && $variable % 2 == 0);
    }
    echo my_func(3);
?>