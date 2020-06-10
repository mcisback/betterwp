<?php

namespace BetterWP\Hooks;

use BetterWP\Pattern\HookableAbstract;

/**
 * TODO: everything
 */
class Action extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        return add_action( $this->key, array( $this, '_callback' ), ...$params );
    
    }

    public function delete(...$params) {
        return remove_action( $this->key, array( $this, '_callback' ), ...$params );
    }

    public function do(...$params) {
        return do_action( $this->key, ...$params );
    }
}