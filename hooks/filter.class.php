<?php

namespace BetterWP\Hooks;

use BetterWP\Pattern\HookableAbstact;

/**
 * TODO: everything
 */
class Filter extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        return add_filter( $this->key, array( $this, '_callback' ) );
    
    }

    public function delete(...$params) {
        return remove_filter( $this->key, $this->_callback );
    }

    public function do(...$params) {
        return apply_filters( $this->key, ...$params );
    }
}