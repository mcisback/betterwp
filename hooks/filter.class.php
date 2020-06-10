<?php

namespace BetterWP\Hooks;

use BetterWP\Pattern\HookableAbstract;

/**
 * TODO: everything
 */
class Filter extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        return add_filter( $this->key, array( $this, '_callback' ), ...$params );
    
    }

    public function delete(...$params) {
        return remove_filter( $this->key, array( $this, '_callback' ), ...$params );
    }

    public function do(...$params) {
        return apply_filters( $this->key, ...$params );
    }
}