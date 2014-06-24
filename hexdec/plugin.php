<?php
/*
Plugin Name: Hexadecimal Keywords
Plugin URI: http://github.com/plttn/yourls-hexadecimal-keywords
Description: Makes YOURLS use hexadecimal incrementing keyword. Set to base 36.
Version: 1.0
Author: plttn
Author URI: http://plttn.me/x/t
*/

// hook our custom function into the 'random_keyword' filter
yourls_add_filter( 'random_keyword', 'hexadecimal_func' );

// Our silly custom function
function hexadecimal_func( $original_keyword ) {
    

    $hexadec_keyword = base_convert($original_keyword, 36, 16);

    // a filter function MUST return something once its arguments are processed
    return $hexadec_keyword;
}