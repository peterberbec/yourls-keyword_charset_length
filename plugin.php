<?php
/*
Plugin Name: Simple Random Charset
Plugin URI: http://yourls.org/
Description: Assign random keywords to shorturls, like bitly (sho.rt/hJudjK), but uses a limited charset
Version: 1.0
Author: PRB
Author URI: https://github.com/peterberbec
ripped from ozh's random keywork generator, but with a charset limitation.
*/


global $prb_random_keyword;
/*
* CONFIG: EDIT THIS
*/
/* Length of random keyword */
$prb_random_keyword['length'] = 5;

/*
 ** these look similar:         I & l & 1, o & 0, S & 5, Z & 2
 ** so let us remove:           ilosz025
 */
define('YOURLS_PRB_CHARSET', 'abcdefghjkmnpqrtuvwxy346789');

/*
* DO NOT EDIT FARTHER
*/
// Generate a random keyword
yourls_add_filter( 'random_keyword', 'prb_random_keyword' );
function prb_random_keyword() {
        global $prb_random_keyword;
        return yourls_rnd_string( $prb_random_keyword['length'], 0, YOURLS_PRB_CHARSET );
}
// Don't increment sequential keyword tracker
yourls_add_filter( 'get_next_decimal', 'prb_random_keyword_next_decimal' );
function prb_random_keyword_next_decimal( $next ) {
        return ( $next - 1 );
}
