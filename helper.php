<?php
    if(!function_exists('vd')){
        function vd($var){
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
    }

    if(!function_exists('vp')){
        function vp($var){
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }
    }
?>