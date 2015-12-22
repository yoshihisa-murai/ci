<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ログ
 */
// {{{ function c_info( $message )
/**
 * info
 */
if ( !function_exists( 'c_info' ) ) {
    function c_info( $message ) {
        logger( 'info', $message );
    }
}
// }}}

// {{{ function c_debug( $message )
/**
 * debug
 */
if ( !function_exists( 'c_debug' ) ) {
    function c_debug( $message ) {
        logger( 'debug', $message );
    }
}
// }}}

// {{{ function c_error( $message )
/**
 * error
 */
if ( !function_exists( 'c_error' ) ) {
    function c_error( $message ) {
        logger( 'error', $message );
    }
}
// }}}

// {{{ function logger( $level, $message )
if (!function_exists('logger'))
{
    function logger( $level, $message )
    {
        $arr = debug_backtrace();
        if(stristr($arr[0]['file'], 'log_helper') === FALSE) {
            $filename = $arr[1]['class'] . '.php:' . $arr[1]['function'];
            $msg = '[' . $filename . "(line:" .$arr[0]['line'] .")" . ']' . print_r( $message, true );
        } else {
            $filename = $arr[2]['class'] . '.php:' . $arr[2]['function'];
            $msg = '[' . $filename . "(line:" .$arr[1]['line'] .")" . ']' . print_r( $message, true );
        }
        log_message( $level, $msg );
    }
}
// }}}

/**
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: sw=4 ts=4 fdm=marker
 * vim<600: sw=4 ts=4
 */
