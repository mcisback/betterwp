<?php

namespace BetterWP\Hooks;

use BetterWP\Pattern\HookableAbstact as HookableAbstract;

/**
 * TODO: everything
 */
class Action extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        return add_action( $this->key, array( $this, '_callback' ) );
    
    }

    public function delete(...$params) {
        return remove_action( $this->key );
    }

    public function do(...$params) {
        return do_action( $this->key );
    }
}