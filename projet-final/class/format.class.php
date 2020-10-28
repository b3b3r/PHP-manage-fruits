<?php

class FormatTitle{
    public static function levelOne($title){
        return '<h1 class="light-background  text-white p-2 mt-2 rounded-lg border border-dark">'.$title.'</h1>';
    }

    public static function levelTwo($title){
        return '<h2 class="light-background  text-white p-2 mt-2 rounded-lg border border-dark">'.$title.'</h2>';
    }
}

?>