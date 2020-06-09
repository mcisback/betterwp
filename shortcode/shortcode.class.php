<?php

namespace BetterWP\Shortcode;

use BetterWP\Pattern\HookableAbstract;

class Shortcode extends HookableAbstract {

    public function register(...$params) {
        
        if( empty( $this->key ) ){
            return;
        }

        return add_shortcode( $this->key, array( $this, '_callback' ) );
    
    }

    public function delete(...$params) {
        return remove_shortcode( $this->key );
    }

    public function do(...$params) {
        return do_shortcode( $key );
    }
}

