<?php

namespace BetterWP\User;

/**
 * TODO: is_admin, is_super_admin
 */
class User {
    //public static $wp_user;

    public static function is_logged() {
        return is_user_logged_in() === true || get_current_user_id() !== 0;
    }

    public static function get( $user_id, ...$params ) {
        return new WP_User( $user_id, ...$params );
    }

    public static function current() {
        return wp_get_current_user();
    }

    public static function is_admin() {
    	return self::is_logged() && self::can( 'administrator' );
    }

    public static function can( $cap ) {
        return current_user_can( $cap );
    }
}