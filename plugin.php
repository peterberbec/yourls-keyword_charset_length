<?php
/*
Plugin Name: Simple Random Charset
trying to run off ozh's random-keywords instead
*/


global $prb_random_keyword;
/*
* CONFIG: EDIT THIS
*/
/* Length of random keyword */
$prb_random_keyword['length'] = 5;
/*
* DO NOT EDIT FARTHER
*/
// Generate a random keyword
yourls_add_filter( 'random_keyword', 'prb_random_keyword' );
function prb_random_keyword() {
        global $prb_random_keyword;
        return yourls_rnd_string( $prb_random_keyword['length'], 0, defined('YOURLS_GFWD_CHARSET') ? YOURLS_GFWD_CHARSET : $charset );
}
// Don't increment sequential keyword tracker
yourls_add_filter( 'get_next_decimal', 'prb_random_keyword_next_decimal' );
function prb_random_keyword_next_decimal( $next ) {
        return ( $next - 1 );
}
