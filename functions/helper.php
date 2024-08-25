<?php

const BASE_URL="https://zeinab-jafarzadeh.github.io/";

function asset($file){
    return BASE_URL."/".$file;
}

function url($url){
    return BASE_URL.$url;
}