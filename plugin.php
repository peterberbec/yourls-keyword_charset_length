<?php
/*
Plugin Name: Hexadecimal Keywords
Plugin URI: https://github.com/plttn/yourls-hexdec
Description: Makes YOURLS use hexadecimal incrementing keyword. Set to base 36.
Version: 1.0
Author: plttn
Author URI: http://plttn.me
*/

yourls_add_filter( 'random_keyword', 'hexadecimal_func' );

function hexadecimal_func( $original_keyword ) {
    $hexadec_keyword = base_convert($original_keyword, 36, 16);
    return $hexadec_keyword;
}
