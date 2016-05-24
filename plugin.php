<?php
/*
Plugin Name: Simple Random Charset
Plugin URI: http://yourls.org/
Description: Assign random keywords to shorturls, like bitly (sho.rt/hJudjK), but uses a limited charset
Version: 1.0
Author: Peter Ryan Berbec
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
* DO NOT EDIT FARTHER
*/

// Generate a random keyword
yourls_add_filter( 'random_keyword', 'prb_random_keyword' );
function prb_random_keyword() {
        global $prb_random_keyword;
        return yourls_rnd_string( $prb_random_keyword['length'], 0, yourls_get_option ('charset_liste','Enter charset here') );
}
// Don't increment sequential keyword tracker
yourls_add_filter( 'get_next_decimal', 'prb_random_keyword_next_decimal' );
function prb_random_keyword_next_decimal( $next ) {
        return ( $next - 1 );
}

// Hook the admin page into the 'plugins_loaded' event
yourls_add_action( 'plugins_loaded', 'prb_simple_random_charset_add_page' );

function prb_simple_random_charset_add_page () {
    yourls_register_plugin_page( 'prb_simple_random_charset', 'Random Charset', 'prb_simple_random_charset_do_page' );
}
// Display admin page
function prb_simple_random_charset_do_page () {
    if( isset( $_POST['action'] ) && $_POST['action'] == 'charset_var' ) {
        prb_charset_process ();
    } else {
        prb_charset_form ();
    }
}
// Display form to administrate charset list
function prb_charset_form () {
    $nonce = yourls_create_nonce( 'charset_var' ) ;
    $liste_charset_display = yourls_get_option ('charset_liste','Enter charset here');
    echo <<<HTML
        <h2>Random Charset</h2>
        <form method="post">
        
        <input type="hidden" name="action" value="charset_var" />
        <input type="hidden" name="nonce" value="$nonce" />
        
        <p>Charset contains the following :</p>
        <p><textarea cols="50" rows="1" name="charset_form">$liste_charset_display</textarea></p>
        
        <p><input type="submit" value="Save" /></p>
		<p>I suggest you add a charset that does not contain easy to misinterperate characters. WARNING : erroneous entries may create unexpected behaviours, please double-check before validation.</p>
		<p>Example, these look similar:         I & l & 1, o & 0, S & 5, Z & 2</p>
		<p>proposed charset: abcdefghjkmnpqrtuvwxy346789</p>
		<p>current charset: $liste_charset_display</p>
        </form>
HTML;
}
// Update charset list
function prb_charset_process () {
    // Check nonce
    yourls_verify_nonce( 'charset_var' ) ;
	
	// Check if the answer is correct.
	$charset_long_Form = $_POST['charset_form'] ;
	
	if ( is_array ($charset_long_Form) ) {
		echo "Bad answer, charset not updated";
		die ();
	}
	
	// Update list 

	yourls_update_option ( 'charset_liste', $charset_long_Form );
	echo "Charset updated. New charset is " ;
	echo $charset_long_Form."<BR />";
}
