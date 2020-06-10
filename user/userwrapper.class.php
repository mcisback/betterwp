<?php

namespace BetterWP\User;

/**
 * TODO: is_admin, is_super_admin
 * TODO: insert user, update user, delete user
 */
class UserWrapper {
    public WP_User $wp_user;

    public function __construct( $user_id, ...$params ) {
        if( $user_id instanceof WP_User ) {
            $this->wp_user = $user_id;
        } else {
            $this->$wp_user = new WP_User( $user_id, ...$params );
        }
    }

    public function get_wp_user() {
        return $this->wp_user;
    }

    public function is_logged() {
        return $this->wp_user->exists() || $this->id() !== 0;
    }

    public function is_admin() {
    	return $this->is_logged() && $this->can( 'administrator' );
    }

    public function can( $cap, ...$params ) {
        return user_can( $this->wp_user, $cap, ...$params );
    }

    public function id() {
        return $this->wp_user->ID;
    }

    public function delete( $reassing_id=null ) {
        return wp_delete_user( $this->id(), $reassing_id );
    }
}