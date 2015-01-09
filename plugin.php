<?php
/*
Plugin Name: Hexadecimal Keywords
Plugin URI: https://github.com/plttn/yourls-hexdec
Description: Makes YOURLS use hexadecimal incrementing keyword. Set to base 36.
Version: 1.0
Author: plttn
Author URI: http://plttn.me
*/

yourls_add_filter( 'get_shorturl_charset', 'hexadecimal_func' );
function hexadecimal_func( $in ) {
    return "0123456789abcdef";
}
