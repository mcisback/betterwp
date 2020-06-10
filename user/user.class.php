<?php

namespace BetterWP\User;

use BetterWP\User\UserWrapper;
/**
 * TODO: is_admin, is_super_admin, get user by (search user)
 */
class User {
    //public static $wp_user;

    public static function get( $user_id, ...$params ) {
        return new UserWrapper( $user_id, ...$params );
    }

    public static function current() {
        return new UserWrapper( get_current_user_id() );
    }

    public static function create( string $username, string $password, string $email = '' ) {
        // wp_create_user( string $username, string $password, string $email = '' )
        $user_id = wp_create_user( $username, $password, $email );

        if(!is_wp_error( $user_id ) ) {
            return new UserWrapper( $user_id );
        } else {
            echo $user_id->get_error_message();

            return null;
        }
    }

    public static function delete( $user_id, $reassign_id=null ) {
        return self::get( $user_id )->delete( $reassign_id );
    }
}