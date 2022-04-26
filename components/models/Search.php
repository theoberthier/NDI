<?php

class Search {
    static function get($string){
        $a=Person::getBySearch($string);
        $b=Saving::getBySearch($string);
        $c=Bateau::getBySearch($string);
        $d=Decoration::getBySearch($string);
        return array_merge($a,$b,$c,$d);
    }
}