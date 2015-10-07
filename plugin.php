<?php
/*
Plugin Name: Simple Charset
Plugin URI: https://github.com/giveforward/yourls-simplecharset
Description: allows a simple charset override
Version: 1.1
Author: gfwd
Author URI: http://www.giveforward.com
*/


yourls_add_filter('get_shorturl_charset', 'gfwd_get_shorturl_charset' );

function gfwd_get_shorturl_charset( $charset )
{
  return defined('YOURLS_GFWD_CHARSET') ? YOURLS_GFWD_CHARSET : $charset;
}
