<?php

namespace BetterWP\ThemeWrapper;

/**
 * TODO: everything
 */
class Theming {
    public static function get_footer( string $name = null ) {
        return get_footer( $name );
    }

    public static function get_header( string $name = null ) {
        return get_header( $name );
    }

    /* public static function getHead( string $name = null ) {
        return wp_head();
    } */
}