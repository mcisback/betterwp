<?php

namespace BetterWP\Http;

/**
 * TODO: everything
 */
class SessionContainer {
    public static function set( $key, $value ) {
        $_SESSION[ $key ] = $value;
    }

    public static function get( $key ) {
        if(!self::exists( $key )) {
            return null;
        }
        
        return $_SESSION[ $key ];
    }

    public static function exists( $key ) {
        return array_key_exists( $key, $_SESSION );
    }
}